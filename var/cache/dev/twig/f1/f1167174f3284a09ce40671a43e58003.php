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
            <div class=\"profile-sidebar\">
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-hospital\"></i> Cabinet</h3>
                    <p>";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 48, $this->source); })()), "cabinet", [], "any", false, false, false, 48), "html", null, true);
        yield "</p>
                </div>
                
                ";
        // line 51
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 51, $this->source); })()), "adresse", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 52
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-geo-alt\"></i> Adresse</h3>
                    <p>";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 54, $this->source); })()), "adresse", [], "any", false, false, false, 54), "html", null, true);
            yield "</p>
                    ";
            // line 55
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 55, $this->source); })()), "ville", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                yield "                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 56, $this->source); })()), "ville", [], "any", false, false, false, 56), "html", null, true);
                yield ", ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 56, $this->source); })()), "delegation", [], "any", false, false, false, 56), "html", null, true);
                yield "</p>
                    ";
            }
            // line 58
            yield "                </div>
                ";
        }
        // line 60
        yield "                
                ";
        // line 61
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 61, $this->source); })()), "numero", [], "any", false, false, false, 61)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 62
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-telephone\"></i> Téléphone</h3>
                    <p>";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 64, $this->source); })()), "numero", [], "any", false, false, false, 64), "html", null, true);
            yield "</p>
                </div>
                ";
        }
        // line 67
        yield "                
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-envelope\"></i> Email</h3>
                    <p>";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 70, $this->source); })()), "email", [], "any", false, false, false, 70), "html", null, true);
        yield "</p>
                </div>
                
                ";
        // line 73
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 73, $this->source); })()), "prixConsultation", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 74
            yield "                <div class=\"info-card\">
                    <h3><i class=\"bi bi-currency-euro\"></i> Consultation</h3>
                    <p class=\"price\">";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 76, $this->source); })()), "prixConsultation", [], "any", false, false, false, 76), "html", null, true);
            yield " €</p>
                </div>
                ";
        }
        // line 79
        yield "            </div>
            
            <div class=\"profile-main-content\">
                ";
        // line 82
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 82, $this->source); })()), "bio", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 83
            yield "                <div class=\"content-card\">
                    <h2><i class=\"bi bi-person-lines-fill\"></i> À propos</h2>
                    <p>";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 85, $this->source); })()), "bio", [], "any", false, false, false, 85), "html", null, true);
            yield "</p>
                </div>
                ";
        }
        // line 88
        yield "                
                ";
        // line 89
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 89, $this->source); })()), "certificate", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 90
            yield "                <div class=\"content-card\">
                    <h2><i class=\"bi bi-file-earmark-medical\"></i> Certifications</h2>
                    <a href=\"";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 92, $this->source); })()), "certificate", [], "any", false, false, false, 92), "html", null, true);
            yield "\" target=\"_blank\" class=\"certificate-link\">
                        <i class=\"bi bi-file-pdf\"></i> Voir le certificat
                    </a>
                </div>
                ";
        }
        // line 97
        yield "                
                <div class=\"content-card\">
                    <h2><i class=\"bi bi-calendar-check\"></i> Disponibilités</h2>
                    <p class=\"info-text\">Prenez rendez-vous pour consulter le Dr. ";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 100, $this->source); })()), "prenom", [], "any", false, false, false, 100), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 100, $this->source); })()), "nom", [], "any", false, false, false, 100), "html", null, true);
        yield "</p>
                    <a href=\"";
        // line 101
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\" class=\"btn-appointment\">
                        <i class=\"bi bi-calendar-plus\"></i> Prendre rendez-vous
                    </a>
                </div>
            </div>
        </div>
        
        <div class=\"profile-actions\">
            <a href=\"";
        // line 109
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
        return array (  331 => 109,  320 => 101,  314 => 100,  309 => 97,  301 => 92,  297 => 90,  295 => 89,  292 => 88,  286 => 85,  282 => 83,  280 => 82,  275 => 79,  269 => 76,  265 => 74,  263 => 73,  257 => 70,  252 => 67,  246 => 64,  242 => 62,  240 => 61,  237 => 60,  233 => 58,  225 => 56,  223 => 55,  219 => 54,  215 => 52,  213 => 51,  207 => 48,  197 => 40,  193 => 38,  189 => 36,  187 => 35,  183 => 34,  177 => 33,  172 => 30,  168 => 28,  164 => 26,  162 => 25,  159 => 24,  152 => 21,  149 => 20,  139 => 18,  137 => 17,  129 => 11,  116 => 10,  93 => 8,  70 => 6,  59 => 1,  57 => 4,  55 => 3,  42 => 1,);
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
            <div class=\"profile-sidebar\">
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-hospital\"></i> Cabinet</h3>
                    <p>{{ medecin.cabinet }}</p>
                </div>
                
                {% if medecin.adresse %}
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-geo-alt\"></i> Adresse</h3>
                    <p>{{ medecin.adresse }}</p>
                    {% if medecin.ville %}
                        <p>{{ medecin.ville }}, {{ medecin.delegation }}</p>
                    {% endif %}
                </div>
                {% endif %}
                
                {% if medecin.numero %}
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-telephone\"></i> Téléphone</h3>
                    <p>{{ medecin.numero }}</p>
                </div>
                {% endif %}
                
                <div class=\"info-card\">
                    <h3><i class=\"bi bi-envelope\"></i> Email</h3>
                    <p>{{ medecin.email }}</p>
                </div>
                
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
", "frontend/medecin_profile.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\medecin_profile.html.twig");
    }
}
