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

/* dashboard/settings.html.twig */
class __TwigTemplate_b83ac3f4217fb3d60dae169f9c8437d2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/settings.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/settings.html.twig"));

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

        yield "Settings - Medicare";
        
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
        yield "<div class=\"container mt-5 mb-5 pb-5\">
    <div class=\"row\">
        <div class=\"col-lg-8 offset-lg-2\">
            <div class=\"d-flex align-items-center justify-content-between mb-4\">
                <div>
                    <h1 class=\"h3 mb-1 fw-bold\"><i class=\"bi bi-gear-fill me-2 text-primary\"></i>Settings</h1>
                    <p class=\"text-muted mb-0\">Manage your account preferences and profile information</p>
                </div>
                <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"btn btn-outline-secondary btn-sm rounded-pill px-3\">
                    <i class=\"bi bi-arrow-left me-1\"></i> Back
                </a>
            </div>

            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "flashes", [], "any", false, false, false, 19));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 20
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 21
                yield "                    <div class=\"alert alert-";
                yield ((($context["label"] === "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true)));
                yield " alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4\" role=\"alert\">
                        ";
                // line 22
                if (($context["label"] == "success")) {
                    // line 23
                    yield "                            <i class=\"bi bi-check-circle-fill me-2\"></i>
                        ";
                } else {
                    // line 25
                    yield "                            <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
                        ";
                }
                // line 27
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        yield "
            ";
        // line 33
        if ((($tmp = (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 33, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 34
            yield "                <div class=\"alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4\" role=\"alert\">
                    <i class=\"bi bi-check-circle-fill me-2\"></i> ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 35, $this->source); })()), "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        // line 39
        yield "
            ";
        // line 40
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), 'form_start', ["attr" => ["id" => "settingsForm"]]);
        yield "
            <input type=\"hidden\" name=\"cropped_photo\" id=\"croppedPhotoInput\">

            <!-- Profile Section -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-person-fill me-2 text-primary\"></i>Personal Information</h5>
                </div>
                <div class=\"card-body p-4\">
                    <!-- Photo Upload with Preview & Crop -->
                    <div class=\"row align-items-center mb-4\">
                        <div class=\"col-auto\">
                            <div class=\"position-relative\">
                                <img src=\"";
        // line 53
        yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "photo", [], "any", false, false, false, 53)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "photo", [], "any", false, false, false, 53), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/default-avatar.png"), "html", null, true)));
        yield "\" 
                                     id=\"profile-preview\" 
                                     class=\"rounded-circle shadow-sm object-fit-cover\" 
                                     style=\"width: 100px; height: 100px; border: 3px solid #f8f9fa;\">
                                <label for=\"";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "photo", [], "any", false, false, false, 57), "vars", [], "any", false, false, false, 57), "id", [], "any", false, false, false, 57), "html", null, true);
        yield "\" class=\"btn btn-primary btn-sm rounded-circle position-absolute bottom-0 end-0 shadow-sm p-1\" style=\"width: 32px; height: 32px;\">
                                    <i class=\"bi bi-camera-fill\"></i>
                                </label>
                            </div>
                        </div>
                        <div class=\"col\">
                            <h6 class=\"mb-1 fw-bold\">Profile Photo</h6>
                            <p class=\"text-muted small mb-1\">JPG, PNG or WebP. Max 2MB.</p>
                            <div class=\"d-flex gap-2\">
                                <label for=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "photo", [], "any", false, false, false, 66), "vars", [], "any", false, false, false, 66), "id", [], "any", false, false, false, 66), "html", null, true);
        yield "\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3\">
                                    <i class=\"bi bi-upload me-1\"></i> Upload
                                </label>
                                <button type=\"button\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3\" onclick=\"openCamera()\">
                                    <i class=\"bi bi-camera me-1\"></i> Take Photo
                                </button>
                            </div>
                            <div class=\"d-none\">
                                ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "photo", [], "any", false, false, false, 74), 'widget', ["attr" => ["onchange" => "initCropper(this)"]]);
        yield "
                            </div>
                        </div>
                    </div>

                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "username", [], "any", false, false, false, 81), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 82, $this->source); })()), "username", [], "any", false, false, false, 82), 'widget');
        yield "
                            ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "username", [], "any", false, false, false, 83), 'errors');
        yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
        // line 86
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "email", [], "any", false, false, false, 86), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 87
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "email", [], "any", false, false, false, 87), 'widget');
        yield "
                            ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 88, $this->source); })()), "email", [], "any", false, false, false, 88), 'errors');
        yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
        // line 91
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), "prenom", [], "any", false, false, false, 91), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 92
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "prenom", [], "any", false, false, false, 92), 'widget');
        yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
        // line 95
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "nom", [], "any", false, false, false, 95), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 96
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "nom", [], "any", false, false, false, 96), 'widget');
        yield "
                        </div>
                        <div class=\"col-md-12\">
                            ";
        // line 99
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), "numero", [], "any", false, false, false, 99), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "numero", [], "any", false, false, false, 100), 'widget');
        yield "
                        </div>
                        <div class=\"col-md-12\">
                            ";
        // line 103
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 103, $this->source); })()), "adresse", [], "any", false, false, false, 103), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 104
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), "adresse", [], "any", false, false, false, 104), 'widget');
        yield "
                        </div>
                    </div>
                </div>
            </div>

            ";
        // line 110
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "specialite", [], "any", true, true, false, 110)) {
            // line 111
            yield "            <!-- Professional Section for Medecin -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-briefcase-fill me-2 text-primary\"></i>Professional Details</h5>
                </div>
                <div class=\"card-body p-4\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            ";
            // line 119
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "specialite", [], "any", false, false, false, 119), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                            ";
            // line 120
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 120, $this->source); })()), "specialite", [], "any", false, false, false, 120), 'widget');
            yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
            // line 123
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 123, $this->source); })()), "prixConsultation", [], "any", false, false, false, 123), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                            <div class=\"input-group\">
                                ";
            // line 125
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 125, $this->source); })()), "prixConsultation", [], "any", false, false, false, 125), 'widget');
            yield "
                                <span class=\"input-group-text\">DT</span>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            ";
            // line 130
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 130, $this->source); })()), "ville", [], "any", false, false, false, 130), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                            ";
            // line 131
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 131, $this->source); })()), "ville", [], "any", false, false, false, 131), 'widget');
            yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
            // line 134
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 134, $this->source); })()), "cabinet", [], "any", false, false, false, 134), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                            ";
            // line 135
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 135, $this->source); })()), "cabinet", [], "any", false, false, false, 135), 'widget');
            yield "
                        </div>
                        <div class=\"col-12\">
                            ";
            // line 138
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 138, $this->source); })()), "bio", [], "any", false, false, false, 138), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
            yield "
                            ";
            // line 139
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 139, $this->source); })()), "bio", [], "any", false, false, false, 139), 'widget');
            yield "
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        // line 145
        yield "
            <!-- Appearance Section -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-palette-fill me-2 text-primary\"></i>Appearance</h5>
                </div>
                <div class=\"card-body p-4\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <div class=\"theme-card p-3 border rounded-3 position-relative cursor-pointer h-100\" onclick=\"document.getElementById('themeLight').click()\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"theme_selector\" id=\"themeLight\" value=\"light\">
                                    <label class=\"form-check-label fw-bold\" for=\"themeLight\">Light Mode</label>
                                </div>
                                <div class=\"mt-2 text-center py-4 bg-light rounded-2\">
                                    <i class=\"bi bi-sun-fill fs-1 text-warning\"></i>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"theme-card p-3 border rounded-3 position-relative cursor-pointer h-100 bg-dark text-white\" onclick=\"document.getElementById('themeDark').click()\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"theme_selector\" id=\"themeDark\" value=\"dark\">
                                    <label class=\"form-check-label fw-bold\" for=\"themeDark\">Dark Mode</label>
                                </div>
                                <div class=\"mt-2 text-center py-4 rounded-2\" style=\"background: #2d3748\">
                                    <i class=\"bi bi-moon-stars-fill fs-1 text-info\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privacy Section -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-shield-lock-fill me-2 text-primary\"></i>Privacy Settings</h5>
                </div>
                <div class=\"card-body p-4\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-4\">
                            ";
        // line 187
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 187, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 187), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 188
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 188, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 188), 'widget');
        yield "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 191
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 191, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 191), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 192
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 192, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 192), 'widget');
        yield "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 195
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 195, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 195), 'label', ["label_attr" => ["class" => "form-label fw-semibold"]]);
        yield "
                            ";
        // line 196
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 196, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 196), 'widget');
        yield "
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"d-grid mb-5\">
                <button type=\"submit\" class=\"btn btn-primary btn-lg rounded-3 fw-bold py-3\">
                    <i class=\"bi bi-save me-2\"></i> Save All Changes
                </button>
            </div>
            ";
        // line 207
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 207, $this->source); })()), 'form_end');
        yield "

            <!-- Danger Zone -->
            <div class=\"card border-danger border-opacity-50 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-danger bg-opacity-10 py-3\">
                    <h5 class=\"mb-0 fw-bold text-danger\"><i class=\"bi bi-exclamation-octagon-fill me-2\"></i>Danger Zone</h5>
                </div>
                <div class=\"card-body p-4 text-center\">
                    <p class=\"text-muted\">Once you delete your account, there is no going back. Please be certain.</p>
                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm px-4 rounded-pill\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteAccountModal\">
                        Delete Account Permanently
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Cropping Modal -->
<div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" data-bs-backdrop=\"static\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content overflow-hidden rounded-4\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title fw-bold\">Crop Profile Photo</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\">
                <div class=\"img-container\" style=\"max-height: 500px;\">
                    <img id=\"cropperImage\" src=\"\" style=\"max-width: 100%;\">
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary rounded-pill px-4\" data-bs-dismiss=\"modal\">Cancel</button>
                <button type=\"button\" class=\"btn btn-primary rounded-pill px-4\" id=\"cropButton\">
                    <i class=\"bi bi-crop me-1\"></i> Apply Crop
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Camera Modal -->
<div class=\"modal fade\" id=\"cameraModal\" tabindex=\"-1\" data-bs-backdrop=\"static\">
    <div class=\"modal-dialog modal-md modal-dialog-centered\">
        <div class=\"modal-content overflow-hidden rounded-4\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title fw-bold\">Take a Photo</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" onclick=\"stopCamera()\"></button>
            </div>
            <div class=\"modal-body p-0 bg-dark position-relative\" style=\"min-height: 300px;\">
                <video id=\"cameraVideo\" class=\"w-100\" autoplay playsinline></video>
                <div class=\"position-absolute bottom-0 start-50 translate-middle-x mb-3\">
                    <button type=\"button\" class=\"btn btn-light btn-lg rounded-circle shadow-lg\" onclick=\"capturePhoto()\" style=\"width: 60px; height: 60px;\">
                        <i class=\"bi bi-camera-fill fs-3\"></i>
                    </button>
                </div>
            </div>
            <div class=\"modal-footer justify-content-center\">
                <p class=\"text-muted small mb-0 font-italic\">Center your face and click the button to capture.</p>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class=\"modal fade\" id=\"deleteAccountModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content border-0 shadow rounded-4 overflow-hidden\">
            <div class=\"modal-header bg-danger text-white\">
                <h5 class=\"modal-title fw-bold\">Delete Account</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-4\">
                <p class=\"text-secondary\">This action is <strong>irreversible</strong>. To confirm, please type <span class=\"badge bg-light text-danger fs-6\">DELETE</span> below:</p>
                <input type=\"text\" class=\"form-control mb-3\" id=\"confirmDeleteInput\" placeholder='Type \"DELETE\" here'>
                <form action=\"";
        // line 282
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_delete_account");
        yield "\" method=\"post\" id=\"deleteForm\">
                    <input type=\"hidden\" name=\"confirmation\" value=\"DELETE\">
                    <button type=\"submit\" class=\"btn btn-danger w-100 rounded-3 py-2 disabled\" id=\"finalDeleteBtn\">
                        I understand, delete my account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer { cursor: pointer; }
    .theme-card { transition: all 0.3s ease; border-width: 2px !important; }
    .theme-card:hover { transform: translateY(-2px); border-color: var(--bs-primary) !important; }
    .theme-card input:checked + label { color: var(--bs-primary); }
    
    .dark-mode .card,
    .dark-mode .modal-content {
        background-color: #1a202c;
        color: #f7fafc;
        border-color: #2d3748 !important;
    }
    
    .dark-mode .card-header {
        background-color: #2d3748 !important;
        border-color: #4a5568 !important;
    }
    
    .dark-mode .form-control,
    .dark-mode .form-select {
        background-color: #2d3748;
        border-color: #4a5568;
        color: #f7fafc;
    }

    .dark-mode .form-control:focus {
        background-color: #313d4f;
        color: #fff;
    }

    #cameraVideo {
        transform: scaleX(-1); /* Mirror effect */
    }
