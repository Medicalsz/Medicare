<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/collaborations' => [
            [['_route' => 'collab_list', '_controller' => 'App\\Controller\\CollaborationController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'collab_create', '_controller' => 'App\\Controller\\CollaborationController::create'], null, ['POST' => 0], null, true, false, null],
        ],
        '/home/partners' => [[['_route' => 'home_partners', '_controller' => 'App\\Controller\\HomeController::partners'], null, null, null, false, false, null]],
        '/home/partners/new' => [[['_route' => 'home_partner_new', '_controller' => 'App\\Controller\\HomeController::partnerNew'], null, null, null, false, false, null]],
        '/home/collaborations' => [[['_route' => 'home_collaborations', '_controller' => 'App\\Controller\\HomeController::collaborations'], null, null, null, false, false, null]],
        '/home/collaborations/new' => [[['_route' => 'home_collaboration_new', '_controller' => 'App\\Controller\\HomeController::collaborationNew'], null, null, null, false, false, null]],
        '/partners' => [
            [['_route' => 'partner_list', '_controller' => 'App\\Controller\\PartnerController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'partner_create', '_controller' => 'App\\Controller\\PartnerController::create'], null, ['POST' => 0], null, true, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/collaborations/([^/]++)(?'
                    .'|(*:229)'
                .')'
                .'|/home/(?'
                    .'|partners/([^/]++)/edit(*:269)'
                    .'|collaborations/([^/]++)/edit(*:305)'
                .')'
                .'|/partners/([^/]++)(?'
                    .'|(*:335)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        229 => [
            [['_route' => 'collab_show', '_controller' => 'App\\Controller\\CollaborationController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'collab_update', '_controller' => 'App\\Controller\\CollaborationController::update'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null],
            [['_route' => 'collab_delete', '_controller' => 'App\\Controller\\CollaborationController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        269 => [[['_route' => 'home_partner_edit', '_controller' => 'App\\Controller\\HomeController::partnerEdit'], ['id'], null, null, false, false, null]],
        305 => [[['_route' => 'home_collaboration_edit', '_controller' => 'App\\Controller\\HomeController::collaborationEdit'], ['id'], null, null, false, false, null]],
        335 => [
            [['_route' => 'partner_show', '_controller' => 'App\\Controller\\PartnerController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'partner_update', '_controller' => 'App\\Controller\\PartnerController::update'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null],
            [['_route' => 'partner_delete', '_controller' => 'App\\Controller\\PartnerController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
