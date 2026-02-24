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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/medecin_register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/medecin_register.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription Médecin - Medicare</title>
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
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .register-logo {
            margin-bottom: 1rem;
        }
        .register-logo .sitename {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin: 0;
        }
        .register-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 0.5rem;
            color: #1f2937;
        }
        .register-header p {
            color: #6b7280;
            margin: 0;
            font-size: 0.9rem;
        }
        .register-body {
            padding: 1.5rem 2rem 2rem;
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
        .form-control:disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
            opacity: 0.6;
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
            z-index: 2;
        }
        .input-wrapper .form-control,
        .input-wrapper .form-select {
            padding-left: 2.75rem;
        }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .alert-danger {
            background-color: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
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
        .form-error {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: block;
        }
        ul.form-error li {
            list-style: none;
        }
        .autocomplete-wrapper {
            position: relative;
        }
        .autocomplete-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 2px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 10px 10px;
            max-height: 220px;
            overflow-y: auto;
            z-index: 100;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        .autocomplete-dropdown.open {
            display: block;
        }
        .autocomplete-item {
            padding: 0.6rem 1rem 0.6rem 2.75rem;
            cursor: pointer;
            font-size: 0.95rem;
            color: #1f2937;
            transition: background 0.15s ease;
            border-bottom: 1px solid #f3f4f6;
        }
        .autocomplete-item:last-child {
            border-bottom: none;
        }
        .autocomplete-item:hover,
        .autocomplete-item.active {
            background: #f0fdf4;
            color: #059669;
        }
        .autocomplete-item .gouvernorat {
            font-size: 0.78rem;
            color: #9ca3af;
            margin-left: 0.4rem;
        }
        .autocomplete-item.active .gouvernorat {
            color: #6ee7b7;
        }
        .autocomplete-no-result {
            padding: 0.75rem 1rem;
            color: #9ca3af;
            font-size: 0.9rem;
            text-align: center;
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
            }
        }
    </style>
