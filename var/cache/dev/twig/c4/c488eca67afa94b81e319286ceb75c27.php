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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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

        yield "Modifier mon profil - Medicare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "<style>
    .edit-profile-main {
        padding: 40px 0;
        background: #f8f9fa;
        min-height: calc(100vh - 200px);
    }
    .edit-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.05);
        padding: 30px;
        max-width: 800px;
        margin: 0 auto;
    }
    .current-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 4px solid #10b981;
    }
    #crop-container {
        max-width: 100%;
        max-height: 400px;
        margin-bottom: 20px;
    }
    .preview-container {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
        border: 2px solid #10b981;
        margin: 10px auto;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 44
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

        // line 45
        yield "<main class=\"edit-profile-main\">
    <div class=\"container\">
        <div class=\"edit-card\">
            <h2 class=\"mb-4\"><i class=\"bi bi-person-gear text-success\"></i> Modifier mon profil</h2>
            
            ";
        // line 50
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), 'form_start', ["attr" => ["id" => "profile-form"]]);
        yield "
                <div class=\"text-center mb-4\">
                    ";
        // line 52
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "photo", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 53, $this->source); })()), "photo", [], "any", false, false, false, 53), "html", null, true);
            yield "\" alt=\"Photo actuelle\" class=\"current-photo\" id=\"photo-preview\">
                    ";
        } else {
            // line 55
            yield "                        <div class=\"current-photo d-flex align-items-center justify-content-center bg-light mx-auto\">
                            <i class=\"bi bi-person-fill text-secondary\" style=\"font-size: 80px;\"></i>
                        </div>
                    ";
        }
        // line 59
        yield "                    
                    <div class=\"mb-3\">
                        ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "photo", [], "any", false, false, false, 61), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Changer ma photo de profil"]);
        yield "
                        ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "photo", [], "any", false, false, false, 62), 'widget', ["attr" => ["class" => "form-control", "accept" => "image/*", "id" => "photo-input"]]);
        yield "
                        <div class=\"form-text\">JPG, PNG ou WebP. Max 2Mo.</div>
                    </div>
                </div>

                <div class=\"row g-3\">
                    <div class=\"col-md-12\">
                        ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "username", [], "any", false, false, false, 69), 'row');
        yield "
                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "prenom", [], "any", false, false, false, 72), 'row');
        yield "
                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 75
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), "nom", [], "any", false, false, false, 75), 'row');
        yield "
                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "numero", [], "any", false, false, false, 78), 'row');
        yield "
                    </div>
                    
                    ";
        // line 81
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "specialite", [], "any", true, true, false, 81)) {
            // line 82
            yield "                        <div class=\"col-md-6\">
                            ";
            // line 83
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "specialite", [], "any", false, false, false, 83), 'row');
            yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
            // line 86
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "ville", [], "any", false, false, false, 86), 'row');
            yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
            // line 89
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), "cabinet", [], "any", false, false, false, 89), 'row');
            yield "
                        </div>
                        <div class=\"col-md-6\">
                            ";
            // line 92
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "prixConsultation", [], "any", false, false, false, 92), 'row');
            yield "
                        </div>
                        <div class=\"col-md-12\">
                            ";
            // line 95
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "bio", [], "any", false, false, false, 95), 'row');
            yield "
                        </div>
                    ";
        }
        // line 98
        yield "
                    <div class=\"col-md-12\">
                        ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "adresse", [], "any", false, false, false, 100), 'row');
        yield "
                    </div>
                </div>

                <div class=\"mt-4 border-top pt-4\">
                    <h5 class=\"mb-3\"><i class=\"bi bi-shield-lock\"></i> Paramètres de confidentialité</h5>
                    <div class=\"row g-3\">
                        <div class=\"col-md-4\">
                            ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 108), 'row');
        yield "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 111
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 111), 'row');
        yield "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 114
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 114, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 114), 'row');
        yield "
                        </div>
                    </div>
                </div>

                <input type=\"hidden\" name=\"cropped_image\" id=\"cropped-image-input\">

                <div class=\"mt-4 d-flex justify-content-between\">
                    <a href=\"";
        // line 122
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"btn btn-outline-secondary\">
                        <i class=\"bi bi-arrow-left\"></i> Retour
                    </a>
                    <button type=\"submit\" class=\"btn btn-success btn-lg\">
                        <i class=\"bi bi-check-lg\"></i> Enregistrer les modifications
                    </button>
                </div>
            ";
        // line 129
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 129, $this->source); })()), 'form_end', ["render_rest" => false]);
        yield "
        </div>
    </div>
