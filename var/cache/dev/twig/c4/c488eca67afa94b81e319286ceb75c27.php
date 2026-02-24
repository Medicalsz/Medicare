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

/* frontend/edit_profile.html.twig */
class __TwigTemplate_9765b4606721af934d9661f5f9212279 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/edit_profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/edit_profile.html.twig"));

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

        yield "Modifier le Profil - Medicare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<main class=\"main\" style=\"padding-top: 100px; background: #f8fafc; min-height: 100vh;\">
    <div class=\"container py-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-lg-10\">
                <div class=\"card border-0 shadow-sm rounded-4 overflow-hidden\">
                    <div class=\"card-header bg-white border-bottom py-4 px-4 px-md-5\">
                        <div class=\"d-flex align-items-center justify-content-between\">
                            <h1 class=\"h3 fw-bold mb-0\">Modifier votre profil</h1>
                            <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">
                                <i class=\"bi bi-x-lg me-1\"></i> Annuler
                            </a>
                        </div>
                    </div>
                    
                    <div class=\"card-body p-4 p-md-5\">
                        ";
        // line 21
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation", "novalidate" => "novalidate"]]);
        yield "
                        
                        <div class=\"row g-4\">
                            <!-- Photo Upload Section -->
                            <div class=\"col-12 text-center mb-4\">
                                <div class=\"profile-photo-preview mb-3\">
                                    ";
        // line 27
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "photo", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "                                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 28, $this->source); })()), "photo", [], "any", false, false, false, 28), "html", null, true);
            yield "\" alt=\"Preview\" id=\"photoPreview\" class=\"rounded-circle shadow-sm\" style=\"width: 150px; height: 150px; object-fit: cover; border: 4px solid white;\">
                                    ";
        } else {
            // line 30
            yield "                                        <div id=\"photoPlaceholder\" class=\"rounded-circle shadow-sm bg-light d-flex align-items-center justify-content-center mx-auto\" style=\"width: 150px; height: 150px; border: 4px solid white;\">
                                            <i class=\"bi bi-person text-secondary\" style=\"font-size: 80px;\"></i>
                                        </div>
                                        <img id=\"photoPreview\" class=\"rounded-circle shadow-sm d-none\" style=\"width: 150px; height: 150px; object-fit: cover; border: 4px solid white;\">
                                    ";
        }
        // line 35
        yield "                                </div>
                                <div class=\"upload-btn-wrapper\">
                                    ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "photo", [], "any", false, false, false, 37), 'widget', ["attr" => ["class" => "d-none", "onchange" => "previewImage(this)"]]);
        yield "
                                    <button type=\"button\" class=\"btn btn-sm btn-primary px-4\" onclick=\"document.getElementById('";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "photo", [], "any", false, false, false, 38), "vars", [], "any", false, false, false, 38), "id", [], "any", false, false, false, 38), "html", null, true);
        yield "').click()\">
                                        <i class=\"bi bi-camera me-2\"></i> Changer la photo
                                    </button>
                                </div>
                                ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "photo", [], "any", false, false, false, 42), 'errors');
        yield "
                            </div>

                            <hr class=\"mt-2 mb-4\">

                            <!-- Basic Info -->
                            <div class=\"col-md-6 mb-3\">
                                ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "prenom", [], "any", false, false, false, 49), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                                ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "prenom", [], "any", false, false, false, 50), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
        yield "
                                ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "prenom", [], "any", false, false, false, 51), 'errors');
        yield "
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "nom", [], "any", false, false, false, 54), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "nom", [], "any", false, false, false, 55), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
        yield "
                                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "nom", [], "any", false, false, false, 56), 'errors');
        yield "
                            </div>

                            <div class=\"col-md-6 mb-3\">
                                ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "numero", [], "any", false, false, false, 60), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                                ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "numero", [], "any", false, false, false, 61), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
        yield "
                                ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "numero", [], "any", false, false, false, 62), 'errors');
        yield "
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "adresse", [], "any", false, false, false, 65), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                                ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "adresse", [], "any", false, false, false, 66), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
        yield "
                                ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "adresse", [], "any", false, false, false, 67), 'errors');
        yield "
                            </div>

                            <!-- Doctor Specific Fields -->
                            ";
        // line 71
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "specialite", [], "any", true, true, false, 71)) {
            // line 72
            yield "                                <div class=\"col-md-6 mb-3\">
                                    ";
            // line 73
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "specialite", [], "any", false, false, false, 73), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                                    ";
            // line 74
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "specialite", [], "any", false, false, false, 74), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
            yield "
                                    ";
            // line 75
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), "specialite", [], "any", false, false, false, 75), 'errors');
            yield "
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    ";
            // line 78
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "cabinet", [], "any", false, false, false, 78), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                                    ";
            // line 79
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "cabinet", [], "any", false, false, false, 79), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
            yield "
                                    ";
            // line 80
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "cabinet", [], "any", false, false, false, 80), 'errors');
            yield "
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    ";
            // line 83
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "ville", [], "any", false, false, false, 83), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                                    ";
            // line 84
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "ville", [], "any", false, false, false, 84), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
            yield "
                                    ";
            // line 85
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "ville", [], "any", false, false, false, 85), 'errors');
            yield "
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    ";
            // line 88
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 88, $this->source); })()), "delegation", [], "any", false, false, false, 88), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                                    ";
            // line 89
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), "delegation", [], "any", false, false, false, 89), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
            yield "
                                    ";
            // line 90
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 90, $this->source); })()), "delegation", [], "any", false, false, false, 90), 'errors');
            yield "
                                </div>
                                <div class=\"col-md-12 mb-3\">
                                    ";
            // line 93
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "prixConsultation", [], "any", false, false, false, 93), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                                    ";
            // line 94
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 94, $this->source); })()), "prixConsultation", [], "any", false, false, false, 94), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3 py-2"]]);
            yield "
                                    ";
            // line 95
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "prixConsultation", [], "any", false, false, false, 95), 'errors');
            yield "
                                </div>
                                <div class=\"col-12 mb-3\">
                                    ";
            // line 98
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "bio", [], "any", false, false, false, 98), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                                    ";
            // line 99
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), "bio", [], "any", false, false, false, 99), 'widget', ["attr" => ["class" => "form-control border-0 bg-light-subtle rounded-3", "rows" => 5]]);
            yield "
                                    ";
            // line 100
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "bio", [], "any", false, false, false, 100), 'errors');
            yield "
                                </div>
                            ";
        }
        // line 103
        yield "
                            <div class=\"col-12 mt-4 pt-4 border-top\">
                                <button type=\"submit\" class=\"btn btn-primary px-5 py-2 rounded-3 fw-bold\">
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </div>
                        
                        ";
        // line 111
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), 'form_end');
        yield "
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    <input type=\"hidden\" name=\"cropped_image\" id=\"croppedImageData\">

    <!-- Cropping Modal -->
    <div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" aria-labelledby=\"cropModalLabel\" aria-hidden=\"true\" data-bs-backdrop=\"static\">
        <div class=\"modal-dialog modal-lg modal-dialog-centered\">
            <div class=\"modal-content border-0 shadow-lg rounded-4\">
                <div class=\"modal-header border-bottom py-3\">
                    <h5 class=\"modal-title fw-bold\" id=\"cropModalLabel\">Recadrer la photo</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body p-0\">
                    <div class=\"img-container\" style=\"max-height: 500px; background: #000;\">
                        <img id=\"cropperImage\" src=\"\" style=\"max-width: 100%; display: block;\">
                    </div>
                </div>
                <div class=\"modal-footer border-top py-3\">
                    <button type=\"button\" class=\"btn btn-secondary px-4\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"button\" class=\"btn btn-primary px-4\" id=\"cropButton\">
                        <i class=\"bi bi-crop me-2\"></i> Recadrer et Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cropper;
        const cropModalEl = document.getElementById('cropModal');
        const cropModal = new bootstrap.Modal(cropModalEl);
        const cropperImage = document.getElementById('cropperImage');
        const cropButton = document.getElementById('cropButton');
        const photoPreview = document.getElementById('photoPreview');
        const photoPlaceholder = document.getElementById('photoPlaceholder');
        const croppedImageData = document.getElementById('croppedImageData');

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    cropperImage.src = e.target.result;
                    cropModal.show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        cropModalEl.addEventListener('shown.bs.modal', function () {
            cropper = new Cropper(cropperImage, {
                aspectRatio: 1,
                viewMode: 1,
                guides: true,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
            });
        });

        cropModalEl.addEventListener('hidden.bs.modal', function () {
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });

        cropButton.addEventListener('click', function() {
            if (cropper) {
                const canvas = cropper.getCroppedCanvas({
                    width: 500,
                    height: 500,
                });
                
                const dataURL = canvas.toDataURL('image/jpeg', 0.9);
                
                // Update preview
                photoPreview.src = dataURL;
                photoPreview.classList.remove('d-none');
                if (photoPlaceholder) {
                    photoPlaceholder.classList.add('d-none');
                }
                
                // Store data
                croppedImageData.value = dataURL;
                
                cropModal.hide();
            }
        });
    </script>

