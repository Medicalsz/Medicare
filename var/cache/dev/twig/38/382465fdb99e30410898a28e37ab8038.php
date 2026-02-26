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

/* registration/medecin_register.html.twig */
class __TwigTemplate_60f2a3adf2ab252b7556145e74fbcac6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/medecin_register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/medecin_register.html.twig"));

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

        yield "Inscription Médecin - Medicare";
        
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

        yield "medecin-register-page";
        
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
        yield "<main class=\"main medecin-register-main\">
    <div class=\"medecin-register-container\">
        ";
        // line 13
        if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "flashes", ["success"], "method", false, false, false, 13)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "flashes", ["error"], "method", false, false, false, 13)) > 0))) {
            // line 14
            yield "        <div style=\"max-width: 700px; margin: 0 auto 1rem;\">
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "flashes", ["success"], "method", false, false, false, 15));
            foreach ($context['_seq'] as $context["_key"] => $context["flash_success"]) {
                // line 16
                yield "                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    ";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_success"], "html", null, true);
                yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['flash_success'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "flashes", ["error"], "method", false, false, false, 21));
            foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
                // line 22
                yield "                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    ";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
                yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            yield "        </div>
        ";
        }
        // line 29
        yield "        <div class=\"medecin-register-card\">
            <div class=\"register-header\">
                <div class=\"register-logo\">
                    <h1 class=\"sitename\">Medicare</h1>
                </div>
                <h2>Inscription Médecin</h2>
                <p>Complétez votre profil professionnel</p>
            </div>

            <div class=\"register-body\">
                ";
        // line 39
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 39, $this->source); })()), 'form_start', ["attr" => ["class" => "register-form", "enctype" => "multipart/form-data"]]);
        yield "
                
                ";
        // line 41
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 41, $this->source); })()), "vars", [], "any", false, false, false, 41), "errors", [], "any", false, false, false, 41)) > 0)) {
            // line 42
            yield "                    <div class=\"alert alert-danger\" role=\"alert\">
                        <i class=\"bi bi-exclamation-circle\"></i>
                        Veuillez corriger les erreurs ci-dessous
                    </div>
                ";
        }
        // line 47
        yield "
                ";
        // line 49
        yield "                <div class=\"form-section\">
                    <h3 class=\"section-title\">
                        <i class=\"bi bi-person-badge\"></i>
                        Informations Personnelles
                    </h3>
                    
                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 57, $this->source); })()), "nom", [], "any", false, false, false, 57), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom"]);
        yield "
                            ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 58, $this->source); })()), "nom", [], "any", false, false, false, 58), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                            ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 59, $this->source); })()), "nom", [], "any", false, false, false, 59), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 63, $this->source); })()), "prenom", [], "any", false, false, false, 63), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prénom"]);
        yield "
                            ";
        // line 64
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 64, $this->source); })()), "prenom", [], "any", false, false, false, 64), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                            ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 65, $this->source); })()), "prenom", [], "any", false, false, false, 65), 'errors');
        yield "
                        </div>
                    </div>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 71, $this->source); })()), "email", [], "any", false, false, false, 71), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Email"]);
        yield "
                            ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 72, $this->source); })()), "email", [], "any", false, false, false, 72), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                            ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 73, $this->source); })()), "email", [], "any", false, false, false, 73), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 77, $this->source); })()), "numero", [], "any", false, false, false, 77), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Téléphone"]);
        yield "
                            ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 78, $this->source); })()), "numero", [], "any", false, false, false, 78), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                            ";
        // line 79
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 79, $this->source); })()), "numero", [], "any", false, false, false, 79), 'errors');
        yield "
                        </div>
                    </div>
                </div>

                ";
        // line 85
        yield "                <div class=\"form-section\">
                    <h3 class=\"section-title\">
                        <i class=\"bi bi-briefcase-medical\"></i>
                        Informations Professionnelles
                    </h3>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 93, $this->source); })()), "specialite", [], "any", false, false, false, 93), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Spécialité"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-clipboard-pulse\"></i>
                                ";
        // line 96
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 96, $this->source); })()), "specialite", [], "any", false, false, false, 96), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                            </div>
                            ";
        // line 98
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 98, $this->source); })()), "specialite", [], "any", false, false, false, 98), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 102
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 102, $this->source); })()), "ville", [], "any", false, false, false, 102), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Ville"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-geo-alt\"></i>
                                ";
        // line 105
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 105, $this->source); })()), "ville", [], "any", false, false, false, 105), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                            </div>
                            ";
        // line 107
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 107, $this->source); })()), "ville", [], "any", false, false, false, 107), 'errors');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 112, $this->source); })()), "cabinet", [], "any", false, false, false, 112), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom du cabinet"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-building\"></i>
                            ";
        // line 115
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 115, $this->source); })()), "cabinet", [], "any", false, false, false, 115), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Nom de votre cabinet ou clinique"]]);
        yield "
                        </div>
                        ";
        // line 117
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 117, $this->source); })()), "cabinet", [], "any", false, false, false, 117), 'errors');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 121
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 121, $this->source); })()), "adresse", [], "any", false, false, false, 121), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Adresse du cabinet"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-geo-alt\"></i>
                            ";
        // line 124
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 124, $this->source); })()), "adresse", [], "any", false, false, false, 124), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Adresse complète du cabinet", "rows" => 2]]);
        yield "
                        </div>
                        ";
        // line 126
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 126, $this->source); })()), "adresse", [], "any", false, false, false, 126), 'errors');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 130
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 130, $this->source); })()), "prixConsultation", [], "any", false, false, false, 130), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prix de consultation (DT)"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-currency-dollar\"></i>
                            ";
        // line 133
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 133, $this->source); })()), "prixConsultation", [], "any", false, false, false, 133), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "0.000", "step" => "0.001"]]);
        yield "
                        </div>
                        ";
        // line 135
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 135, $this->source); })()), "prixConsultation", [], "any", false, false, false, 135), 'errors');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 139
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 139, $this->source); })()), "bio", [], "any", false, false, false, 139), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Biographie / Présentation"]);
        yield "
                        ";
        // line 140
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 140, $this->source); })()), "bio", [], "any", false, false, false, 140), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Présentez-vous et votre parcours professionnel", "rows" => 4]]);
        yield "
                        ";
        // line 141
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 141, $this->source); })()), "bio", [], "any", false, false, false, 141), 'errors');
        yield "
                    </div>
                </div>

                ";
        // line 146
        yield "                <div class=\"form-section\">
                    <h3 class=\"section-title\">
                        <i class=\"bi bi-camera\"></i>
                        Photos
                    </h3>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 154
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 154, $this->source); })()), "photo", [], "any", false, false, false, 154), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Photo de profil"]);
        yield "
                            <div class=\"file-upload-wrapper\" id=\"photoUpload\">
                                ";
        // line 156
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 156, $this->source); })()), "photo", [], "any", false, false, false, 156), 'widget', ["attr" => ["class" => "file-input", "accept" => "image/*", "data-preview" => "photoPreview"]]);
        yield "
                                <div class=\"file-upload-area\">
                                    <i class=\"bi bi-cloud-upload\"></i>
                                    <p>Glissez-déposez une image ou <span>parcourir</span></p>
                                    <small>JPEG, PNG ou WebP (max 5MB)</small>
                                </div>
                                <img id=\"photoPreview\" class=\"image-preview\" alt=\"Aperçu\">
                            </div>
                            ";
        // line 164
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 164, $this->source); })()), "photo", [], "any", false, false, false, 164), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 168
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 168, $this->source); })()), "certificate", [], "any", false, false, false, 168), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Certificat médical *"]);
        yield "
                            <div class=\"file-upload-wrapper\" id=\"certificateUpload\">
                                ";
        // line 170
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 170, $this->source); })()), "certificate", [], "any", false, false, false, 170), 'widget', ["attr" => ["class" => "file-input", "accept" => "image/*,.pdf", "data-preview" => "certificatePreview"]]);
        yield "
                                <div class=\"file-upload-area\">
                                    <i class=\"bi bi-file-earmark-pdf\"></i>
                                    <p>Glissez-déposez un fichier ou <span>parcourir</span></p>
                                    <small>Image ou PDF (max 10MB)</small>
                                </div>
                                <img id=\"certificatePreview\" class=\"image-preview\" alt=\"Aperçu\">
                            </div>
                            ";
        // line 178
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 178, $this->source); })()), "certificate", [], "any", false, false, false, 178), 'errors');
        yield "
                        </div>
                    </div>
                </div>

                <button type=\"submit\" class=\"btn btn-primary btn-register\">
                    <i class=\"bi bi-check-circle\"></i>
                    Soumettre ma demande
                </button>

                ";
        // line 189
        yield "                ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 189, $this->source); })()), "_token", [], "any", false, false, false, 189), 'widget');
        yield "
                ";
        // line 190
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 190, $this->source); })()), 'form_end', ["render_rest" => false]);
        yield "
            </div>
        </div>
    </div>
