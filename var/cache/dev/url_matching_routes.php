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
        '/admin' => [[['_route' => 'app_admin_index', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\AdminController::dashboard'], null, null, null, false, false, null]],
        '/admin/verify-all-medecins' => [[['_route' => 'app_admin_verify_all_medecins', '_controller' => 'App\\Controller\\AdminController::verifyAllMedecins'], null, ['POST' => 0], null, false, false, null]],
        '/admin/users' => [[['_route' => 'app_admin_users_list', '_controller' => 'App\\Controller\\AdminController::listUsers'], null, null, null, false, false, null]],
        '/admin/add-admin' => [[['_route' => 'app_admin_add', '_controller' => 'App\\Controller\\AdminController::addAdmin'], null, null, null, false, false, null]],
        '/admin/notifications' => [[['_route' => 'app_admin_notifications', '_controller' => 'App\\Controller\\AdminController::notifications'], null, null, null, false, false, null]],
        '/admin/login' => [[['_route' => 'app_admin_login', '_controller' => 'App\\Controller\\AdminSecurityController::login'], null, null, null, false, false, null]],
        '/admin/logout' => [[['_route' => 'app_admin_logout', '_controller' => 'App\\Controller\\AdminSecurityController::logout'], null, null, null, false, false, null]],
        '/admin/medecins' => [[['_route' => 'admin_medecins_index', '_controller' => 'App\\Controller\\Admin\\MedecinController::index'], null, null, null, true, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/settings' => [[['_route' => 'app_settings', '_controller' => 'App\\Controller\\DashboardController::settings'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/settings/delete-account' => [[['_route' => 'app_delete_account', '_controller' => 'App\\Controller\\DashboardController::deleteAccount'], null, ['POST' => 0], null, false, false, null]],
        '/appointments' => [[['_route' => 'app_appointments', '_controller' => 'App\\Controller\\DashboardController::appointments'], null, null, null, false, false, null]],
        '/cabinets' => [[['_route' => 'app_cabinets', '_controller' => 'App\\Controller\\DashboardController::cabinets'], null, null, null, false, false, null]],
        '/consultations' => [[['_route' => 'app_consultations', '_controller' => 'App\\Controller\\DashboardController::consultations'], null, null, null, false, false, null]],
        '/demande-medecin' => [[['_route' => 'app_demande_medecin', '_controller' => 'App\\Controller\\DashboardController::demandeMedecin'], null, null, null, false, false, null]],
        '/explore' => [[['_route' => 'app_explore', '_controller' => 'App\\Controller\\ExploreController::index'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'app_about', '_controller' => 'App\\Controller\\FrontendController::about'], null, null, null, false, false, null]],
        '/services' => [[['_route' => 'app_services', '_controller' => 'App\\Controller\\FrontendController::services'], null, null, null, false, false, null]],
        '/departments' => [[['_route' => 'app_departments', '_controller' => 'App\\Controller\\FrontendController::departments'], null, null, null, false, false, null]],
        '/doctors' => [[['_route' => 'app_doctors', '_controller' => 'App\\Controller\\FrontendController::doctors'], null, null, null, false, false, null]],
        '/appointment' => [[['_route' => 'app_appointment', '_controller' => 'App\\Controller\\FrontendController::appointment'], null, null, null, false, false, null]],
        '/testimonials' => [[['_route' => 'app_testimonials', '_controller' => 'App\\Controller\\FrontendController::testimonials'], null, null, null, false, false, null]],
        '/faq' => [[['_route' => 'app_faq', '_controller' => 'App\\Controller\\FrontendController::faq'], null, null, null, false, false, null]],
        '/gallery' => [[['_route' => 'app_gallery', '_controller' => 'App\\Controller\\FrontendController::gallery'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'app_contact', '_controller' => 'App\\Controller\\FrontendController::contact'], null, null, null, false, false, null]],
        '/terms' => [[['_route' => 'app_terms', '_controller' => 'App\\Controller\\FrontendController::terms'], null, null, null, false, false, null]],
        '/privacy' => [[['_route' => 'app_privacy', '_controller' => 'App\\Controller\\FrontendController::privacy'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\ProfileController::index'], null, null, null, false, false, null]],
        '/profile/edit' => [[['_route' => 'app_profile_edit', '_controller' => 'App\\Controller\\ProfileController::edit'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/medecin/register' => [[['_route' => 'app_medecin_register', '_controller' => 'App\\Controller\\RegistrationController::medecinRegister'], null, null, null, false, false, null]],
        '/clear-registration-message' => [[['_route' => 'app_clear_registration_message', '_controller' => 'App\\Controller\\RegistrationController::clearRegistrationMessage'], null, null, null, false, false, null]],
        '/medecin/verification' => [[['_route' => 'app_medecin_verification', '_controller' => 'App\\Controller\\RegistrationController::medecinVerification'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
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
                .'|/admin/medecins/(?'
                    .'|([^/]++)/(?'
                        .'|verify(*:239)'
                        .'|unverify(*:255)'
                    .')'
                    .'|verify/([^/]++)(*:279)'
                    .'|unverify/([^/]++)(*:304)'
                    .'|delete/([^/]++)(*:327)'
                .')'
                .'|/department/(\\d+)(*:353)'
                .'|/service/(\\d+)(*:375)'
                .'|/([^/]++)(*:392)'
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
        239 => [[['_route' => 'app_admin_medecins_verify', '_controller' => 'App\\Controller\\AdminController::verifyMedecin'], ['id'], ['GET' => 0], null, false, false, null]],
        255 => [[['_route' => 'app_admin_medecins_unverify', '_controller' => 'App\\Controller\\AdminController::unverifyMedecin'], ['id'], ['GET' => 0], null, false, false, null]],
        279 => [[['_route' => 'admin_medecins_verify', '_controller' => 'App\\Controller\\Admin\\MedecinController::verify'], ['id'], null, null, false, true, null]],
        304 => [[['_route' => 'admin_medecins_unverify', '_controller' => 'App\\Controller\\Admin\\MedecinController::unverify'], ['id'], null, null, false, true, null]],
        327 => [[['_route' => 'admin_medecins_delete', '_controller' => 'App\\Controller\\Admin\\MedecinController::delete'], ['id'], null, null, false, true, null]],
        353 => [[['_route' => 'app_department_details', '_controller' => 'App\\Controller\\FrontendController::departmentDetails'], ['id'], null, null, false, true, null]],
        375 => [[['_route' => 'app_service_details', '_controller' => 'App\\Controller\\FrontendController::serviceDetails'], ['id'], null, null, false, true, null]],
        392 => [
            [['_route' => 'app_profile_public', '_controller' => 'App\\Controller\\ProfileController::showPublicProfile'], ['username'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
