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
                        <a class=\"nav-link active\" id=\"home-tab\" data-bs-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Tableau de Bord</a>
                    </li>
                </ul>
            </div>
            
            ";
        // line 54
        if (((isset($context["unverified_count"]) || array_key_exists("unverified_count", $context) ? $context["unverified_count"] : (function () { throw new RuntimeError('Variable "unverified_count" does not exist.', 54, $this->source); })()) > 0)) {
            // line 55
            yield "            <div class=\"alert alert-warning d-flex align-items-center mt-3\" role=\"alert\">
                <span class=\"mdi mdi-alert-circle-outline me-2\" style=\"font-size: 1.2rem;\"></span>
                <div>
                   <strong>Note:</strong> Il y a <strong>";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unverified_count"]) || array_key_exists("unverified_count", $context) ? $context["unverified_count"] : (function () { throw new RuntimeError('Variable "unverified_count" does not exist.', 58, $this->source); })()), "html", null, true);
            yield "</strong> médecins en attente de vérification.
                </div>
            </div>
            ";
        }
        // line 62
        yield "
            <!-- Statistics Cards -->
            <div class=\"row mt-4\">
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-primary gradient-primary\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Total Utilisateurs</p>
                                    <h3 class=\"text-white card-count\">";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_users_count"]) || array_key_exists("total_users_count", $context) ? $context["total_users_count"] : (function () { throw new RuntimeError('Variable "total_users_count" does not exist.', 71, $this->source); })()), "html", null, true);
        yield "</h3>
                                </div>
                                <div class=\"icon icon-box-primary\">
                                    <span class=\"mdi mdi-account-group icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Inscrits sur Medicare</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-success gradient-success\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Médecins Actifs</p>
                                    <h3 class=\"text-white card-count\">";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["active_medecins"]) || array_key_exists("active_medecins", $context) ? $context["active_medecins"] : (function () { throw new RuntimeError('Variable "active_medecins" does not exist.', 87, $this->source); })()), "html", null, true);
        yield "</h3>
                                </div>
                                <div class=\"icon icon-box-success\">
                                    <span class=\"mdi mdi-doctor icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Sur ";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_medecins"]) || array_key_exists("total_medecins", $context) ? $context["total_medecins"] : (function () { throw new RuntimeError('Variable "total_medecins" does not exist.', 93, $this->source); })()), "html", null, true);
        yield " médecins</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-warning gradient-warning\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Âge Moyen</p>
                                    <h3 class=\"text-white card-count\">";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avg_age"]) || array_key_exists("avg_age", $context) ? $context["avg_age"] : (function () { throw new RuntimeError('Variable "avg_age" does not exist.', 103, $this->source); })()), "html", null, true);
        yield "</h3>
                                </div>
                                <div class=\"icon icon-box-warning\">
                                    <span class=\"mdi mdi-cake-variant icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Ans (Patients & Médecins)</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-danger gradient-danger\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">En Attente</p>
                                    <h3 class=\"text-white card-count\">";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unverified_count"]) || array_key_exists("unverified_count", $context) ? $context["unverified_count"] : (function () { throw new RuntimeError('Variable "unverified_count" does not exist.', 119, $this->source); })()), "html", null, true);
        yield "</h3>
                                </div>
                                <div class=\"icon icon-box-danger\">
                                    <span class=\"mdi mdi-shield-account icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Médecins à vérifier</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity and Actions -->
            <div class=\"row mt-4\">
                <div class=\"col-lg-8 d-flex flex-column\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                <h4 class=\"card-title\">Médecins en attente de vérification</h4>
                                ";
        // line 138
        if (((isset($context["unverified_count"]) || array_key_exists("unverified_count", $context) ? $context["unverified_count"] : (function () { throw new RuntimeError('Variable "unverified_count" does not exist.', 138, $this->source); })()) > 0)) {
            // line 139
            yield "                                <form action=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_verify_all_medecins");
            yield "\" method=\"POST\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-success\">
                                        <i class=\"mdi mdi-check-all\"></i> Tout Approuver
                                    </button>
                                </form>
                                ";
        }
        // line 145
        yield "                            </div>
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover\">
                                    <thead>
                                        <tr>
                                            <th>Nom Complet</th>
                                            <th>Spécialité</th>
                                            <th>Ville</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["unverified_medecins"]) || array_key_exists("unverified_medecins", $context) ? $context["unverified_medecins"] : (function () { throw new RuntimeError('Variable "unverified_medecins" does not exist.', 157, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["medecin"]) {
            // line 158
            yield "                                        <tr>
                                            <td>";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "prenom", [], "any", false, false, false, 159), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "nom", [], "any", false, false, false, 159), "html", null, true);
            yield "</td>
                                            <td>";
            // line 160
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "specialite", [], "any", false, false, false, 160), "html", null, true);
            yield "</td>
                                            <td>";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "ville", [], "any", false, false, false, 161), "html", null, true);
            yield "</td>
                                            <td>
                                                <a href=\"";
            // line 163
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_medecins_verify", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "id", [], "any", false, false, false, 163)]), "html", null, true);
            yield "\" class=\"btn btn-xs btn-outline-success\">Approuver</a>
                                            </td>
                                        </tr>
                                        ";
            $context['_iterated'] = true;
        }
        // line 166
        if (!$context['_iterated']) {
            // line 167
            yield "                                        <tr>
                                            <td colspan=\"4\" class=\"text-center text-muted\">Aucun médecin en attente</td>
                                        </tr>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['medecin'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        yield "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class=\"card mt-4\">
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">Classification par Spécialisation</h4>
                            <div class=\"list-group list-group-flush\">
                                ";
        // line 181
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["specialisations"]) || array_key_exists("specialisations", $context) ? $context["specialisations"] : (function () { throw new RuntimeError('Variable "specialisations" does not exist.', 181, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["spec"]) {
            // line 182
            yield "                                <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                                    ";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["spec"], "specialite", [], "any", false, false, false, 183), "html", null, true);
            yield "
                                    <span class=\"badge bg-primary rounded-pill\">";
            // line 184
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["spec"], "count", [], "any", false, false, false, 184), "html", null, true);
            yield "</span>
                                </div>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['spec'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 187
        yield "                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=\"col-lg-4 d-flex flex-column\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">Actions Rapides</h4>
                            <div class=\"d-flex flex-column gap-2 mt-3\">
                                <a href=\"";
        // line 197
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medecin_register");
        yield "\" class=\"btn btn-primary\">
                                    <i class=\"mdi mdi-plus\"></i> Ajouter Médecin
                                </a>
                                <a href=\"";
        // line 200
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-success\">
                                    <i class=\"mdi mdi-account-plus\"></i> Ajouter Patient
                                </a>
                                <a href=\"";
        // line 203
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_add");
        yield "\" class=\"btn btn-info\">
                                    <i class=\"mdi mdi-security\"></i> Ajouter Admin
                                </a>
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
        return array (  403 => 203,  397 => 200,  391 => 197,  379 => 187,  370 => 184,  366 => 183,  363 => 182,  359 => 181,  347 => 171,  338 => 167,  336 => 166,  328 => 163,  323 => 161,  319 => 160,  313 => 159,  310 => 158,  305 => 157,  291 => 145,  281 => 139,  279 => 138,  257 => 119,  238 => 103,  225 => 93,  216 => 87,  197 => 71,  186 => 62,  179 => 58,  174 => 55,  172 => 54,  159 => 43,  146 => 42,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
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
                        <a class=\"nav-link active\" id=\"home-tab\" data-bs-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Tableau de Bord</a>
                    </li>
                </ul>
            </div>
            
            {% if unverified_count > 0 %}
            <div class=\"alert alert-warning d-flex align-items-center mt-3\" role=\"alert\">
                <span class=\"mdi mdi-alert-circle-outline me-2\" style=\"font-size: 1.2rem;\"></span>
                <div>
                   <strong>Note:</strong> Il y a <strong>{{ unverified_count }}</strong> médecins en attente de vérification.
                </div>
            </div>
            {% endif %}

            <!-- Statistics Cards -->
            <div class=\"row mt-4\">
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-primary gradient-primary\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Total Utilisateurs</p>
                                    <h3 class=\"text-white card-count\">{{ total_users_count }}</h3>
                                </div>
                                <div class=\"icon icon-box-primary\">
                                    <span class=\"mdi mdi-account-group icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Inscrits sur Medicare</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-success gradient-success\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Médecins Actifs</p>
                                    <h3 class=\"text-white card-count\">{{ active_medecins }}</h3>
                                </div>
                                <div class=\"icon icon-box-success\">
                                    <span class=\"mdi mdi-doctor icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Sur {{ total_medecins }} médecins</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-warning gradient-warning\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">Âge Moyen</p>
                                    <h3 class=\"text-white card-count\">{{ avg_age }}</h3>
                                </div>
                                <div class=\"icon icon-box-warning\">
                                    <span class=\"mdi mdi-cake-variant icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Ans (Patients & Médecins)</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-6 col-lg-3\">
                    <div class=\"card card-stats card-danger gradient-danger\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div>
                                    <p class=\"card-title text-white\">En Attente</p>
                                    <h3 class=\"text-white card-count\">{{ unverified_count }}</h3>
                                </div>
                                <div class=\"icon icon-box-danger\">
                                    <span class=\"mdi mdi-shield-account icon-item\"></span>
                                </div>
                            </div>
                            <p class=\"mt-2 mb-0 text-white-50\">Médecins à vérifier</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity and Actions -->
            <div class=\"row mt-4\">
                <div class=\"col-lg-8 d-flex flex-column\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                <h4 class=\"card-title\">Médecins en attente de vérification</h4>
                                {% if unverified_count > 0 %}
                                <form action=\"{{ path('app_admin_verify_all_medecins') }}\" method=\"POST\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-success\">
                                        <i class=\"mdi mdi-check-all\"></i> Tout Approuver
                                    </button>
                                </form>
                                {% endif %}
                            </div>
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover\">
                                    <thead>
                                        <tr>
                                            <th>Nom Complet</th>
                                            <th>Spécialité</th>
                                            <th>Ville</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% for medecin in unverified_medecins %}
                                        <tr>
                                            <td>{{ medecin.prenom }} {{ medecin.nom }}</td>
                                            <td>{{ medecin.specialite }}</td>
                                            <td>{{ medecin.ville }}</td>
                                            <td>
                                                <a href=\"{{ path('app_admin_medecins_verify', {id: medecin.id}) }}\" class=\"btn btn-xs btn-outline-success\">Approuver</a>
                                            </td>
                                        </tr>
                                        {% else %}
                                        <tr>
                                            <td colspan=\"4\" class=\"text-center text-muted\">Aucun médecin en attente</td>
                                        </tr>
                                        {% endfor %}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class=\"card mt-4\">
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">Classification par Spécialisation</h4>
                            <div class=\"list-group list-group-flush\">
                                {% for spec in specialisations %}
                                <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                                    {{ spec.specialite }}
                                    <span class=\"badge bg-primary rounded-pill\">{{ spec.count }}</span>
                                </div>
                                {% endfor %}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=\"col-lg-4 d-flex flex-column\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">Actions Rapides</h4>
                            <div class=\"d-flex flex-column gap-2 mt-3\">
                                <a href=\"{{ path('app_medecin_register') }}\" class=\"btn btn-primary\">
                                    <i class=\"mdi mdi-plus\"></i> Ajouter Médecin
                                </a>
                                <a href=\"{{ path('app_register') }}\" class=\"btn btn-success\">
                                    <i class=\"mdi mdi-account-plus\"></i> Ajouter Patient
                                </a>
                                <a href=\"{{ path('app_admin_add') }}\" class=\"btn btn-info\">
                                    <i class=\"mdi mdi-security\"></i> Ajouter Admin
                                </a>
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