</main>

<style>
.medecin-register-main {
    min-height: 100vh;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    padding: 2rem;
}

.medecin-register-container {
    width: 100%;
    max-width: 700px;
}

.medecin-register-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.register-header {
    background: #fff;
    color: #1f2937;
    padding: 2.5rem 2rem 2rem;
    text-align: center;
}

.register-logo .sitename {
    font-size: 1.75rem;
    font-weight: 700;
    color: #10b981;
    margin: 0 0 0.5rem;
}

.register-header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 0.5rem;
}

.register-header p {
    color: #6b7280;
    margin: 0;
}

.register-body {
    padding: 2rem;
}

.register-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-section {
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 1.5rem;
}

.form-section:last-of-type {
    border-bottom: none;
    padding-bottom: 0;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 1.25rem;
}

.section-title i {
    color: #10b981;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

@media (max-width: 576px) {
    .form-row {
        grid-template-columns: 1fr;
    }
}

.form-group {
    margin-bottom: 1rem;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-control,
.form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.95rem;
    color: #1f2937;
    background-color: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.form-control:focus,
.form-select:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
}

.form-control:read-only {
    background-color: #f9fafb;
    cursor: not-allowed;
}

.input-wrapper {
    position: relative;
}

.input-wrapper i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    pointer-events: none;
}