</style>

<script>
let cropper = null;
let stream = null;
const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
const cameraModal = new bootstrap.Modal(document.getElementById('cameraModal'));

function initCropper(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            startCropping(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function startCropping(imageSrc) {
    document.getElementById('cropperImage').src = imageSrc;
    cropModal.show();
}

async function openCamera() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ 
            video: { 
                facingMode: 'user',
                width: { ideal: 640 },
                height: { ideal: 640 }
            } 
        });
        document.getElementById('cameraVideo').srcObject = stream;
        cameraModal.show();
    } catch (err) {
        console.error(\"Camera error: \", err);
        alert(\"Could not access camera. Please ensure you've given permission.\");
    }
}

function stopCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }
    cameraModal.hide();
}

function capturePhoto() {
    const video = document.getElementById('cameraVideo');
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const ctx = canvas.getContext('2d');
    
    // Maintain mirror effect for the capture
    ctx.translate(canvas.width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    
    const imageSrc = canvas.toDataURL('image/jpeg');
    stopCamera();
    startCropping(imageSrc);
}

document.getElementById('cropModal').addEventListener('shown.bs.modal', function() {
    const image = document.getElementById('cropperImage');
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 2,
        autoCropArea: 1,
    });
});

document.getElementById('cropModal').addEventListener('hidden.bs.modal', function() {
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
});

