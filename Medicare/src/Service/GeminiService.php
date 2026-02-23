<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class GeminiService
{
    private $client;
    private $params;

    public function __construct(HttpClientInterface $client, ParameterBagInterface $params)
    {
        $this->client = $client;
        $this->params = $params;
    }

    public function analyzeObjectCondition(string $imagePath): array
    {
        // Récupérer la clé API depuis les variables d'environnement
        $apiKey = $_ENV['GEMINI_API_KEY'] ?? null;
        
        if (!$apiKey) {
            return ['error' => 'Clé API Gemini non configurée.'];
        }

        // Lire et encoder l'image en base64
        if (!file_exists($imagePath)) {
            return ['error' => 'Image introuvable.'];
        }
        
        $imageData = base64_encode(file_get_contents($imagePath));

        // Construire la requête pour Gemini
        // Utilisation du modèle gemini-flash-latest qui est stable et moins sujet aux quotas
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key={$apiKey}";
        
        $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
        $mimeType = 'image/jpeg';
        if (in_array(strtolower($extension), ['png'])) {
            $mimeType = 'image/png';
        } elseif (in_array(strtolower($extension), ['webp'])) {
            $mimeType = 'image/webp';
        }
        
        $payload = [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => "Tu es un expert en évaluation d'objets d'occasion. Analyse cette photo et détermine l'état de l'objet visible. Réponds UNIQUEMENT par l'un des termes exacts suivants, sans aucune autre explication ni ponctuation : 'Mauvais état', 'En état', 'Bon état', 'Très bon état'. Si l'image n'est pas claire ou ne montre pas d'objet, réponds 'Indéterminé'."
                        ],
                        [
                            "inline_data" => [
                                "mime_type" => $mimeType,
                                "data" => $imageData
                            ]
                        ]
                    ]
                ]
            ]
        ];

        try {
            $response = $this->client->request('POST', $url, [
                'json' => $payload,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);

            $content = $response->toArray();
            
            // Extraire la réponse texte
            if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                $resultText = trim($content['candidates'][0]['content']['parts'][0]['text']);
                return ['success' => true, 'condition' => $resultText];
            } else {
                return ['error' => 'Réponse inattendue de Gemini.'];
            }

        } catch (\Exception $e) {
            return ['error' => 'Erreur lors de l\'analyse : ' . $e->getMessage()];
        }
    }
}
