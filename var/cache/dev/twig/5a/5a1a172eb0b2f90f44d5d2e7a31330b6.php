<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* partials/frontend_header.html.twig */
class __TwigTemplate_6d0ab11d8f8aee847a8f966645329baf extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/frontend_header.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/frontend_header.html.twig"));

        // line 1
        yield "<header id=\"header\" class=\"header d-flex align-items-center fixed-top\">
    <div class=\"container position-relative d-flex align-items-center justify-content-between\">
        <a href=\"";
        // line 3
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"logo d-flex align-items-center me-auto me-xl-0\">
            <h1 class=\"sitename\">Medicare</h1>
        </a>

        <nav id=\"navmenu\" class=\"navmenu\">
            <ul>
                <li><a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "request", [], "any", false, false, false, 9), "attributes", [], "any", false, false, false, 9), "get", ["_route"], "method", false, false, false, 9) == "app_home")) {
            yield "class=\"active\"";
        }
        yield ">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("home"), "html", null, true);
        yield "</a></li>
                <li><a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("about"), "html", null, true);
        yield "</a></li>
                <li><a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("services"), "html", null, true);
        yield "</a></li>
                <li><a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_departments");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("departments"), "html", null, true);
        yield "</a></li>
                <li><a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_health_data");
        yield "\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "request", [], "any", false, false, false, 13), "attributes", [], "any", false, false, false, 13), "get", ["_route"], "method", false, false, false, 13) == "app_health_data")) {
            yield "class=\"active\"";
        }
        yield ">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("explore"), "html", null, true);
        yield "</a></li>
                <li class=\"dropdown\">
                    <a href=\"#\"><span>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("more_pages"), "html", null, true);
        yield "</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
                    <ul>
                      <li><a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("appointment"), "html", null, true);
        yield "</a></li>
                      <li><a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_testimonials");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("testimonials"), "html", null, true);
        yield "</a></li>
                      <li><a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_faq");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("faq"), "html", null, true);
        yield "</a></li>
                      <li><a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_gallery");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("gallery"), "html", null, true);
        yield "</a></li>
                    </ul>
                </li>
                <li><a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("contact"), "html", null, true);
        yield "</a></li>
                <li class=\"dropdown\">
                    <a href=\"javascript:void(0)\">
                        <i class=\"bi bi-translate\"></i> 
                        <span>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "request", [], "any", false, false, false, 27), "locale", [], "any", false, false, false, 27)), "html", null, true);
        yield "</span> 
                        <i class=\"bi bi-chevron-down toggle-dropdown\"></i>
                    </a>
                    <ul>
                        <li><a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_locale", ["locale" => "fr"]);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("french"), "html", null, true);
        yield "</a></li>
                        <li><a href=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_locale", ["locale" => "en"]);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("english"), "html", null, true);
        yield "</a></li>
                        <li><a href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_locale", ["locale" => "ar"]);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("arabic"), "html", null, true);
        yield "</a></li>
                    </ul>
                </li>
                <li>
                    <a href=\"javascript:void(0)\" id=\"audio-guide-btn\" class=\"btn btn-sm btn-info text-white ms-2\" style=\"border-radius: 20px; padding: 5px 15px;\">
                        <i class=\"bi bi-volume-up\"></i> Audio Guide
                    </a>
                </li>
            </ul>
            <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
        </nav>

        ";
        // line 45
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 45, $this->source); })()), "user", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 46
            yield "            ";
            // line 47
            yield "            <div class=\"user-profile-dropdown\">
                <div class=\"user-profile-trigger\" id=\"userProfileDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <div class=\"user-avatar\">
                        ";
            // line 50
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "photo", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 51, $this->source); })()), "user", [], "any", false, false, false, 51), "photo", [], "any", false, false, false, 51), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 51, $this->source); })()), "user", [], "any", false, false, false, 51), "nom", [], "any", false, false, false, 51), "html", null, true);
                yield "\" class=\"user-avatar-img\">
                        ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 52
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "user", [], "any", false, false, false, 52), "nom", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 53
                yield "                            <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 53), "prenom", [], "any", true, true, false, 53)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "prenom", [], "any", false, false, false, 53), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "nom", [], "any", false, false, false, 53))) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "nom", [], "any", false, false, false, 53))))), "html", null, true);
                yield "</span>
                        ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 54
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "user", [], "any", false, false, false, 54), "prenom", [], "any", false, false, false, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 55
                yield "                            <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "user", [], "any", false, false, false, 55), "prenom", [], "any", false, false, false, 55))), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 57
                yield "                            <i class=\"bi bi-person-fill\"></i>
                        ";
            }
            // line 59
            yield "                    </div>
                </div>

                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"userProfileDropdown\">
                    <li class=\"dropdown-header\">
                        <div class=\"user-info\">
                            <div class=\"user-avatar-large\">
                                ";
            // line 66
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "user", [], "any", false, false, false, 66), "photo", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "user", [], "any", false, false, false, 67), "photo", [], "any", false, false, false, 67), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "user", [], "any", false, false, false, 67), "nom", [], "any", false, false, false, 67), "html", null, true);
                yield "\" class=\"user-avatar-img-large\">
                                ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 68
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "user", [], "any", false, false, false, 68), "nom", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 69
                yield "                                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 69), "prenom", [], "any", true, true, false, 69)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69), "prenom", [], "any", false, false, false, 69), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69), "nom", [], "any", false, false, false, 69))) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69), "nom", [], "any", false, false, false, 69))))), "html", null, true);
                yield "</span>
                                ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 70
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "user", [], "any", false, false, false, 70), "prenom", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 71
                yield "                                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "prenom", [], "any", false, false, false, 71))), "html", null, true);
                yield "</span>
                                ";
            } else {
                // line 73
                yield "                                    <i class=\"bi bi-person-fill\"></i>
                                ";
            }
            // line 75
            yield "                            </div>
                            <div class=\"user-details\">
                                <span class=\"user-name\">
                                    ";
            // line 78
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "user", [], "any", false, false, false, 78), "nom", [], "any", false, false, false, 78) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "user", [], "any", false, false, false, 78), "prenom", [], "any", false, false, false, 78))) {
                // line 79
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "prenom", [], "any", false, false, false, 79), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "nom", [], "any", false, false, false, 79), "html", null, true);
                yield "
                                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 80
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "user", [], "any", false, false, false, 80), "prenom", [], "any", false, false, false, 80)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 81
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 81, $this->source); })()), "user", [], "any", false, false, false, 81), "prenom", [], "any", false, false, false, 81), "html", null, true);
                yield "
                                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 82
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "user", [], "any", false, false, false, 82), "nom", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 83
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "user", [], "any", false, false, false, 83), "nom", [], "any", false, false, false, 83), "html", null, true);
                yield "
                                    ";
            } else {
                // line 85
                yield "                                        User
                                    ";
            }
            // line 87
            yield "                                </span>
                                <span class=\"user-email\">";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "email", [], "any", false, false, false, 88), "html", null, true);
            yield "</span>
                            </div>
                        </div>
                    </li>
                    <li><hr class=\"dropdown-divider\"></li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 94
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\">
                            <i class=\"bi bi-person\"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 100
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_settings");
            yield "\">
                            <i class=\"bi bi-gear\"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 106
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointments");
            yield "\">
                            <i class=\"bi bi-calendar-check\"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>
                    <li><hr class=\"dropdown-divider\"></li>
                    <li>
                        <a class=\"dropdown-item text-danger\" href=\"";
            // line 113
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">
                            <i class=\"bi bi-box-arrow-right\"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        ";
        } else {
            // line 121
            yield "            ";
            // line 122
            yield "            <div class=\"guest-dropdown\">
                <div class=\"guest-trigger\" id=\"guestUserDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <i class=\"bi bi-person-circle guest-icon\"></i>
                </div>

                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"guestUserDropdown\">
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 129
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">
                            <i class=\"bi bi-box-arrow-in-right\"></i>
                            <span>Login</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 135
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\">
                            <i class=\"bi bi-person-plus\"></i>
                            <span>Register</span>
                        </a>
                    </li>
                </ul>
            </div>
        ";
        }
        // line 143
        yield "    </div>
