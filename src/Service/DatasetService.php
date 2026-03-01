<?php

namespace App\Service;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class DatasetService
{
    private string $pythonExecutablePath;

    public function __construct(string $pythonExecutablePath = 'python')
    {
        $this->pythonExecutablePath = $pythonExecutablePath;
    }

    public function getDatasetInfo(string $filePath): string
    {
        $scriptPath = __DIR__ . '/DataSetService.py';
        $process = new Process([$this->pythonExecutablePath, $scriptPath, $filePath]);
        try {
            $process->mustRun();
            return $process->getOutput();
        } catch (ProcessFailedException $exception) {
            return $exception->getMessage();
        }
    }
}