<style>
    .bg-light-subtle {
        background-color: #f1f5f9;
    }
    .form-control:focus {
        background-color: #fff;
        box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.1);
        border-color: #0ea5e9;
    }
    .btn-primary {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
    }
    .btn-primary:hover {
        background-color: #0284c7;
        border-color: #0284c7;
    }
    .btn-outline-primary {
        color: #0ea5e9;
        border-color: #0ea5e9;
    }
    .btn-outline-primary:hover {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
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
        return "frontend/edit_profile.html.twig";
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
        return array (  326 => 111,  316 => 103,  310 => 100,  306 => 99,  302 => 98,  296 => 95,  292 => 94,  288 => 93,  282 => 90,  278 => 89,  274 => 88,  268 => 85,  264 => 84,  260 => 83,  254 => 80,  250 => 79,  246 => 78,  240 => 75,  236 => 74,  232 => 73,  229 => 72,  227 => 71,  220 => 67,  216 => 66,  212 => 65,  206 => 62,  202 => 61,  198 => 60,  191 => 56,  187 => 55,  183 => 54,  177 => 51,  173 => 50,  169 => 49,  159 => 42,  152 => 38,  148 => 37,  144 => 35,  137 => 30,  131 => 28,  129 => 27,  120 => 21,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Modifier le Profil - Medicare{% endblock %}

{% block body %}
<main class=\"main\" style=\"padding-top: 100px; background: #f8fafc; min-height: 100vh;\">
    <div class=\"container py-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-lg-10\">
                <div class=\"card border-0 shadow-sm rounded-4 overflow-hidden\">
                    <div class=\"card-header bg-white border-bottom py-4 px-4 px-md-5\">
                        <div class=\"d-flex align-items-center justify-content-between\">
                            <h1 class=\"h3 fw-bold mb-0\">Modifier votre profil</h1>
                            <a href=\"{{ path('app_profile') }}\" class=\"btn btn-outline-secondary btn-sm\">
                                <i class=\"bi bi-x-lg me-1\"></i> Annuler
                            </a>
                        </div>
                    </div>
                    
                    <div class=\"card-body p-4 p-md-5\">
                        {{ form_start(form, {'attr': {'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
                        
                        <div class=\"row g-4\">
                            <!-- Photo Upload Section -->
                            <div class=\"col-12 text-center mb-4\">
                                <div class=\"profile-photo-preview mb-3\">
                                    {% if user.photo %}
                                        <img src=\"{{ user.photo }}\" alt=\"Preview\" id=\"photoPreview\" class=\"rounded-circle shadow-sm\" style=\"width: 150px; height: 150px; object-fit: cover; border: 4px solid white;\">
                                    {% else %}
                                        <div id=\"photoPlaceholder\" class=\"rounded-circle shadow-sm bg-light d-flex align-items-center justify-content-center mx-auto\" style=\"width: 150px; height: 150px; border: 4px solid white;\">
                                            <i class=\"bi bi-person text-secondary\" style=\"font-size: 80px;\"></i>
                                        </div>
                                        <img id=\"photoPreview\" class=\"rounded-circle shadow-sm d-none\" style=\"width: 150px; height: 150px; object-fit: cover; border: 4px solid white;\">
                                    {% endif %}
                                </div>
                                <div class=\"upload-btn-wrapper\">
                                    {{ form_widget(form.photo, {'attr': {'class': 'd-none', 'onchange': 'previewImage(this)'}}) }}
                                    <button type=\"button\" class=\"btn btn-sm btn-primary px-4\" onclick=\"document.getElementById('{{ form.photo.vars.id }}').click()\">
                                        <i class=\"bi bi-camera me-2\"></i> Changer la photo
                                    </button>
                                </div>
                                {{ form_errors(form.photo) }}
                            </div>

                            <hr class=\"mt-2 mb-4\">

                            <!-- Basic Info -->
                            <div class=\"col-md-6 mb-3\">
                                {{ form_label(form.prenom, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.prenom, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                {{ form_errors(form.prenom) }}
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                {{ form_label(form.nom, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.nom, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                {{ form_errors(form.nom) }}
                            </div>

                            <div class=\"col-md-6 mb-3\">
                                {{ form_label(form.numero, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.numero, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                {{ form_errors(form.numero) }}
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                {{ form_label(form.adresse, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.adresse, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                {{ form_errors(form.adresse) }}
                            </div>

                            <!-- Doctor Specific Fields -->
                            {% if form.specialite is defined %}
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.specialite, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.specialite, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                    {{ form_errors(form.specialite) }}
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.cabinet, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.cabinet, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                    {{ form_errors(form.cabinet) }}
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.ville, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.ville, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                    {{ form_errors(form.ville) }}
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.delegation, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.delegation, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                    {{ form_errors(form.delegation) }}
                                </div>
                                <div class=\"col-md-12 mb-3\">
                                    {{ form_label(form.prixConsultation, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.prixConsultation, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3 py-2'}}) }}
                                    {{ form_errors(form.prixConsultation) }}
                                </div>
                                <div class=\"col-12 mb-3\">
                                    {{ form_label(form.bio, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.bio, {'attr': {'class': 'form-control border-0 bg-light-subtle rounded-3', 'rows': 5}}) }}
                                    {{ form_errors(form.bio) }}
                                </div>
                            {% endif %}

                            <div class=\"col-12 mt-4 pt-4 border-top\">
                                <button type=\"submit\" class=\"btn btn-primary px-5 py-2 rounded-3 fw-bold\">
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </div>
                        
                        {{ form_end(form) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    <input type=\"hidden\" name=\"cropped_image\" id=\"croppedImageData\">

    <!-- Cropping Modal -->
    <div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" aria-labelledby=\"cropModalLabel\" aria-hidden=\"true\" data-bs-backdrop=\"static\">
        <div class=\"modal-dialog modal-lg modal-dialog-centered\">
            <div class=\"modal-content border-0 shadow-lg rounded-4\">
                <div class=\"modal-header border-bottom py-3\">
                    <h5 class=\"modal-title fw-bold\" id=\"cropModalLabel\">Recadrer la photo</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body p-0\">
                    <div class=\"img-container\" style=\"max-height: 500px; background: #000;\">
                        <img id=\"cropperImage\" src=\"\" style=\"max-width: 100%; display: block;\">
                    </div>
                </div>
                <div class=\"modal-footer border-top py-3\">
                    <button type=\"button\" class=\"btn btn-secondary px-4\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"button\" class=\"btn btn-primary px-4\" id=\"cropButton\">
                        <i class=\"bi bi-crop me-2\"></i> Recadrer et Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cropper;
        const cropModalEl = document.getElementById('cropModal');
        const cropModal = new bootstrap.Modal(cropModalEl);
        const cropperImage = document.getElementById('cropperImage');
        const cropButton = document.getElementById('cropButton');
        const photoPreview = document.getElementById('photoPreview');
        const photoPlaceholder = document.getElementById('photoPlaceholder');
        const croppedImageData = document.getElementById('croppedImageData');

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    cropperImage.src = e.target.result;
                    cropModal.show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        cropModalEl.addEventListener('shown.bs.modal', function () {
            cropper = new Cropper(cropperImage, {
                aspectRatio: 1,
                viewMode: 1,
                guides: true,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
            });
        });

        cropModalEl.addEventListener('hidden.bs.modal', function () {
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });

        cropButton.addEventListener('click', function() {
            if (cropper) {
                const canvas = cropper.getCroppedCanvas({
                    width: 500,
                    height: 500,
                });
                
                const dataURL = canvas.toDataURL('image/jpeg', 0.9);
                
                // Update preview
                photoPreview.src = dataURL;
                photoPreview.classList.remove('d-none');
                if (photoPlaceholder) {
                    photoPlaceholder.classList.add('d-none');
                }
                
                // Store data
                croppedImageData.value = dataURL;
                
                cropModal.hide();
            }
        });
    </script>

<style>
    .bg-light-subtle {
        background-color: #f1f5f9;
    }
    .form-control:focus {
        background-color: #fff;
        box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.1);
        border-color: #0ea5e9;
    }
    .btn-primary {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
    }
    .btn-primary:hover {
        background-color: #0284c7;
        border-color: #0284c7;
    }
    .btn-outline-primary {
        color: #0ea5e9;
        border-color: #0ea5e9;
    }
    .btn-outline-primary:hover {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
    }
</style>
{% endblock %}
", "frontend/edit_profile.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\edit_profile.html.twig");
    }
}
