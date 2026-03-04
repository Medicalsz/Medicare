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
        yield "
    <style>
        /* Premium Dark Mode implementation using filters with image exclusion */
        html.dark-mode {
            filter: invert(1) hue-rotate(180deg);
            background-color: #1a202c !important;
        }

        /* Exclude media from inversion so they look natural */
        html.dark-mode img, 
        html.dark-mode video, 
        html.dark-mode iframe,
        html.dark-mode .user-avatar,
        html.dark-mode i,
        html.dark-mode .no-invert {
            filter: invert(1) hue-rotate(180deg);
        }

        /* Fix backgrounds for specific elements that might look weird */
        html.dark-mode body {
            background-color: #1a202c !important;
        }
    </style>

    <script>
        // Apply theme immediately to prevent flashing
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            if (theme === 'dark') {
                document.documentElement.classList.add('dark-mode');
            }
        })();

        function setGlobalTheme(theme) {
            localStorage.setItem('theme', theme);
            if (theme === 'dark') {
                document.documentElement.classList.add('dark-mode');
            } else {
                document.documentElement.classList.remove('dark-mode');
            }
        }
    </script>
</head>

<body class=\"";
        // line 79
        yield from $this->unwrap()->yieldBlock('body_class', $context, $blocks);
        yield "\">
    ";
        // line 80
        $context["show_header"] = ((array_key_exists("show_header", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["show_header"]) || array_key_exists("show_header", $context) ? $context["show_header"] : (function () { throw new RuntimeError('Variable "show_header" does not exist.', 80, $this->source); })()), true)) : (true));
        // line 81
        yield "    ";
        $context["show_footer"] = ((array_key_exists("show_footer", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["show_footer"]) || array_key_exists("show_footer", $context) ? $context["show_footer"] : (function () { throw new RuntimeError('Variable "show_footer" does not exist.', 81, $this->source); })()), true)) : (true));
        // line 82
        yield "    ";
        if ((($tmp = (isset($context["show_header"]) || array_key_exists("show_header", $context) ? $context["show_header"] : (function () { throw new RuntimeError('Variable "show_header" does not exist.', 82, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 83
            yield "        ";
            yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
            // line 86
            yield "    ";
        }
        // line 87
        yield "
    <main class=\"main\" style=\"padding-top: 80px;\">
        ";
        // line 89
        yield from $this->unwrap()->yieldBlock('flashes', $context, $blocks);
        // line 133
        yield "        ";
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 134
        yield "    </main>

    ";
        // line 136
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 141
        yield "
    <!-- Vendor JS Files -->
    <script src=\"";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/aos/aos.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/glightbox/js/glightbox.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/purecounter/purecounter_vanilla.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 148
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/isotope-layout/isotope.pkgd.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/swiper/swiper-bundle.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/vendor/php-email-form/validate.js"), "html", null, true);
        yield "\"></script>

    <!-- Main JS File -->
    <script src=\"";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/js/main.js"), "html", null, true);
        yield "\"></script>

    ";
        // line 155
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 156
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

    // line 79
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

    // line 83
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

        // line 84
        yield "            ";
        yield from $this->load("partials/frontend_header.html.twig", 84)->unwrap()->yield($context);
        // line 85
        yield "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 89
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

        // line 90
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 90, $this->source); })()), "flashes", ["success"], "method", false, false, false, 90));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_success"]) {
            // line 91
            yield "                <div class=\"modal fade show\" id=\"successModal\" tabindex=\"-1\" aria-labelledby=\"successModalLabel\" aria-modal=\"true\" style=\"display: block;\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-success text-white\">
                                <h5 class=\"modal-title\" id=\"successModalLabel\">
                                    <i class=\"bi bi-check-circle me-2\"></i>Inscription réussie
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Close\" onclick=\"document.getElementById('successModal').style.display='none'\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <p class=\"mb-0\">";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_success"], "html", null, true);
            yield "</p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-success\" data-bs-dismiss=\"modal\" onclick=\"document.getElementById('successModal').style.display='none'\">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-backdrop fade show\" onclick=\"document.getElementById('successModal').style.display='none'\"></div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_success'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 111, $this->source); })()), "flashes", ["error"], "method", false, false, false, 111));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 112
            yield "                <div class=\"modal fade show\" id=\"errorModal\" tabindex=\"-1\" aria-labelledby=\"errorModalLabel\" aria-modal=\"true\" style=\"display: block;\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-danger text-white\">
                                <h5 class=\"modal-title\" id=\"errorModalLabel\">
                                    <i class=\"bi bi-exclamation-circle me-2\"></i>Erreur
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Close\" onclick=\"document.getElementById('errorModal').style.display='none'\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <p class=\"mb-0\">";
            // line 122
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "</p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\" onclick=\"document.getElementById('errorModal').style.display='none'\">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-backdrop fade show\" onclick=\"document.getElementById('errorModal').style.display='none'\"></div>
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

    // line 133
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

    // line 136
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

        // line 137
        yield "        ";
        if ((($tmp = (isset($context["show_footer"]) || array_key_exists("show_footer", $context) ? $context["show_footer"] : (function () { throw new RuntimeError('Variable "show_footer" does not exist.', 137, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 138
            yield "            ";
            yield from $this->load("partials/frontend_footer.html.twig", 138)->unwrap()->yield($context);
            // line 139
            yield "        ";
        }
        // line 140
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 155
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
        return array (  500 => 155,  489 => 140,  486 => 139,  483 => 138,  480 => 137,  467 => 136,  445 => 133,  434 => 132,  418 => 122,  406 => 112,  401 => 111,  385 => 101,  373 => 91,  368 => 90,  355 => 89,  344 => 85,  341 => 84,  328 => 83,  305 => 79,  283 => 34,  260 => 7,  247 => 156,  245 => 155,  240 => 153,  234 => 150,  230 => 149,  226 => 148,  222 => 147,  218 => 146,  214 => 145,  210 => 144,  206 => 143,  202 => 141,  200 => 136,  196 => 134,  193 => 133,  191 => 89,  187 => 87,  184 => 86,  181 => 83,  178 => 82,  175 => 81,  173 => 80,  169 => 79,  123 => 35,  121 => 34,  112 => 28,  106 => 25,  102 => 24,  98 => 23,  94 => 22,  90 => 21,  86 => 20,  75 => 12,  71 => 11,  64 => 7,  56 => 1,);
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

    <style>
        /* Premium Dark Mode implementation using filters with image exclusion */
        html.dark-mode {
            filter: invert(1) hue-rotate(180deg);
            background-color: #1a202c !important;
        }

        /* Exclude media from inversion so they look natural */
        html.dark-mode img, 
        html.dark-mode video, 
        html.dark-mode iframe,
        html.dark-mode .user-avatar,
        html.dark-mode i,
        html.dark-mode .no-invert {
            filter: invert(1) hue-rotate(180deg);
        }

        /* Fix backgrounds for specific elements that might look weird */
        html.dark-mode body {
            background-color: #1a202c !important;
        }
    </style>

    <script>
        // Apply theme immediately to prevent flashing
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            if (theme === 'dark') {
                document.documentElement.classList.add('dark-mode');
            }
        })();

        function setGlobalTheme(theme) {
            localStorage.setItem('theme', theme);
            if (theme === 'dark') {
                document.documentElement.classList.add('dark-mode');
            } else {
                document.documentElement.classList.remove('dark-mode');
            }
        }
    </script>
</head>

<body class=\"{% block body_class %}index-page{% endblock %}\">
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
                <div class=\"modal fade show\" id=\"successModal\" tabindex=\"-1\" aria-labelledby=\"successModalLabel\" aria-modal=\"true\" style=\"display: block;\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-success text-white\">
                                <h5 class=\"modal-title\" id=\"successModalLabel\">
                                    <i class=\"bi bi-check-circle me-2\"></i>Inscription réussie
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Close\" onclick=\"document.getElementById('successModal').style.display='none'\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <p class=\"mb-0\">{{ flash_success }}</p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-success\" data-bs-dismiss=\"modal\" onclick=\"document.getElementById('successModal').style.display='none'\">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-backdrop fade show\" onclick=\"document.getElementById('successModal').style.display='none'\"></div>
            {% endfor %}
            {% for flash_error in app.flashes('error') %}
                <div class=\"modal fade show\" id=\"errorModal\" tabindex=\"-1\" aria-labelledby=\"errorModalLabel\" aria-modal=\"true\" style=\"display: block;\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-danger text-white\">
                                <h5 class=\"modal-title\" id=\"errorModalLabel\">
                                    <i class=\"bi bi-exclamation-circle me-2\"></i>Erreur
                                </h5>
                                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Close\" onclick=\"document.getElementById('errorModal').style.display='none'\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <p class=\"mb-0\">{{ flash_error }}</p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\" onclick=\"document.getElementById('errorModal').style.display='none'\">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-backdrop fade show\" onclick=\"document.getElementById('errorModal').style.display='none'\"></div>
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

    <!-- Main JS File -->
    <script src=\"{{ asset('build/frontend/assets/js/main.js') }}\"></script>

    {% block javascripts %}{% endblock %}
</body>

</html>", "base_frontend.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\base_frontend.html.twig");
    }
}
