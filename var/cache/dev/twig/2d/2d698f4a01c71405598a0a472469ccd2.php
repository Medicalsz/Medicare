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

/* base_frontend.html.twig */
class __TwigTemplate_6769f67cc7f8bda0c1ec2160ad7d9937 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body_class' => [$this, 'block_body_class'],
            'header' => [$this, 'block_header'],
            'flashes' => [$this, 'block_flashes'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_frontend.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_frontend.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
    <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <meta name=\"description\" content=\"Premium medical care and healthcare services\">

    <!-- Favicons -->
    <link href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/favicon.png"), "html", null, true);
        yield "\" rel=\"icon\">
    <link href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/apple-touch-icon.png"), "html", null, true);
        yield "\" rel=\"apple-touch-icon\">

    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap\" rel=\"stylesheet\">

    <!-- Vendor CSS Files -->
    <link href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/bootstrap/css/bootstrap.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/aos/aos.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/glightbox/css/glightbox.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/fontawesome-free/css/all.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/swiper/swiper-bundle.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">

    <!-- Main CSS File -->
    <link href=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/css/main.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    
    <!-- Cropper.js -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js\"></script>

    ";
        // line 34
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 35
        yield "</head>

<body class=\"";
        // line 37
        yield from $this->unwrap()->yieldBlock('body_class', $context, $blocks);
        yield "\">
    ";
        // line 38
        if (((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) &&  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MEDECIN")) &&  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "isVerified", [], "any", false, false, false, 38))) {
            // line 39
            yield "        <div class=\"verification-banner\" id=\"verificationBanner\">
            <div class=\"container d-flex align-items-center justify-content-between\">
                <div class=\"notice-content d-flex align-items-center\">
                    <i class=\"bi bi-info-circle-fill me-2\"></i>
                    <span>Votre compte n'est pas encore vérifié. Veuillez vérifier votre boîte de réception pour le lien de confirmation.</span>
                </div>
                <a href=\"";
            // line 45
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_verify_choice");
            yield "\" class=\"btn-resend\">Verify</a>
            </div>
        </div>

        <style>
            .verification-banner {
                background: #e0f2fe;
                color: #0369a1;
                padding: 10px 0;
                font-size: 14px;
                border-bottom: 1px solid #bae6fd;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }
            .verification-banner .btn-resend {
                background: #0ea5e9;
                color: white;
                padding: 4px 12px;
                border-radius: 4px;
                font-weight: 600;
                text-decoration: none;
                transition: background 0.2s;
            }
            .verification-banner .btn-resend:hover {
                background: #0284c7;
            }
            .header.fixed-top {
                top: 41px !important; /* Height of the banner */
            }
            .main {
                padding-top: 121px !important; /* 80px header + 41px banner */
            }
        </style>
    ";
        }
        // line 82
        yield "    ";
        $context["show_header"] = ((array_key_exists("show_header", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["show_header"]) || array_key_exists("show_header", $context) ? $context["show_header"] : (function () { throw new RuntimeError('Variable "show_header" does not exist.', 82, $this->source); })()), true)) : (true));
        // line 83
        yield "    ";
        $context["show_footer"] = ((array_key_exists("show_footer", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["show_footer"]) || array_key_exists("show_footer", $context) ? $context["show_footer"] : (function () { throw new RuntimeError('Variable "show_footer" does not exist.', 83, $this->source); })()), true)) : (true));
        // line 84
        yield "    ";
        if ((($tmp = (isset($context["show_header"]) || array_key_exists("show_header", $context) ? $context["show_header"] : (function () { throw new RuntimeError('Variable "show_header" does not exist.', 84, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 85
            yield "        ";
            yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
            // line 88
            yield "    ";
        }
        // line 89
        yield "
    <main class=\"main\" style=\"padding-top: 80px;\">
        ";
        // line 91
        yield from $this->unwrap()->yieldBlock('flashes', $context, $blocks);
        // line 133
        yield "
        ";
        // line 134
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 135
        yield "    </main>

    ";
        // line 137
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 142
        yield "
    <!-- Vendor JS Files -->
    <script src=\"";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/aos/aos.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/glightbox/js/glightbox.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/purecounter/purecounter_vanilla.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 148
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/isotope-layout/isotope.pkgd.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/swiper/swiper-bundle.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/php-email-form/validate.js"), "html", null, true);
        yield "\"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check for success modal
            var successEl = document.getElementById('successModal');
            if (successEl) {
                var successModal = new bootstrap.Modal(successEl);
                successModal.show();
            }

            // Check for error modal
            var errorEl = document.getElementById('errorModal');
            if (errorEl) {
                var errorModal = new bootstrap.Modal(errorEl);
                errorModal.show();
            }
        });
    </script>

    <!-- Main JS File -->
    <script src=\"";
        // line 172
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/js/main.js"), "html", null, true);
        yield "\"></script>

    ";
        // line 174
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 175
        yield "</body>

</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
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

        yield "Medicare - Medical Care";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 34
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 37
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

        yield "index-page";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 85
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

        // line 86
        yield "            ";
        yield from $this->load("partials/frontend_header.html.twig", 86)->unwrap()->yield($context);
        // line 87
        yield "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 91
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_flashes(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "flashes"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "flashes"));

        // line 92
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "flashes", ["success"], "method", false, false, false, 92));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_success"]) {
            // line 93
            yield "                <div class=\"modal fade\" id=\"successModal\" tabindex=\"-1\" aria-labelledby=\"successModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-success text-white border-0\">
                                <h5 class=\"modal-title\" id=\"successModalLabel\">
                                    <i class=\"bi bi-check-circle me-2\"></i>Opération réussie
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white shadow-none\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body py-4\">
                                <p class=\"mb-0 text-center lead\">";
            // line 103
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_success"], "html", null, true);
            yield "</p>
                            </div>
                            <div class=\"modal-footer border-0\">
                                <button type=\"button\" class=\"btn btn-success px-4 rounded-3\" data-bs-dismiss=\"modal\">D'accord</button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_success'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 112, $this->source); })()), "flashes", ["error"], "method", false, false, false, 112));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 113
            yield "                <div class=\"modal fade\" id=\"errorModal\" tabindex=\"-1\" aria-labelledby=\"errorModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-danger text-white border-0\">
                                <h5 class=\"modal-title\" id=\"errorModalLabel\">
                                    <i class=\"bi bi-exclamation-circle me-2\"></i>Oups !
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white shadow-none\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body py-4 text-center\">
                                <p class=\"mb-0 lead text-danger\">";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "</p>
                            </div>
                            <div class=\"modal-footer border-0\">
                                <button type=\"button\" class=\"btn btn-secondary px-4 rounded-3\" data-bs-dismiss=\"modal\">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        yield "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 134
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 137
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

        // line 138
        yield "        ";
        if ((($tmp = (isset($context["show_footer"]) || array_key_exists("show_footer", $context) ? $context["show_footer"] : (function () { throw new RuntimeError('Variable "show_footer" does not exist.', 138, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 139
            yield "            ";
            yield from $this->load("partials/frontend_footer.html.twig", 139)->unwrap()->yield($context);
            // line 140
            yield "        ";
        }
        // line 141
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 174
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base_frontend.html.twig";
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
        return array (  527 => 174,  516 => 141,  513 => 140,  510 => 139,  507 => 138,  494 => 137,  472 => 134,  461 => 132,  446 => 123,  434 => 113,  429 => 112,  414 => 103,  402 => 93,  397 => 92,  384 => 91,  373 => 87,  370 => 86,  357 => 85,  334 => 37,  312 => 34,  289 => 7,  276 => 175,  274 => 174,  269 => 172,  245 => 151,  241 => 150,  237 => 149,  233 => 148,  229 => 147,  225 => 146,  221 => 145,  217 => 144,  213 => 142,  211 => 137,  207 => 135,  205 => 134,  202 => 133,  200 => 91,  196 => 89,  193 => 88,  190 => 85,  187 => 84,  184 => 83,  181 => 82,  141 => 45,  133 => 39,  131 => 38,  127 => 37,  123 => 35,  121 => 34,  112 => 28,  106 => 25,  102 => 24,  98 => 23,  94 => 22,  90 => 21,  86 => 20,  75 => 12,  71 => 11,  64 => 7,  56 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
    <title>{% block title %}Medicare - Medical Care{% endblock %}</title>
    <meta name=\"description\" content=\"Premium medical care and healthcare services\">

    <!-- Favicons -->
    <link href=\"{{ asset('build/frontend/assets/img/favicon.png') }}\" rel=\"icon\">
    <link href=\"{{ asset('build/frontend/assets/img/apple-touch-icon.png') }}\" rel=\"apple-touch-icon\">

    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap\" rel=\"stylesheet\">

    <!-- Vendor CSS Files -->
    <link href=\"{{ asset('build/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('build/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('build/frontend/assets/vendor/aos/aos.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('build/frontend/assets/vendor/glightbox/css/glightbox.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('build/frontend/assets/vendor/fontawesome-free/css/all.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('build/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}\" rel=\"stylesheet\">

    <!-- Main CSS File -->
    <link href=\"{{ asset('build/frontend/assets/css/main.css') }}\" rel=\"stylesheet\">
    
    <!-- Cropper.js -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js\"></script>

    {% block stylesheets %}{% endblock %}
</head>

<body class=\"{% block body_class %}index-page{% endblock %}\">
    {% if app.user and is_granted('ROLE_USER') and not is_granted('ROLE_MEDECIN') and not is_granted('ROLE_ADMIN') and not app.user.isVerified %}
        <div class=\"verification-banner\" id=\"verificationBanner\">
            <div class=\"container d-flex align-items-center justify-content-between\">
                <div class=\"notice-content d-flex align-items-center\">
                    <i class=\"bi bi-info-circle-fill me-2\"></i>
                    <span>Votre compte n'est pas encore vérifié. Veuillez vérifier votre boîte de réception pour le lien de confirmation.</span>
                </div>
                <a href=\"{{ path('app_verify_choice') }}\" class=\"btn-resend\">Verify</a>
            </div>
        </div>

        <style>
            .verification-banner {
                background: #e0f2fe;
                color: #0369a1;
                padding: 10px 0;
                font-size: 14px;
                border-bottom: 1px solid #bae6fd;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }
            .verification-banner .btn-resend {
                background: #0ea5e9;
                color: white;
                padding: 4px 12px;
                border-radius: 4px;
                font-weight: 600;
                text-decoration: none;
                transition: background 0.2s;
            }
            .verification-banner .btn-resend:hover {
                background: #0284c7;
            }
            .header.fixed-top {
                top: 41px !important; /* Height of the banner */
            }
            .main {
                padding-top: 121px !important; /* 80px header + 41px banner */
            }
        </style>
    {% endif %}
    {% set show_header = show_header|default(true) %}
    {% set show_footer = show_footer|default(true) %}
    {% if show_header %}
        {% block header %}
            {% include 'partials/frontend_header.html.twig' %}
        {% endblock %}
    {% endif %}

    <main class=\"main\" style=\"padding-top: 80px;\">
        {% block flashes %}
            {% for flash_success in app.flashes('success') %}
                <div class=\"modal fade\" id=\"successModal\" tabindex=\"-1\" aria-labelledby=\"successModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-success text-white border-0\">
                                <h5 class=\"modal-title\" id=\"successModalLabel\">
                                    <i class=\"bi bi-check-circle me-2\"></i>Opération réussie
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white shadow-none\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body py-4\">
                                <p class=\"mb-0 text-center lead\">{{ flash_success }}</p>
                            </div>
                            <div class=\"modal-footer border-0\">
                                <button type=\"button\" class=\"btn btn-success px-4 rounded-3\" data-bs-dismiss=\"modal\">D'accord</button>
                            </div>
                        </div>
                    </div>
                </div>
            {% endfor %}
            {% for flash_error in app.flashes('error') %}
                <div class=\"modal fade\" id=\"errorModal\" tabindex=\"-1\" aria-labelledby=\"errorModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-danger text-white border-0\">
                                <h5 class=\"modal-title\" id=\"errorModalLabel\">
                                    <i class=\"bi bi-exclamation-circle me-2\"></i>Oups !
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white shadow-none\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body py-4 text-center\">
                                <p class=\"mb-0 lead text-danger\">{{ flash_error }}</p>
                            </div>
                            <div class=\"modal-footer border-0\">
                                <button type=\"button\" class=\"btn btn-secondary px-4 rounded-3\" data-bs-dismiss=\"modal\">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            {% endfor %}
        {% endblock %}

        {% block body %}{% endblock %}
    </main>

    {% block footer %}
        {% if show_footer %}
            {% include 'partials/frontend_footer.html.twig' %}
        {% endif %}
    {% endblock %}

    <!-- Vendor JS Files -->
    <script src=\"{{ asset('build/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/aos/aos.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/glightbox/js/glightbox.min.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/isotope-layout/isotope.pkgd.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/swiper/swiper-bundle.min.js') }}\"></script>
    <script src=\"{{ asset('build/frontend/assets/vendor/php-email-form/validate.js') }}\"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check for success modal
            var successEl = document.getElementById('successModal');
            if (successEl) {
                var successModal = new bootstrap.Modal(successEl);
                successModal.show();
            }

            // Check for error modal
            var errorEl = document.getElementById('errorModal');
            if (errorEl) {
                var errorModal = new bootstrap.Modal(errorEl);
                errorModal.show();
            }
        });
    </script>

    <!-- Main JS File -->
    <script src=\"{{ asset('build/frontend/assets/js/main.js') }}\"></script>

    {% block javascripts %}{% endblock %}
</body>

</html>", "base_frontend.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\base_frontend.html.twig");
    }
}
