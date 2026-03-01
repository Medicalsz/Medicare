<?php

namespace App\Controller;

use App\Service\DatasetService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DatasetController extends AbstractController
{
    #[Route('/dataset', name: 'app_dataset')]
    public function index(DatasetService $datasetService): Response
    {
        // IMPORTANT: Replace this with the actual path to your dataset file.
        // For this example, I'll assume a file named 'dataset.csv' in the project's public directory.
        $datasetFilePath = $this->getParameter('kernel.project_dir') . '/public/dataset.csv';
        $publicDir = $this->getParameter('kernel.project_dir') . '/public';
        $data = [];

        // Check if the file exists before trying to process it.
        if (!file_exists($datasetFilePath)) {
            $data['error'] = "Error: Dataset file not found at '{$datasetFilePath}'. Please create the file or update the path.";
        } else {
            // Execute the Python script via the service to get JSON output
            $jsonOutput = $datasetService->getDatasetInfo($datasetFilePath, $publicDir);
            $decodedData = json_decode($jsonOutput, true);

            // Check if JSON decoding was successful
            if (json_last_error() !== JSON_ERROR_NONE) {
                $data['error'] = 'Error decoding JSON: ' . json_last_error_msg();
                $data['raw_output'] = $jsonOutput; // For debugging
            } else {
                $data = $decodedData;
            }
        }

        return $this->render('dataset/index.html.twig', [
            'data' => $data,
        ]);
    }
}