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

/* base_admin.html.twig */
class __TwigTemplate_d489008aca72315c363d2f9e8307e989 extends Template
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
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_admin.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_admin.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    
    <!-- plugins:css -->
    <link rel=\"stylesheet\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/feather/feather.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/mdi/css/materialdesignicons.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/ti-icons/css/themify-icons.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/font-awesome/css/font-awesome.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/typicons/typicons.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/simple-line-icons/css/simple-line-icons.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/css/vendor.bundle.base.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css"), "html", null, true);
        yield "\">
    <!-- endinject -->
    
    <!-- Plugin css for this page -->
    <link rel=\"stylesheet\" href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/select.dataTables.min.css"), "html", null, true);
        yield "\">
    <!-- End plugin css for this page -->
    
    <!-- inject:css -->
    <link rel=\"stylesheet\" href=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/css/style.css"), "html", null, true);
        yield "\">
    <!-- endinject -->
    
    <link rel=\"shortcut icon\" href=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/images/favicon.png"), "html", null, true);
        yield "\" />
    
    ";
        // line 30
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 31
        yield "</head>
<body class=\"with-welcome-text\">
    <div class=\"container-scroller\">
        ";
        // line 34
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 56
        yield "    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src=\"";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/js/vendor.bundle.base.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/chart.js/chart.umd.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/datatables.net/jquery.dataTables.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js"), "html", null, true);
        yield "\"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src=\"";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/off-canvas.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/hoverable-collapse.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/template.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/settings.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/todolist.js"), "html", null, true);
        yield "\"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src=\"";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/dashboard.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/js/Chart.roundedBarCharts.js"), "html", null, true);
        yield "\"></script>
    ";
        // line 78
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 79
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
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

        yield "Medicare Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 30
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

    // line 34
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

        // line 35
        yield "        <!-- partial:partials/_navbar.html -->
        ";
        // line 36
        yield from $this->load("partials/admin/_navbar.html.twig", 36)->unwrap()->yield($context);
        // line 37
        yield "        
        <div class=\"container-fluid page-body-wrapper\">
            <!-- partial:partials/_sidebar.html -->
            ";
        // line 40
        yield from $this->load("partials/admin/_sidebar.html.twig", 40)->unwrap()->yield($context);
        // line 41
        yield "            
            <!-- partial -->
            <div class=\"main-panel\">
                <div class=\"content-wrapper\">
                    ";
        // line 45
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 46
        yield "                </div>
                <!-- content-wrapper ends -->
                
                <!-- partial:partials/_footer.html -->
                ";
        // line 50
        yield from $this->load("partials/admin/_footer.html.twig", 50)->unwrap()->yield($context);
        // line 51
        yield "            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 45
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 78
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
        return "base_admin.html.twig";
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
        return array (  330 => 78,  308 => 45,  293 => 51,  291 => 50,  285 => 46,  283 => 45,  277 => 41,  275 => 40,  270 => 37,  268 => 36,  265 => 35,  252 => 34,  230 => 30,  207 => 6,  194 => 79,  192 => 78,  188 => 77,  184 => 76,  177 => 72,  173 => 71,  169 => 70,  165 => 69,  161 => 68,  154 => 64,  150 => 63,  146 => 62,  142 => 61,  138 => 60,  132 => 56,  130 => 34,  125 => 31,  123 => 30,  118 => 28,  112 => 25,  105 => 21,  101 => 20,  94 => 16,  90 => 15,  86 => 14,  82 => 13,  78 => 12,  74 => 11,  70 => 10,  66 => 9,  60 => 6,  53 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>{% block title %}Medicare Admin{% endblock %}</title>
    
    <!-- plugins:css -->
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/feather/feather.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/mdi/css/materialdesignicons.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/ti-icons/css/themify-icons.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/font-awesome/css/font-awesome.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/typicons/typicons.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/simple-line-icons/css/simple-line-icons.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/css/vendor.bundle.base.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}\">
    <!-- endinject -->
    
    <!-- Plugin css for this page -->
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('build/assets/backend/js/select.dataTables.min.css') }}\">
    <!-- End plugin css for this page -->
    
    <!-- inject:css -->
    <link rel=\"stylesheet\" href=\"{{ asset('build/assets/backend/css/style.css') }}\">
    <!-- endinject -->
    
    <link rel=\"shortcut icon\" href=\"{{ asset('build/assets/backend/images/favicon.png') }}\" />
    
    {% block stylesheets %}{% endblock %}
</head>
<body class=\"with-welcome-text\">
    <div class=\"container-scroller\">
        {% block body %}
        <!-- partial:partials/_navbar.html -->
        {% include 'partials/admin/_navbar.html.twig' %}
        
        <div class=\"container-fluid page-body-wrapper\">
            <!-- partial:partials/_sidebar.html -->
            {% include 'partials/admin/_sidebar.html.twig' %}
            
            <!-- partial -->
            <div class=\"main-panel\">
                <div class=\"content-wrapper\">
                    {% block content %}{% endblock %}
                </div>
                <!-- content-wrapper ends -->
                
                <!-- partial:partials/_footer.html -->
                {% include 'partials/admin/_footer.html.twig' %}
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        {% endblock %}
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src=\"{{ asset('build/assets/backend/vendors/js/vendor.bundle.base.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/vendors/chart.js/chart.umd.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/vendors/datatables.net/jquery.dataTables.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}\"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src=\"{{ asset('build/assets/backend/js/off-canvas.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/js/hoverable-collapse.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/js/template.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/js/settings.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/js/todolist.js') }}\"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src=\"{{ asset('build/assets/backend/js/dashboard.js') }}\"></script>
    <script src=\"{{ asset('build/assets/backend/js/Chart.roundedBarCharts.js') }}\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>
", "base_admin.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\base_admin.html.twig");
    }
}