</main>

<!-- Modal pour le recadrage -->
<div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" aria-labelledby=\"cropModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"cropModalLabel\">Recadrer la photo</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <div id=\"crop-container\">
                    <img id=\"image-to-crop\" style=\"max-width: 100%;\">
                </div>
                <div class=\"text-center\">
                    <h6>Aperçu</h6>
                    <div class=\"preview-container\"></div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                <button type=\"button\" class=\"btn btn-success\" id=\"crop-button\">Appliquer le recadrage</button>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 160
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 161
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photo-input');
    const imageToCrop = document.getElementById('image-to-crop');
    const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
    const cropButton = document.getElementById('crop-button');
    const croppedImageInput = document.getElementById('cropped-image-input');
    const photoPreview = document.getElementById('photo-preview') || document.querySelector('.current-photo');
    let cropper;

    photoInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const file = files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                imageToCrop.src = e.target.result;
                cropModal.show();
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('cropModal').addEventListener('shown.bs.modal', function() {
        cropper = new Cropper(imageToCrop, {
            aspectRatio: 1,
            viewMode: 1,
            preview: '.preview-container',
        });
    });

    document.getElementById('cropModal').addEventListener('hidden.bs.modal', function() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    cropButton.addEventListener('click', function() {
        const canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400,
        });
        
        const base64Image = canvas.toDataURL('image/jpeg');
        croppedImageInput.value = base64Image;
        
        if (photoPreview.tagName === 'IMG') {
            photoPreview.src = base64Image;
        } else {
            // Replace placeholder with img
            const img = document.createElement('img');
            img.src = base64Image;
            img.className = 'current-photo';
            img.id = 'photo-preview';
            photoPreview.parentNode.replaceChild(img, photoPreview);
        }
        
        cropModal.hide();
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
        return array (  367 => 161,  354 => 160,  313 => 129,  303 => 122,  292 => 114,  286 => 111,  280 => 108,  269 => 100,  265 => 98,  259 => 95,  253 => 92,  247 => 89,  241 => 86,  235 => 83,  232 => 82,  230 => 81,  224 => 78,  218 => 75,  212 => 72,  206 => 69,  196 => 62,  192 => 61,  188 => 59,  182 => 55,  176 => 53,  174 => 52,  169 => 50,  162 => 45,  149 => 44,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Modifier mon profil - Medicare{% endblock %}

{% block stylesheets %}
<style>
    .edit-profile-main {
        padding: 40px 0;
        background: #f8f9fa;
        min-height: calc(100vh - 200px);
    }
    .edit-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.05);
        padding: 30px;
        max-width: 800px;
        margin: 0 auto;
    }
    .current-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 4px solid #10b981;
    }
    #crop-container {
        max-width: 100%;
        max-height: 400px;
        margin-bottom: 20px;
    }
    .preview-container {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
        border: 2px solid #10b981;
        margin: 10px auto;
    }
</style>
{% endblock %}

