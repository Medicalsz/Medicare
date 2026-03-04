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

/* frontend/medecin_profile.html.twig */
class __TwigTemplate_e34481c1edb1ae136b824bb96a1bc81c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/medecin_profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/medecin_profile.html.twig"));

        // line 3
        $context["show_header"] = false;
        // line 4
        $context["show_footer"] = false;
        // line 1
        $this->parent = $this->load("base_frontend.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 6
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

        yield "Profil Médecin - Medicare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
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

        yield "medecin-profile-page";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "<main class=\"main medecin-profile-main\">
    <div class=\"profile-container\">
        <div class=\"profile-header\">
            <div class=\"profile-cover\"></div>
            <div class=\"profile-info\">
                <div class=\"profile-avatar\">
                    ";
        // line 17
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 17, $this->source); })()), "photo", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 18, $this->source); })()), "photo", [], "any", false, false, false, 18), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 18, $this->source); })()), "prenom", [], "any", false, false, false, 18), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 18, $this->source); })()), "nom", [], "any", false, false, false, 18), "html", null, true);
            yield "\" class=\"avatar-img\">
                    ";
        } else {
            // line 20
            yield "                        <div class=\"avatar-placeholder\">
                            <span>";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 21, $this->source); })()), "prenom", [], "any", false, false, false, 21))), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 21, $this->source); })()), "nom", [], "any", false, false, false, 21))), "html", null, true);
            yield "</span>
                        </div>
                    ";
        }
        // line 24
        yield "                    <div class=\"verification-badge\">
                        ";
        // line 25
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 25, $this->source); })()), "isVerified", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "                            <i class=\"bi bi-patch-check-fill verified\"></i>
                        ";
        } else {
            // line 28
            yield "                            <i class=\"bi bi-exclamation-circle not-verified\"></i>
                        ";
        }
        // line 30
        yield "                    </div>
                </div>
                <div class=\"profile-name\">
                    <h1>Dr. ";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 33, $this->source); })()), "prenom", [], "any", false, false, false, 33), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 33, $this->source); })()), "nom", [], "any", false, false, false, 33), "html", null, true);
        yield "</h1>
                    <p class=\"specialty\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 34, $this->source); })()), "specialite", [], "any", false, false, false, 34), "html", null, true);
        yield "</p>
                    ";
        // line 35
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 35, $this->source); })()), "isVerified", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "                        <span class=\"badge-verified\">Médecin vérifié</span>
                    ";
        } else {
            // line 38
            yield "                        <span class=\"badge-pending\">En attente de vérification</span>
                    ";
        }
        // line 40
        yield "                </div>
            </div>
        </div>

        <div class=\"profile-content\">
            ";
        // line 45
        $context["is_owner"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 45, $this->source); })()), "user", [], "any", false, false, false, 45) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 45, $this->source); })()), "user", [], "any", false, false, false, 45), "id", [], "any", false, false, false, 45) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 45, $this->source); })()), "id", [], "any", false, false, false, 45)));
        // line 46
        yield "            ";
        $context["viewer_is_doctor"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MEDECIN");
        // line 47
        yield "            ";
        $context["can_see_address"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 47, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 47) == "public") || (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 47, $this->source); })())) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 47, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 47) == "doctors") && (isset($context["viewer_is_doctor"]) || array_key_exists("viewer_is_doctor", $context) ? $context["viewer_is_doctor"] : (function () { throw new RuntimeError('Variable "viewer_is_doctor" does not exist.', 47, $this->source); })())));
        // line 48
        yield "            ";
        $context["can_see_phone"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 48, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 48) == "public") || (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 48, $this->source); })())) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 48, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 48) == "doctors") && (isset($context["viewer_is_doctor"]) || array_key_exists("viewer_is_doctor", $context) ? $context["viewer_is_doctor"] : (function () { throw new RuntimeError('Variable "viewer_is_doctor" does not exist.', 48, $this->source); })())));
        // line 49
        yield "            ";
        $context["can_see_email"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 49, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 49) == "public") || (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 49, $this->source); })())) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 49, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 49) == "doctors") && (isset($context["viewer_is_doctor"]) || array_key_exists("viewer_is_doctor", $context) ? $context["viewer_is_doctor"] : (function () { throw new RuntimeError('Variable "viewer_is_doctor" does not exist.', 49, $this->source); })())));
        // line 50
        yield "
            <div class=\"profile-sidebar\">
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-hospital\"></i> Cabinet</h3>
                    <p>";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 54, $this->source); })()), "cabinet", [], "any", false, false, false, 54), "html", null, true);
        yield "</p>
                </div>
                
                ";
        // line 57
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 57, $this->source); })()), "adresse", [], "any", false, false, false, 57) && (isset($context["can_see_address"]) || array_key_exists("can_see_address", $context) ? $context["can_see_address"] : (function () { throw new RuntimeError('Variable "can_see_address" does not exist.', 57, $this->source); })()))) {
            // line 58
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-geo-alt\"></i> Adresse</h3>
                    <p>";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 60, $this->source); })()), "adresse", [], "any", false, false, false, 60), "html", null, true);
            yield "</p>
                    ";
            // line 61
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 61, $this->source); })()), "ville", [], "any", false, false, false, 61)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 62
                yield "                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 62, $this->source); })()), "ville", [], "any", false, false, false, 62), "html", null, true);
                yield ", ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 62, $this->source); })()), "delegation", [], "any", false, false, false, 62), "html", null, true);
                yield "</p>
                    ";
            }
            // line 64
            yield "                </div>
                ";
        }
        // line 66
        yield "                
                ";
        // line 67
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 67, $this->source); })()), "numero", [], "any", false, false, false, 67) && (isset($context["can_see_phone"]) || array_key_exists("can_see_phone", $context) ? $context["can_see_phone"] : (function () { throw new RuntimeError('Variable "can_see_phone" does not exist.', 67, $this->source); })()))) {
            // line 68
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-telephone\"></i> Téléphone</h3>
                    <p>";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 70, $this->source); })()), "numero", [], "any", false, false, false, 70), "html", null, true);
            yield "</p>
                </div>
                ";
        }
        // line 73
        yield "                
                ";
        // line 74
        if ((($tmp = (isset($context["can_see_email"]) || array_key_exists("can_see_email", $context) ? $context["can_see_email"] : (function () { throw new RuntimeError('Variable "can_see_email" does not exist.', 74, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 75
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-envelope\"></i> Email</h3>
                    <p>";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 77, $this->source); })()), "email", [], "any", false, false, false, 77), "html", null, true);
            yield "</p>
                </div>
                ";
        }
        // line 80
        yield "                
                ";
        // line 81
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 81, $this->source); })()), "prixConsultation", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 82
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-currency-euro\"></i> Consultation</h3>
                    <p class=\"price\">";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 84, $this->source); })()), "prixConsultation", [], "any", false, false, false, 84), "html", null, true);
            yield " €</p>
                </div>
                ";
        }
        // line 87
        yield "            </div>
            
            <div class=\"profile-main-content\">
                ";
        // line 90
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 90, $this->source); })()), "bio", [], "any", false, false, false, 90)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 91
            yield "                <div class=\"content-card\">
                    <h2><i class=\"bi bi-person-lines-fill\"></i> À propos</h2>
                    <p>";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 93, $this->source); })()), "bio", [], "any", false, false, false, 93), "html", null, true);
            yield "</p>
                </div>
                ";
        }
        // line 96
        yield "                
                ";
        // line 97
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 97, $this->source); })()), "certificate", [], "any", false, false, false, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 98
            yield "                <div class=\"content-card\">
                    <h2><i class=\"bi bi-file-earmark-medical\"></i> Certifications</h2>
                    <a href=\"";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 100, $this->source); })()), "certificate", [], "any", false, false, false, 100), "html", null, true);
            yield "\" target=\"_blank\" class=\"certificate-link\">
                        <i class=\"bi bi-file-pdf\"></i> Voir le certificat
                    </a>
                </div>
                ";
        }
        // line 105
        yield "                
                <div class=\"content-card\">
                    <h2><i class=\"bi bi-calendar-check\"></i> Disponibilités</h2>
                    <p class=\"info-text\">Prenez rendez-vous pour consulter le Dr. ";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 108, $this->source); })()), "prenom", [], "any", false, false, false, 108), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 108, $this->source); })()), "nom", [], "any", false, false, false, 108), "html", null, true);
        yield "</p>
                    <a href=\"";
        // line 109
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\" class=\"btn-appointment\">
                        <i class=\"bi bi-calendar-plus\"></i> Prendre rendez-vous
                    </a>
                </div>
            </div>
        </div>
        
        <div class=\"profile-actions\">
            ";
        // line 117
        if ((($tmp = (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 117, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 118
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
            yield "\" class=\"btn-appointment me-3\">
                    <i class=\"bi bi-pencil\"></i> Modifier mon profil
                </a>
            ";
        }
        // line 122
        yield "            <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"btn-back\">
                <i class=\"bi bi-arrow-left\"></i> Retour au profil
            </a>
        </div>
    </div>
</main>

<style>
    .medecin-profile-main {
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
        padding: 0;
    }
    
    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: white;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .profile-cover {
        height: 200px;
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        position: relative;
    }
    
    .profile-cover::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");
    }
    
    .profile-info {
        display: flex;
        align-items: flex-end;
        padding: 0 40px 30px;
        margin-top: -80px;
        position: relative;
    }
    
    .profile-avatar {
        position: relative;
        margin-right: 30px;
    }
    
    .avatar-img, .avatar-placeholder {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        object-fit: cover;
    }
    
    .avatar-placeholder {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        font-weight: 700;
    }
    
    .verification-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .verification-badge .verified {
        color: #10b981;
        font-size: 1.5rem;
    }
    
    .verification-badge .not-verified {
        color: #f59e0b;
        font-size: 1.5rem;
    }
    
    .profile-name {
        padding-bottom: 10px;
    }
    
    .profile-name h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 5px;
    }
    
    .profile-name .specialty {
        font-size: 1.1rem;
        color: #6b7280;
        margin-bottom: 10px;
    }
    
    .badge-verified {
        display: inline-block;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .badge-pending {
        display: inline-block;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .profile-content {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 30px;
        padding: 30px 40px;
    }
    
    .profile-sidebar .info-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .profile-sidebar .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    .profile-sidebar .info-card h3 {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .profile-sidebar .info-card h3 i {
        color: #10b981;
    }
    
    .profile-sidebar .info-card p {
        color: #1f2937;
        font-size: 1rem;
        margin: 0;
    }
    
    .profile-sidebar .info-card .price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #10b981;
    }
    
    .profile-main-content .content-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    }
    
    .profile-main-content .content-card h2 {
        font-size: 1.3rem;
        color: #1f2937;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .profile-main-content .content-card h2 i {
        color: #10b981;
    }
    
    .profile-main-content .content-card p {
        color: #4b5563;
        line-height: 1.7;
    }
    
    .profile-main-content .content-card .info-text {
        margin-bottom: 20px;
    }
    
    .btn-appointment {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .btn-appointment:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }
    
    .certificate-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #10b981;
        text-decoration: none;
        font-weight: 500;
    }
    
    .certificate-link:hover {
        text-decoration: underline;
    }
    
    .profile-actions {
        padding: 20px 40px 40px;
    }
    
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #6b7280;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .btn-back:hover {
        color: #10b981;
    }
    
    @media (max-width: 768px) {
        .profile-info {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 20px 30px;
        }
        
        .profile-avatar {
            margin-right: 0;
            margin-top: -80px;
        }
        
        .profile-content {
            grid-template-columns: 1fr;
            padding: 20px;
        }
        
        .profile-name h1 {
            font-size: 1.5rem;
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
        return "frontend/medecin_profile.html.twig";
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
        return array (  365 => 122,  357 => 118,  355 => 117,  344 => 109,  338 => 108,  333 => 105,  325 => 100,  321 => 98,  319 => 97,  316 => 96,  310 => 93,  306 => 91,  304 => 90,  299 => 87,  293 => 84,  289 => 82,  287 => 81,  284 => 80,  278 => 77,  274 => 75,  272 => 74,  269 => 73,  263 => 70,  259 => 68,  257 => 67,  254 => 66,  250 => 64,  242 => 62,  240 => 61,  236 => 60,  232 => 58,  230 => 57,  224 => 54,  218 => 50,  215 => 49,  212 => 48,  209 => 47,  206 => 46,  204 => 45,  197 => 40,  193 => 38,  189 => 36,  187 => 35,  183 => 34,  177 => 33,  172 => 30,  168 => 28,  164 => 26,  162 => 25,  159 => 24,  152 => 21,  149 => 20,  139 => 18,  137 => 17,  129 => 11,  116 => 10,  93 => 8,  70 => 6,  59 => 1,  57 => 4,  55 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% set show_header = false %}
{% set show_footer = false %}

{% block title %}Profil Médecin - Medicare{% endblock %}

{% block body_class %}medecin-profile-page{% endblock %}

{% block body %}
<main class=\"main medecin-profile-main\">
    <div class=\"profile-container\">
        <div class=\"profile-header\">
            <div class=\"profile-cover\"></div>
            <div class=\"profile-info\">
                <div class=\"profile-avatar\">
                    {% if medecin.photo %}
                        <img src=\"{{ medecin.photo }}\" alt=\"{{ medecin.prenom }} {{ medecin.nom }}\" class=\"avatar-img\">
                    {% else %}
                        <div class=\"avatar-placeholder\">
                            <span>{{ medecin.prenom|first|upper }}{{ medecin.nom|first|upper }}</span>
                        </div>
                    {% endif %}
                    <div class=\"verification-badge\">
                        {% if medecin.isVerified %}
                            <i class=\"bi bi-patch-check-fill verified\"></i>
                        {% else %}
                            <i class=\"bi bi-exclamation-circle not-verified\"></i>
                        {% endif %}
                    </div>
                </div>
                <div class=\"profile-name\">
                    <h1>Dr. {{ medecin.prenom }} {{ medecin.nom }}</h1>
                    <p class=\"specialty\">{{ medecin.specialite }}</p>
                    {% if medecin.isVerified %}
                        <span class=\"badge-verified\">Médecin vérifié</span>
                    {% else %}
                        <span class=\"badge-pending\">En attente de vérification</span>
                    {% endif %}
                </div>
            </div>
        </div>

        <div class=\"profile-content\">
            {% set is_owner = app.user and app.user.id == medecin.id %}
            {% set viewer_is_doctor = is_granted('ROLE_MEDECIN') %}
            {% set can_see_address = medecin.addressPrivacy == 'public' or is_owner or (medecin.addressPrivacy == 'doctors' and viewer_is_doctor) %}
            {% set can_see_phone   = medecin.phonePrivacy   == 'public' or is_owner or (medecin.phonePrivacy   == 'doctors' and viewer_is_doctor) %}
            {% set can_see_email   = medecin.emailPrivacy   == 'public' or is_owner or (medecin.emailPrivacy   == 'doctors' and viewer_is_doctor) %}

            <div class=\"profile-sidebar\">
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-hospital\"></i> Cabinet</h3>
                    <p>{{ medecin.cabinet }}</p>
                </div>
                
                {% if medecin.adresse and can_see_address %}
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-geo-alt\"></i> Adresse</h3>
                    <p>{{ medecin.adresse }}</p>
                    {% if medecin.ville %}
                        <p>{{ medecin.ville }}, {{ medecin.delegation }}</p>
                    {% endif %}
                </div>
                {% endif %}
                
                {% if medecin.numero and can_see_phone %}
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-telephone\"></i> Téléphone</h3>
                    <p>{{ medecin.numero }}</p>
                </div>
                {% endif %}
                
                {% if can_see_email %}
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-envelope\"></i> Email</h3>
                    <p>{{ medecin.email }}</p>
                </div>
                {% endif %}
                
                {% if medecin.prixConsultation %}
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-currency-euro\"></i> Consultation</h3>
                    <p class=\"price\">{{ medecin.prixConsultation }} €</p>
                </div>
                {% endif %}
            </div>
            
            <div class=\"profile-main-content\">
                {% if medecin.bio %}
                <div class=\"content-card\">
                    <h2><i class=\"bi bi-person-lines-fill\"></i> À propos</h2>
                    <p>{{ medecin.bio }}</p>
                </div>
                {% endif %}
                
                {% if medecin.certificate %}
                <div class=\"content-card\">
                    <h2><i class=\"bi bi-file-earmark-medical\"></i> Certifications</h2>
                    <a href=\"{{ medecin.certificate }}\" target=\"_blank\" class=\"certificate-link\">
                        <i class=\"bi bi-file-pdf\"></i> Voir le certificat
                    </a>
                </div>
                {% endif %}
                
                <div class=\"content-card\">
                    <h2><i class=\"bi bi-calendar-check\"></i> Disponibilités</h2>
                    <p class=\"info-text\">Prenez rendez-vous pour consulter le Dr. {{ medecin.prenom }} {{ medecin.nom }}</p>
                    <a href=\"{{ path('app_appointment') }}\" class=\"btn-appointment\">
                        <i class=\"bi bi-calendar-plus\"></i> Prendre rendez-vous
                    </a>
                </div>
            </div>
        </div>
        
        <div class=\"profile-actions\">
            {% if is_owner %}
                <a href=\"{{ path('app_profile_edit') }}\" class=\"btn-appointment me-3\">
                    <i class=\"bi bi-pencil\"></i> Modifier mon profil
                </a>
            {% endif %}
            <a href=\"{{ path('app_profile') }}\" class=\"btn-back\">
                <i class=\"bi bi-arrow-left\"></i> Retour au profil
            </a>
        </div>
    </div>
</main>

<style>
    .medecin-profile-main {
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
        padding: 0;
    }
    
    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: white;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .profile-cover {
        height: 200px;
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        position: relative;
    }
    
    .profile-cover::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");
    }
    
    .profile-info {
        display: flex;
        align-items: flex-end;
        padding: 0 40px 30px;
        margin-top: -80px;
        position: relative;
    }
    
    .profile-avatar {
        position: relative;
        margin-right: 30px;
    }
    
    .avatar-img, .avatar-placeholder {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        object-fit: cover;
    }
    
    .avatar-placeholder {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        font-weight: 700;
    }
    
    .verification-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .verification-badge .verified {
        color: #10b981;
        font-size: 1.5rem;
    }
    
    .verification-badge .not-verified {
        color: #f59e0b;
        font-size: 1.5rem;
    }
    
    .profile-name {
        padding-bottom: 10px;
    }
    
    .profile-name h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 5px;
    }
    
    .profile-name .specialty {
        font-size: 1.1rem;
        color: #6b7280;
        margin-bottom: 10px;
    }
    
    .badge-verified {
        display: inline-block;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .badge-pending {
        display: inline-block;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .profile-content {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 30px;
        padding: 30px 40px;
    }
    
    .profile-sidebar .info-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .profile-sidebar .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    .profile-sidebar .info-card h3 {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .profile-sidebar .info-card h3 i {
        color: #10b981;
    }
    
    .profile-sidebar .info-card p {
        color: #1f2937;
        font-size: 1rem;
        margin: 0;
    }
    
    .profile-sidebar .info-card .price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #10b981;
    }
    
    .profile-main-content .content-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    }
    
    .profile-main-content .content-card h2 {
        font-size: 1.3rem;
        color: #1f2937;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .profile-main-content .content-card h2 i {
        color: #10b981;
    }
    
    .profile-main-content .content-card p {
        color: #4b5563;
        line-height: 1.7;
    }
    
    .profile-main-content .content-card .info-text {
        margin-bottom: 20px;
    }
    
    .btn-appointment {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .btn-appointment:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }
    
    .certificate-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #10b981;
        text-decoration: none;
        font-weight: 500;
    }
    
    .certificate-link:hover {
        text-decoration: underline;
    }
    
    .profile-actions {
        padding: 20px 40px 40px;
    }
    
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #6b7280;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .btn-back:hover {
        color: #10b981;
    }
    
    @media (max-width: 768px) {
        .profile-info {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 20px 30px;
        }
        
        .profile-avatar {
            margin-right: 0;
            margin-top: -80px;
        }
        
        .profile-content {
            grid-template-columns: 1fr;
            padding: 20px;
        }
        
        .profile-name h1 {
            font-size: 1.5rem;
        }
    }
</style>
{% endblock %}
", "frontend/medecin_profile.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\medecin_profile.html.twig");
    }
}
