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
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        yield "<main class=\"profile-main\">
    <div class=\"page-title\">
        <div class=\"container\">
            <h1>Mon Profil</h1>
            <nav class=\"breadcrumbs\">
                <ol>
                    <li><a href=\"";
        // line 14
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
        // line 26
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 26, $this->source); })()), "photo", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "                            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "photo", [], "any", false, false, false, 27), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "prenom", [], "any", false, false, false, 27), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "nom", [], "any", false, false, false, 27), "html", null, true);
            yield "\" class=\"profile-avatar\">
                        ";
        } else {
            // line 29
            yield "                            <div class=\"profile-avatar-placeholder\">
                                <i class=\"bi bi-person\"></i>
                            </div>
                            <div class=\"avatar-alert\">
                                <i class=\"bi bi-exclamation-triangle\"></i>
                                <span>Photo de profil non définie</span>
                            </div>
                        ";
        }
        // line 37
        yield "                    </div>
                    
                    <div class=\"profile-info\">
                        <h2>";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "prenom", [], "any", false, false, false, 40), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "nom", [], "any", false, false, false, 40), "html", null, true);
        yield "</h2>
                        
                        ";
        // line 42
        $context["is_doctor"] = CoreExtension::inFilter("ROLE_MEDECIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "roles", [], "any", false, false, false, 42));
        // line 43
        yield "                        ";
        if ((($tmp = (isset($context["is_doctor"]) || array_key_exists("is_doctor", $context) ? $context["is_doctor"] : (function () { throw new RuntimeError('Variable "is_doctor" does not exist.', 43, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 44
            yield "                            <p class=\"profile-role\">
                                <i class=\"bi bi-doctor\"></i> Médecin
                            </p>
                            ";
            // line 47
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 47, $this->source); })()), "specialite", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 48
                yield "                                <p class=\"profile-specialty\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "specialite", [], "any", false, false, false, 48), "html", null, true);
                yield "</p>
                            ";
            }
            // line 50
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 50, $this->source); })()), "cabinet", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "                                <p class=\"profile-cabinet\">
                                    <i class=\"bi bi-hospital\"></i> ";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "cabinet", [], "any", false, false, false, 52), "html", null, true);
                yield "
                                </p>
                            ";
            }
            // line 55
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 55, $this->source); })()), "ville", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                yield "                                <p class=\"profile-location\">
                                    <i class=\"bi bi-geo-alt\"></i> ";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 57, $this->source); })()), "ville", [], "any", false, false, false, 57), "html", null, true);
                yield "
                                </p>
                            ";
            }
            // line 60
            yield "                        ";
        } else {
            // line 61
            yield "                            <p class=\"profile-role\">
                                <i class=\"bi bi-person\"></i> Patient
                            </p>
                        ";
        }
        // line 65
        yield "                    </div>
                </div>
                
                <div class=\"profile-body\">
                    <div class=\"profile-section-title\">
                        <h3><i class=\"bi bi-info-circle\"></i> Informations</h3>
                    </div>
                    
                    <div class=\"info-grid\">
                        <div class=\"info-item\">
                            <label>Nom</label>
                            <span>";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 76, $this->source); })()), "nom", [], "any", false, false, false, 76), "html", null, true);
        yield "</span>
                        </div>
                        
                        <div class=\"info-item\">
                            <label>Prénom</label>
                            <span>";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 81, $this->source); })()), "prenom", [], "any", false, false, false, 81), "html", null, true);
        yield "</span>
                        </div>
                        
                        ";
        // line 84
        $context["is_owner"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "user", [], "any", false, false, false, 84) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "user", [], "any", false, false, false, 84), "id", [], "any", false, false, false, 84) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 84, $this->source); })()), "id", [], "any", false, false, false, 84)));
        // line 85
        yield "                        ";
        $context["viewer_is_doctor"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MEDECIN");
        // line 86
        yield "                        ";
        $context["can_see_phone"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 86, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 86) == "public") || (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 86, $this->source); })())) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 86, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 86) == "doctors") && (isset($context["viewer_is_doctor"]) || array_key_exists("viewer_is_doctor", $context) ? $context["viewer_is_doctor"] : (function () { throw new RuntimeError('Variable "viewer_is_doctor" does not exist.', 86, $this->source); })())));
        // line 87
        yield "                        ";
        $context["can_see_address"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 87) == "public") || (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 87, $this->source); })())) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 87) == "doctors") && (isset($context["viewer_is_doctor"]) || array_key_exists("viewer_is_doctor", $context) ? $context["viewer_is_doctor"] : (function () { throw new RuntimeError('Variable "viewer_is_doctor" does not exist.', 87, $this->source); })())));
        // line 88
        yield "                        ";
        $context["can_see_email"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 88, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 88) == "public") || (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 88, $this->source); })())) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 88, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 88) == "doctors") && (isset($context["viewer_is_doctor"]) || array_key_exists("viewer_is_doctor", $context) ? $context["viewer_is_doctor"] : (function () { throw new RuntimeError('Variable "viewer_is_doctor" does not exist.', 88, $this->source); })())));
        // line 89
        yield "
                        ";
        // line 90
        if ((($tmp = (isset($context["can_see_email"]) || array_key_exists("can_see_email", $context) ? $context["can_see_email"] : (function () { throw new RuntimeError('Variable "can_see_email" does not exist.', 90, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 91
            yield "                            <div class=\"info-item\">
                                <label>Email</label>
                                <span>";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 93, $this->source); })()), "email", [], "any", false, false, false, 93), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        // line 96
        yield "
                        ";
        // line 97
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 97, $this->source); })()), "numero", [], "any", false, false, false, 97) && (isset($context["can_see_phone"]) || array_key_exists("can_see_phone", $context) ? $context["can_see_phone"] : (function () { throw new RuntimeError('Variable "can_see_phone" does not exist.', 97, $this->source); })()))) {
            // line 98
            yield "                            <div class=\"info-item\">
                                <label>Téléphone</label>
                                <span>";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 100, $this->source); })()), "numero", [], "any", false, false, false, 100), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        // line 103
        yield "
                        ";
        // line 104
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 104, $this->source); })()), "adresse", [], "any", false, false, false, 104) && (isset($context["can_see_address"]) || array_key_exists("can_see_address", $context) ? $context["can_see_address"] : (function () { throw new RuntimeError('Variable "can_see_address" does not exist.', 104, $this->source); })()))) {
            // line 105
            yield "                            <div class=\"info-item full-width\">
                                <label>Adresse</label>
                                <span>";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 107, $this->source); })()), "adresse", [], "any", false, false, false, 107), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        // line 110
        yield "                    </div>
                </div>
                
                <div class=\"profile-footer\">
                    ";
        // line 114
        if ((($tmp = (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 114, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 115
            yield "                        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
            yield "\" class=\"btn-edit\">
                            <i class=\"bi bi-pencil\"></i> Modifier le profil
                        </a>
                    ";
        }
        // line 119
        yield "                </div>
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
        return array (  334 => 119,  326 => 115,  324 => 114,  318 => 110,  312 => 107,  308 => 105,  306 => 104,  303 => 103,  297 => 100,  293 => 98,  291 => 97,  288 => 96,  282 => 93,  278 => 91,  276 => 90,  273 => 89,  270 => 88,  267 => 87,  264 => 86,  261 => 85,  259 => 84,  253 => 81,  245 => 76,  232 => 65,  226 => 61,  223 => 60,  217 => 57,  214 => 56,  211 => 55,  205 => 52,  202 => 51,  199 => 50,  193 => 48,  191 => 47,  186 => 44,  183 => 43,  181 => 42,  174 => 40,  169 => 37,  159 => 29,  149 => 27,  147 => 26,  132 => 14,  124 => 8,  111 => 7,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Mon Profil - Medicare{% endblock %}

{% block body_class %}profile-page{% endblock %}

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
                                <i class=\"bi bi-person\"></i>
                            </div>
                            <div class=\"avatar-alert\">
                                <i class=\"bi bi-exclamation-triangle\"></i>
                                <span>Photo de profil non définie</span>
                            </div>
                        {% endif %}
                    </div>
                    
                    <div class=\"profile-info\">
                        <h2>{{ user.prenom }} {{ user.nom }}</h2>
                        
                        {% set is_doctor = 'ROLE_MEDECIN' in user.roles %}
                        {% if is_doctor %}
                            <p class=\"profile-role\">
                                <i class=\"bi bi-doctor\"></i> Médecin
                            </p>
                            {% if user.specialite %}
                                <p class=\"profile-specialty\">{{ user.specialite }}</p>
                            {% endif %}
                            {% if user.cabinet %}
                                <p class=\"profile-cabinet\">
                                    <i class=\"bi bi-hospital\"></i> {{ user.cabinet }}
                                </p>
                            {% endif %}
                            {% if user.ville %}
                                <p class=\"profile-location\">
                                    <i class=\"bi bi-geo-alt\"></i> {{ user.ville }}
                                </p>
                            {% endif %}
                        {% else %}
                            <p class=\"profile-role\">
                                <i class=\"bi bi-person\"></i> Patient
                            </p>
                        {% endif %}
                    </div>
                </div>
                
                <div class=\"profile-body\">
                    <div class=\"profile-section-title\">
                        <h3><i class=\"bi bi-info-circle\"></i> Informations</h3>
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
                        
                        {% set is_owner = app.user and app.user.id == user.id %}
                        {% set viewer_is_doctor = is_granted('ROLE_MEDECIN') %}
                        {% set can_see_phone = user.phonePrivacy == 'public' or is_owner or (user.phonePrivacy == 'doctors' and viewer_is_doctor) %}
                        {% set can_see_address = user.addressPrivacy == 'public' or is_owner or (user.addressPrivacy == 'doctors' and viewer_is_doctor) %}
                        {% set can_see_email = user.emailPrivacy == 'public' or is_owner or (user.emailPrivacy == 'doctors' and viewer_is_doctor) %}

                        {% if can_see_email %}
                            <div class=\"info-item\">
                                <label>Email</label>
                                <span>{{ user.email }}</span>
                            </div>
                        {% endif %}

                        {% if user.numero and can_see_phone %}
                            <div class=\"info-item\">
                                <label>Téléphone</label>
                                <span>{{ user.numero }}</span>
                            </div>
                        {% endif %}

                        {% if user.adresse and can_see_address %}
                            <div class=\"info-item full-width\">
                                <label>Adresse</label>
                                <span>{{ user.adresse }}</span>
                            </div>
                        {% endif %}
                    </div>
                </div>
                
                <div class=\"profile-footer\">
                    {% if is_owner %}
                        <a href=\"{{ path('app_profile_edit') }}\" class=\"btn-edit\">
                            <i class=\"bi bi-pencil\"></i> Modifier le profil
                        </a>
                    {% endif %}
                </div>
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
", "frontend/profile.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\profile.html.twig");
    }
}