.input-wrapper .form-control,
.input-wrapper .form-select {
    padding-left: 2.75rem;
}

.alert {
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.alert-danger {
    background-color: #fef2f2;
    color: #dc2626;
    border: 1px solid #fee2e2;
}

.btn-register {
    width: 100%;
    padding: 1rem;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 10px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
}

.file-upload-wrapper {
    position: relative;
}

.file-upload-area {
    border: 2px dashed #e5e7eb;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 2;
}

.file-upload-area i {
    font-size: 2.5rem;
    color: #9ca3af;
    margin-bottom: 0.5rem;
}

.file-upload-area p {
    margin: 0;
    color: #4b5563;
    font-size: 0.95rem;
}

.file-upload-area p span {
    color: #10b981;
    font-weight: 600;
}

.file-upload-area small {
    color: #9ca3af;
    font-size: 0.8rem;
}

.image-preview {
    display: none;
    width: 100%;
    max-height: 150px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 1rem;
}

.image-preview[style*=\"block\"] {
    display: block;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload preview functionality
    const fileInputs = document.querySelectorAll('.file-input');
    
    fileInputs.forEach(input => {
        const wrapper = input.closest('.file-upload-wrapper');
        const preview = wrapper.querySelector('.image-preview');
        
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Show preview
                if (preview && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
                
                // Update upload area text
                const uploadArea = wrapper.querySelector('.file-upload-area p');
                if (uploadArea) {
                    uploadArea.innerHTML = `Fichier sélectionné: <span>\${file.name}</span>`;
                }
            }
        });
    });
});
</script>
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
        return "registration/medecin_register.html.twig";
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
        return array (  462 => 190,  457 => 189,  444 => 178,  433 => 170,  428 => 168,  421 => 164,  410 => 156,  405 => 154,  395 => 146,  388 => 141,  384 => 140,  380 => 139,  373 => 135,  368 => 133,  362 => 130,  355 => 126,  350 => 124,  344 => 121,  337 => 117,  332 => 115,  326 => 112,  318 => 107,  313 => 105,  307 => 102,  300 => 98,  295 => 96,  289 => 93,  279 => 85,  271 => 79,  267 => 78,  263 => 77,  256 => 73,  252 => 72,  248 => 71,  239 => 65,  235 => 64,  231 => 63,  224 => 59,  220 => 58,  216 => 57,  206 => 49,  203 => 47,  196 => 42,  194 => 41,  189 => 39,  177 => 29,  173 => 27,  163 => 23,  160 => 22,  155 => 21,  145 => 17,  142 => 16,  138 => 15,  135 => 14,  133 => 13,  129 => 11,  116 => 10,  93 => 8,  70 => 6,  59 => 1,  57 => 4,  55 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% set show_header = false %}
{% set show_footer = false %}

