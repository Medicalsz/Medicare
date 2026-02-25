<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    // JavaScript Files
    'wow' => [
        'path' => './public/assets/lib/wow/wow.min.js',
    ],
    'easing' => [
        'path' => './public/assets/lib/easing/easing.min.js',
    ],
    'waypoints' => [
        'path' => './public/assets/lib/waypoints/waypoints.min.js',
    ],
    'counterup' => [
        'path' => './public/assets/lib/counterup/counterup.min.js',
    ],
    'owl-carousel-js' => [
        'path' => './public/assets/lib/owlcarousel/owl.carousel.min.js',
    ],
    'moment' => [
        'path' => './public/assets/lib/tempusdominus/js/moment.min.js',
    ],
    'moment-timezone' => [
        'path' => './public/assets/lib/tempusdominus/js/moment-timezone.min.js',
    ],
    'tempusdominus-js' => [
        'path' => './public/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js',
    ],
    'main' => [
        'path' => './public/assets/js/main.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
];