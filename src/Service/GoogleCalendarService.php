<?php

namespace App\Service;

use App\Entity\RendezVous;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GoogleCalendarService
{
    private const AUTH_ENDPOINT = 'https://accounts.google.com/o/oauth2/v2/auth';
    private const TOKEN_ENDPOINT = 'https://oauth2.googleapis.com/token';
    private const EVENTS_ENDPOINT_PATTERN = 'https://www.googleapis.com/calendar/v3/calendars/%s/events?sendUpdates=all';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly LoggerInterface $logger,
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $redirectUri,
        private readonly string $calendarId,
        private readonly string $timezone,
        private readonly string $tokenStoragePath
    ) {
    }

    public function isConfigured(): bool
    {
        return $this->clientId !== ''
            && $this->clientSecret !== ''
            && $this->redirectUri !== '';
    }

    public function hasStoredTokens(): bool
    {
        $tokens = $this->readTokens();

        return is_array($tokens)
            && isset($tokens['access_token'])
            && is_string($tokens['access_token'])
            && $tokens['access_token'] !== '';
    }

    public function buildAuthorizationUrl(): string
    {
        if (!$this->isConfigured()) {
            throw new \RuntimeException('Google Calendar n est pas configure.');
        }

        $query = http_build_query([
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/calendar.events',
            'access_type' => 'offline',
            'prompt' => 'consent',
            'include_granted_scopes' => 'true',
        ]);

        return self::AUTH_ENDPOINT . '?' . $query;
    }

    public function exchangeAuthorizationCode(string $code): void
    {
        if (!$this->isConfigured()) {
            throw new \RuntimeException('Google Calendar n est pas configure.');
        }

        $response = $this->httpClient->request('POST', self::TOKEN_ENDPOINT, [
            'body' => [
                'code' => $code,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUri,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $data = $response->toArray(false);

        if ($statusCode < 200 || $statusCode >= 300) {
            $message = isset($data['error_description']) && is_string($data['error_description'])
                ? $data['error_description']
                : 'Echec lors de l autorisation Google.';
            throw new \RuntimeException($message);
        }

        $this->storeTokens($data, null);
    }

    public function createEventForRendezVous(RendezVous $rendezVous): ?string
    {
        if (!$this->isConfigured()) {
            throw new \RuntimeException('Google Calendar n est pas configure.');
        }

        $accessToken = $this->getValidAccessToken();
        if ($accessToken === null || $accessToken === '') {
            throw new \RuntimeException('Google Calendar non connecte. Ouvrez /google-calendar/connect.');
        }

        $endpoint = sprintf(
            self::EVENTS_ENDPOINT_PATTERN,
            rawurlencode($this->calendarId !== '' ? $this->calendarId : 'primary')
        );

        $response = $this->httpClient->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => $this->buildEventPayload($rendezVous),
        ]);

        $statusCode = $response->getStatusCode();
        $data = $response->toArray(false);

        if ($statusCode < 200 || $statusCode >= 300) {
            $errorMessage = 'Impossible de creer l evenement Google Calendar.';
            if (isset($data['error']['message']) && is_string($data['error']['message'])) {
                $errorMessage = $data['error']['message'];
            }

            throw new \RuntimeException($errorMessage);
        }

        if (isset($data['htmlLink']) && is_string($data['htmlLink'])) {
            return $data['htmlLink'];
        }

        return null;
    }

    private function buildEventPayload(RendezVous $rendezVous): array
    {
        $medecin = $rendezVous->getMedecin();
        $patient = $rendezVous->getPatient();
        $medecinUser = $medecin?->getUser();
        $patientUser = $patient?->getUser();

        $medecinNom = trim(sprintf(
            'Dr %s %s',
            (string) ($medecinUser?->getPrenom() ?? ''),
            (string) ($medecinUser?->getNom() ?? '')
        ));
        $patientNom = trim(sprintf(
            '%s %s',
            (string) ($patientUser?->getPrenom() ?? ''),
            (string) ($patientUser?->getNom() ?? '')
        ));
        $patientEmail = trim((string) ($patientUser?->getEmail() ?? ''));
        $cabinet = trim((string) ($medecin?->getCabinet() ?? ''));

        $start = $this->buildAppointmentDateTime($rendezVous);
        $end = $start->modify('+30 minutes');

        $descriptionLines = [
            'Rendez-vous cree depuis Medicare.',
            'Medecin: ' . ($medecinNom !== '' ? $medecinNom : 'Non renseigne'),
            'Patient: ' . ($patientNom !== '' ? $patientNom : 'Non renseigne'),
        ];
        if ($cabinet !== '') {
            $descriptionLines[] = 'Cabinet: ' . $cabinet;
        }

        $event = [
            'summary' => 'Rendez-vous medical',
            'description' => implode("\n", $descriptionLines),
            'start' => [
                'dateTime' => $start->format(\DateTimeInterface::ATOM),
                'timeZone' => $this->resolveTimezone()->getName(),
            ],
            'end' => [
                'dateTime' => $end->format(\DateTimeInterface::ATOM),
                'timeZone' => $this->resolveTimezone()->getName(),
            ],
        ];

        if ($cabinet !== '') {
            $event['location'] = $cabinet;
        }

        if ($patientEmail !== '') {
            $event['attendees'] = [[
                'email' => $patientEmail,
                'displayName' => $patientNom,
            ]];
        }

        return $event;
    }

    private function buildAppointmentDateTime(RendezVous $rendezVous): \DateTimeImmutable
    {
        $date = $rendezVous->getDate();
        $heure = $rendezVous->getHeure();
        if (!$date || !$heure) {
            throw new \RuntimeException('Date/heure du rendez-vous invalide.');
        }

        $dateString = $date->format('Y-m-d');
        $timeString = $heure->format('H:i:s');

        return new \DateTimeImmutable(
            sprintf('%s %s', $dateString, $timeString),
            $this->resolveTimezone()
        );
    }

    private function resolveTimezone(): \DateTimeZone
    {
        $timezoneName = trim($this->timezone);
        if ($timezoneName === '') {
            return new \DateTimeZone('UTC');
        }

        try {
            return new \DateTimeZone($timezoneName);
        } catch (\Exception $exception) {
            $this->logger->warning('Timezone Google Calendar invalide, fallback UTC.', [
                'timezone' => $timezoneName,
                'exception' => $exception->getMessage(),
            ]);

            return new \DateTimeZone('UTC');
        }
    }

    private function getValidAccessToken(): ?string
    {
        $tokens = $this->readTokens();
        if (!is_array($tokens)) {
            return null;
        }

        $accessToken = isset($tokens['access_token']) && is_string($tokens['access_token'])
            ? $tokens['access_token']
            : null;
        $expiresAt = isset($tokens['expires_at']) ? (int) $tokens['expires_at'] : 0;

        if ($accessToken && $expiresAt > (time() + 30)) {
            return $accessToken;
        }

        $refreshToken = isset($tokens['refresh_token']) && is_string($tokens['refresh_token'])
            ? $tokens['refresh_token']
            : null;
        if (!$refreshToken) {
            return null;
        }

        $response = $this->httpClient->request('POST', self::TOKEN_ENDPOINT, [
            'body' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'refresh_token' => $refreshToken,
                'grant_type' => 'refresh_token',
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $data = $response->toArray(false);

        if ($statusCode < 200 || $statusCode >= 300) {
            $this->logger->error('Echec refresh token Google Calendar.', [
                'status_code' => $statusCode,
                'response' => $data,
            ]);
            return null;
        }

        $this->storeTokens($data, $tokens);

        $freshTokens = $this->readTokens();
        if (!is_array($freshTokens)) {
            return null;
        }

        return isset($freshTokens['access_token']) && is_string($freshTokens['access_token'])
            ? $freshTokens['access_token']
            : null;
    }

    private function storeTokens(array $newData, ?array $existingData): void
    {
        $tokens = $existingData ?? [];

        if (isset($newData['access_token']) && is_string($newData['access_token'])) {
            $tokens['access_token'] = $newData['access_token'];
        }
        if (isset($newData['refresh_token']) && is_string($newData['refresh_token'])) {
            $tokens['refresh_token'] = $newData['refresh_token'];
        }
        if (isset($newData['expires_in'])) {
            $tokens['expires_at'] = time() + (int) $newData['expires_in'];
        }
        if (isset($newData['scope']) && is_string($newData['scope'])) {
            $tokens['scope'] = $newData['scope'];
        }
        if (isset($newData['token_type']) && is_string($newData['token_type'])) {
            $tokens['token_type'] = $newData['token_type'];
        }

        $dir = \dirname($this->tokenStoragePath);
        if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
            throw new \RuntimeException('Impossible de creer le dossier de tokens Google Calendar.');
        }

        $json = json_encode($tokens, JSON_PRETTY_PRINT);
        if ($json === false) {
            throw new \RuntimeException('Impossible d encoder les tokens Google Calendar.');
        }

        if (file_put_contents($this->tokenStoragePath, $json) === false) {
            throw new \RuntimeException('Impossible d enregistrer les tokens Google Calendar.');
        }
    }

    private function readTokens(): ?array
    {
        if (!is_file($this->tokenStoragePath)) {
            return null;
        }

        $raw = file_get_contents($this->tokenStoragePath);
        if ($raw === false || trim($raw) === '') {
            return null;
        }

        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            return null;
        }

        return $decoded;
    }
}
