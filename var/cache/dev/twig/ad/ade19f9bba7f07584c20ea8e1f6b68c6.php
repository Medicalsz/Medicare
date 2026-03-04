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

/* admin/dashboard.html.twig */
class __TwigTemplate_848c03f72553aa5c1fd490475bc8e697 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $this->parent = $this->load("base_admin.html.twig", 1);
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

        yield "Dashboard Admin - Medicare";
        
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
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 0 1px rgba(0,0,0,.05), 0 1px 3px rgba(0,0,0,.1);
    }
    .card-stats .card-title {
        color: #6c757d;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .card-stats .card-count {
        font-size: 2.25rem;
        font-weight: 600;
        color: #1f1f1f;
    }
    .gradient-primary {
        background: linear-gradient(135deg, #4b79a1 0%, #283e51 100%);
        color: white;
    }
    .gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
    }
    .gradient-warning {
        background: linear-gradient(135deg, #f2994a 0%, #f2c94c 100%);
        color: white;
    }
    .gradient-danger {
        background: linear-gradient(135deg, #cb2d3e 0%, #ef473a 100%);
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 42
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

        // line 43
        yield "<div class=\"row\">
    <div class=\"col-sm-12\">
        <div class=\"home-tab\">
            <div class=\"d-sm-flex align-items-center justify-content-between border-bottom\">
                <ul class=\"nav nav-tabs\" role=\"tablist\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" id=\"home-tab\" data-bs-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Dashboard</a>
                    </li>
                </ul>
                <div>
                    <div class=\"btn-wrapper\">
                        <a href=\"#\" class=\"btn btn-outline-dark me-0\"><i class=\"mdi mdi-download\"></i> Exporter</a>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class=\"row mt-4\">
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-primary gradient-primary\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Médecins Total</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-primary\">
                                    <span class=\"mdi mdi-doctor icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Médecins inscrits</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-success gradient-success\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Patients Total</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-success\">
                                    <span class=\"mdi mdi-account-group icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Patients inscrits</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-warning gradient-warning\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">En attente</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-warning\">
                                    <span class=\"mdi mdi-clock-outline icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Demandes médecins</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-danger gradient-danger\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Rendez-vous</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-danger\">
                                    <span class=\"mdi mdi-calendar-check icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Aujourd'hui</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div class=\"row mt-4\">
                <div class=\"col-lg-8 d-flex flex-column\">
                    <div class=\"row flex-grow\">
                        <div class=\"col-12 grid-margin stretch-card\">
                            <div class=\"card\">
                                <div class=\"card-body\">
                                    <h4 class=\"card-title\">Activité Récente</h4>
                                    <div class=\"table-responsive\">
                                        <table class=\"table\">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan=\"4\" class=\"text-center text-muted\">Aucune activité récente</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-4 d-flex flex-column\">
                    <div class=\"row flex-grow\">
                        <div class=\"col-12 grid-margin stretch-card\">
                            <div class=\"card\">
                                <div class=\"card-body\">
                                    <h4 class=\"card-title\">Actions Rapides</h4>
                                    <div class=\"d-flex flex-column gap-2 mt-3\">
                                        <a href=\"#\" class=\"btn btn-primary\">
                                            <i class=\"mdi mdi-plus\"></i> Ajouter Médecin
                                        </a>
                                        <a href=\"#\" class=\"btn btn-success\">
                                            <i class=\"mdi mdi-account-check\"></i> Valider Demandes
                                        </a>
                                        <a href=\"#\" class=\"btn btn-info\">
                                            <i class=\"mdi mdi-chart-bar\"></i> Voir Statistiques
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        return "admin/dashboard.html.twig";
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
        return array (  159 => 43,  146 => 42,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block title %}Dashboard Admin - Medicare{% endblock %}

{% block stylesheets %}
<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 0 1px rgba(0,0,0,.05), 0 1px 3px rgba(0,0,0,.1);
    }
    .card-stats .card-title {
        color: #6c757d;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .card-stats .card-count {
        font-size: 2.25rem;
        font-weight: 600;
        color: #1f1f1f;
    }
    .gradient-primary {
        background: linear-gradient(135deg, #4b79a1 0%, #283e51 100%);
        color: white;
    }
    .gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
    }
    .gradient-warning {
        background: linear-gradient(135deg, #f2994a 0%, #f2c94c 100%);
        color: white;
    }
    .gradient-danger {
        background: linear-gradient(135deg, #cb2d3e 0%, #ef473a 100%);
        color: white;
    }
</style>
{% endblock %}

{% block content %}
<div class=\"row\">
    <div class=\"col-sm-12\">
        <div class=\"home-tab\">
            <div class=\"d-sm-flex align-items-center justify-content-between border-bottom\">
                <ul class=\"nav nav-tabs\" role=\"tablist\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" id=\"home-tab\" data-bs-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Dashboard</a>
                    </li>
                </ul>
                <div>
                    <div class=\"btn-wrapper\">
                        <a href=\"#\" class=\"btn btn-outline-dark me-0\"><i class=\"mdi mdi-download\"></i> Exporter</a>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class=\"row mt-4\">
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-primary gradient-primary\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Médecins Total</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-primary\">
                                    <span class=\"mdi mdi-doctor icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Médecins inscrits</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-success gradient-success\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Patients Total</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-success\">
                                    <span class=\"mdi mdi-account-group icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Patients inscrits</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-warning gradient-warning\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">En attente</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-warning\">
                                    <span class=\"mdi mdi-clock-outline icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Demandes médecins</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-danger gradient-danger\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Rendez-vous</p>
                                    <h3 class=\"text-white card-count\">0</h3>
                                </div>
                                <div class=\"icon icon-box-danger\">
                                    <span class=\"mdi mdi-calendar-check icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Aujourd'hui</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div class=\"row mt-4\">
                <div class=\"col-lg-8 d-flex flex-column\">
                    <div class=\"row flex-grow\">
                        <div class=\"col-12 grid-margin stretch-card\">
                            <div class=\"card\">
                                <div class=\"card-body\">
                                    <h4 class=\"card-title\">Activité Récente</h4>
                                    <div class=\"table-responsive\">
                                        <table class=\"table\">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan=\"4\" class=\"text-center text-muted\">Aucune activité récente</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-4 d-flex flex-column\">
                    <div class=\"row flex-grow\">
                        <div class=\"col-12 grid-margin stretch-card\">
                            <div class=\"card\">
                                <div class=\"card-body\">
                                    <h4 class=\"card-title\">Actions Rapides</h4>
                                    <div class=\"d-flex flex-column gap-2 mt-3\">
                                        <a href=\"#\" class=\"btn btn-primary\">
                                            <i class=\"mdi mdi-plus\"></i> Ajouter Médecin
                                        </a>
                                        <a href=\"#\" class=\"btn btn-success\">
                                            <i class=\"mdi mdi-account-check\"></i> Valider Demandes
                                        </a>
                                        <a href=\"#\" class=\"btn btn-info\">
                                            <i class=\"mdi mdi-chart-bar\"></i> Voir Statistiques
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "admin/dashboard.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\admin\\dashboard.html.twig");
    }
}