{% block title %}Inscription Médecin - Medicare{% endblock %}

{% block body_class %}medecin-register-page{% endblock %}

{% block body %}
<main class=\"main medecin-register-main\">
    <div class=\"medecin-register-container\">
        {% if app.flashes('success')|length > 0 or app.flashes('error')|length > 0 %}
        <div style=\"max-width: 700px; margin: 0 auto 1rem;\">
            {% for flash_success in app.flashes('success') %}
                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    {{ flash_success }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
            {% endfor %}
            {% for flash_error in app.flashes('error') %}
                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    {{ flash_error }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
            {% endfor %}
        </div>
        {% endif %}
        <div class=\"medecin-register-card\">
            <div class=\"register-header\">
                <div class=\"register-logo\">
                    <h1 class=\"sitename\">Medicare</h1>
                </div>
                <h2>Inscription Médecin</h2>
                <p>Complétez votre profil professionnel</p>
            </div>

            <div class=\"register-body\">
                {{ form_start(registrationForm, {'attr': {'class': 'register-form', 'enctype': 'multipart/form-data'}}) }}
                
                {% if registrationForm.vars.errors|length > 0 %}
                    <div class=\"alert alert-danger\" role=\"alert\">
                        <i class=\"bi bi-exclamation-circle\"></i>
                        Veuillez corriger les erreurs ci-dessous
                    </div>
                {% endif %}

                {# Personal Information #}
                <div class=\"form-section\">
                    <h3 class=\"section-title\">
                        <i class=\"bi bi-person-badge\"></i>
                        Informations Personnelles
                    </h3>
                    
                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            {{ form_label(registrationForm.nom, 'Nom', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.nom, {'attr': {'class': 'form-control', 'readonly': true}}) }}
                            {{ form_errors(registrationForm.nom) }}
                        </div>

                        <div class=\"form-group\">
                            {{ form_label(registrationForm.prenom, 'Prénom', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.prenom, {'attr': {'class': 'form-control', 'readonly': true}}) }}
                            {{ form_errors(registrationForm.prenom) }}
                        </div>
                    </div>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            {{ form_label(registrationForm.email, 'Email', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.email, {'attr': {'class': 'form-control', 'readonly': true}}) }}
                            {{ form_errors(registrationForm.email) }}
                        </div>

                        <div class=\"form-group\">
                            {{ form_label(registrationForm.numero, 'Téléphone', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.numero, {'attr': {'class': 'form-control', 'readonly': true}}) }}
                            {{ form_errors(registrationForm.numero) }}
                        </div>
                    </div>
                </div>

                {# Professional Information #}
                <div class=\"form-section\">
                    <h3 class=\"section-title\">
                        <i class=\"bi bi-briefcase-medical\"></i>
                        Informations Professionnelles
                    </h3>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            {{ form_label(registrationForm.specialite, 'Spécialité', {'label_attr': {'class': 'form-label'}}) }}
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-clipboard-pulse\"></i>
                                {{ form_widget(registrationForm.specialite, {'attr': {'class': 'form-select'}}) }}
                            </div>
                            {{ form_errors(registrationForm.specialite) }}
                        </div>

                        <div class=\"form-group\">
                            {{ form_label(registrationForm.ville, 'Ville', {'label_attr': {'class': 'form-label'}}) }}
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-geo-alt\"></i>
                                {{ form_widget(registrationForm.ville, {'attr': {'class': 'form-select'}}) }}
                            </div>
                            {{ form_errors(registrationForm.ville) }}
                        </div>
                    </div>

                    <div class=\"form-group\">
                        {{ form_label(registrationForm.cabinet, 'Nom du cabinet', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-building\"></i>
                            {{ form_widget(registrationForm.cabinet, {'attr': {'class': 'form-control', 'placeholder': 'Nom de votre cabinet ou clinique'}}) }}
                        </div>
                        {{ form_errors(registrationForm.cabinet) }}
                    </div>

                    <div class=\"form-group\">
                        {{ form_label(registrationForm.adresse, 'Adresse du cabinet', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-geo-alt\"></i>
                            {{ form_widget(registrationForm.adresse, {'attr': {'class': 'form-control', 'placeholder': 'Adresse complète du cabinet', 'rows': 2}}) }}
                        </div>
                        {{ form_errors(registrationForm.adresse) }}
                    </div>

                    <div class=\"form-group\">
                        {{ form_label(registrationForm.prixConsultation, 'Prix de consultation (DT)', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-currency-dollar\"></i>
                            {{ form_widget(registrationForm.prixConsultation, {'attr': {'class': 'form-control', 'placeholder': '0.000', 'step': '0.001'}}) }}
                        </div>
                        {{ form_errors(registrationForm.prixConsultation) }}
                    </div>

                    <div class=\"form-group\">
                        {{ form_label(registrationForm.bio, 'Biographie / Présentation', {'label_attr': {'class': 'form-label'}}) }}
                        {{ form_widget(registrationForm.bio, {'attr': {'class': 'form-control', 'placeholder': 'Présentez-vous et votre parcours professionnel', 'rows': 4}}) }}
                        {{ form_errors(registrationForm.bio) }}
                    </div>
                </div>

                {# Photos #}
                <div class=\"form-section\">
                    <h3 class=\"section-title\">
                        <i class=\"bi bi-camera\"></i>
                        Photos
                    </h3>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            {{ form_label(registrationForm.photo, 'Photo de profil', {'label_attr': {'class': 'form-label'}}) }}
                            <div class=\"file-upload-wrapper\" id=\"photoUpload\">
                                {{ form_widget(registrationForm.photo, {'attr': {'class': 'file-input', 'accept': 'image/*', 'data-preview': 'photoPreview'}}) }}
                                <div class=\"file-upload-area\">
                                    <i class=\"bi bi-cloud-upload\"></i>
                                    <p>Glissez-déposez une image ou <span>parcourir</span></p>
                                    <small>JPEG, PNG ou WebP (max 5MB)</small>
                                </div>
                                <img id=\"photoPreview\" class=\"image-preview\" alt=\"Aperçu\">
                            </div>
                            {{ form_errors(registrationForm.photo) }}
                        </div>

                        <div class=\"form-group\">
                            {{ form_label(registrationForm.certificate, 'Certificat médical *', {'label_attr': {'class': 'form-label'}}) }}
                            <div class=\"file-upload-wrapper\" id=\"certificateUpload\">
                                {{ form_widget(registrationForm.certificate, {'attr': {'class': 'file-input', 'accept': 'image/*,.pdf', 'data-preview': 'certificatePreview'}}) }}
                                <div class=\"file-upload-area\">
                                    <i class=\"bi bi-file-earmark-pdf\"></i>
                                    <p>Glissez-déposez un fichier ou <span>parcourir</span></p>
                                    <small>Image ou PDF (max 10MB)</small>
                                </div>
                                <img id=\"certificatePreview\" class=\"image-preview\" alt=\"Aperçu\">
                            </div>
                            {{ form_errors(registrationForm.certificate) }}
                        </div>
                    </div>
                </div>

                <button type=\"submit\" class=\"btn btn-primary btn-register\">
                    <i class=\"bi bi-check-circle\"></i>
                    Soumettre ma demande
                </button>

                {# Render hidden fields and CSRF token manually #}
                {{ form_widget(registrationForm._token) }}
                {{ form_end(registrationForm, {'render_rest': false}) }}
            </div>
        </div>
    </div>
</main>

<style>
.medecin-register-main {
    min-height: 100vh;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    padding: 2rem;
}

.medecin-register-container {
    width: 100%;
    max-width: 700px;
}

.medecin-register-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.register-header {
    background: #fff;
    color: #1f2937;
    padding: 2.5rem 2rem 2rem;
    text-align: center;
}

.register-logo .sitename {
    font-size: 1.75rem;
    font-weight: 700;
    color: #10b981;
    margin: 0 0 0.5rem;
}

.register-header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 0.5rem;
}

.register-header p {
    color: #6b7280;
    margin: 0;
}

.register-body {
    padding: 2rem;
}

.register-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-section {
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 1.5rem;
}

.form-section:last-of-type {
    border-bottom: none;
    padding-bottom: 0;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 1.25rem;
}

.section-title i {
    color: #10b981;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

@media (max-width: 576px) {
    .form-row {
        grid-template-columns: 1fr;
    }
}

.form-group {
    margin-bottom: 1rem;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-control,
.form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.95rem;
    color: #1f2937;
    background-color: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.form-control:focus,
.form-select:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
}

.form-control:read-only {
    background-color: #f9fafb;
    cursor: not-allowed;
}

.input-wrapper {
    position: relative;
}

.input-wrapper i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    pointer-events: none;
}

.input-wrapper .form-control,
.input-wrapper .form-select {
    padding-left: 2.75rem;
}

.alert {
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.alert-danger {
    background-color: #fef2f2;
    color: #dc2626;
    border: 1px solid #fee2e2;
}

.btn-register {
    width: 100%;
    padding: 1rem;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 10px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
}

.file-upload-wrapper {
    position: relative;
}

.file-upload-area {
    border: 2px dashed #e5e7eb;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 2;
}

.file-upload-area i {
    font-size: 2.5rem;
    color: #9ca3af;
    margin-bottom: 0.5rem;
}

.file-upload-area p {
    margin: 0;
    color: #4b5563;
    font-size: 0.95rem;
}

.file-upload-area p span {
    color: #10b981;
    font-weight: 600;
}

.file-upload-area small {
    color: #9ca3af;
    font-size: 0.8rem;
}

.image-preview {
    display: none;
    width: 100%;
    max-height: 150px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 1rem;
}

.image-preview[style*=\"block\"] {
    display: block;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload preview functionality
    const fileInputs = document.querySelectorAll('.file-input');
    
    fileInputs.forEach(input => {
        const wrapper = input.closest('.file-upload-wrapper');
        const preview = wrapper.querySelector('.image-preview');
        
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Show preview
                if (preview && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
                
                // Update upload area text
                const uploadArea = wrapper.querySelector('.file-upload-area p');
                if (uploadArea) {
                    uploadArea.innerHTML = `Fichier sélectionné: <span>\${file.name}</span>`;
                }
            }
        });
    });
});
</script>
{% endblock %}
", "registration/medecin_register.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\registration\\medecin_register.html.twig");
    }
}
