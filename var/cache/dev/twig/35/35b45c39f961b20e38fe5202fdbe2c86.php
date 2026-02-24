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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Register - Medicare</title>
    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\" rel=\"stylesheet\">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 2rem;
        }
        .register-container {
            width: 100%;
            max-width: 520px;
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
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .register-logo {
            margin-bottom: 1rem;
        }
        .register-logo h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin: 0;
        }
        .register-header h2 {
            font-size: 1.25rem;
            margin: 0 0 0.5rem 0;
            font-weight: 600;
            color: #1f2937;
        }
        .register-header p {
            margin: 0;
            color: #6b7280;
            font-size: 0.9rem;
        }
        .register-body {
            padding: 1.5rem 2rem 2rem;
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
            font-size: 0.9rem;
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
            z-index: 2;
        }
        .input-wrapper .form-control {
            width: 100%;
            padding-left: 2.8rem;
            height: 48px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .input-wrapper .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
            outline: none;
        }
        .input-wrapper textarea.form-control {
            height: auto;
            padding-top: 0.75rem;
            resize: vertical;
        }
        .form-check {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }
        .form-check-input {
            margin-top: 0.2rem;
            width: 18px;
            height: 18px;
            min-width: 18px;
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
            height: 48px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        .btn-register:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
        }
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .register-footer p {
            margin: 0.5rem 0;
            color: #6b7280;
            font-size: 0.85rem;
        }
        .register-footer .copyright {
            font-weight: 600;
            color: #10b981;
        }
        .register-footer .developed-by a {
            color: #059669;
            font-weight: 700;
        }
        .register-footer a {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
        .register-footer a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .alert-danger {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }
        .form-error {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: block;
        }
        ul.form-error li {
            list-style: none;
        }
        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            .register-header {
                padding: 1.5rem 1.25rem 1rem;
            }
            .register-body {
                padding: 1.25rem 1.5rem 1.5rem;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <main class=\"register-main\">
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
        // line 247
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 247, $this->source); })()), 'form_start', ["attr" => ["class" => "register-form"]]);
        yield "
                    
                    ";
        // line 249
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 249, $this->source); })()), "vars", [], "any", false, false, false, 249), "errors", [], "any", false, false, false, 249)) > 0)) {
            // line 250
            yield "                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            Please check the form below for errors
                        </div>
                    ";
        }
        // line 255
        yield "
                    ";
        // line 256
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 256, $this->source); })()), "flashes", ["error"], "method", false, false, false, 256));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 257
            yield "                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            ";
            // line 259
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        yield "
                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 265
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 265, $this->source); })()), "nom", [], "any", false, false, false, 265), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-person\"></i>
                                ";
        // line 268
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 268, $this->source); })()), "nom", [], "any", false, false, false, 268), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre nom", "autofocus" => true]]);
        yield "
                            </div>
                            ";
        // line 270
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 270, $this->source); })()), "nom", [], "any", false, false, false, 270), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 274
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 274, $this->source); })()), "prenom", [], "any", false, false, false, 274), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prénom"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-person-badge\"></i>
                                ";
        // line 277
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 277, $this->source); })()), "prenom", [], "any", false, false, false, 277), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre prénom"]]);
        yield "
                            </div>
                            ";
        // line 279
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 279, $this->source); })()), "prenom", [], "any", false, false, false, 279), 'errors');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 284
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 284, $this->source); })()), "username", [], "any", false, false, false, 284), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom d'utilisateur"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-at\"></i>
                            ";
        // line 287
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 287, $this->source); })()), "username", [], "any", false, false, false, 287), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre pseudo"]]);
        yield "
                        </div>
                        ";
        // line 289
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 289, $this->source); })()), "username", [], "any", false, false, false, 289), 'errors');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 293
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 293, $this->source); })()), "email", [], "any", false, false, false, 293), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Email"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-envelope\"></i>
                            ";
        // line 296
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 296, $this->source); })()), "email", [], "any", false, false, false, 296), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "votre.email@exemple.com"]]);
        yield "
                        </div>
                        ";
        // line 298
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 298, $this->source); })()), "email", [], "any", false, false, false, 298), 'errors');
        yield "
                    </div>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 303
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 303, $this->source); })()), "numero", [], "any", false, false, false, 303), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Téléphone"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-phone\"></i>
                                ";
        // line 306
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 306, $this->source); })()), "numero", [], "any", false, false, false, 306), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "+216 XX XXX XXX"]]);
        yield "
                            </div>
                            ";
        // line 308
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 308, $this->source); })()), "numero", [], "any", false, false, false, 308), 'errors');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 313
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 313, $this->source); })()), "adresse", [], "any", false, false, false, 313), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Adresse"]);
        yield "
                        <div class=\"input-wrapper\">
                            <i class=\"bi bi-geo-alt\"></i>
                            ";
        // line 316
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 316, $this->source); })()), "adresse", [], "any", false, false, false, 316), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Votre adresse complète", "rows" => 2]]);
        yield "
                        </div>
                        ";
        // line 318
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 318, $this->source); })()), "adresse", [], "any", false, false, false, 318), 'errors');
        yield "
                    </div>

                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            ";
        // line 323
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 323, $this->source); })()), "plainPassword", [], "any", false, false, false, 323), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Mot de passe"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-lock\"></i>
                                ";
        // line 326
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 326, $this->source); })()), "plainPassword", [], "any", false, false, false, 326), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Au moins 6 caractères", "autocomplete" => "new-password"]]);
        yield "
                            </div>
                            ";
        // line 328
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 328, $this->source); })()), "plainPassword", [], "any", false, false, false, 328), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 332
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 332, $this->source); })()), "confirmPassword", [], "any", false, false, false, 332), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Confirmer"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-lock-fill\"></i>
                                ";
        // line 335
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 335, $this->source); })()), "confirmPassword", [], "any", false, false, false, 335), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Confirmez", "autocomplete" => "new-password"]]);
        yield "
                            </div>
                            ";
        // line 337
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 337, $this->source); })()), "confirmPassword", [], "any", false, false, false, 337), 'errors');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group form-check medicin-check\">
                        ";
        // line 342
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 342, $this->source); })()), "isMedecin", [], "any", false, false, false, 342), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                        ";
        // line 343
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 343, $this->source); })()), "isMedecin", [], "any", false, false, false, 343), 'label', ["label_attr" => ["class" => "form-check-label"], "label" => "Je suis un médecin (demande de vérification requise)"]);
        yield "
                    </div>

                    <div class=\"form-group form-check\">
                        ";
        // line 347
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 347, $this->source); })()), "agreeTerms", [], "any", false, false, false, 347), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                        ";
        // line 348
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 348, $this->source); })()), "agreeTerms", [], "any", false, false, false, 348), 'label', ["label_attr" => ["class" => "form-check-label"], "label" => "J'accepte les conditions d'utilisation"]);
        yield "
                        ";
        // line 349
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 349, $this->source); })()), "agreeTerms", [], "any", false, false, false, 349), 'errors');
        yield "
                    </div>

                    <button type=\"submit\" class=\"btn btn-primary btn-register\">Create Account</button>

                    ";
        // line 354
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 354, $this->source); })()), 'form_end');
        yield "

                    <div class=\"register-footer\">
                        <p>Already have an account? <a href=\"";
        // line 357
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Sign In</a></p>
                        <p class=\"copyright\">&copy; 2025 Medicare. All rights reserved.</p>
                        <p class=\"developed-by\">Developed by <a href=\"#\">Nomade Team</a></p>
                        <p><a href=\"";
        // line 360
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
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
        return array (  523 => 360,  517 => 357,  511 => 354,  503 => 349,  499 => 348,  495 => 347,  488 => 343,  484 => 342,  476 => 337,  471 => 335,  465 => 332,  458 => 328,  453 => 326,  447 => 323,  439 => 318,  434 => 316,  428 => 313,  420 => 308,  415 => 306,  409 => 303,  401 => 298,  396 => 296,  390 => 293,  383 => 289,  378 => 287,  372 => 284,  364 => 279,  359 => 277,  353 => 274,  346 => 270,  341 => 268,  335 => 265,  330 => 262,  321 => 259,  317 => 257,  313 => 256,  310 => 255,  303 => 250,  301 => 249,  296 => 247,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Register - Medicare</title>
    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\" rel=\"stylesheet\">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 2rem;
        }
        .register-container {
            width: 100%;
            max-width: 520px;
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
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .register-logo {
            margin-bottom: 1rem;
        }
        .register-logo h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin: 0;
        }
        .register-header h2 {
            font-size: 1.25rem;
            margin: 0 0 0.5rem 0;
            font-weight: 600;
            color: #1f2937;
        }
        .register-header p {
            margin: 0;
            color: #6b7280;
            font-size: 0.9rem;
        }
        .register-body {
            padding: 1.5rem 2rem 2rem;
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
            font-size: 0.9rem;
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
            z-index: 2;
        }
        .input-wrapper .form-control {
            width: 100%;
            padding-left: 2.8rem;
            height: 48px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .input-wrapper .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
            outline: none;
        }
        .input-wrapper textarea.form-control {
            height: auto;
            padding-top: 0.75rem;
            resize: vertical;
        }
        .form-check {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }
        .form-check-input {
            margin-top: 0.2rem;
            width: 18px;
            height: 18px;
            min-width: 18px;
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
            height: 48px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        .btn-register:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
        }
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .register-footer p {
            margin: 0.5rem 0;
            color: #6b7280;
            font-size: 0.85rem;
        }
        .register-footer .copyright {
            font-weight: 600;
            color: #10b981;
        }
        .register-footer .developed-by a {
            color: #059669;
            font-weight: 700;
        }
        .register-footer a {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
        .register-footer a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .alert-danger {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }
        .form-error {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: block;
        }
        ul.form-error li {
            list-style: none;
        }
        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            .register-header {
                padding: 1.5rem 1.25rem 1rem;
            }
            .register-body {
                padding: 1.25rem 1.5rem 1.5rem;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <main class=\"register-main\">
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

                    {% for flash_error in app.flashes('error') %}
                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            {{ flash_error }}
                        </div>
                    {% endfor %}

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
                        <p class=\"copyright\">&copy; 2025 Medicare. All rights reserved.</p>
                        <p class=\"developed-by\">Developed by <a href=\"#\">Nomade Team</a></p>
                        <p><a href=\"{{ path('app_home') }}\">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
", "registration/register.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\registration\\register.html.twig");
    }
}
