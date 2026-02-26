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
        '/admin/medecins' => [
            [['_route' => 'admin_medecins_index', '_controller' => 'App\\Controller\\Admin\\MedecinController::index'], null, null, null, true, false, null],
            [['_route' => 'app_admin_medecins', '_controller' => 'App\\Controller\\Core\\AdminController::medecins'], null, null, null, false, false, null],
        ],
        '/admin/login' => [[['_route' => 'app_admin_login', '_controller' => 'App\\Controller\\AdminSecurityController::login'], null, null, null, false, false, null]],
        '/admin/logout' => [[['_route' => 'app_admin_logout', '_controller' => 'App\\Controller\\AdminSecurityController::logout'], null, null, null, false, false, null]],
        '/api/partners' => [[['_route' => 'app_api_partners', '_controller' => 'App\\Controller\\Api\\PartnerController::index'], null, ['GET' => 0], null, false, false, null]],
        '/chatbot' => [[['_route' => 'app_chatbot', '_controller' => 'App\\Controller\\ChatbotController::index'], null, null, null, false, false, null]],
        '/chatbot/ask' => [[['_route' => 'app_chatbot_ask', '_controller' => 'App\\Controller\\ChatbotController::ask'], null, ['POST' => 0], null, false, false, null]],
        '/admin/donations' => [[['_route' => 'app_admin_donations', '_controller' => 'App\\Controller\\Core\\AdminController::donations'], null, null, null, false, false, null]],
        '/admin/cause/add' => [[['_route' => 'app_admin_cause_add', '_controller' => 'App\\Controller\\Core\\AdminController::addCause'], null, ['POST' => 0], null, false, false, null]],
        '/admin/users' => [[['_route' => 'app_admin_users', '_controller' => 'App\\Controller\\Core\\AdminController::users'], null, null, null, false, false, null]],
        '/admin/patients' => [[['_route' => 'app_admin_patients', '_controller' => 'App\\Controller\\Core\\AdminController::patients'], null, null, null, false, false, null]],
        '/admin/rendezvous' => [[['_route' => 'app_admin_rendezvous', '_controller' => 'App\\Controller\\Core\\AdminController::rendezvous'], null, null, null, false, false, null]],
        '/admin/statistiques' => [[['_route' => 'app_admin_statistiques', '_controller' => 'App\\Controller\\Core\\AdminController::statistiques'], null, null, null, false, false, null]],
        '/admin/settings' => [[['_route' => 'app_admin_settings', '_controller' => 'App\\Controller\\Core\\AdminController::settings'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\AdminController::dashboard'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/settings' => [[['_route' => 'app_settings', '_controller' => 'App\\Controller\\DashboardController::settings'], null, null, null, false, false, null]],
        '/appointments' => [[['_route' => 'app_appointments', '_controller' => 'App\\Controller\\DashboardController::appointments'], null, null, null, false, false, null]],
        '/cabinets' => [[['_route' => 'app_cabinets', '_controller' => 'App\\Controller\\DashboardController::cabinets'], null, null, null, false, false, null]],
        '/consultations' => [[['_route' => 'app_consultations', '_controller' => 'App\\Controller\\DashboardController::consultations'], null, null, null, false, false, null]],
        '/demande-medecin' => [[['_route' => 'app_demande_medecin', '_controller' => 'App\\Controller\\DashboardController::demandeMedecin'], null, null, null, false, false, null]],
        '/mes-dons' => [[['_route' => 'app_user_donations', '_controller' => 'App\\Controller\\Donation\\DonationController::myDonations'], null, null, null, false, false, null]],
        '/donnation' => [[['_route' => 'app_donation_index', '_controller' => 'App\\Controller\\Donation\\DonationController::index'], null, null, null, false, false, null]],
        '/admin/donations/pdf' => [[['_route' => 'app_admin_donations_pdf', '_controller' => 'App\\Controller\\Donation\\DonationController::exportPdf'], null, null, null, false, false, null]],
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
        '/collaboration' => [[['_route' => 'app_collaboration_index', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/collaboration/new' => [[['_route' => 'app_collaboration_new', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/partner' => [[['_route' => 'app_partner_index', '_controller' => 'App\\Controller\\Partnership\\PartnerController::index'], null, ['GET' => 0], null, false, false, null]],
        '/partner/new' => [[['_route' => 'app_partner_new', '_controller' => 'App\\Controller\\Partnership\\PartnerController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/partners' => [[['_route' => 'app_front_partners', '_controller' => 'App\\Controller\\Partnership\\PartnershipFrontController::partners'], null, null, null, false, false, null]],
        '/collaborations' => [[['_route' => 'app_front_collaborations', '_controller' => 'App\\Controller\\Partnership\\PartnershipFrontController::collaborations'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\ProfileController::index'], null, null, null, false, false, null]],
        '/medecin/edit-profile' => [[['_route' => 'app_medecin_edit_profile', '_controller' => 'App\\Controller\\ProfileController::editProfile'], null, null, null, false, false, null]],
        '/translate' => [[['_route' => 'app_translate', '_controller' => 'App\\Controller\\TestController::translationPage'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\User\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/medecin/register' => [[['_route' => 'app_medecin_register', '_controller' => 'App\\Controller\\RegistrationController::medecinRegister'], null, null, null, false, false, null]],
        '/clear-registration-message' => [[['_route' => 'app_clear_registration_message', '_controller' => 'App\\Controller\\RegistrationController::clearRegistrationMessage'], null, null, null, false, false, null]],
        '/medecin/verification' => [[['_route' => 'app_medecin_verification', '_controller' => 'App\\Controller\\RegistrationController::medecinVerification'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/qr\\-code/([^/]++)/([\\w\\W]+)(*:35)'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:73)'
                    .'|wdt/([^/]++)(*:92)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:133)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:170)'
                                .'|router(*:184)'
                                .'|exception(?'
                                    .'|(*:204)'
                                    .'|\\.css(*:217)'
                                .')'
                            .')'
                            .'|(*:227)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|medecins/(?'
                            .'|verify/([^/]++)(*:278)'
                            .'|unverify/([^/]++)(*:303)'
                            .'|delete/([^/]++)(*:326)'
                        .')'
                        .'|donations/(?'
                            .'|confirm/([^/]++)(*:364)'
                            .'|delete/([^/]++)(*:387)'
                        .')'
                        .'|cause/delete/([^/]++)(*:417)'
                    .')'
                    .'|pi/partners/([^/]++)(?'
                        .'|(*:449)'
                        .'|/suggest\\-collaboration(*:480)'
                    .')'
                .')'
                .'|/mes\\-dons/modifier\\-materiel/([^/]++)(*:528)'
                .'|/d(?'
                    .'|onnation/(?'
                        .'|confirm\\-pickup/([^/]++)(*:577)'
                        .'|([^/]++)(?'
                            .'|(*:596)'
                            .'|/faire\\-un\\-don(*:619)'
                        .')'
                    .')'
                    .'|epartment/(\\d+)(*:644)'
                .')'
                .'|/service/(\\d+)(*:667)'
                .'|/collaboration(?'
                    .'|/([^/]++)(?'
                        .'|(*:704)'
                        .'|/(?'
                            .'|pdf(*:719)'
                            .'|csv(*:730)'
                            .'|edit(*:742)'
                        .')'
                        .'|(*:751)'
                    .')'
                    .'|s/([^/]++)(*:770)'
                .')'
                .'|/partner/([^/]++)(?'
                    .'|(*:799)'
                    .'|/edit(*:812)'
                    .'|(*:820)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => 'qr_code_generate', '_controller' => 'Endroid\\QrCodeBundle\\Controller\\GenerateController'], ['builder', 'data'], null, null, false, true, null]],
        73 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        92 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        133 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        170 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        184 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        204 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        217 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        227 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        278 => [[['_route' => 'admin_medecins_verify', '_controller' => 'App\\Controller\\Admin\\MedecinController::verify'], ['id'], null, null, false, true, null]],
        303 => [[['_route' => 'admin_medecins_unverify', '_controller' => 'App\\Controller\\Admin\\MedecinController::unverify'], ['id'], null, null, false, true, null]],
        326 => [[['_route' => 'admin_medecins_delete', '_controller' => 'App\\Controller\\Admin\\MedecinController::delete'], ['id'], null, null, false, true, null]],
        364 => [[['_route' => 'app_admin_don_confirm', '_controller' => 'App\\Controller\\Core\\AdminController::confirmDon'], ['id'], ['POST' => 0], null, false, true, null]],
        387 => [[['_route' => 'app_admin_don_delete', '_controller' => 'App\\Controller\\Core\\AdminController::deleteDon'], ['id'], ['POST' => 0], null, false, true, null]],
        417 => [[['_route' => 'app_admin_cause_delete', '_controller' => 'App\\Controller\\Core\\AdminController::deleteCause'], ['id'], ['POST' => 0], null, false, true, null]],
        449 => [[['_route' => 'app_api_partner_show', '_controller' => 'App\\Controller\\Api\\PartnerController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        480 => [[['_route' => 'app_api_partner_suggest_collaboration', '_controller' => 'App\\Controller\\Api\\PartnerController::suggestCollaboration'], ['id'], ['POST' => 0], null, false, false, null]],
        528 => [[['_route' => 'app_user_donation_edit_material', '_controller' => 'App\\Controller\\Donation\\DonationController::editMaterialDonation'], ['id'], ['POST' => 0], null, false, true, null]],
        577 => [[['_route' => 'app_donation_confirm_pickup', '_controller' => 'App\\Controller\\Donation\\DonationController::confirmPickup'], ['id'], ['POST' => 0], null, false, true, null]],
        596 => [[['_route' => 'app_donation_show', '_controller' => 'App\\Controller\\Donation\\DonationController::show'], ['id'], null, null, false, true, null]],
        619 => [[['_route' => 'app_donation_form', '_controller' => 'App\\Controller\\Donation\\DonationController::form'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        644 => [[['_route' => 'app_department_details', '_controller' => 'App\\Controller\\FrontendController::departmentDetails'], ['id'], null, null, false, true, null]],
        667 => [[['_route' => 'app_service_details', '_controller' => 'App\\Controller\\FrontendController::serviceDetails'], ['id'], null, null, false, true, null]],
        704 => [[['_route' => 'app_collaboration_show', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        719 => [[['_route' => 'app_collaboration_pdf', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::exportPdf'], ['id'], ['GET' => 0], null, false, false, null]],
        730 => [[['_route' => 'app_collaboration_csv', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::exportCsv'], ['id'], ['GET' => 0], null, false, false, null]],
        742 => [[['_route' => 'app_collaboration_edit', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        751 => [[['_route' => 'app_collaboration_delete', '_controller' => 'App\\Controller\\Partnership\\CollaborationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        770 => [[['_route' => 'app_front_collaboration_show', '_controller' => 'App\\Controller\\Partnership\\PartnershipFrontController::showCollaboration'], ['id'], null, null, false, true, null]],
        799 => [[['_route' => 'app_partner_show', '_controller' => 'App\\Controller\\Partnership\\PartnerController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        812 => [[['_route' => 'app_partner_edit', '_controller' => 'App\\Controller\\Partnership\\PartnerController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        820 => [
            [['_route' => 'app_partner_delete', '_controller' => 'App\\Controller\\Partnership\\PartnerController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
