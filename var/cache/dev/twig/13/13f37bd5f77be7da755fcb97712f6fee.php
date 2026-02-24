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

/* frontend/profile.html.twig */
class __TwigTemplate_131a59117e7d50382281bd77aeeb7819 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/profile.html.twig"));

        $this->parent = $this->load("base_frontend.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Mon Profil - Medicare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_class(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        yield "profile-page";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 8
        yield "    <header id=\"header\" class=\"header sticky-top\">
        <div class=\"topbar d-flex align-items-center\">
            <div class=\"container d-flex justify-content-center justify-content-md-between\">
                <div class=\"d-none d-md-flex align-items-center\">
                    <i class=\"bi bi-envelope me-1\"></i> <a href=\"mailto:contact@medicare.com\">contact@medicare.com</a>
                    <span class=\"ms-3\"><i class=\"bi bi-phone me-1\"></i> +1 555 911 2468</span>
                </div>
                <div class=\"d-flex align-items-center\">
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-facebook\"></i></a>
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-twitter-x\"></i></a>
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-instagram\"></i></a>
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-linkedin\"></i></a>
                </div>
            </div>
        </div>
        
        <div class=\"branding d-flex align-items-center\">
            <div class=\"container d-flex align-items-center justify-content-between\">
                <div class=\"d-flex align-items-center\">
                    <a href=\"";
        // line 27
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"logo d-flex align-items-center me-auto\">
                        <h1 class=\"sitename\">Medicare</h1>
                    </a>
                </div>
                
                <nav class=\"navmenu\">
                    <ul>
                        <li><a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a></li>
                        <li><a href=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\">À propos</a></li>
                        <li><a href=\"";
        // line 36
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\">Services</a></li>
                        <li><a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_departments");
        yield "\">Départements</a></li>
                        <li><a href=\"";
        // line 38
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_doctors");
        yield "\">Médecins</a></li>
                        <li><a href=\"";
        // line 39
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\">Contact</a></li>
                        ";
        // line 40
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "user", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 41
            yield "                            <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\" class=\"active\">Mon Profil</a></li>
                            <li><a href=\"";
            // line 42
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"btn-logout\">Déconnexion</a></li>
                        ";
        } else {
            // line 44
            yield "                            <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">Connexion</a></li>
                            <li><a href=\"";
            // line 45
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"btn-register\">S'inscrire</a></li>
                        ";
        }
        // line 47
        yield "                    </ul>
                    <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
                </nav>
                
                <div class=\"d-none d-md-flex align-items-center\">
                    <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\" class=\"appointment-btn ms-2\">Rendez-vous</a>
                </div>
            </div>
        </div>
    </header>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 59
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 60
        yield "<main class=\"profile-main\">
    <div class=\"page-title\">
        <div class=\"container\">
            <h1>Mon Profil</h1>
            <nav class=\"breadcrumbs\">
                <ol>
                    <li><a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a></li>
                    <li>Mon Profil</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class=\"profile-section\">
        <div class=\"container\">
            <div class=\"profile-card\">
                <div class=\"profile-header\">
                    <div class=\"profile-avatar-wrapper\">
                        ";
        // line 78
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 78, $this->source); })()), "photo", [], "any", false, false, false, 78)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 79
            yield "                            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 79, $this->source); })()), "photo", [], "any", false, false, false, 79), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 79, $this->source); })()), "prenom", [], "any", false, false, false, 79), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 79, $this->source); })()), "nom", [], "any", false, false, false, 79), "html", null, true);
            yield "\" class=\"profile-avatar\">
                        ";
        } else {
            // line 81
            yield "                            <div class=\"profile-avatar-placeholder\">
                                <i class=\"mdi mdi-account\"></i>
                            </div>
                            <div class=\"avatar-alert\">
                                <i class=\"mdi mdi-alert-circle\"></i>
                                <span>Photo de profil non définie</span>
                            </div>
                        ";
        }
        // line 89
        yield "                    </div>
                    
                    <div class=\"profile-info\">
                        <h2>";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 92, $this->source); })()), "prenom", [], "any", false, false, false, 92), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 92, $this->source); })()), "nom", [], "any", false, false, false, 92), "html", null, true);
        yield "</h2>
                        
                        ";
        // line 94
        if (CoreExtension::inFilter("ROLE_MEDECIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 94, $this->source); })()), "roles", [], "any", false, false, false, 94))) {
            // line 95
            yield "                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-doctor\"></i> Médecin
                            </p>
                            ";
            // line 98
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 98, $this->source); })()), "specialite", [], "any", false, false, false, 98)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 99
                yield "                                <p class=\"profile-specialty\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 99, $this->source); })()), "specialite", [], "any", false, false, false, 99), "html", null, true);
                yield "</p>
                            ";
            }
            // line 101
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 101, $this->source); })()), "cabinet", [], "any", false, false, false, 101)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 102
                yield "                                <p class=\"profile-cabinet\">
                                    <i class=\"mdi mdi-hospital-building\"></i> ";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 103, $this->source); })()), "cabinet", [], "any", false, false, false, 103), "html", null, true);
                yield "
                                </p>
                            ";
            }
            // line 106
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 106, $this->source); })()), "ville", [], "any", false, false, false, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 107
                yield "                                <p class=\"profile-location\">
                                    <i class=\"mdi mdi-map-marker\"></i> ";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 108, $this->source); })()), "ville", [], "any", false, false, false, 108), "html", null, true);
                yield "
                                </p>
                            ";
            }
            // line 111
            yield "                        ";
        } else {
            // line 112
            yield "                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-account\"></i> Patient
                            </p>
                        ";
        }
        // line 116
        yield "                    </div>
                </div>
                
                <div class=\"profile-body\">
                    <div class=\"profile-section-title\">
                        <h3><i class=\"mdi mdi-information\"></i> Informations</h3>
                    </div>
                    
                    <div class=\"info-grid\">
                        <div class=\"info-item\">
                            <label>Nom</label>
                            <span>";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 127, $this->source); })()), "nom", [], "any", false, false, false, 127), "html", null, true);
        yield "</span>
                        </div>
                        
                        <div class=\"info-item\">
                            <label>Prénom</label>
                            <span>";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 132, $this->source); })()), "prenom", [], "any", false, false, false, 132), "html", null, true);
        yield "</span>
                        </div>
                        
                        ";
        // line 135
        if (CoreExtension::inFilter("ROLE_MEDECIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 135, $this->source); })()), "roles", [], "any", false, false, false, 135))) {
            // line 136
            yield "                            <div class=\"info-item\">
                                <label>Email</label>
                                <span>";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 138, $this->source); })()), "email", [], "any", false, false, false, 138), "html", null, true);
            yield "</span>
                            </div>
                            
                            ";
            // line 141
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 141, $this->source); })()), "numero", [], "any", false, false, false, 141)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 142
                yield "                                <div class=\"info-item\">
                                    <label>Téléphone</label>
                                    <span>";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 144, $this->source); })()), "numero", [], "any", false, false, false, 144), "html", null, true);
                yield "</span>
                                </div>
                            ";
            }
            // line 147
            yield "                            
                            ";
            // line 148
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 148, $this->source); })()), "bio", [], "any", false, false, false, 148)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 149
                yield "                                <div class=\"info-item full-width\">
                                    <label>Biographie</label>
                                    <span>";
                // line 151
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 151, $this->source); })()), "bio", [], "any", false, false, false, 151), "html", null, true);
                yield "</span>
                                </div>
                            ";
            }
            // line 154
            yield "                        ";
        } else {
            // line 155
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 155, $this->source); })()), "numero", [], "any", false, false, false, 155)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 156
                yield "                                <div class=\"info-item\">
                                    <label>Téléphone</label>
                                    <span>";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 158, $this->source); })()), "numero", [], "any", false, false, false, 158), "html", null, true);
                yield "</span>
                                </div>
                            ";
            }
            // line 161
            yield "                        ";
        }
        // line 162
        yield "                    </div>
                </div>
                
                ";
        // line 165
        if (CoreExtension::inFilter("ROLE_MEDECIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 165, $this->source); })()), "roles", [], "any", false, false, false, 165))) {
            // line 166
            yield "                    <div class=\"profile-footer\">
                        <a href=\"";
            // line 167
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medecin_edit_profile");
            yield "\" class=\"btn-edit\">
                            <i class=\"mdi mdi-pencil\"></i> Modifier le profil
                        </a>
                    </div>
                ";
        }
        // line 172
        yield "            </div>
        </div>
    </section>
</main>

<style>
    .profile-main {
        min-height: calc(100vh - 200px);
        background: #f8f9fa;
    }
    
    .page-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 60px 0 30px;
        margin-bottom: 0;
    }
    
    .page-title h1 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .breadcrumbs {
        color: rgba(255, 255, 255, 0.8);
    }
    
    .breadcrumbs ol {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumbs li {
        margin-right: 10px;
    }
    
    .breadcrumbs a {
        color: white;
        text-decoration: none;
    }
    
    .breadcrumbs a:hover {
        text-decoration: underline;
    }
    
    .profile-section {
        padding: 40px 0;
    }
    
    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 40px;
        display: flex;
        align-items: center;
        gap: 30px;
    }
    
    .profile-avatar-wrapper {
        position: relative;
        flex-shrink: 0;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }
    
    .profile-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid white;
    }
    
    .profile-avatar-placeholder i {
        font-size: 60px;
        color: white;
    }
    
    .avatar-alert {
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #ffc107;
        color: #333;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .profile-info h2 {
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }
    
    .profile-specialty,
    .profile-cabinet,
    .profile-location {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 3px;
    }
    
    .profile-body {
        padding: 30px 40px;
    }
    
    .profile-section-title {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .profile-section-title h3 {
        color: #10b981;
        font-size: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .info-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .info-item.full-width {
        grid-column: span 2;
    }
    
    .info-item label {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-item span {
        color: #333;
        font-size: 1rem;
        font-weight: 500;
        word-break: break-word;
    }
    
    .profile-footer {
        padding: 20px 40px;
        background: #f8f9fa;
        border-top: 1px solid #eee;
        text-align: center;
    }
    
    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 30px;
        background: #10b981;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-edit:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            padding: 30px 20px;
        }
        
        .profile-info h2 {
            font-size: 1.5rem;
        }
        
        .profile-role,
        .profile-specialty,
        .profile-cabinet,
        .profile-location {
            justify-content: center;
        }
        
        .profile-body {
            padding: 20px;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .info-item.full-width {
            grid-column: span 1;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "frontend/profile.html.twig";
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
        return array (  447 => 172,  439 => 167,  436 => 166,  434 => 165,  429 => 162,  426 => 161,  420 => 158,  416 => 156,  413 => 155,  410 => 154,  404 => 151,  400 => 149,  398 => 148,  395 => 147,  389 => 144,  385 => 142,  383 => 141,  377 => 138,  373 => 136,  371 => 135,  365 => 132,  357 => 127,  344 => 116,  338 => 112,  335 => 111,  329 => 108,  326 => 107,  323 => 106,  317 => 103,  314 => 102,  311 => 101,  305 => 99,  303 => 98,  298 => 95,  296 => 94,  289 => 92,  284 => 89,  274 => 81,  264 => 79,  262 => 78,  247 => 66,  239 => 60,  226 => 59,  209 => 52,  202 => 47,  197 => 45,  192 => 44,  187 => 42,  182 => 41,  180 => 40,  176 => 39,  172 => 38,  168 => 37,  164 => 36,  160 => 35,  156 => 34,  146 => 27,  125 => 8,  112 => 7,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Mon Profil - Medicare{% endblock %}

{% block body_class %}profile-page{% endblock %}

{% block header %}
    <header id=\"header\" class=\"header sticky-top\">
        <div class=\"topbar d-flex align-items-center\">
            <div class=\"container d-flex justify-content-center justify-content-md-between\">
                <div class=\"d-none d-md-flex align-items-center\">
                    <i class=\"bi bi-envelope me-1\"></i> <a href=\"mailto:contact@medicare.com\">contact@medicare.com</a>
                    <span class=\"ms-3\"><i class=\"bi bi-phone me-1\"></i> +1 555 911 2468</span>
                </div>
                <div class=\"d-flex align-items-center\">
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-facebook\"></i></a>
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-twitter-x\"></i></a>
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-instagram\"></i></a>
                    <a href=\"#\" class=\"ms-2\"><i class=\"bi bi-linkedin\"></i></a>
                </div>
            </div>
        </div>
        
        <div class=\"branding d-flex align-items-center\">
            <div class=\"container d-flex align-items-center justify-content-between\">
                <div class=\"d-flex align-items-center\">
                    <a href=\"{{ path('app_home') }}\" class=\"logo d-flex align-items-center me-auto\">
                        <h1 class=\"sitename\">Medicare</h1>
                    </a>
                </div>
                
                <nav class=\"navmenu\">
                    <ul>
                        <li><a href=\"{{ path('app_home') }}\">Accueil</a></li>
                        <li><a href=\"{{ path('app_about') }}\">À propos</a></li>
                        <li><a href=\"{{ path('app_services') }}\">Services</a></li>
                        <li><a href=\"{{ path('app_departments') }}\">Départements</a></li>
                        <li><a href=\"{{ path('app_doctors') }}\">Médecins</a></li>
                        <li><a href=\"{{ path('app_contact') }}\">Contact</a></li>
                        {% if app.user %}
                            <li><a href=\"{{ path('app_profile') }}\" class=\"active\">Mon Profil</a></li>
                            <li><a href=\"{{ path('app_logout') }}\" class=\"btn-logout\">Déconnexion</a></li>
                        {% else %}
                            <li><a href=\"{{ path('app_login') }}\">Connexion</a></li>
                            <li><a href=\"{{ path('app_register') }}\" class=\"btn-register\">S'inscrire</a></li>
                        {% endif %}
                    </ul>
                    <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
                </nav>
                
                <div class=\"d-none d-md-flex align-items-center\">
                    <a href=\"{{ path('app_appointment') }}\" class=\"appointment-btn ms-2\">Rendez-vous</a>
                </div>
            </div>
        </div>
    </header>
{% endblock %}

{% block body %}
<main class=\"profile-main\">
    <div class=\"page-title\">
        <div class=\"container\">
            <h1>Mon Profil</h1>
            <nav class=\"breadcrumbs\">
                <ol>
                    <li><a href=\"{{ path('app_home') }}\">Accueil</a></li>
                    <li>Mon Profil</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class=\"profile-section\">
        <div class=\"container\">
            <div class=\"profile-card\">
                <div class=\"profile-header\">
                    <div class=\"profile-avatar-wrapper\">
                        {% if user.photo %}
                            <img src=\"{{ user.photo }}\" alt=\"{{ user.prenom }} {{ user.nom }}\" class=\"profile-avatar\">
                        {% else %}
                            <div class=\"profile-avatar-placeholder\">
                                <i class=\"mdi mdi-account\"></i>
                            </div>
                            <div class=\"avatar-alert\">
                                <i class=\"mdi mdi-alert-circle\"></i>
                                <span>Photo de profil non définie</span>
                            </div>
                        {% endif %}
                    </div>
                    
                    <div class=\"profile-info\">
                        <h2>{{ user.prenom }} {{ user.nom }}</h2>
                        
                        {% if 'ROLE_MEDECIN' in user.roles %}
                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-doctor\"></i> Médecin
                            </p>
                            {% if user.specialite %}
                                <p class=\"profile-specialty\">{{ user.specialite }}</p>
                            {% endif %}
                            {% if user.cabinet %}
                                <p class=\"profile-cabinet\">
                                    <i class=\"mdi mdi-hospital-building\"></i> {{ user.cabinet }}
                                </p>
                            {% endif %}
                            {% if user.ville %}
                                <p class=\"profile-location\">
                                    <i class=\"mdi mdi-map-marker\"></i> {{ user.ville }}
                                </p>
                            {% endif %}
                        {% else %}
                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-account\"></i> Patient
                            </p>
                        {% endif %}
                    </div>
                </div>
                
                <div class=\"profile-body\">
                    <div class=\"profile-section-title\">
                        <h3><i class=\"mdi mdi-information\"></i> Informations</h3>
                    </div>
                    
                    <div class=\"info-grid\">
                        <div class=\"info-item\">
                            <label>Nom</label>
                            <span>{{ user.nom }}</span>
                        </div>
                        
                        <div class=\"info-item\">
                            <label>Prénom</label>
                            <span>{{ user.prenom }}</span>
                        </div>
                        
                        {% if 'ROLE_MEDECIN' in user.roles %}
                            <div class=\"info-item\">
                                <label>Email</label>
                                <span>{{ user.email }}</span>
                            </div>
                            
                            {% if user.numero %}
                                <div class=\"info-item\">
                                    <label>Téléphone</label>
                                    <span>{{ user.numero }}</span>
                                </div>
                            {% endif %}
                            
                            {% if user.bio %}
                                <div class=\"info-item full-width\">
                                    <label>Biographie</label>
                                    <span>{{ user.bio }}</span>
                                </div>
                            {% endif %}
                        {% else %}
                            {% if user.numero %}
                                <div class=\"info-item\">
                                    <label>Téléphone</label>
                                    <span>{{ user.numero }}</span>
                                </div>
                            {% endif %}
                        {% endif %}
                    </div>
                </div>
                
                {% if 'ROLE_MEDECIN' in user.roles %}
                    <div class=\"profile-footer\">
                        <a href=\"{{ path('app_medecin_edit_profile') }}\" class=\"btn-edit\">
                            <i class=\"mdi mdi-pencil\"></i> Modifier le profil
                        </a>
                    </div>
                {% endif %}
            </div>
        </div>
    </section>
</main>

<style>
    .profile-main {
        min-height: calc(100vh - 200px);
        background: #f8f9fa;
    }
    
    .page-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 60px 0 30px;
        margin-bottom: 0;
    }
    
    .page-title h1 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .breadcrumbs {
        color: rgba(255, 255, 255, 0.8);
    }
    
    .breadcrumbs ol {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumbs li {
        margin-right: 10px;
    }
    
    .breadcrumbs a {
        color: white;
        text-decoration: none;
    }
    
    .breadcrumbs a:hover {
        text-decoration: underline;
    }
    
    .profile-section {
        padding: 40px 0;
    }
    
    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 40px;
        display: flex;
        align-items: center;
        gap: 30px;
    }
    
    .profile-avatar-wrapper {
        position: relative;
        flex-shrink: 0;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }
    
    .profile-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid white;
    }
    
    .profile-avatar-placeholder i {
        font-size: 60px;
        color: white;
    }
    
    .avatar-alert {
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #ffc107;
        color: #333;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .profile-info h2 {
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }
    
    .profile-specialty,
    .profile-cabinet,
    .profile-location {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 3px;
    }
    
    .profile-body {
        padding: 30px 40px;
    }
    
    .profile-section-title {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .profile-section-title h3 {
        color: #10b981;
        font-size: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .info-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .info-item.full-width {
        grid-column: span 2;
    }
    
    .info-item label {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-item span {
        color: #333;
        font-size: 1rem;
        font-weight: 500;
        word-break: break-word;
    }
    
    .profile-footer {
        padding: 20px 40px;
        background: #f8f9fa;
        border-top: 1px solid #eee;
        text-align: center;
    }
    
    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 30px;
        background: #10b981;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-edit:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            padding: 30px 20px;
        }
        
        .profile-info h2 {
            font-size: 1.5rem;
        }
        
        .profile-role,
        .profile-specialty,
        .profile-cabinet,
        .profile-location {
            justify-content: center;
        }
        
        .profile-body {
            padding: 20px;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .info-item.full-width {
            grid-column: span 1;
        }
    }
</style>
{% endblock %}
", "frontend/profile.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\profile.html.twig");
    }
}
