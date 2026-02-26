<?php

namespace App\Controller;

use App\Service\TranslationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/translate', name: 'app_translate')]
    public function translationPage(Request $request, TranslationService $translator): Response
    {
        $translatedText = '';
        $originalText = $request->request->get('text-to-translate', '');
        $targetLanguage = $request->request->get('target-language', 'French');

        if ($request->isMethod('POST') && !empty($originalText)) {
            try {
                $translatedText = $translator->translate($originalText, $targetLanguage);
            } catch (\Exception $e) {
                $this->addFlash('error', 'An error occurred during translation: ' . $e->getMessage());
            }
        }

        return $this->render('test/translate.html.twig', [
            'original_text' => $originalText,
            'translated_text' => $translatedText,
            'target_language' => $targetLanguage,
            'languages' => ['French', 'Spanish', 'German', 'Italian', 'Portuguese'],
        ]);
    }
}