document.getElementById('cropButton').addEventListener('click', function() {
    const canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400,
    });
    
    const base64Image = canvas.toDataURL('image/jpeg');
    document.getElementById('profile-preview').src = base64Image;
    document.getElementById('croppedPhotoInput').value = base64Image;
    cropModal.hide();
});

document.addEventListener('DOMContentLoaded', function() {
    // Theme initialization
    const theme = localStorage.getItem('theme') || 'light';
    const lightRadio = document.getElementById('themeLight');
    const darkRadio = document.getElementById('themeDark');
    
    if (theme === 'dark') darkRadio.checked = true;
    else lightRadio.checked = true;

    // Theme switching
    [lightRadio, darkRadio].forEach(radio => {
        radio.addEventListener('change', function() {
            setGlobalTheme(this.value);
        });
    });

    // Delete confirmation
    const confirmInput = document.getElementById('confirmDeleteInput');
    const deleteBtn = document.getElementById('finalDeleteBtn');
    
    if (confirmInput) {
        confirmInput.addEventListener('input', function() {
            if (this.value === 'DELETE') {
                deleteBtn.classList.remove('disabled');
            } else {
                deleteBtn.classList.add('disabled');
            }
        });
    }
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
        return "dashboard/settings.html.twig";
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
        return array (  532 => 282,  454 => 207,  440 => 196,  436 => 195,  430 => 192,  426 => 191,  420 => 188,  416 => 187,  372 => 145,  363 => 139,  359 => 138,  353 => 135,  349 => 134,  343 => 131,  339 => 130,  331 => 125,  326 => 123,  320 => 120,  316 => 119,  306 => 111,  304 => 110,  295 => 104,  291 => 103,  285 => 100,  281 => 99,  275 => 96,  271 => 95,  265 => 92,  261 => 91,  255 => 88,  251 => 87,  247 => 86,  241 => 83,  237 => 82,  233 => 81,  223 => 74,  212 => 66,  200 => 57,  193 => 53,  177 => 40,  174 => 39,  167 => 35,  164 => 34,  162 => 33,  159 => 32,  153 => 31,  142 => 27,  138 => 25,  134 => 23,  132 => 22,  127 => 21,  122 => 20,  118 => 19,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base_frontend.html.twig\" %}

{% block title %}Settings - Medicare{% endblock %}

{% block body %}
<div class=\"container mt-5 mb-5 pb-5\">
    <div class=\"row\">
        <div class=\"col-lg-8 offset-lg-2\">
            <div class=\"d-flex align-items-center justify-content-between mb-4\">
                <div>
                    <h1 class=\"h3 mb-1 fw-bold\"><i class=\"bi bi-gear-fill me-2 text-primary\"></i>Settings</h1>
                    <p class=\"text-muted mb-0\">Manage your account preferences and profile information</p>
                </div>
                <a href=\"{{ path('app_dashboard') }}\" class=\"btn btn-outline-secondary btn-sm rounded-pill px-3\">
                    <i class=\"bi bi-arrow-left me-1\"></i> Back
                </a>
            </div>

            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ label === 'error' ? 'danger' : label }} alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4\" role=\"alert\">
                        {% if label == 'success' %}
                            <i class=\"bi bi-check-circle-fill me-2\"></i>
                        {% else %}
                            <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
                        {% endif %}
                        {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endfor %}
            {% endfor %}

            {% if message %}
                <div class=\"alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4\" role=\"alert\">
                    <i class=\"bi bi-check-circle-fill me-2\"></i> {{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endif %}

            {{ form_start(form, {'attr': {'id': 'settingsForm'}}) }}
            <input type=\"hidden\" name=\"cropped_photo\" id=\"croppedPhotoInput\">

            <!-- Profile Section -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-person-fill me-2 text-primary\"></i>Personal Information</h5>
                </div>
                <div class=\"card-body p-4\">
                    <!-- Photo Upload with Preview & Crop -->
                    <div class=\"row align-items-center mb-4\">
                        <div class=\"col-auto\">
                            <div class=\"position-relative\">
                                <img src=\"{{ app.user.photo ?: asset('build/frontend/assets/img/default-avatar.png') }}\" 
                                     id=\"profile-preview\" 
                                     class=\"rounded-circle shadow-sm object-fit-cover\" 
                                     style=\"width: 100px; height: 100px; border: 3px solid #f8f9fa;\">
                                <label for=\"{{ form.photo.vars.id }}\" class=\"btn btn-primary btn-sm rounded-circle position-absolute bottom-0 end-0 shadow-sm p-1\" style=\"width: 32px; height: 32px;\">
                                    <i class=\"bi bi-camera-fill\"></i>
                                </label>
                            </div>
                        </div>
                        <div class=\"col\">
                            <h6 class=\"mb-1 fw-bold\">Profile Photo</h6>
                            <p class=\"text-muted small mb-1\">JPG, PNG or WebP. Max 2MB.</p>
                            <div class=\"d-flex gap-2\">
                                <label for=\"{{ form.photo.vars.id }}\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3\">
                                    <i class=\"bi bi-upload me-1\"></i> Upload
                                </label>
                                <button type=\"button\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3\" onclick=\"openCamera()\">
                                    <i class=\"bi bi-camera me-1\"></i> Take Photo
                                </button>
                            </div>
                            <div class=\"d-none\">
                                {{ form_widget(form.photo, {'attr': {'onchange': 'initCropper(this)'}}) }}
                            </div>
                        </div>
                    </div>

                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            {{ form_label(form.username, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.username) }}
                            {{ form_errors(form.username) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_label(form.email, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.email) }}
                            {{ form_errors(form.email) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_label(form.prenom, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.prenom) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_label(form.nom, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.nom) }}
                        </div>
                        <div class=\"col-md-12\">
                            {{ form_label(form.numero, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.numero) }}
                        </div>
                        <div class=\"col-md-12\">
                            {{ form_label(form.adresse, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.adresse) }}
                        </div>
                    </div>
                </div>
            </div>

            {% if form.specialite is defined %}
            <!-- Professional Section for Medecin -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-briefcase-fill me-2 text-primary\"></i>Professional Details</h5>
                </div>
                <div class=\"card-body p-4\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            {{ form_label(form.specialite, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.specialite) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_label(form.prixConsultation, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            <div class=\"input-group\">
                                {{ form_widget(form.prixConsultation) }}
                                <span class=\"input-group-text\">DT</span>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_label(form.ville, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.ville) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_label(form.cabinet, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.cabinet) }}
                        </div>
                        <div class=\"col-12\">
                            {{ form_label(form.bio, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.bio) }}
                        </div>
                    </div>
                </div>
            </div>
            {% endif %}

            <!-- Appearance Section -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-palette-fill me-2 text-primary\"></i>Appearance</h5>
                </div>
                <div class=\"card-body p-4\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <div class=\"theme-card p-3 border rounded-3 position-relative cursor-pointer h-100\" onclick=\"document.getElementById('themeLight').click()\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"theme_selector\" id=\"themeLight\" value=\"light\">
                                    <label class=\"form-check-label fw-bold\" for=\"themeLight\">Light Mode</label>
                                </div>
                                <div class=\"mt-2 text-center py-4 bg-light rounded-2\">
                                    <i class=\"bi bi-sun-fill fs-1 text-warning\"></i>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"theme-card p-3 border rounded-3 position-relative cursor-pointer h-100 bg-dark text-white\" onclick=\"document.getElementById('themeDark').click()\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"theme_selector\" id=\"themeDark\" value=\"dark\">
                                    <label class=\"form-check-label fw-bold\" for=\"themeDark\">Dark Mode</label>
                                </div>
                                <div class=\"mt-2 text-center py-4 rounded-2\" style=\"background: #2d3748\">
                                    <i class=\"bi bi-moon-stars-fill fs-1 text-info\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privacy Section -->
            <div class=\"card mb-4 border-0 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-white py-3 border-bottom border-light\">
                    <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-shield-lock-fill me-2 text-primary\"></i>Privacy Settings</h5>
                </div>
                <div class=\"card-body p-4\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-4\">
                            {{ form_label(form.emailPrivacy, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.emailPrivacy) }}
                        </div>
                        <div class=\"col-md-4\">
                            {{ form_label(form.phonePrivacy, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.phonePrivacy) }}
                        </div>
                        <div class=\"col-md-4\">
                            {{ form_label(form.addressPrivacy, null, {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.addressPrivacy) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"d-grid mb-5\">
                <button type=\"submit\" class=\"btn btn-primary btn-lg rounded-3 fw-bold py-3\">
                    <i class=\"bi bi-save me-2\"></i> Save All Changes
                </button>
            </div>
            {{ form_end(form) }}

            <!-- Danger Zone -->
            <div class=\"card border-danger border-opacity-50 shadow-sm rounded-4 overflow-hidden\">
                <div class=\"card-header bg-danger bg-opacity-10 py-3\">
                    <h5 class=\"mb-0 fw-bold text-danger\"><i class=\"bi bi-exclamation-octagon-fill me-2\"></i>Danger Zone</h5>
                </div>
                <div class=\"card-body p-4 text-center\">
                    <p class=\"text-muted\">Once you delete your account, there is no going back. Please be certain.</p>
                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm px-4 rounded-pill\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteAccountModal\">
                        Delete Account Permanently
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Cropping Modal -->
<div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" data-bs-backdrop=\"static\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content overflow-hidden rounded-4\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title fw-bold\">Crop Profile Photo</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\">
                <div class=\"img-container\" style=\"max-height: 500px;\">
                    <img id=\"cropperImage\" src=\"\" style=\"max-width: 100%;\">
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary rounded-pill px-4\" data-bs-dismiss=\"modal\">Cancel</button>
                <button type=\"button\" class=\"btn btn-primary rounded-pill px-4\" id=\"cropButton\">
                    <i class=\"bi bi-crop me-1\"></i> Apply Crop
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Camera Modal -->
<div class=\"modal fade\" id=\"cameraModal\" tabindex=\"-1\" data-bs-backdrop=\"static\">
    <div class=\"modal-dialog modal-md modal-dialog-centered\">
        <div class=\"modal-content overflow-hidden rounded-4\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title fw-bold\">Take a Photo</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" onclick=\"stopCamera()\"></button>
            </div>
            <div class=\"modal-body p-0 bg-dark position-relative\" style=\"min-height: 300px;\">
                <video id=\"cameraVideo\" class=\"w-100\" autoplay playsinline></video>
                <div class=\"position-absolute bottom-0 start-50 translate-middle-x mb-3\">
                    <button type=\"button\" class=\"btn btn-light btn-lg rounded-circle shadow-lg\" onclick=\"capturePhoto()\" style=\"width: 60px; height: 60px;\">
                        <i class=\"bi bi-camera-fill fs-3\"></i>
                    </button>
                </div>
            </div>
            <div class=\"modal-footer justify-content-center\">
                <p class=\"text-muted small mb-0 font-italic\">Center your face and click the button to capture.</p>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class=\"modal fade\" id=\"deleteAccountModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content border-0 shadow rounded-4 overflow-hidden\">
            <div class=\"modal-header bg-danger text-white\">
                <h5 class=\"modal-title fw-bold\">Delete Account</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-4\">
                <p class=\"text-secondary\">This action is <strong>irreversible</strong>. To confirm, please type <span class=\"badge bg-light text-danger fs-6\">DELETE</span> below:</p>
                <input type=\"text\" class=\"form-control mb-3\" id=\"confirmDeleteInput\" placeholder='Type \"DELETE\" here'>
                <form action=\"{{ path('app_delete_account') }}\" method=\"post\" id=\"deleteForm\">
                    <input type=\"hidden\" name=\"confirmation\" value=\"DELETE\">
                    <button type=\"submit\" class=\"btn btn-danger w-100 rounded-3 py-2 disabled\" id=\"finalDeleteBtn\">
                        I understand, delete my account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer { cursor: pointer; }
    .theme-card { transition: all 0.3s ease; border-width: 2px !important; }
    .theme-card:hover { transform: translateY(-2px); border-color: var(--bs-primary) !important; }
    .theme-card input:checked + label { color: var(--bs-primary); }
    
    .dark-mode .card,
    .dark-mode .modal-content {
        background-color: #1a202c;
        color: #f7fafc;
        border-color: #2d3748 !important;
    }
    
    .dark-mode .card-header {
        background-color: #2d3748 !important;
        border-color: #4a5568 !important;
    }
    
    .dark-mode .form-control,
    .dark-mode .form-select {
        background-color: #2d3748;
        border-color: #4a5568;
        color: #f7fafc;
    }

    .dark-mode .form-control:focus {
        background-color: #313d4f;
        color: #fff;
    }

    #cameraVideo {
        transform: scaleX(-1); /* Mirror effect */
    }
</style>

<script>
let cropper = null;
let stream = null;
const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
const cameraModal = new bootstrap.Modal(document.getElementById('cameraModal'));

function initCropper(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            startCropping(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function startCropping(imageSrc) {
    document.getElementById('cropperImage').src = imageSrc;
    cropModal.show();
}

async function openCamera() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ 
            video: { 
                facingMode: 'user',
                width: { ideal: 640 },
                height: { ideal: 640 }
            } 
        });
        document.getElementById('cameraVideo').srcObject = stream;
        cameraModal.show();
    } catch (err) {
        console.error(\"Camera error: \", err);
        alert(\"Could not access camera. Please ensure you've given permission.\");
    }
}

function stopCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }
    cameraModal.hide();
}

function capturePhoto() {
    const video = document.getElementById('cameraVideo');
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const ctx = canvas.getContext('2d');
    
    // Maintain mirror effect for the capture
    ctx.translate(canvas.width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    
    const imageSrc = canvas.toDataURL('image/jpeg');
    stopCamera();
    startCropping(imageSrc);
}

document.getElementById('cropModal').addEventListener('shown.bs.modal', function() {
    const image = document.getElementById('cropperImage');
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 2,
        autoCropArea: 1,
    });
});

