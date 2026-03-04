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

/* registration/register.html.twig */
class __TwigTemplate_9a7a1ae0e268a3e2e8bfc52d43f3d173 extends Template
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
            'footer' => [$this, 'block_footer'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

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

        yield "Register - Medicare";
        
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

        yield "register-page";
        
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
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

        // line 12
        yield "<main class=\"main register-main\">
    <div class=\"register-container\">
        <div class=\"register-card\">
            <div class=\"register-header\">
                <div class=\"register-logo\">
                    <h1 class=\"sitename\">Medicare</h1>
                </div>
                <h2>Create Account</h2>
                <p>Join us to manage your healthcare</p>
            </div>

            <div class=\"register-body\">
                ";
        // line 24
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 24, $this->source); })()), 'form_start', ["attr" => ["class" => "register-form"]]);
        yield "
                
                ";
        // line 26
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 26, $this->source); })()), "vars", [], "any", false, false, false, 26), "errors", [], "any", false, false, false, 26)) > 0)) {
            // line 27
            yield "                    <div class=\"alert alert-danger\" role=\"alert\">
                        <i class=\"bi bi-exclamation-circle\"></i>
                        Please check the form below for errors
                    </div>
                ";
        }
        // line 32
        yield "
                <div class=\"form-row\">
                    <div class=\"form-group\">
                        ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 35, $this->source); })()), "nom", [], "any", false, false, false, 35), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-person\"></i>
                            ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 38, $this->source); })()), "nom", [], "any", false, false, false, 38), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre nom", "autofocus" => true]]);
        yield "
                        </div>
                        ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 40, $this->source); })()), "nom", [], "any", false, false, false, 40), 'errors');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 44, $this->source); })()), "prenom", [], "any", false, false, false, 44), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prénom"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-person-badge\"></i>
                            ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 47, $this->source); })()), "prenom", [], "any", false, false, false, 47), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre prénom"]]);
        yield "
                        </div>
                        ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 49, $this->source); })()), "prenom", [], "any", false, false, false, 49), 'errors');
        yield "
                    </div>
                </div>

                <div class=\"form-group\">
                    ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 54, $this->source); })()), "username", [], "any", false, false, false, 54), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom d'utilisateur"]);
        yield "
                    <div class=\"input-wrapper\">
                        <i class=\"bi bi-at\"></i>
                        ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 57, $this->source); })()), "username", [], "any", false, false, false, 57), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre pseudo"]]);
        yield "
                    </div>
                    ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 59, $this->source); })()), "username", [], "any", false, false, false, 59), 'errors');
        yield "
                </div>

                <div class=\"form-group\">
                    ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 63, $this->source); })()), "email", [], "any", false, false, false, 63), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Email"]);
        yield "
                    <div class=\"input-wrapper\">
                        <i class=\"bi bi-envelope\"></i>
                        ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 66, $this->source); })()), "email", [], "any", false, false, false, 66), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "votre.email@exemple.com"]]);
        yield "
                    </div>
                    ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 68, $this->source); })()), "email", [], "any", false, false, false, 68), 'errors');
        yield "
                </div>

                <div class=\"form-row\">
                    <div class=\"form-group\">
                        ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 73, $this->source); })()), "numero", [], "any", false, false, false, 73), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Téléphone"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-phone\"></i>
                            ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 76, $this->source); })()), "numero", [], "any", false, false, false, 76), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "+216 XX XXX XXX"]]);
        yield "
                        </div>
                        ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 78, $this->source); })()), "numero", [], "any", false, false, false, 78), 'errors');
        yield "
                    </div>
                </div>

                <div class=\"form-group\">
                    ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 83, $this->source); })()), "adresse", [], "any", false, false, false, 83), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Adresse"]);
        yield "
                    <div class=\"input-wrapper\">
                        <i class=\"bi bi-geo-alt\"></i>
                        ";
        // line 86
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 86, $this->source); })()), "adresse", [], "any", false, false, false, 86), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre adresse complète", "rows" => 2]]);
        yield "
                    </div>
                    ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 88, $this->source); })()), "adresse", [], "any", false, false, false, 88), 'errors');
        yield "
                </div>

                <div class=\"form-row\">
                    <div class=\"form-group\">
                        ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 93, $this->source); })()), "plainPassword", [], "any", false, false, false, 93), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Mot de passe"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-lock\"></i>
                            ";
        // line 96
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 96, $this->source); })()), "plainPassword", [], "any", false, false, false, 96), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Au moins 6 caractères", "autocomplete" => "new-password"]]);
        yield "
                        </div>
                        ";
        // line 98
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 98, $this->source); })()), "plainPassword", [], "any", false, false, false, 98), 'errors');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 102
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 102, $this->source); })()), "confirmPassword", [], "any", false, false, false, 102), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Confirmer"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-lock-fill\"></i>
                            ";
        // line 105
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 105, $this->source); })()), "confirmPassword", [], "any", false, false, false, 105), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Confirmez", "autocomplete" => "new-password"]]);
        yield "
                        </div>
                        ";
        // line 107
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 107, $this->source); })()), "confirmPassword", [], "any", false, false, false, 107), 'errors');
        yield "
                    </div>
                </div>

                <div class=\"form-group form-check medicin-check\">
                    ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 112, $this->source); })()), "isMedecin", [], "any", false, false, false, 112), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                    ";
        // line 113
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 113, $this->source); })()), "isMedecin", [], "any", false, false, false, 113), 'label', ["label_attr" => ["class" => "form-check-label"], "label" => "Je suis un médecin (demande de vérification requise)"]);
        yield "
                </div>

                <div class=\"form-group form-check\">
                    ";
        // line 117
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 117, $this->source); })()), "agreeTerms", [], "any", false, false, false, 117), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                    ";
        // line 118
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 118, $this->source); })()), "agreeTerms", [], "any", false, false, false, 118), 'label', ["label_attr" => ["class" => "form-check-label"], "label" => "J'accepte les conditions d'utilisation"]);
        yield "
                    ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 119, $this->source); })()), "agreeTerms", [], "any", false, false, false, 119), 'errors');
        yield "
                </div>

                <button type=\"submit\" class=\"btn btn-primary btn-register\">Create Account</button>

                ";
        // line 124
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 124, $this->source); })()), 'form_end');
        yield "

                <div class=\"register-footer\">
                    <p>Already have an account? <a href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.register-main {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    padding: 2rem;
}

