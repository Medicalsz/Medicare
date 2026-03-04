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

/* partials/admin/_sidebar.html.twig */
class __TwigTemplate_00489dfb52b2b1fe3773b8702654269c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/admin/_sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/admin/_sidebar.html.twig"));

        // line 1
        yield "<nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
    <ul class=\"nav\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 4
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\">
                <i class=\"mdi mdi-view-dashboard menu-icon\"></i>
                <span class=\"menu-title\">Dashboard</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_medecins_index");
        yield "\">
                <i class=\"mdi mdi-doctor menu-icon\"></i>
                <span class=\"menu-title\">Médecins</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-account-group menu-icon\"></i>
                <span class=\"menu-title\">Patients</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-calendar-check menu-icon\"></i>
                <span class=\"menu-title\">Rendez-vous</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-hospital-building menu-icon\"></i>
                <span class=\"menu-title\">Spécialités</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-chart-bar menu-icon\"></i>
                <span class=\"menu-title\">Statistiques</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-cog menu-icon\"></i>
                <span class=\"menu-title\">Paramètres</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 46
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_logout");
        yield "\">
                <i class=\"mdi mdi-logout menu-icon\"></i>
                <span class=\"menu-title\">Déconnexion</span>
            </a>
        </li>
    </ul>
</nav>
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
        return "partials/admin/_sidebar.html.twig";
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
        return array (  101 => 46,  62 => 10,  53 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
    <ul class=\"nav\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('app_admin_dashboard') }}\">
                <i class=\"mdi mdi-view-dashboard menu-icon\"></i>
                <span class=\"menu-title\">Dashboard</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('admin_medecins_index') }}\">
                <i class=\"mdi mdi-doctor menu-icon\"></i>
                <span class=\"menu-title\">Médecins</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-account-group menu-icon\"></i>
                <span class=\"menu-title\">Patients</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-calendar-check menu-icon\"></i>
                <span class=\"menu-title\">Rendez-vous</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-hospital-building menu-icon\"></i>
                <span class=\"menu-title\">Spécialités</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-chart-bar menu-icon\"></i>
                <span class=\"menu-title\">Statistiques</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">
                <i class=\"mdi mdi-cog menu-icon\"></i>
                <span class=\"menu-title\">Paramètres</span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('app_admin_logout') }}\">
                <i class=\"mdi mdi-logout menu-icon\"></i>
                <span class=\"menu-title\">Déconnexion</span>
            </a>
        </li>
    </ul>
</nav>
", "partials/admin/_sidebar.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\partials\\admin\\_sidebar.html.twig");
    }
}
