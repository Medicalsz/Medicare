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
        yield ">Home</a></li>
                <li><a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\">About</a></li>
                <li><a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\">Services</a></li>
                <li><a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_departments");
        yield "\">Departments</a></li>
                <li><a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_explore");
        yield "\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "request", [], "any", false, false, false, 13), "attributes", [], "any", false, false, false, 13), "get", ["_route"], "method", false, false, false, 13) == "app_explore")) {
            yield "class=\"active\"";
        }
        yield ">Explore</a></li>
                <li class=\"dropdown\">
                    <a href=\"#\"><span>More Pages</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
                    <ul>
                        <li><a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\">Appointment</a></li>
                        <li><a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_testimonials");
        yield "\">Testimonials</a></li>
                        <li><a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_faq");
        yield "\">FAQ</a></li>
                        <li><a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_gallery");
        yield "\">Gallery</a></li>
                    </ul>
                </li>
                <li><a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\">Contact</a></li>
            </ul>
            <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
        </nav>

        ";
        // line 28
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "user", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "            ";
            // line 30
            yield "            <div class=\"user-profile-dropdown\">
                <div class=\"user-profile-trigger\" id=\"userProfileDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <div class=\"user-avatar\">
                        ";
            // line 33
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 33, $this->source); })()), "user", [], "any", false, false, false, 33), "photo", [], "any", false, false, false, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 34
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "photo", [], "any", false, false, false, 34), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "nom", [], "any", false, false, false, 34), "html", null, true);
                yield "\" class=\"user-avatar-img\">
                        ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 35
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "user", [], "any", false, false, false, 35), "nom", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 36
                yield "                            <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 36), "prenom", [], "any", true, true, false, 36)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36), "prenom", [], "any", false, false, false, 36), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36), "nom", [], "any", false, false, false, 36))) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36), "nom", [], "any", false, false, false, 36))))), "html", null, true);
                yield "</span>
                        ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 37
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "prenom", [], "any", false, false, false, 37)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 38
                yield "                            <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "prenom", [], "any", false, false, false, 38))), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 40
                yield "                            <i class=\"bi bi-person-fill\"></i>
                        ";
            }
            // line 42
            yield "                    </div>
                </div>

                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"userProfileDropdown\">
                    <li class=\"dropdown-header\">
                        <div class=\"user-info\">
                            <div class=\"user-avatar-large\">
                                ";
            // line 49
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "user", [], "any", false, false, false, 49), "photo", [], "any", false, false, false, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 50
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "photo", [], "any", false, false, false, 50), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "nom", [], "any", false, false, false, 50), "html", null, true);
                yield "\" class=\"user-avatar-img-large\">
                                ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 51
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 51, $this->source); })()), "user", [], "any", false, false, false, 51), "nom", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "                                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 52), "prenom", [], "any", true, true, false, 52)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "user", [], "any", false, false, false, 52), "prenom", [], "any", false, false, false, 52), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "user", [], "any", false, false, false, 52), "nom", [], "any", false, false, false, 52))) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "user", [], "any", false, false, false, 52), "nom", [], "any", false, false, false, 52))))), "html", null, true);
                yield "</span>
                                ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 53
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "prenom", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 54
                yield "                                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "user", [], "any", false, false, false, 54), "prenom", [], "any", false, false, false, 54))), "html", null, true);
                yield "</span>
                                ";
            } else {
                // line 56
                yield "                                    <i class=\"bi bi-person-fill\"></i>
                                ";
            }
            // line 58
            yield "                            </div>
                            <div class=\"user-details\">
                                <span class=\"user-name\">
                                    ";
            // line 61
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 61, $this->source); })()), "user", [], "any", false, false, false, 61), "nom", [], "any", false, false, false, 61) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 61, $this->source); })()), "user", [], "any", false, false, false, 61), "prenom", [], "any", false, false, false, 61))) {
                // line 62
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "user", [], "any", false, false, false, 62), "prenom", [], "any", false, false, false, 62), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "user", [], "any", false, false, false, 62), "nom", [], "any", false, false, false, 62), "html", null, true);
                yield "
                                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 63
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 63, $this->source); })()), "user", [], "any", false, false, false, 63), "prenom", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 64
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 64, $this->source); })()), "user", [], "any", false, false, false, 64), "prenom", [], "any", false, false, false, 64), "html", null, true);
                yield "
                                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 65
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 65, $this->source); })()), "user", [], "any", false, false, false, 65), "nom", [], "any", false, false, false, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 66
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "user", [], "any", false, false, false, 66), "nom", [], "any", false, false, false, 66), "html", null, true);
                yield "
                                    ";
            } else {
                // line 68
                yield "                                        User
                                    ";
            }
            // line 70
            yield "                                </span>
                                <span class=\"user-email\">";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "email", [], "any", false, false, false, 71), "html", null, true);
            yield "</span>
                            </div>
                        </div>
                    </li>
                    <li><hr class=\"dropdown-divider\"></li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 77
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\">
                            <i class=\"bi bi-person\"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 83
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_settings");
            yield "\">
                            <i class=\"bi bi-gear\"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 89
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointments");
            yield "\">
                            <i class=\"bi bi-calendar-check\"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>
                    <li><hr class=\"dropdown-divider\"></li>
                    <li>
                        <a class=\"dropdown-item text-danger\" href=\"";
            // line 96
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
            // line 104
            yield "            ";
            // line 105
            yield "            <div class=\"guest-dropdown\">
                <div class=\"guest-trigger\" id=\"guestUserDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <i class=\"bi bi-person-circle guest-icon\"></i>
                </div>

                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"guestUserDropdown\">
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 112
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">
                            <i class=\"bi bi-box-arrow-in-right\"></i>
                            <span>Login</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"dropdown-item\" href=\"";
            // line 118
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
        // line 126
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
        return array (  307 => 126,  296 => 118,  287 => 112,  278 => 105,  276 => 104,  265 => 96,  255 => 89,  246 => 83,  237 => 77,  228 => 71,  225 => 70,  221 => 68,  215 => 66,  213 => 65,  208 => 64,  206 => 63,  199 => 62,  197 => 61,  192 => 58,  188 => 56,  182 => 54,  180 => 53,  175 => 52,  173 => 51,  166 => 50,  164 => 49,  155 => 42,  151 => 40,  145 => 38,  143 => 37,  138 => 36,  136 => 35,  129 => 34,  127 => 33,  122 => 30,  120 => 29,  118 => 28,  110 => 23,  104 => 20,  100 => 19,  96 => 18,  92 => 17,  81 => 13,  77 => 12,  73 => 11,  69 => 10,  61 => 9,  52 => 3,  48 => 1,);
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
                <li><a href=\"{{ path('app_home') }}\" {% if app.request.attributes.get('_route') == 'app_home' %}class=\"active\"{% endif %}>Home</a></li>
                <li><a href=\"{{ path('app_about') }}\">About</a></li>
                <li><a href=\"{{ path('app_services') }}\">Services</a></li>
                <li><a href=\"{{ path('app_departments') }}\">Departments</a></li>
                <li><a href=\"{{ path('app_explore') }}\" {% if app.request.attributes.get('_route') == 'app_explore' %}class=\"active\"{% endif %}>Explore</a></li>
                <li class=\"dropdown\">
                    <a href=\"#\"><span>More Pages</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
                    <ul>
                        <li><a href=\"{{ path('app_appointment') }}\">Appointment</a></li>
                        <li><a href=\"{{ path('app_testimonials') }}\">Testimonials</a></li>
                        <li><a href=\"{{ path('app_faq') }}\">FAQ</a></li>
                        <li><a href=\"{{ path('app_gallery') }}\">Gallery</a></li>
                    </ul>
                </li>
                <li><a href=\"{{ path('app_contact') }}\">Contact</a></li>
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
", "partials/frontend_header.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\partials\\frontend_header.html.twig");
    }
}
