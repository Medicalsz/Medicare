<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        $response = $event->getResponse();
        $contentType = $response->headers->get('Content-Type', '');
        
        // Only process JSON responses
        if (strpos($contentType, 'application/json') === 0) {
            $content = $response->getContent();
            
            // Remove HTML deprecation warnings that appear before JSON
            if ($content && $content[0] === '<') {
                // Find the first '[' or '{' which marks the start of JSON
                $jsonStart = max(
                    strpos($content, '['),
                    strpos($content, '{')
                );
                
                if ($jsonStart !== false && $jsonStart > 0) {
                    $jsonContent = substr($content, $jsonStart);
                    $response->setContent($jsonContent);
                }
            }
        }
    }
}