document.getElementById('cropModal').addEventListener('hidden.bs.modal', function() {
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
});

document.getElementById('cropButton').addEventListener('click', function() {
    const canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400,
    });
    
    const base64Image = canvas.toDataURL('image/jpeg');
    document.getElementById('profile-preview').src = base64Image;
    document.getElementById('croppedPhotoInput').value = base64Image;
    cropModal.hide();
});

document.addEventListener('DOMContentLoaded', function() {
    // Theme initialization
    const theme = localStorage.getItem('theme') || 'light';
    const lightRadio = document.getElementById('themeLight');
    const darkRadio = document.getElementById('themeDark');
    
    if (theme === 'dark') darkRadio.checked = true;
    else lightRadio.checked = true;

    // Theme switching
    [lightRadio, darkRadio].forEach(radio => {
        radio.addEventListener('change', function() {
            setGlobalTheme(this.value);
        });
    });

    // Delete confirmation
    const confirmInput = document.getElementById('confirmDeleteInput');
    const deleteBtn = document.getElementById('finalDeleteBtn');
    
    if (confirmInput) {
        confirmInput.addEventListener('input', function() {
            if (this.value === 'DELETE') {
                deleteBtn.classList.remove('disabled');
            } else {
                deleteBtn.classList.add('disabled');
            }
        });
    }
});
</script>
{% endblock %}
", "dashboard/settings.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\dashboard\\settings.html.twig");
    }
}