.register-container {
    width: 100%;
    max-width: 550px;
}

.register-card {
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

.register-logo {
    margin-bottom: 1rem;
}

.register-logo .sitename {
    font-size: 2rem;
    font-weight: 700;
    color: #10b981;
    margin: 0;
}

.register-header h2 {
    font-size: 1.5rem;
    margin: 0 0 0.5rem 0;
    font-weight: 600;
    color: #1f2937;
}

.register-header p {
    margin: 0;
    color: #6b7280;
    font-size: 0.95rem;
}

.register-body {
    padding: 2rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-group {
    margin-bottom: 1.25rem;
}

.form-group label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    display: block;
}

.input-wrapper {
    position: relative;
}

.input-wrapper i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #10b981;
    font-size: 1.1rem;
}

.input-wrapper .form-control {
    padding-left: 2.8rem;
    height: 48px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.input-wrapper .form-control:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

textarea.form-control {
    padding-left: 2.8rem;
    padding-top: 0.75rem;
    height: auto;
    resize: vertical;
}

.form-check {
    margin-top: 1rem;
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
}

.form-check-input {
    margin-top: 0.2rem;
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #10b981;
}

.form-check-input:checked {
    background-color: #10b981;
    border-color: #10b981;
}

.medicin-check {
    background: #f0fdf4;
    padding: 1rem;
    border-radius: 8px;
    border: 1px solid #bbf7d0;
}

.medicin-check .form-check-label {
    color: #166534;
    font-weight: 500;
}

.form-check-label {
    font-size: 0.9rem;
    color: #6b7280;
    cursor: pointer;
}

.form-check-label a {
    color: #10b981;
    text-decoration: none;
}

.form-check-label a:hover {
    text-decoration: underline;
}

.btn-register {
    width: 100%;
    height: 50px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    color: white;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    margin-top: 1.5rem;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
}

.register-footer {
    text-align: center;
    margin-top: 1.5rem;
    color: #6b7280;
}

.register-footer a {
    color: #10b981;
    text-decoration: none;
    font-weight: 600;
}

.register-footer a:hover {
    text-decoration: underline;
}

.alert {
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
}

.alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #dc2626;
}

.form-error {
    color: #dc2626;
    font-size: 0.85rem;
    margin-top: 0.25rem;
    display: block;
}