</header>

<style>
/* Guest dropdown styles */
.guest-dropdown {
    position: relative;
}

.guest-dropdown .dropdown-menu {
    display: none;
}

.guest-trigger {
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 8px;
    transition: background-color 0.2s ease;
}

.guest-trigger:hover {
    background-color: #f3f4f6;
}

.guest-icon {
    font-size: 1.75rem;
    color: #6b7280;
    transition: color 0.2s ease;
}

.guest-trigger:hover .guest-icon {
    color: #374151;
}

.guest-dropdown:hover .dropdown-menu {
    display: block;
    animation: fadeIn 0.2s ease;
}

/* Logged in user dropdown styles */
.user-profile-dropdown {
    position: relative;
}

.user-profile-dropdown .dropdown-menu {
    display: none;
}

.user-profile-trigger {
    cursor: pointer;
    padding: 0;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    overflow: hidden;
}

.user-avatar:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
}

.user-avatar i {
    font-size: 1.2rem;
}

.user-avatar-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-avatar-large {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1.25rem;
    overflow: hidden;
}

.user-avatar-img-large {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.dropdown-menu {
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    padding: 0.5rem;
    min-width: 220px;
    margin-top: 0.5rem;
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
}

.dropdown-header {
    padding: 1rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 8px;
    margin-bottom: 0.5rem;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-details {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.user-name {
    font-weight: 600;
    color: #1f2937;
    font-size: 0.95rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-email {
    color: #6b7280;
    font-size: 0.8rem;
    margin-top: 0.15rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.dropdown-divider {
    margin: 0.5rem 0;
    border-color: #e5e7eb;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    color: #374151;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.dropdown-item:hover {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.dropdown-item i {
    font-size: 1rem;
    width: 20px;
    text-align: center;
}

.dropdown-item.text-danger:hover {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
}

/* Hover dropdown effect for user dropdown */
.user-profile-dropdown:hover .dropdown-menu {
    display: block;
    animation: fadeIn 0.2s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 576px) {
    .user-avatar {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }
    
    .dropdown-menu {
        min-width: 200px;
        margin-right: -1rem;
    }
    
    .guest-icon {
        font-size: 1.5rem;
    }
}
</style>
<script src=\"";
        // line 361
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/accessibility.js"), "html", null, true);
        yield "\"></script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/frontend_header.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  585 => 361,  365 => 143,  354 => 135,  345 => 129,  336 => 122,  334 => 121,  323 => 113,  313 => 106,  304 => 100,  295 => 94,  286 => 88,  283 => 87,  279 => 85,  273 => 83,  271 => 82,  266 => 81,  264 => 80,  257 => 79,  255 => 78,  250 => 75,  246 => 73,  240 => 71,  238 => 70,  233 => 69,  231 => 68,  224 => 67,  222 => 66,  213 => 59,  209 => 57,  203 => 55,  201 => 54,  196 => 53,  194 => 52,  187 => 51,  185 => 50,  180 => 47,  178 => 46,  176 => 45,  159 => 33,  153 => 32,  147 => 31,  140 => 27,  131 => 23,  123 => 20,  117 => 19,  111 => 18,  105 => 17,  100 => 15,  89 => 13,  83 => 12,  77 => 11,  71 => 10,  61 => 9,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<header id=\"header\" class=\"header d-flex align-items-center fixed-top\">
    <div class=\"container position-relative d-flex align-items-center justify-content-between\">
        <a href=\"{{ path('app_home') }}\" class=\"logo d-flex align-items-center me-auto me-xl-0\">
            <h1 class=\"sitename\">Medicare</h1>
        </a>

        <nav id=\"navmenu\" class=\"navmenu\">
            <ul>
                <li><a href=\"{{ path('app_home') }}\" {% if app.request.attributes.get('_route') == 'app_home' %}class=\"active\"{% endif %}>{{ 'home'|trans }}</a></li>
                <li><a href=\"{{ path('app_about') }}\">{{ 'about'|trans }}</a></li>
                <li><a href=\"{{ path('app_services') }}\">{{ 'services'|trans }}</a></li>
                <li><a href=\"{{ path('app_departments') }}\">{{ 'departments'|trans }}</a></li>
                <li><a href=\"{{ path('app_health_data') }}\" {% if app.request.attributes.get('_route') == 'app_health_data' %}class=\"active\"{% endif %}>{{ 'explore'|trans }}</a></li>
                <li class=\"dropdown\">
                    <a href=\"#\"><span>{{ 'more_pages'|trans }}</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
                    <ul>
                      <li><a href=\"{{ path('app_appointment') }}\">{{ 'appointment'|trans }}</a></li>
                      <li><a href=\"{{ path('app_testimonials') }}\">{{ 'testimonials'|trans }}</a></li>
                      <li><a href=\"{{ path('app_faq') }}\">{{ 'faq'|trans }}</a></li>
                      <li><a href=\"{{ path('app_gallery') }}\">{{ 'gallery'|trans }}</a></li>
                    </ul>
                </li>
                <li><a href=\"{{ path('app_contact') }}\">{{ 'contact'|trans }}</a></li>
                <li class=\"dropdown\">
                    <a href=\"javascript:void(0)\">
                        <i class=\"bi bi-translate\"></i> 
                        <span>{{ app.request.locale|upper }}</span> 
                        <i class=\"bi bi-chevron-down toggle-dropdown\"></i>
                    </a>
                    <ul>
                        <li><a href=\"{{ path('change_locale', {locale: 'fr'}) }}\">{{ 'french'|trans }}</a></li>
                        <li><a href=\"{{ path('change_locale', {locale: 'en'}) }}\">{{ 'english'|trans }}</a></li>
                        <li><a href=\"{{ path('change_locale', {locale: 'ar'}) }}\">{{ 'arabic'|trans }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href=\"javascript:void(0)\" id=\"audio-guide-btn\" class=\"btn btn-sm btn-info text-white ms-2\" style=\"border-radius: 20px; padding: 5px 15px;\">
                        <i class=\"bi bi-volume-up\"></i> Audio Guide
                    </a>
                </li>
            </ul>
            <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
        </nav>

        {% if app.user %}
            {# Logged in user - show profile dropdown #}
            <div class=\"user-profile-dropdown\">
                <div class=\"user-profile-trigger\" id=\"userProfileDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <div class=\"user-avatar\">
                        {% if app.user.photo %}
                            <img src=\"{{ app.user.photo }}\" alt=\"{{ app.user.nom }}\" class=\"user-avatar-img\">
                        {% elseif app.user.nom %}
                            <span>{{ app.user.prenom|default(app.user.nom)|first|upper }}</span>
                        {% elseif app.user.prenom %}
                            <span>{{ app.user.prenom|first|upper }}</span>
                        {% else %}
                            <i class=\"bi bi-person-fill\"></i>
                        {% endif %}
                    </div>
                </div>

                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"userProfileDropdown\">
                    <li class=\"dropdown-header\">
                        <div class=\"user-info\">
                            <div class=\"user-avatar-large\">
                                {% if app.user.photo %}
                                    <img src=\"{{ app.user.photo }}\" alt=\"{{ app.user.nom }}\" class=\"user-avatar-img-large\">
                                {% elseif app.user.nom %}
                                    <span>{{ app.user.prenom|default(app.user.nom)|first|upper }}</span>
                                {% elseif app.user.prenom %}
                                    <span>{{ app.user.prenom|first|upper }}</span>
                                {% else %}
                                    <i class=\"bi bi-person-fill\"></i>
                                {% endif %}
                            </div>
                            <div class=\"user-details\">
                                <span class=\"user-name\">
                                    {% if app.user.nom and app.user.prenom %}
                                        {{ app.user.prenom }} {{ app.user.nom }}
                                    {% elseif app.user.prenom %}
                                        {{ app.user.prenom }}
                                    {% elseif app.user.nom %}
                                        {{ app.user.nom }}
                                    {% else %}
                                        User
                                    {% endif %}
                                </span>
                                <span class=\"user-email\">{{ app.user.email }}</span>
                            </div>
                        </div>
                    </li>
                    <li><hr class=\"dropdown-divider\"></li>
                    <li>
                        <a class=\"dropdown-item\" href=\"{{ path('app_profile') }}\">
                            <i class=\"bi bi-person\"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"{{ path('app_settings') }}\">
                            <i class=\"bi bi-gear\"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"{{ path('app_appointments') }}\">
                            <i class=\"bi bi-calendar-check\"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>
                    <li><hr class=\"dropdown-divider\"></li>
                    <li>
                        <a class=\"dropdown-item text-danger\" href=\"{{ path('app_logout') }}\">
                            <i class=\"bi bi-box-arrow-right\"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        {% else %}
            {# Not logged in - show user icon with Login/Register dropdown #}
            <div class=\"guest-dropdown\">
                <div class=\"guest-trigger\" id=\"guestUserDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <i class=\"bi bi-person-circle guest-icon\"></i>
                </div>

                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"guestUserDropdown\">
                    <li>
                        <a class=\"dropdown-item\" href=\"{{ path('app_login') }}\">
                            <i class=\"bi bi-box-arrow-in-right\"></i>
                            <span>Login</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"{{ path('app_register') }}\">
                            <i class=\"bi bi-person-plus\"></i>
                            <span>Register</span>
                        </a>
                    </li>
                </ul>
            </div>
        {% endif %}
    </div>
</header>

<style>
/* Guest dropdown styles */
.guest-dropdown {
    position: relative;
}

.guest-dropdown .dropdown-menu {
    display: none;
}

.guest-trigger {
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 8px;
    transition: background-color 0.2s ease;
}

.guest-trigger:hover {
    background-color: #f3f4f6;
}

.guest-icon {
    font-size: 1.75rem;
    color: #6b7280;
    transition: color 0.2s ease;
}

.guest-trigger:hover .guest-icon {
    color: #374151;
}

.guest-dropdown:hover .dropdown-menu {
    display: block;
    animation: fadeIn 0.2s ease;
}

/* Logged in user dropdown styles */
.user-profile-dropdown {
    position: relative;
}

.user-profile-dropdown .dropdown-menu {
    display: none;
}

.user-profile-trigger {
    cursor: pointer;
    padding: 0;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    overflow: hidden;
}

.user-avatar:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
}

.user-avatar i {
    font-size: 1.2rem;
}

.user-avatar-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-avatar-large {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1.25rem;
    overflow: hidden;
}

.user-avatar-img-large {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.dropdown-menu {
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    padding: 0.5rem;
    min-width: 220px;
    margin-top: 0.5rem;
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
}

.dropdown-header {
    padding: 1rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 8px;
    margin-bottom: 0.5rem;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-details {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.user-name {
    font-weight: 600;
    color: #1f2937;
    font-size: 0.95rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-email {
    color: #6b7280;
    font-size: 0.8rem;
    margin-top: 0.15rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.dropdown-divider {
    margin: 0.5rem 0;
    border-color: #e5e7eb;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    color: #374151;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.dropdown-item:hover {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.dropdown-item i {
    font-size: 1rem;
    width: 20px;
    text-align: center;
}

.dropdown-item.text-danger:hover {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
}

/* Hover dropdown effect for user dropdown */
.user-profile-dropdown:hover .dropdown-menu {
    display: block;
    animation: fadeIn 0.2s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 576px) {
    .user-avatar {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }
    
    .dropdown-menu {
        min-width: 200px;
        margin-right: -1rem;
    }
    
    .guest-icon {
        font-size: 1.5rem;
    }
}
</style>
<script src=\"{{ asset('assets/js/accessibility.js') }}\"></script>
", "partials/frontend_header.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\partials\\frontend_header.html.twig");
    }
}