{% block body %}
<main class=\"edit-profile-main\">
    <div class=\"container\">
        <div class=\"edit-card\">
            <h2 class=\"mb-4\"><i class=\"bi bi-person-gear text-success\"></i> Modifier mon profil</h2>
            
            {{ form_start(form, {'attr': {'id': 'profile-form'}}) }}
                <div class=\"text-center mb-4\">
                    {% if user.photo %}
                        <img src=\"{{ user.photo }}\" alt=\"Photo actuelle\" class=\"current-photo\" id=\"photo-preview\">
                    {% else %}
                        <div class=\"current-photo d-flex align-items-center justify-content-center bg-light mx-auto\">
                            <i class=\"bi bi-person-fill text-secondary\" style=\"font-size: 80px;\"></i>
                        </div>
                    {% endif %}
                    
                    <div class=\"mb-3\">
                        {{ form_label(form.photo, 'Changer ma photo de profil', {'label_attr': {'class': 'form-label'}}) }}
                        {{ form_widget(form.photo, {'attr': {'class': 'form-control', 'accept': 'image/*', 'id': 'photo-input'}}) }}
                        <div class=\"form-text\">JPG, PNG ou WebP. Max 2Mo.</div>
                    </div>
                </div>

                <div class=\"row g-3\">
                    <div class=\"col-md-12\">
                        {{ form_row(form.username) }}
                    </div>
                    <div class=\"col-md-6\">
                        {{ form_row(form.prenom) }}
                    </div>
                    <div class=\"col-md-6\">
                        {{ form_row(form.nom) }}
                    </div>
                    <div class=\"col-md-6\">
                        {{ form_row(form.numero) }}
                    </div>
                    
                    {% if form.specialite is defined %}
                        <div class=\"col-md-6\">
                            {{ form_row(form.specialite) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_row(form.ville) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_row(form.cabinet) }}
                        </div>
                        <div class=\"col-md-6\">
                            {{ form_row(form.prixConsultation) }}
                        </div>
                        <div class=\"col-md-12\">
                            {{ form_row(form.bio) }}
                        </div>
                    {% endif %}

                    <div class=\"col-md-12\">
                        {{ form_row(form.adresse) }}
                    </div>
                </div>

                <div class=\"mt-4 border-top pt-4\">
                    <h5 class=\"mb-3\"><i class=\"bi bi-shield-lock\"></i> Paramètres de confidentialité</h5>
                    <div class=\"row g-3\">
                        <div class=\"col-md-4\">
                            {{ form_row(form.emailPrivacy) }}
                        </div>
                        <div class=\"col-md-4\">
                            {{ form_row(form.phonePrivacy) }}
                        </div>
                        <div class=\"col-md-4\">
                            {{ form_row(form.addressPrivacy) }}
                        </div>
                    </div>
                </div>

                <input type=\"hidden\" name=\"cropped_image\" id=\"cropped-image-input\">

                <div class=\"mt-4 d-flex justify-content-between\">
                    <a href=\"{{ path('app_profile') }}\" class=\"btn btn-outline-secondary\">
                        <i class=\"bi bi-arrow-left\"></i> Retour
                    </a>
                    <button type=\"submit\" class=\"btn btn-success btn-lg\">
                        <i class=\"bi bi-check-lg\"></i> Enregistrer les modifications
                    </button>
                </div>
            {{ form_end(form, {'render_rest': false}) }}
        </div>
    </div>
</main>

<!-- Modal pour le recadrage -->
<div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" aria-labelledby=\"cropModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"cropModalLabel\">Recadrer la photo</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <div id=\"crop-container\">
                    <img id=\"image-to-crop\" style=\"max-width: 100%;\">
                </div>
                <div class=\"text-center\">
                    <h6>Aperçu</h6>
                    <div class=\"preview-container\"></div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                <button type=\"button\" class=\"btn btn-success\" id=\"crop-button\">Appliquer le recadrage</button>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photo-input');
    const imageToCrop = document.getElementById('image-to-crop');
    const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
    const cropButton = document.getElementById('crop-button');
    const croppedImageInput = document.getElementById('cropped-image-input');
    const photoPreview = document.getElementById('photo-preview') || document.querySelector('.current-photo');
    let cropper;

    photoInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const file = files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                imageToCrop.src = e.target.result;
                cropModal.show();
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('cropModal').addEventListener('shown.bs.modal', function() {
        cropper = new Cropper(imageToCrop, {
            aspectRatio: 1,
            viewMode: 1,
            preview: '.preview-container',
        });
    });

    document.getElementById('cropModal').addEventListener('hidden.bs.modal', function() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    cropButton.addEventListener('click', function() {
        const canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400,
        });
        
        const base64Image = canvas.toDataURL('image/jpeg');
        croppedImageInput.value = base64Image;
        
        if (photoPreview.tagName === 'IMG') {
            photoPreview.src = base64Image;
        } else {
            // Replace placeholder with img
            const img = document.createElement('img');
            img.src = base64Image;
            img.className = 'current-photo';
            img.id = 'photo-preview';
            photoPreview.parentNode.replaceChild(img, photoPreview);
        }
        
        cropModal.hide();
    });
});
</script>
{% endblock %}
", "frontend/edit_profile.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\edit_profile.html.twig");
    }
}