@media (max-width: 576px) {
    .register-header {
        padding: 2rem 1.5rem 1.5rem;
    }
    
    .register-body {
        padding: 1.5rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
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
        return "registration/register.html.twig";
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
        return array (  385 => 127,  379 => 124,  371 => 119,  367 => 118,  363 => 117,  356 => 113,  352 => 112,  344 => 107,  339 => 105,  333 => 102,  326 => 98,  321 => 96,  315 => 93,  307 => 88,  302 => 86,  296 => 83,  288 => 78,  283 => 76,  277 => 73,  269 => 68,  264 => 66,  258 => 63,  251 => 59,  246 => 57,  240 => 54,  232 => 49,  227 => 47,  221 => 44,  214 => 40,  209 => 38,  203 => 35,  198 => 32,  191 => 27,  189 => 26,  184 => 24,  170 => 12,  157 => 11,  135 => 9,  113 => 7,  90 => 5,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Register - Medicare{% endblock %}

{% block body_class %}register-page{% endblock %}

{% block header %}{% endblock %}

{% block footer %}{% endblock %}

{% block body %}
<main class=\"main register-main\">
    <div class=\"register-container\">
        <div class=\"register-card\">
            <div class=\"register-header\">
                <div class=\"register-logo\">
                    <h1 class=\"sitename\">Medicare</h1>
                </div>
                <h2>Create Account</h2>
                <p>Join us to manage your healthcare</p>
            </div>

            <div class=\"register-body\">
                {{ form_start(registrationForm, {'attr': {'class': 'register-form'}}) }}
                
                {% if registrationForm.vars.errors|length > 0 %}
                    <div class=\"alert alert-danger\" role=\"alert\">
                        <i class=\"bi bi-exclamation-circle\"></i>
                        Please check the form below for errors
                    </div>
                {% endif %}

                <div class=\"form-row\">
                    <div class=\"form-group\">
                        {{ form_label(registrationForm.nom, 'Nom', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-person\"></i>
                            {{ form_widget(registrationForm.nom, {'attr': {'class': 'form-control', 'placeholder': 'Votre nom', 'autofocus': true}}) }}
                        </div>
                        {{ form_errors(registrationForm.nom) }}
                    </div>

                    <div class=\"form-group\">
                        {{ form_label(registrationForm.prenom, 'Prénom', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-person-badge\"></i>
                            {{ form_widget(registrationForm.prenom, {'attr': {'class': 'form-control', 'placeholder': 'Votre prénom'}}) }}
                        </div>
                        {{ form_errors(registrationForm.prenom) }}
                    </div>
                </div>

                <div class=\"form-group\">
                    {{ form_label(registrationForm.username, 'Nom d\\'utilisateur', {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"input-wrapper\">
                        <i class=\"bi bi-at\"></i>
                        {{ form_widget(registrationForm.username, {'attr': {'class': 'form-control', 'placeholder': 'Votre pseudo'}}) }}
                    </div>
                    {{ form_errors(registrationForm.username) }}
                </div>

                <div class=\"form-group\">
                    {{ form_label(registrationForm.email, 'Email', {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"input-wrapper\">
                        <i class=\"bi bi-envelope\"></i>
                        {{ form_widget(registrationForm.email, {'attr': {'class': 'form-control', 'placeholder': 'votre.email@exemple.com'}}) }}
                    </div>
                    {{ form_errors(registrationForm.email) }}
                </div>

                <div class=\"form-row\">
                    <div class=\"form-group\">
                        {{ form_label(registrationForm.numero, 'Téléphone', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-phone\"></i>
                            {{ form_widget(registrationForm.numero, {'attr': {'class': 'form-control', 'placeholder': '+216 XX XXX XXX'}}) }}
                        </div>
                        {{ form_errors(registrationForm.numero) }}
                    </div>
                </div>

                <div class=\"form-group\">
                    {{ form_label(registrationForm.adresse, 'Adresse', {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"input-wrapper\">
                        <i class=\"bi bi-geo-alt\"></i>
                        {{ form_widget(registrationForm.adresse, {'attr': {'class': 'form-control', 'placeholder': 'Votre adresse complète', 'rows': 2}}) }}
                    </div>
                    {{ form_errors(registrationForm.adresse) }}
                </div>

                <div class=\"form-row\">
                    <div class=\"form-group\">
                        {{ form_label(registrationForm.plainPassword, 'Mot de passe', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-lock\"></i>
                            {{ form_widget(registrationForm.plainPassword, {'attr': {'class': 'form-control', 'placeholder': 'Au moins 6 caractères', 'autocomplete': 'new-password'}}) }}
                        </div>
                        {{ form_errors(registrationForm.plainPassword) }}
                    </div>

                    <div class=\"form-group\">
                        {{ form_label(registrationForm.confirmPassword, 'Confirmer', {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-lock-fill\"></i>
                            {{ form_widget(registrationForm.confirmPassword, {'attr': {'class': 'form-control', 'placeholder': 'Confirmez', 'autocomplete': 'new-password'}}) }}
                        </div>
                        {{ form_errors(registrationForm.confirmPassword) }}
                    </div>
                </div>

                <div class=\"form-group form-check medicin-check\">
                    {{ form_widget(registrationForm.isMedecin, {'attr': {'class': 'form-check-input'}}) }}
                    {{ form_label(registrationForm.isMedecin, 'Je suis un médecin (demande de vérification requise)', {'label_attr': {'class': 'form-check-label'}}) }}
                </div>

                <div class=\"form-group form-check\">
                    {{ form_widget(registrationForm.agreeTerms, {'attr': {'class': 'form-check-input'}}) }}
                    {{ form_label(registrationForm.agreeTerms, \"J'accepte les conditions d'utilisation\", {'label_attr': {'class': 'form-check-label'}}) }}
                    {{ form_errors(registrationForm.agreeTerms) }}
                </div>

                <button type=\"submit\" class=\"btn btn-primary btn-register\">Create Account</button>

                {{ form_end(registrationForm) }}

                <div class=\"register-footer\">
                    <p>Already have an account? <a href=\"{{ path('app_login') }}\">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.register-main {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    padding: 2rem;
}

.register-container {
    width: 100%;
    max-width: 550px;
}

.register-card {
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

.register-logo {
    margin-bottom: 1rem;
}

.register-logo .sitename {
    font-size: 2rem;
    font-weight: 700;
    color: #10b981;
    margin: 0;
}

.register-header h2 {
    font-size: 1.5rem;
    margin: 0 0 0.5rem 0;
    font-weight: 600;
    color: #1f2937;
}

.register-header p {
    margin: 0;
    color: #6b7280;
    font-size: 0.95rem;
}

.register-body {
    padding: 2rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-group {
    margin-bottom: 1.25rem;
}

.form-group label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    display: block;
}

.input-wrapper {
    position: relative;
}

.input-wrapper i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #10b981;
    font-size: 1.1rem;
}

.input-wrapper .form-control {
    padding-left: 2.8rem;
    height: 48px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.input-wrapper .form-control:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

textarea.form-control {
    padding-left: 2.8rem;
    padding-top: 0.75rem;
    height: auto;
    resize: vertical;
}

.form-check {
    margin-top: 1rem;
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
}

.form-check-input {
    margin-top: 0.2rem;
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #10b981;
}

.form-check-input:checked {
    background-color: #10b981;
    border-color: #10b981;
}

.medicin-check {
    background: #f0fdf4;
    padding: 1rem;
    border-radius: 8px;
    border: 1px solid #bbf7d0;
}

.medicin-check .form-check-label {
    color: #166534;
    font-weight: 500;
}

.form-check-label {
    font-size: 0.9rem;
    color: #6b7280;
    cursor: pointer;
}

.form-check-label a {
    color: #10b981;
    text-decoration: none;
}

.form-check-label a:hover {
    text-decoration: underline;
}

.btn-register {
    width: 100%;
    height: 50px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    color: white;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    margin-top: 1.5rem;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
}

.register-footer {
    text-align: center;
    margin-top: 1.5rem;
    color: #6b7280;
}

.register-footer a {
    color: #10b981;
    text-decoration: none;
    font-weight: 600;
}

.register-footer a:hover {
    text-decoration: underline;
}

.alert {
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
}

.alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #dc2626;
}

.form-error {
    color: #dc2626;
    font-size: 0.85rem;
    margin-top: 0.25rem;
    display: block;
}

@media (max-width: 576px) {
    .register-header {
        padding: 2rem 1.5rem 1.5rem;
    }
    
    .register-body {
        padding: 1.5rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
}
</style>
{% endblock %}
", "registration/register.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\registration\\register.html.twig");
    }
}