</head>
<body>
    <main class=\"medecin-register-main\">
        <div class=\"medecin-register-container\">
            <div class=\"medecin-register-card\">
                <div class=\"register-header\">
                    <div class=\"register-logo\">
                        <h1 class=\"sitename\">Medicare</h1>
                    </div>
                    <h2>Inscription Médecin</h2>
                    <p>Complétez votre profil professionnel</p>
                </div>

                <div class=\"register-body\">
                    ";
        // line 353
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 353, $this->source); })()), 'form_start', ["attr" => ["class" => "register-form", "enctype" => "multipart/form-data"]]);
        yield "
                    
                    ";
        // line 355
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 355, $this->source); })()), "vars", [], "any", false, false, false, 355), "errors", [], "any", false, false, false, 355)) > 0)) {
            // line 356
            yield "                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            Veuillez corriger les erreurs ci-dessous
                        </div>
                    ";
        }
        // line 361
        yield "
                    ";
        // line 362
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 362, $this->source); })()), "flashes", ["error"], "method", false, false, false, 362));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 363
            yield "                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            ";
            // line 365
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 368
        yield "
                    ";
        // line 369
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 369, $this->source); })()), "flashes", ["success"], "method", false, false, false, 369));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_success"]) {
            // line 370
            yield "                        <div class=\"alert alert-success\" role=\"alert\">
                            <i class=\"bi bi-check-circle\"></i>
                            ";
            // line 372
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_success"], "html", null, true);
            yield "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_success'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 375
        yield "
                    ";
        // line 377
        yield "                    <div class=\"form-section\">
                        <h3 class=\"section-title\">
                            <i class=\"bi bi-person-badge\"></i>
                            Informations Personnelles
                        </h3>
                        
                        <div class=\"form-row\">
                            <div class=\"form-group\">
                                ";
        // line 385
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 385, $this->source); })()), "nom", [], "any", false, false, false, 385), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom"]);
        yield "
                                ";
        // line 386
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 386, $this->source); })()), "nom", [], "any", false, false, false, 386), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                                ";
        // line 387
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 387, $this->source); })()), "nom", [], "any", false, false, false, 387), 'errors');
        yield "
                            </div>

                            <div class=\"form-group\">
                                ";
        // line 391
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 391, $this->source); })()), "prenom", [], "any", false, false, false, 391), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prénom"]);
        yield "
                                ";
        // line 392
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 392, $this->source); })()), "prenom", [], "any", false, false, false, 392), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                                ";
        // line 393
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 393, $this->source); })()), "prenom", [], "any", false, false, false, 393), 'errors');
        yield "
                            </div>
                        </div>

                        <div class=\"form-row\">
                            <div class=\"form-group\">
                                ";
        // line 399
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 399, $this->source); })()), "email", [], "any", false, false, false, 399), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Email"]);
        yield "
                                ";
        // line 400
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 400, $this->source); })()), "email", [], "any", false, false, false, 400), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                                ";
        // line 401
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 401, $this->source); })()), "email", [], "any", false, false, false, 401), 'errors');
        yield "
                            </div>

                            <div class=\"form-group\">
                                ";
        // line 405
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 405, $this->source); })()), "numero", [], "any", false, false, false, 405), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Téléphone"]);
        yield "
                                ";
        // line 406
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 406, $this->source); })()), "numero", [], "any", false, false, false, 406), 'widget', ["attr" => ["class" => "form-control", "readonly" => true]]);
        yield "
                                ";
        // line 407
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 407, $this->source); })()), "numero", [], "any", false, false, false, 407), 'errors');
        yield "
                            </div>
                        </div>
                    </div>

                    ";
        // line 413
        yield "                    <div class=\"form-section\">
                        <h3 class=\"section-title\">
                            <i class=\"bi bi-briefcase-medical\"></i>
                            Informations Professionnelles
                        </h3>

                        <div class=\"form-row\">
                            <div class=\"form-group\">
                                ";
        // line 421
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 421, $this->source); })()), "specialite", [], "any", false, false, false, 421), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Spécialité"]);
        yield "
                                <div class=\"input-wrapper\">
                                    <i class=\"bi bi-clipboard-pulse\"></i>
                                    ";
        // line 424
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 424, $this->source); })()), "specialite", [], "any", false, false, false, 424), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                                </div>
                                ";
        // line 426
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 426, $this->source); })()), "specialite", [], "any", false, false, false, 426), 'errors');
        yield "
                            </div>

                            <div class=\"form-group\">
                                ";
        // line 430
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 430, $this->source); })()), "ville", [], "any", false, false, false, 430), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Ville (Gouvernorat)"]);
        yield "
                                <div class=\"input-wrapper\">
                                    <i class=\"bi bi-geo-alt\"></i>
                                    ";
        // line 433
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 433, $this->source); })()), "ville", [], "any", false, false, false, 433), 'widget', ["attr" => ["class" => "form-select", "id" => "ville-select"]]);
        yield "
                                </div>
                                ";
        // line 435
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 435, $this->source); })()), "ville", [], "any", false, false, false, 435), 'errors');
        yield "
                            </div>
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 440
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 440, $this->source); })()), "cabinet", [], "any", false, false, false, 440), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Place de cabinet (Municipalité)"]);
        yield "
                            <div class=\"autocomplete-wrapper\">
                                <div class=\"input-wrapper\">
                                    <i class=\"bi bi-geo-alt-fill\"></i>
                                    ";
        // line 444
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 444, $this->source); })()), "cabinet", [], "any", false, false, false, 444), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Sélectionnez d'abord une ville", "autocomplete" => "off", "id" => "cabinet-input", "disabled" => "disabled"]]);
        yield "
                                </div>
                                <div class=\"autocomplete-dropdown\" id=\"cabinet-dropdown\"></div>
                            </div>
                            ";
        // line 448
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 448, $this->source); })()), "cabinet", [], "any", false, false, false, 448), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 452
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 452, $this->source); })()), "adresse", [], "any", false, false, false, 452), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Adresse du cabinet"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-geo-alt\"></i>
                                ";
        // line 455
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 455, $this->source); })()), "adresse", [], "any", false, false, false, 455), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Adresse complète du cabinet"]]);
        yield "
                            </div>
                            ";
        // line 457
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 457, $this->source); })()), "adresse", [], "any", false, false, false, 457), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 461
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 461, $this->source); })()), "prixConsultation", [], "any", false, false, false, 461), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prix de consultation (DT)"]);
        yield "
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-currency-dollar\"></i>
                                ";
        // line 464
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 464, $this->source); })()), "prixConsultation", [], "any", false, false, false, 464), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "0.000", "step" => "0.001"]]);
        yield "
                            </div>
                            ";
        // line 466
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 466, $this->source); })()), "prixConsultation", [], "any", false, false, false, 466), 'errors');
        yield "
                        </div>

                        <div class=\"form-group\">
                            ";
        // line 470
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 470, $this->source); })()), "bio", [], "any", false, false, false, 470), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Biographie / Présentation"]);
        yield "
                            ";
        // line 471
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 471, $this->source); })()), "bio", [], "any", false, false, false, 471), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Présentez-vous et votre parcours professionnel", "rows" => 4]]);
        yield "
                            ";
        // line 472
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 472, $this->source); })()), "bio", [], "any", false, false, false, 472), 'errors');
        yield "
                        </div>
                    </div>

                    ";
        // line 477
        yield "                    <div class=\"form-section\">
                        <h3 class=\"section-title\">
                            <i class=\"bi bi-camera\"></i>
                            Photos
                        </h3>

                        <div class=\"form-row\">
                            <div class=\"form-group\">
                                ";
        // line 485
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 485, $this->source); })()), "photo", [], "any", false, false, false, 485), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Photo de profil"]);
        yield "
                                <div class=\"file-upload-wrapper\" id=\"photoUpload\">
                                    ";
        // line 487
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 487, $this->source); })()), "photo", [], "any", false, false, false, 487), 'widget', ["attr" => ["class" => "file-input", "accept" => "image/*", "data-preview" => "photoPreview"]]);
        yield "
                                    <div class=\"file-upload-area\">
                                        <i class=\"bi bi-cloud-upload\"></i>
                                        <p>Glissez-déposez une image ou <span>parcourir</span></p>
                                        <small>JPEG, PNG ou WebP (max 5MB)</small>
                                    </div>
                                    <img id=\"photoPreview\" class=\"image-preview\" alt=\"Aperçu\">
                                </div>
                                ";
        // line 495
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 495, $this->source); })()), "photo", [], "any", false, false, false, 495), 'errors');
        yield "
                            </div>

                            <div class=\"form-group\">
                                ";
        // line 499
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 499, $this->source); })()), "certificate", [], "any", false, false, false, 499), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Certificat médical *"]);
        yield "
                                <div class=\"file-upload-wrapper\" id=\"certificateUpload\">
                                    ";
        // line 501
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 501, $this->source); })()), "certificate", [], "any", false, false, false, 501), 'widget', ["attr" => ["class" => "file-input", "accept" => "image/*,.pdf", "data-preview" => "certificatePreview"]]);
        yield "
                                    <div class=\"file-upload-area\">
                                        <i class=\"bi bi-file-earmark-pdf\"></i>
                                        <p>Glissez-déposez un fichier ou <span>parcourir</span></p>
                                        <small>Image ou PDF (max 10MB)</small>
                                    </div>
                                    <img id=\"certificatePreview\" class=\"image-preview\" alt=\"Aperçu\">
                                </div>
                                ";
        // line 509
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 509, $this->source); })()), "certificate", [], "any", false, false, false, 509), 'errors');
        yield "
                            </div>
                        </div>
                    </div>

                    <button type=\"submit\" class=\"btn btn-primary btn-register\">
                        <i class=\"bi bi-check-circle\"></i>
                        Soumettre ma demande
                    </button>

                    ";
        // line 520
        yield "                    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 520, $this->source); })()), "_token", [], "any", false, false, false, 520), 'widget');
        yield "
                    ";
        // line 521
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 521, $this->source); })()), 'form_end', ["render_rest" => false]);
        yield "

                    <div class=\"register-footer\">
                        <p>Already have an account? <a href=\"";
        // line 524
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Sign In</a></p>
                        <p class=\"copyright\">&copy; 2025 Medicare. All rights reserved.</p>
                        <p class=\"developed-by\">Developed by <a href=\"#\">Nomade Team</a></p>
                        <p><a href=\"";
        // line 527
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== Re-enable disabled fields before form submit =====
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                const cabinetField = document.getElementById('cabinet-input');
                if (cabinetField) cabinetField.disabled = false;
            });
        }

        // ===== File upload preview =====
        const fileInputs = document.querySelectorAll('.file-input');
        fileInputs.forEach(input => {
            const wrapper = input.closest('.file-upload-wrapper');
            const preview = wrapper.querySelector('.image-preview');
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (preview && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    }
                    const uploadArea = wrapper.querySelector('.file-upload-area p');
                    if (uploadArea) {
                        uploadArea.innerHTML = `Fichier sélectionné: <span>\${file.name}</span>`;
                    }
                }
            });
        });

        // ===== Municipalities autocomplete (filtered by ville) =====
        const municipalities = [
            // Tunis
            {n:\"Tunis\",g:\"Tunis\"},{n:\"Le Bardo\",g:\"Tunis\"},{n:\"Le Kram\",g:\"Tunis\"},{n:\"La Goulette\",g:\"Tunis\"},{n:\"Carthage\",g:\"Tunis\"},{n:\"Sidi Bou Saïd\",g:\"Tunis\"},{n:\"La Marsa\",g:\"Tunis\"},{n:\"Sidi Hassine\",g:\"Tunis\"},{n:\"El Ouardia\",g:\"Tunis\"},{n:\"Ezzouhour\",g:\"Tunis\"},{n:\"El Omrane\",g:\"Tunis\"},{n:\"El Omrane Supérieur\",g:\"Tunis\"},{n:\"El Menzah\",g:\"Tunis\"},{n:\"El Hrairia\",g:\"Tunis\"},
            // Ariana
            {n:\"Ariana\",g:\"Ariana\"},{n:\"La Soukra\",g:\"Ariana\"},{n:\"Raoued\",g:\"Ariana\"},{n:\"Kalâat el-Andalous\",g:\"Ariana\"},{n:\"Sidi Thabet\",g:\"Ariana\"},{n:\"Ettadhamen\",g:\"Ariana\"},{n:\"El Mnihla\",g:\"Ariana\"},
            // Ben Arous
            {n:\"Ben Arous\",g:\"Ben Arous\"},{n:\"El Mourouj\",g:\"Ben Arous\"},{n:\"Hammam Lif\",g:\"Ben Arous\"},{n:\"Hammam Chott\",g:\"Ben Arous\"},{n:\"Bou Mhel el-Bassatine\",g:\"Ben Arous\"},{n:\"Ezzahra\",g:\"Ben Arous\"},{n:\"Radès\",g:\"Ben Arous\"},{n:\"Mégrine\",g:\"Ben Arous\"},{n:\"Mohamedia\",g:\"Ben Arous\"},{n:\"Fouchana\",g:\"Ben Arous\"},{n:\"Mornag\",g:\"Ben Arous\"},{n:\"Khalidia\",g:\"Ben Arous\"},{n:\"Nouvelle Médina\",g:\"Ben Arous\"},
            // Manouba
            {n:\"La Manouba\",g:\"Manouba\"},{n:\"Den Den\",g:\"Manouba\"},{n:\"Douar Hicher\",g:\"Manouba\"},{n:\"Oued Ellil\",g:\"Manouba\"},{n:\"Mornaguia\",g:\"Manouba\"},{n:\"Borj El Amri\",g:\"Manouba\"},{n:\"Jedaïda\",g:\"Manouba\"},{n:\"Tebourba\",g:\"Manouba\"},{n:\"El Battan\",g:\"Manouba\"},
            // Nabeul
            {n:\"Nabeul\",g:\"Nabeul\"},{n:\"Hammamet\",g:\"Nabeul\"},{n:\"Dar Chaâbane\",g:\"Nabeul\"},{n:\"Béni Khiar\",g:\"Nabeul\"},{n:\"Korba\",g:\"Nabeul\"},{n:\"Menzel Temime\",g:\"Nabeul\"},{n:\"Kélibia\",g:\"Nabeul\"},{n:\"El Haouaria\",g:\"Nabeul\"},{n:\"Soliman\",g:\"Nabeul\"},{n:\"Grombalia\",g:\"Nabeul\"},{n:\"Bou Argoub\",g:\"Nabeul\"},{n:\"Menzel Bouzelfa\",g:\"Nabeul\"},{n:\"Béni Khalled\",g:\"Nabeul\"},{n:\"Takelsa\",g:\"Nabeul\"},{n:\"El Mida\",g:\"Nabeul\"},{n:\"Dar Allouch\",g:\"Nabeul\"},
            // Zaghouan
            {n:\"Zaghouan\",g:\"Zaghouan\"},{n:\"Zriba\",g:\"Zaghouan\"},{n:\"Bir Mcherga\",g:\"Zaghouan\"},{n:\"El Fahs\",g:\"Zaghouan\"},{n:\"Nadhour\",g:\"Zaghouan\"},
            // Bizerte
            {n:\"Bizerte\",g:\"Bizerte\"},{n:\"Menzel Bourguiba\",g:\"Bizerte\"},{n:\"Menzel Jemil\",g:\"Bizerte\"},{n:\"Menzel Abderrahmane\",g:\"Bizerte\"},{n:\"Tinja\",g:\"Bizerte\"},{n:\"Mateur\",g:\"Bizerte\"},{n:\"Ras Jebel\",g:\"Bizerte\"},{n:\"Rafraf\",g:\"Bizerte\"},{n:\"El Alia\",g:\"Bizerte\"},{n:\"Ghar El Melh\",g:\"Bizerte\"},{n:\"Aousja\",g:\"Bizerte\"},{n:\"Sejnane\",g:\"Bizerte\"},{n:\"Joumine\",g:\"Bizerte\"},{n:\"Ghezala\",g:\"Bizerte\"},{n:\"Utique\",g:\"Bizerte\"},
            // Béja
            {n:\"Béja\",g:\"Béja\"},{n:\"Medjez el-Bab\",g:\"Béja\"},{n:\"Nefza\",g:\"Béja\"},{n:\"Téboursouk\",g:\"Béja\"},{n:\"Testour\",g:\"Béja\"},{n:\"Goubellat\",g:\"Béja\"},{n:\"Amdoun\",g:\"Béja\"},{n:\"Thibar\",g:\"Béja\"},
            // Jendouba
            {n:\"Jendouba\",g:\"Jendouba\"},{n:\"Bou Salem\",g:\"Jendouba\"},{n:\"Tabarka\",g:\"Jendouba\"},{n:\"Aïn Draham\",g:\"Jendouba\"},{n:\"Fernana\",g:\"Jendouba\"},{n:\"Ghardimaou\",g:\"Jendouba\"},{n:\"Oued Mliz\",g:\"Jendouba\"},{n:\"Balta-Bou Aouane\",g:\"Jendouba\"},
            // Le Kef
            {n:\"Le Kef\",g:\"Le Kef\"},{n:\"Nebeur\",g:\"Le Kef\"},{n:\"Tajerouine\",g:\"Le Kef\"},{n:\"Kalâat Senan\",g:\"Le Kef\"},{n:\"Sakiet Sidi Youssef\",g:\"Le Kef\"},{n:\"Dahmani\",g:\"Le Kef\"},{n:\"Kalâat Khasba\",g:\"Le Kef\"},{n:\"Jérissa\",g:\"Le Kef\"},{n:\"Sers\",g:\"Le Kef\"},
            // Siliana
            {n:\"Siliana\",g:\"Siliana\"},{n:\"Bou Arada\",g:\"Siliana\"},{n:\"Gaâfour\",g:\"Siliana\"},{n:\"El Krib\",g:\"Siliana\"},{n:\"Makthar\",g:\"Siliana\"},{n:\"Rouhia\",g:\"Siliana\"},{n:\"Kesra\",g:\"Siliana\"},{n:\"Bargou\",g:\"Siliana\"},{n:\"Sidi Bou Rouis\",g:\"Siliana\"},
            // Sousse
            {n:\"Sousse\",g:\"Sousse\"},{n:\"Msaken\",g:\"Sousse\"},{n:\"Kalâa Kebira\",g:\"Sousse\"},{n:\"Kalâa Seghira\",g:\"Sousse\"},{n:\"Hammam Sousse\",g:\"Sousse\"},{n:\"Akouda\",g:\"Sousse\"},{n:\"Zaouiet Sousse\",g:\"Sousse\"},{n:\"Hergla\",g:\"Sousse\"},{n:\"Sidi Bou Ali\",g:\"Sousse\"},{n:\"Enfidha\",g:\"Sousse\"},{n:\"Bouficha\",g:\"Sousse\"},{n:\"Kondar\",g:\"Sousse\"},{n:\"Sidi El Héni\",g:\"Sousse\"},
            // Monastir
            {n:\"Monastir\",g:\"Monastir\"},{n:\"Jemmal\",g:\"Monastir\"},{n:\"Ksar Hellal\",g:\"Monastir\"},{n:\"Moknine\",g:\"Monastir\"},{n:\"Téboulba\",g:\"Monastir\"},{n:\"Sayada-Lamta-Bou Hajar\",g:\"Monastir\"},{n:\"Bembla\",g:\"Monastir\"},{n:\"Sahline\",g:\"Monastir\"},{n:\"Ouerdanine\",g:\"Monastir\"},{n:\"Ksibet el-Médiouni\",g:\"Monastir\"},{n:\"Zéramdine\",g:\"Monastir\"},{n:\"Beni Hassen\",g:\"Monastir\"},{n:\"Menzel Kamel\",g:\"Monastir\"},{n:\"Bekalta\",g:\"Monastir\"},{n:\"Menzel Ennabi\",g:\"Monastir\"},
            // Mahdia
            {n:\"Mahdia\",g:\"Mahdia\"},{n:\"El Jem\",g:\"Mahdia\"},{n:\"Ksour Essef\",g:\"Mahdia\"},{n:\"Chebba\",g:\"Mahdia\"},{n:\"Bou Merdes\",g:\"Mahdia\"},{n:\"Melloulèche\",g:\"Mahdia\"},{n:\"Sidi Alouane\",g:\"Mahdia\"},{n:\"Chorbane\",g:\"Mahdia\"},{n:\"Essouassi\",g:\"Mahdia\"},{n:\"Rejiche\",g:\"Mahdia\"},{n:\"Hebira\",g:\"Mahdia\"},
            // Sfax
            {n:\"Sfax\",g:\"Sfax\"},{n:\"Sakiet Ezzit\",g:\"Sfax\"},{n:\"Sakiet Eddaïer\",g:\"Sfax\"},{n:\"Chihia\",g:\"Sfax\"},{n:\"El Ain\",g:\"Sfax\"},{n:\"Thyna\",g:\"Sfax\"},{n:\"Agareb\",g:\"Sfax\"},{n:\"Jébéniana\",g:\"Sfax\"},{n:\"El Hencha\",g:\"Sfax\"},{n:\"Menzel Chaker\",g:\"Sfax\"},{n:\"Graïba\",g:\"Sfax\"},{n:\"Bir Ali Ben Khélifa\",g:\"Sfax\"},{n:\"Skhira\",g:\"Sfax\"},{n:\"Mahares\",g:\"Sfax\"},{n:\"Kerkennah\",g:\"Sfax\"},{n:\"Ghraiba\",g:\"Sfax\"},
            // Kairouan
            {n:\"Kairouan\",g:\"Kairouan\"},{n:\"Sbikha\",g:\"Kairouan\"},{n:\"Haffouz\",g:\"Kairouan\"},{n:\"Nasrallah\",g:\"Kairouan\"},{n:\"Bou Hajla\",g:\"Kairouan\"},{n:\"Oueslatia\",g:\"Kairouan\"},{n:\"Hajeb El Ayoun\",g:\"Kairouan\"},{n:\"Chebika\",g:\"Kairouan\"},{n:\"Aïn Jelloula\",g:\"Kairouan\"},{n:\"Menzel Mehiri\",g:\"Kairouan\"},{n:\"El Alâa\",g:\"Kairouan\"},
            // Kasserine
            {n:\"Kasserine\",g:\"Kasserine\"},{n:\"Sbeitla\",g:\"Kasserine\"},{n:\"Fériana\",g:\"Kasserine\"},{n:\"Thala\",g:\"Kasserine\"},{n:\"Haïdra\",g:\"Kasserine\"},{n:\"Foussana\",g:\"Kasserine\"},{n:\"Jedelienne\",g:\"Kasserine\"},{n:\"El Ayoun\",g:\"Kasserine\"},{n:\"Sbiba\",g:\"Kasserine\"},{n:\"Hassi El Ferid\",g:\"Kasserine\"},{n:\"Majel Bel Abbès\",g:\"Kasserine\"},
            // Sidi Bouzid
            {n:\"Sidi Bouzid\",g:\"Sidi Bouzid\"},{n:\"Regueb\",g:\"Sidi Bouzid\"},{n:\"Jilma\",g:\"Sidi Bouzid\"},{n:\"Menzel Bouzaïane\",g:\"Sidi Bouzid\"},{n:\"Meknassy\",g:\"Sidi Bouzid\"},{n:\"Bir El Hafey\",g:\"Sidi Bouzid\"},{n:\"Sidi Ali Ben Aoun\",g:\"Sidi Bouzid\"},{n:\"Cebbala Ouled Asker\",g:\"Sidi Bouzid\"},{n:\"Mezzouna\",g:\"Sidi Bouzid\"},{n:\"Ouled Haffouz\",g:\"Sidi Bouzid\"},
            // Gabès
            {n:\"Gabès\",g:\"Gabès\"},{n:\"El Hamma\",g:\"Gabès\"},{n:\"Mareth\",g:\"Gabès\"},{n:\"Matmata\",g:\"Gabès\"},{n:\"Nouvelle Matmata\",g:\"Gabès\"},{n:\"Métouia\",g:\"Gabès\"},{n:\"Menzel El Habib\",g:\"Gabès\"},{n:\"Ghannouch\",g:\"Gabès\"},{n:\"Chenini Nahal\",g:\"Gabès\"},{n:\"Oudhref\",g:\"Gabès\"},
            // Médenine
            {n:\"Médenine\",g:\"Médenine\"},{n:\"Zarzis\",g:\"Médenine\"},{n:\"Ben Gardane\",g:\"Médenine\"},{n:\"Houmt Souk\",g:\"Médenine\"},{n:\"Midoun\",g:\"Médenine\"},{n:\"Ajim\",g:\"Médenine\"},{n:\"Beni Khedache\",g:\"Médenine\"},{n:\"Sidi Makhlouf\",g:\"Médenine\"},
            // Tataouine
            {n:\"Tataouine\",g:\"Tataouine\"},{n:\"Ghomrassen\",g:\"Tataouine\"},{n:\"Dehiba\",g:\"Tataouine\"},{n:\"Remada\",g:\"Tataouine\"},{n:\"Bir Lahmar\",g:\"Tataouine\"},{n:\"Smâr\",g:\"Tataouine\"},
            // Gafsa
            {n:\"Gafsa\",g:\"Gafsa\"},{n:\"Métlaoui\",g:\"Gafsa\"},{n:\"Redeyef\",g:\"Gafsa\"},{n:\"Moularès\",g:\"Gafsa\"},{n:\"El Guettar\",g:\"Gafsa\"},{n:\"Mdhilla\",g:\"Gafsa\"},{n:\"Sened\",g:\"Gafsa\"},{n:\"Belkhir\",g:\"Gafsa\"},{n:\"Sidi Aïch\",g:\"Gafsa\"},{n:\"El Ksar\",g:\"Gafsa\"},
            // Tozeur
            {n:\"Tozeur\",g:\"Tozeur\"},{n:\"Nefta\",g:\"Tozeur\"},{n:\"Degache\",g:\"Tozeur\"},{n:\"Tameghza\",g:\"Tozeur\"},{n:\"Hazoua\",g:\"Tozeur\"},
            // Kébili
            {n:\"Kébili\",g:\"Kébili\"},{n:\"Douz\",g:\"Kébili\"},{n:\"Souk Lahad\",g:\"Kébili\"},{n:\"El Golâa\",g:\"Kébili\"},{n:\"Jemna\",g:\"Kébili\"},{n:\"Faouar\",g:\"Kébili\"}
        ];

        // Mapping: TunisianCity enum values → municipality gouvernorat names
        const villeToGouvernorat = {
            'Tunis': 'Tunis',
            'Ariana': 'Ariana',
            'Ben Arous': 'Ben Arous',
            'Mannouba': 'Manouba',
            'Nabeul': 'Nabeul',
            'Zaghouan': 'Zaghouan',
            'Bizerte': 'Bizerte',
            'Béja': 'Béja',
            'Jendouba': 'Jendouba',
            'Le Kef': 'Le Kef',
            'Siliana': 'Siliana',
            'Sousse': 'Sousse',
            'Monastir': 'Monastir',
            'Mahdia': 'Mahdia',
            'Sfax': 'Sfax',
            'Kairouan': 'Kairouan',
            'Kasserine': 'Kasserine',
            'Sidi Bouzid': 'Sidi Bouzid',
            'Gabès': 'Gabès',
            'Médenine': 'Médenine',
            'Tataouine': 'Tataouine',
            'Gafsa': 'Gafsa',
            'Tozeur': 'Tozeur',
            'Kébili': 'Kébili',
            'Bourgelaterre': 'Bourgelaterre'
        };

        const villeSelect = document.getElementById('ville-select') || document.querySelector('[name\$=\"[ville]\"]');
        const cabinetInput = document.getElementById('cabinet-input') || document.querySelector('[name\$=\"[cabinet]\"]');
        if (!cabinetInput || !villeSelect) return;

        const dropdown = document.getElementById('cabinet-dropdown');
        let activeIndex = -1;
        let selectedGouvernorat = null;

        function normalize(str) {
            return str.normalize('NFD').replace(/[\\u0300-\\u036f]/g, '').toLowerCase();
        }

        function getFilteredMunicipalities() {
            if (!selectedGouvernorat) return [];
            return municipalities.filter(m => m.g === selectedGouvernorat);
        }

        function updateCabinetState() {
            const villeValue = villeSelect.value;
            if (villeValue) {
                selectedGouvernorat = villeToGouvernorat[villeValue] || villeValue;
                cabinetInput.disabled = false;
                cabinetInput.placeholder = 'Tapez le nom de la municipalité';
                // Clear previous value since gouvernorat changed
                cabinetInput.value = '';
                dropdown.classList.remove('open');
            } else {
                selectedGouvernorat = null;
                cabinetInput.disabled = true;
                cabinetInput.placeholder = 'Sélectionnez d\\'abord une ville';
                cabinetInput.value = '';
                dropdown.classList.remove('open');
            }
        }

        // Listen for ville changes
        villeSelect.addEventListener('change', updateCabinetState);

        // Initialize state on page load (in case ville is already selected, e.g. form re-render)
        if (villeSelect.value) {
            selectedGouvernorat = villeToGouvernorat[villeSelect.value] || villeSelect.value;
            cabinetInput.disabled = false;
            cabinetInput.placeholder = 'Tapez le nom de la municipalité';
        }

        function renderDropdown(matches) {
            dropdown.innerHTML = '';
            activeIndex = -1;
            if (matches.length === 0) {
                dropdown.innerHTML = '<div class=\"autocomplete-no-result\">Aucune municipalité trouvée</div>';
                dropdown.classList.add('open');
                return;
            }
            matches.forEach((m, i) => {
                const div = document.createElement('div');
                div.className = 'autocomplete-item';
                div.dataset.index = i;
                div.innerHTML = m.n;
                div.addEventListener('mousedown', function(e) {
                    e.preventDefault();
                    cabinetInput.value = m.n;
                    dropdown.classList.remove('open');
                });
                dropdown.appendChild(div);
            });
            dropdown.classList.add('open');
        }

        cabinetInput.addEventListener('input', function() {
            const val = normalize(this.value.trim());
            const filtered = getFilteredMunicipalities();
            if (val.length < 1) {
                // Show all municipalities for this gouvernorat
                renderDropdown(filtered);
                return;
            }
            const matches = filtered.filter(m => normalize(m.n).includes(val));
            renderDropdown(matches);
        });

        cabinetInput.addEventListener('focus', function() {
            if (!selectedGouvernorat) return;
            const val = normalize(this.value.trim());
            const filtered = getFilteredMunicipalities();
            if (val.length < 1) {
                renderDropdown(filtered);
            } else {
                const matches = filtered.filter(m => normalize(m.n).includes(val));
                renderDropdown(matches);
            }
        });

        cabinetInput.addEventListener('blur', function() {
            setTimeout(() => dropdown.classList.remove('open'), 150);
        });

        cabinetInput.addEventListener('keydown', function(e) {
            const items = dropdown.querySelectorAll('.autocomplete-item');
            if (!items.length) return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIndex = Math.min(activeIndex + 1, items.length - 1);
                items.forEach(it => it.classList.remove('active'));
                items[activeIndex].classList.add('active');
                items[activeIndex].scrollIntoView({ block: 'nearest' });
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIndex = Math.max(activeIndex - 1, 0);
                items.forEach(it => it.classList.remove('active'));
                items[activeIndex].classList.add('active');
                items[activeIndex].scrollIntoView({ block: 'nearest' });
            } else if (e.key === 'Enter' && activeIndex >= 0) {
                e.preventDefault();
                items[activeIndex].dispatchEvent(new Event('mousedown'));
            } else if (e.key === 'Escape') {
                dropdown.classList.remove('open');
            }
        });
    });
    </script>
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
        return array (  730 => 527,  724 => 524,  718 => 521,  713 => 520,  700 => 509,  689 => 501,  684 => 499,  677 => 495,  666 => 487,  661 => 485,  651 => 477,  644 => 472,  640 => 471,  636 => 470,  629 => 466,  624 => 464,  618 => 461,  611 => 457,  606 => 455,  600 => 452,  593 => 448,  586 => 444,  579 => 440,  571 => 435,  566 => 433,  560 => 430,  553 => 426,  548 => 424,  542 => 421,  532 => 413,  524 => 407,  520 => 406,  516 => 405,  509 => 401,  505 => 400,  501 => 399,  492 => 393,  488 => 392,  484 => 391,  477 => 387,  473 => 386,  469 => 385,  459 => 377,  456 => 375,  447 => 372,  443 => 370,  439 => 369,  436 => 368,  427 => 365,  423 => 363,  419 => 362,  416 => 361,  409 => 356,  407 => 355,  402 => 353,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription Médecin - Medicare</title>
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
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .register-logo {
            margin-bottom: 1rem;
        }
        .register-logo .sitename {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin: 0;
        }
        .register-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 0.5rem;
            color: #1f2937;
        }
        .register-header p {
            color: #6b7280;
            margin: 0;
            font-size: 0.9rem;
        }
        .register-body {
            padding: 1.5rem 2rem 2rem;
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
        .form-control:disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
            opacity: 0.6;
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
            z-index: 2;
        }
        .input-wrapper .form-control,
        .input-wrapper .form-select {
            padding-left: 2.75rem;
        }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .alert-danger {
            background-color: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
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
        .form-error {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: block;
        }
        ul.form-error li {
            list-style: none;
        }
        .autocomplete-wrapper {
            position: relative;
        }
        .autocomplete-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 2px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 10px 10px;
            max-height: 220px;
            overflow-y: auto;
            z-index: 100;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        .autocomplete-dropdown.open {
            display: block;
        }
        .autocomplete-item {
            padding: 0.6rem 1rem 0.6rem 2.75rem;
            cursor: pointer;
            font-size: 0.95rem;
            color: #1f2937;
            transition: background 0.15s ease;
            border-bottom: 1px solid #f3f4f6;
        }
        .autocomplete-item:last-child {
            border-bottom: none;
        }
        .autocomplete-item:hover,
        .autocomplete-item.active {
            background: #f0fdf4;
            color: #059669;
        }
        .autocomplete-item .gouvernorat {
            font-size: 0.78rem;
            color: #9ca3af;
            margin-left: 0.4rem;
        }
        .autocomplete-item.active .gouvernorat {
            color: #6ee7b7;
        }
        .autocomplete-no-result {
            padding: 0.75rem 1rem;
            color: #9ca3af;
            font-size: 0.9rem;
            text-align: center;
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
            }
        }
    </style>
</head>
<body>
    <main class=\"medecin-register-main\">
        <div class=\"medecin-register-container\">
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

                    {% for flash_error in app.flashes('error') %}
                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            {{ flash_error }}
                        </div>
                    {% endfor %}

                    {% for flash_success in app.flashes('success') %}
                        <div class=\"alert alert-success\" role=\"alert\">
                            <i class=\"bi bi-check-circle\"></i>
                            {{ flash_success }}
                        </div>
                    {% endfor %}

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
                                {{ form_label(registrationForm.ville, 'Ville (Gouvernorat)', {'label_attr': {'class': 'form-label'}}) }}
                                <div class=\"input-wrapper\">
                                    <i class=\"bi bi-geo-alt\"></i>
                                    {{ form_widget(registrationForm.ville, {'attr': {'class': 'form-select', 'id': 'ville-select'}}) }}
                                </div>
                                {{ form_errors(registrationForm.ville) }}
                            </div>
                        </div>

                        <div class=\"form-group\">
                            {{ form_label(registrationForm.cabinet, 'Place de cabinet (Municipalité)', {'label_attr': {'class': 'form-label'}}) }}
                            <div class=\"autocomplete-wrapper\">
                                <div class=\"input-wrapper\">
                                    <i class=\"bi bi-geo-alt-fill\"></i>
                                    {{ form_widget(registrationForm.cabinet, {'attr': {'class': 'form-control', 'placeholder': 'Sélectionnez d\\'abord une ville', 'autocomplete': 'off', 'id': 'cabinet-input', 'disabled': 'disabled'}}) }}
                                </div>
                                <div class=\"autocomplete-dropdown\" id=\"cabinet-dropdown\"></div>
                            </div>
                            {{ form_errors(registrationForm.cabinet) }}
                        </div>

                        <div class=\"form-group\">
                            {{ form_label(registrationForm.adresse, 'Adresse du cabinet', {'label_attr': {'class': 'form-label'}}) }}
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-geo-alt\"></i>
                                {{ form_widget(registrationForm.adresse, {'attr': {'class': 'form-control', 'placeholder': 'Adresse complète du cabinet'}}) }}
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== Re-enable disabled fields before form submit =====
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                const cabinetField = document.getElementById('cabinet-input');
                if (cabinetField) cabinetField.disabled = false;
            });
        }

        // ===== File upload preview =====
        const fileInputs = document.querySelectorAll('.file-input');
        fileInputs.forEach(input => {
            const wrapper = input.closest('.file-upload-wrapper');
            const preview = wrapper.querySelector('.image-preview');
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (preview && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    }
                    const uploadArea = wrapper.querySelector('.file-upload-area p');
                    if (uploadArea) {
                        uploadArea.innerHTML = `Fichier sélectionné: <span>\${file.name}</span>`;
                    }
                }
            });
        });

        // ===== Municipalities autocomplete (filtered by ville) =====
        const municipalities = [
            // Tunis
            {n:\"Tunis\",g:\"Tunis\"},{n:\"Le Bardo\",g:\"Tunis\"},{n:\"Le Kram\",g:\"Tunis\"},{n:\"La Goulette\",g:\"Tunis\"},{n:\"Carthage\",g:\"Tunis\"},{n:\"Sidi Bou Saïd\",g:\"Tunis\"},{n:\"La Marsa\",g:\"Tunis\"},{n:\"Sidi Hassine\",g:\"Tunis\"},{n:\"El Ouardia\",g:\"Tunis\"},{n:\"Ezzouhour\",g:\"Tunis\"},{n:\"El Omrane\",g:\"Tunis\"},{n:\"El Omrane Supérieur\",g:\"Tunis\"},{n:\"El Menzah\",g:\"Tunis\"},{n:\"El Hrairia\",g:\"Tunis\"},
            // Ariana
            {n:\"Ariana\",g:\"Ariana\"},{n:\"La Soukra\",g:\"Ariana\"},{n:\"Raoued\",g:\"Ariana\"},{n:\"Kalâat el-Andalous\",g:\"Ariana\"},{n:\"Sidi Thabet\",g:\"Ariana\"},{n:\"Ettadhamen\",g:\"Ariana\"},{n:\"El Mnihla\",g:\"Ariana\"},
            // Ben Arous
            {n:\"Ben Arous\",g:\"Ben Arous\"},{n:\"El Mourouj\",g:\"Ben Arous\"},{n:\"Hammam Lif\",g:\"Ben Arous\"},{n:\"Hammam Chott\",g:\"Ben Arous\"},{n:\"Bou Mhel el-Bassatine\",g:\"Ben Arous\"},{n:\"Ezzahra\",g:\"Ben Arous\"},{n:\"Radès\",g:\"Ben Arous\"},{n:\"Mégrine\",g:\"Ben Arous\"},{n:\"Mohamedia\",g:\"Ben Arous\"},{n:\"Fouchana\",g:\"Ben Arous\"},{n:\"Mornag\",g:\"Ben Arous\"},{n:\"Khalidia\",g:\"Ben Arous\"},{n:\"Nouvelle Médina\",g:\"Ben Arous\"},
            // Manouba
            {n:\"La Manouba\",g:\"Manouba\"},{n:\"Den Den\",g:\"Manouba\"},{n:\"Douar Hicher\",g:\"Manouba\"},{n:\"Oued Ellil\",g:\"Manouba\"},{n:\"Mornaguia\",g:\"Manouba\"},{n:\"Borj El Amri\",g:\"Manouba\"},{n:\"Jedaïda\",g:\"Manouba\"},{n:\"Tebourba\",g:\"Manouba\"},{n:\"El Battan\",g:\"Manouba\"},
            // Nabeul
            {n:\"Nabeul\",g:\"Nabeul\"},{n:\"Hammamet\",g:\"Nabeul\"},{n:\"Dar Chaâbane\",g:\"Nabeul\"},{n:\"Béni Khiar\",g:\"Nabeul\"},{n:\"Korba\",g:\"Nabeul\"},{n:\"Menzel Temime\",g:\"Nabeul\"},{n:\"Kélibia\",g:\"Nabeul\"},{n:\"El Haouaria\",g:\"Nabeul\"},{n:\"Soliman\",g:\"Nabeul\"},{n:\"Grombalia\",g:\"Nabeul\"},{n:\"Bou Argoub\",g:\"Nabeul\"},{n:\"Menzel Bouzelfa\",g:\"Nabeul\"},{n:\"Béni Khalled\",g:\"Nabeul\"},{n:\"Takelsa\",g:\"Nabeul\"},{n:\"El Mida\",g:\"Nabeul\"},{n:\"Dar Allouch\",g:\"Nabeul\"},
            // Zaghouan
            {n:\"Zaghouan\",g:\"Zaghouan\"},{n:\"Zriba\",g:\"Zaghouan\"},{n:\"Bir Mcherga\",g:\"Zaghouan\"},{n:\"El Fahs\",g:\"Zaghouan\"},{n:\"Nadhour\",g:\"Zaghouan\"},
            // Bizerte
            {n:\"Bizerte\",g:\"Bizerte\"},{n:\"Menzel Bourguiba\",g:\"Bizerte\"},{n:\"Menzel Jemil\",g:\"Bizerte\"},{n:\"Menzel Abderrahmane\",g:\"Bizerte\"},{n:\"Tinja\",g:\"Bizerte\"},{n:\"Mateur\",g:\"Bizerte\"},{n:\"Ras Jebel\",g:\"Bizerte\"},{n:\"Rafraf\",g:\"Bizerte\"},{n:\"El Alia\",g:\"Bizerte\"},{n:\"Ghar El Melh\",g:\"Bizerte\"},{n:\"Aousja\",g:\"Bizerte\"},{n:\"Sejnane\",g:\"Bizerte\"},{n:\"Joumine\",g:\"Bizerte\"},{n:\"Ghezala\",g:\"Bizerte\"},{n:\"Utique\",g:\"Bizerte\"},
            // Béja
            {n:\"Béja\",g:\"Béja\"},{n:\"Medjez el-Bab\",g:\"Béja\"},{n:\"Nefza\",g:\"Béja\"},{n:\"Téboursouk\",g:\"Béja\"},{n:\"Testour\",g:\"Béja\"},{n:\"Goubellat\",g:\"Béja\"},{n:\"Amdoun\",g:\"Béja\"},{n:\"Thibar\",g:\"Béja\"},
            // Jendouba
            {n:\"Jendouba\",g:\"Jendouba\"},{n:\"Bou Salem\",g:\"Jendouba\"},{n:\"Tabarka\",g:\"Jendouba\"},{n:\"Aïn Draham\",g:\"Jendouba\"},{n:\"Fernana\",g:\"Jendouba\"},{n:\"Ghardimaou\",g:\"Jendouba\"},{n:\"Oued Mliz\",g:\"Jendouba\"},{n:\"Balta-Bou Aouane\",g:\"Jendouba\"},
            // Le Kef
            {n:\"Le Kef\",g:\"Le Kef\"},{n:\"Nebeur\",g:\"Le Kef\"},{n:\"Tajerouine\",g:\"Le Kef\"},{n:\"Kalâat Senan\",g:\"Le Kef\"},{n:\"Sakiet Sidi Youssef\",g:\"Le Kef\"},{n:\"Dahmani\",g:\"Le Kef\"},{n:\"Kalâat Khasba\",g:\"Le Kef\"},{n:\"Jérissa\",g:\"Le Kef\"},{n:\"Sers\",g:\"Le Kef\"},
            // Siliana
            {n:\"Siliana\",g:\"Siliana\"},{n:\"Bou Arada\",g:\"Siliana\"},{n:\"Gaâfour\",g:\"Siliana\"},{n:\"El Krib\",g:\"Siliana\"},{n:\"Makthar\",g:\"Siliana\"},{n:\"Rouhia\",g:\"Siliana\"},{n:\"Kesra\",g:\"Siliana\"},{n:\"Bargou\",g:\"Siliana\"},{n:\"Sidi Bou Rouis\",g:\"Siliana\"},
            // Sousse
            {n:\"Sousse\",g:\"Sousse\"},{n:\"Msaken\",g:\"Sousse\"},{n:\"Kalâa Kebira\",g:\"Sousse\"},{n:\"Kalâa Seghira\",g:\"Sousse\"},{n:\"Hammam Sousse\",g:\"Sousse\"},{n:\"Akouda\",g:\"Sousse\"},{n:\"Zaouiet Sousse\",g:\"Sousse\"},{n:\"Hergla\",g:\"Sousse\"},{n:\"Sidi Bou Ali\",g:\"Sousse\"},{n:\"Enfidha\",g:\"Sousse\"},{n:\"Bouficha\",g:\"Sousse\"},{n:\"Kondar\",g:\"Sousse\"},{n:\"Sidi El Héni\",g:\"Sousse\"},
            // Monastir
            {n:\"Monastir\",g:\"Monastir\"},{n:\"Jemmal\",g:\"Monastir\"},{n:\"Ksar Hellal\",g:\"Monastir\"},{n:\"Moknine\",g:\"Monastir\"},{n:\"Téboulba\",g:\"Monastir\"},{n:\"Sayada-Lamta-Bou Hajar\",g:\"Monastir\"},{n:\"Bembla\",g:\"Monastir\"},{n:\"Sahline\",g:\"Monastir\"},{n:\"Ouerdanine\",g:\"Monastir\"},{n:\"Ksibet el-Médiouni\",g:\"Monastir\"},{n:\"Zéramdine\",g:\"Monastir\"},{n:\"Beni Hassen\",g:\"Monastir\"},{n:\"Menzel Kamel\",g:\"Monastir\"},{n:\"Bekalta\",g:\"Monastir\"},{n:\"Menzel Ennabi\",g:\"Monastir\"},
            // Mahdia
            {n:\"Mahdia\",g:\"Mahdia\"},{n:\"El Jem\",g:\"Mahdia\"},{n:\"Ksour Essef\",g:\"Mahdia\"},{n:\"Chebba\",g:\"Mahdia\"},{n:\"Bou Merdes\",g:\"Mahdia\"},{n:\"Melloulèche\",g:\"Mahdia\"},{n:\"Sidi Alouane\",g:\"Mahdia\"},{n:\"Chorbane\",g:\"Mahdia\"},{n:\"Essouassi\",g:\"Mahdia\"},{n:\"Rejiche\",g:\"Mahdia\"},{n:\"Hebira\",g:\"Mahdia\"},
            // Sfax
            {n:\"Sfax\",g:\"Sfax\"},{n:\"Sakiet Ezzit\",g:\"Sfax\"},{n:\"Sakiet Eddaïer\",g:\"Sfax\"},{n:\"Chihia\",g:\"Sfax\"},{n:\"El Ain\",g:\"Sfax\"},{n:\"Thyna\",g:\"Sfax\"},{n:\"Agareb\",g:\"Sfax\"},{n:\"Jébéniana\",g:\"Sfax\"},{n:\"El Hencha\",g:\"Sfax\"},{n:\"Menzel Chaker\",g:\"Sfax\"},{n:\"Graïba\",g:\"Sfax\"},{n:\"Bir Ali Ben Khélifa\",g:\"Sfax\"},{n:\"Skhira\",g:\"Sfax\"},{n:\"Mahares\",g:\"Sfax\"},{n:\"Kerkennah\",g:\"Sfax\"},{n:\"Ghraiba\",g:\"Sfax\"},
            // Kairouan
            {n:\"Kairouan\",g:\"Kairouan\"},{n:\"Sbikha\",g:\"Kairouan\"},{n:\"Haffouz\",g:\"Kairouan\"},{n:\"Nasrallah\",g:\"Kairouan\"},{n:\"Bou Hajla\",g:\"Kairouan\"},{n:\"Oueslatia\",g:\"Kairouan\"},{n:\"Hajeb El Ayoun\",g:\"Kairouan\"},{n:\"Chebika\",g:\"Kairouan\"},{n:\"Aïn Jelloula\",g:\"Kairouan\"},{n:\"Menzel Mehiri\",g:\"Kairouan\"},{n:\"El Alâa\",g:\"Kairouan\"},
            // Kasserine
            {n:\"Kasserine\",g:\"Kasserine\"},{n:\"Sbeitla\",g:\"Kasserine\"},{n:\"Fériana\",g:\"Kasserine\"},{n:\"Thala\",g:\"Kasserine\"},{n:\"Haïdra\",g:\"Kasserine\"},{n:\"Foussana\",g:\"Kasserine\"},{n:\"Jedelienne\",g:\"Kasserine\"},{n:\"El Ayoun\",g:\"Kasserine\"},{n:\"Sbiba\",g:\"Kasserine\"},{n:\"Hassi El Ferid\",g:\"Kasserine\"},{n:\"Majel Bel Abbès\",g:\"Kasserine\"},
            // Sidi Bouzid
            {n:\"Sidi Bouzid\",g:\"Sidi Bouzid\"},{n:\"Regueb\",g:\"Sidi Bouzid\"},{n:\"Jilma\",g:\"Sidi Bouzid\"},{n:\"Menzel Bouzaïane\",g:\"Sidi Bouzid\"},{n:\"Meknassy\",g:\"Sidi Bouzid\"},{n:\"Bir El Hafey\",g:\"Sidi Bouzid\"},{n:\"Sidi Ali Ben Aoun\",g:\"Sidi Bouzid\"},{n:\"Cebbala Ouled Asker\",g:\"Sidi Bouzid\"},{n:\"Mezzouna\",g:\"Sidi Bouzid\"},{n:\"Ouled Haffouz\",g:\"Sidi Bouzid\"},
            // Gabès
            {n:\"Gabès\",g:\"Gabès\"},{n:\"El Hamma\",g:\"Gabès\"},{n:\"Mareth\",g:\"Gabès\"},{n:\"Matmata\",g:\"Gabès\"},{n:\"Nouvelle Matmata\",g:\"Gabès\"},{n:\"Métouia\",g:\"Gabès\"},{n:\"Menzel El Habib\",g:\"Gabès\"},{n:\"Ghannouch\",g:\"Gabès\"},{n:\"Chenini Nahal\",g:\"Gabès\"},{n:\"Oudhref\",g:\"Gabès\"},
            // Médenine
            {n:\"Médenine\",g:\"Médenine\"},{n:\"Zarzis\",g:\"Médenine\"},{n:\"Ben Gardane\",g:\"Médenine\"},{n:\"Houmt Souk\",g:\"Médenine\"},{n:\"Midoun\",g:\"Médenine\"},{n:\"Ajim\",g:\"Médenine\"},{n:\"Beni Khedache\",g:\"Médenine\"},{n:\"Sidi Makhlouf\",g:\"Médenine\"},
            // Tataouine
            {n:\"Tataouine\",g:\"Tataouine\"},{n:\"Ghomrassen\",g:\"Tataouine\"},{n:\"Dehiba\",g:\"Tataouine\"},{n:\"Remada\",g:\"Tataouine\"},{n:\"Bir Lahmar\",g:\"Tataouine\"},{n:\"Smâr\",g:\"Tataouine\"},
            // Gafsa
            {n:\"Gafsa\",g:\"Gafsa\"},{n:\"Métlaoui\",g:\"Gafsa\"},{n:\"Redeyef\",g:\"Gafsa\"},{n:\"Moularès\",g:\"Gafsa\"},{n:\"El Guettar\",g:\"Gafsa\"},{n:\"Mdhilla\",g:\"Gafsa\"},{n:\"Sened\",g:\"Gafsa\"},{n:\"Belkhir\",g:\"Gafsa\"},{n:\"Sidi Aïch\",g:\"Gafsa\"},{n:\"El Ksar\",g:\"Gafsa\"},
            // Tozeur
            {n:\"Tozeur\",g:\"Tozeur\"},{n:\"Nefta\",g:\"Tozeur\"},{n:\"Degache\",g:\"Tozeur\"},{n:\"Tameghza\",g:\"Tozeur\"},{n:\"Hazoua\",g:\"Tozeur\"},
            // Kébili
            {n:\"Kébili\",g:\"Kébili\"},{n:\"Douz\",g:\"Kébili\"},{n:\"Souk Lahad\",g:\"Kébili\"},{n:\"El Golâa\",g:\"Kébili\"},{n:\"Jemna\",g:\"Kébili\"},{n:\"Faouar\",g:\"Kébili\"}
        ];

        // Mapping: TunisianCity enum values → municipality gouvernorat names
        const villeToGouvernorat = {
            'Tunis': 'Tunis',
            'Ariana': 'Ariana',
            'Ben Arous': 'Ben Arous',
            'Mannouba': 'Manouba',
            'Nabeul': 'Nabeul',
            'Zaghouan': 'Zaghouan',
            'Bizerte': 'Bizerte',
            'Béja': 'Béja',
            'Jendouba': 'Jendouba',
            'Le Kef': 'Le Kef',
            'Siliana': 'Siliana',
            'Sousse': 'Sousse',
            'Monastir': 'Monastir',
            'Mahdia': 'Mahdia',
            'Sfax': 'Sfax',
            'Kairouan': 'Kairouan',
            'Kasserine': 'Kasserine',
            'Sidi Bouzid': 'Sidi Bouzid',
            'Gabès': 'Gabès',
            'Médenine': 'Médenine',
            'Tataouine': 'Tataouine',
            'Gafsa': 'Gafsa',
            'Tozeur': 'Tozeur',
            'Kébili': 'Kébili',
            'Bourgelaterre': 'Bourgelaterre'
        };

        const villeSelect = document.getElementById('ville-select') || document.querySelector('[name\$=\"[ville]\"]');
        const cabinetInput = document.getElementById('cabinet-input') || document.querySelector('[name\$=\"[cabinet]\"]');
        if (!cabinetInput || !villeSelect) return;

        const dropdown = document.getElementById('cabinet-dropdown');
        let activeIndex = -1;
        let selectedGouvernorat = null;

        function normalize(str) {
            return str.normalize('NFD').replace(/[\\u0300-\\u036f]/g, '').toLowerCase();
        }

        function getFilteredMunicipalities() {
            if (!selectedGouvernorat) return [];
            return municipalities.filter(m => m.g === selectedGouvernorat);
        }

        function updateCabinetState() {
            const villeValue = villeSelect.value;
            if (villeValue) {
                selectedGouvernorat = villeToGouvernorat[villeValue] || villeValue;
                cabinetInput.disabled = false;
                cabinetInput.placeholder = 'Tapez le nom de la municipalité';
                // Clear previous value since gouvernorat changed
                cabinetInput.value = '';
                dropdown.classList.remove('open');
            } else {
                selectedGouvernorat = null;
                cabinetInput.disabled = true;
                cabinetInput.placeholder = 'Sélectionnez d\\'abord une ville';
                cabinetInput.value = '';
                dropdown.classList.remove('open');
            }
        }

        // Listen for ville changes
        villeSelect.addEventListener('change', updateCabinetState);

        // Initialize state on page load (in case ville is already selected, e.g. form re-render)
        if (villeSelect.value) {
            selectedGouvernorat = villeToGouvernorat[villeSelect.value] || villeSelect.value;
            cabinetInput.disabled = false;
            cabinetInput.placeholder = 'Tapez le nom de la municipalité';
        }

        function renderDropdown(matches) {
            dropdown.innerHTML = '';
            activeIndex = -1;
            if (matches.length === 0) {
                dropdown.innerHTML = '<div class=\"autocomplete-no-result\">Aucune municipalité trouvée</div>';
                dropdown.classList.add('open');
                return;
            }
            matches.forEach((m, i) => {
                const div = document.createElement('div');
                div.className = 'autocomplete-item';
                div.dataset.index = i;
                div.innerHTML = m.n;
                div.addEventListener('mousedown', function(e) {
                    e.preventDefault();
                    cabinetInput.value = m.n;
                    dropdown.classList.remove('open');
                });
                dropdown.appendChild(div);
            });
            dropdown.classList.add('open');
        }

        cabinetInput.addEventListener('input', function() {
            const val = normalize(this.value.trim());
            const filtered = getFilteredMunicipalities();
            if (val.length < 1) {
                // Show all municipalities for this gouvernorat
                renderDropdown(filtered);
                return;
            }
            const matches = filtered.filter(m => normalize(m.n).includes(val));
            renderDropdown(matches);
        });

        cabinetInput.addEventListener('focus', function() {
            if (!selectedGouvernorat) return;
            const val = normalize(this.value.trim());
            const filtered = getFilteredMunicipalities();
            if (val.length < 1) {
                renderDropdown(filtered);
            } else {
                const matches = filtered.filter(m => normalize(m.n).includes(val));
                renderDropdown(matches);
            }
        });

        cabinetInput.addEventListener('blur', function() {
            setTimeout(() => dropdown.classList.remove('open'), 150);
        });

        cabinetInput.addEventListener('keydown', function(e) {
            const items = dropdown.querySelectorAll('.autocomplete-item');
            if (!items.length) return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIndex = Math.min(activeIndex + 1, items.length - 1);
                items.forEach(it => it.classList.remove('active'));
                items[activeIndex].classList.add('active');
                items[activeIndex].scrollIntoView({ block: 'nearest' });
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIndex = Math.max(activeIndex - 1, 0);
                items.forEach(it => it.classList.remove('active'));
                items[activeIndex].classList.add('active');
                items[activeIndex].scrollIntoView({ block: 'nearest' });
            } else if (e.key === 'Enter' && activeIndex >= 0) {
                e.preventDefault();
                items[activeIndex].dispatchEvent(new Event('mousedown'));
            } else if (e.key === 'Escape') {
                dropdown.classList.remove('open');
            }
        });
    });
    </script>
</body>
</html>
", "registration/medecin_register.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\registration\\medecin_register.html.twig");
    }
}
