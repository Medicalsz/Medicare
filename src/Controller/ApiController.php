<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/explore/health-data', name: 'app_health_data')]
    public function index(): Response
    {
        // 1. Disease Statistics (COVID-19 and others via disease.sh)
        $diseaseData = [];
        try {
            $response = $this->client->request('GET', 'https://disease.sh/v3/covid-19/all');
            $diseaseData = $response->toArray();
        } catch (\Exception $e) {
            // Log or handle error
        }

        // 2. OpenFDA Drug Info (Searching for common drugs like Ibuprofen)
        $drugData = [];
        try {
            $response = $this->client->request('GET', 'https://api.fda.gov/drug/label.json?search=description:pain&limit=5');
            $drugData = $response->toArray();
        } catch (\Exception $e) {
            // Log or handle error
        }

        return $this->render('api/index.html.twig', [
            'disease' => $diseaseData,
            'drugs' => $drugData['results'] ?? [],
        ]);
    }
}
