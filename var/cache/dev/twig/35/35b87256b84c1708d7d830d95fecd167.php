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

/* frontend/explore.html.twig */
class __TwigTemplate_4c57cec3e2f4321e64557a7255f36f93 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/explore.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/explore.html.twig"));

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

        yield "Trouver un Médecin - Medicare";
        
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
        yield "<div class=\"explore-page\">
    <section class=\"page-header\">
        <div class=\"container\">
            <h1>Trouver un Médecin</h1>
            <p>Découvrez les meilleurs médecins près de chez vous</p>
        </div>
    </section>

    <section class=\"explore-content\">
        <div class=\"container\">
            <div class=\"row\">
                <!-- Advanced Filter Sidebar -->
                <div class=\"col-lg-3\">
                    <div class=\"filter-sidebar\">
                        <h3><i class=\"mdi mdi-filter\"></i> Filtres Avancés</h3>
                        
                        <form action=\"";
        // line 22
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_explore");
        yield "\" method=\"get\" class=\"filter-form\">
                            <!-- Search -->
                            <div class=\"filter-group\">
                                <label for=\"search\">Rechercher un médecin</label>
                                <div class=\"input-wrapper\">
                                    <i class=\"mdi mdi-magnify\"></i>
                                    <input type=\"text\" id=\"search\" name=\"search\" value=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 28, $this->source); })()), "search", [], "any", false, false, false, 28), "html", null, true);
        yield "\" placeholder=\"Nom du médecin...\" class=\"form-control\">
                                </div>
                            </div>

                            <!-- Specialty -->
                            <div class=\"filter-group\">
                                <label for=\"specialite\">Spécialité Médicale</label>
                                <select id=\"specialite\" name=\"specialite\" class=\"form-select\">
                                    <option value=\"\">Toutes les spécialités</option>
                                    ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["specialties"]) || array_key_exists("specialties", $context) ? $context["specialties"] : (function () { throw new RuntimeError('Variable "specialties" does not exist.', 37, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["specialty"]) {
            // line 38
            yield "                                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["specialty"], "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 38, $this->source); })()), "specialite", [], "any", false, false, false, 38) == $context["specialty"])) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["specialty"], "html", null, true);
            yield "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['specialty'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        yield "                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class=\"filter-group\">
                                <label>Prix de Consultation</label>
                                <div class=\"price-range\">
                                    <div class=\"input-wrapper\">
                                        <i class=\"mdi mdi-currency-usd\"></i>
                                        <input type=\"number\" id=\"prix_min\" name=\"prix_min\" value=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 49, $this->source); })()), "prix_min", [], "any", false, false, false, 49), "html", null, true);
        yield "\" placeholder=\"Min\" class=\"form-control\">
                                    </div>
                                    <span class=\"separator\">-</span>
                                    <div class=\"input-wrapper\">
                                        <i class=\"mdi mdi-currency-usd\"></i>
                                        <input type=\"number\" id=\"prix_max\" name=\"prix_max\" value=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 54, $this->source); })()), "prix_max", [], "any", false, false, false, 54), "html", null, true);
        yield "\" placeholder=\"Max\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>

                            <!-- Ville -->
                            <div class=\"filter-group\">
                                <label for=\"ville\">Ville</label>
                                <select id=\"ville\" name=\"ville\" class=\"form-select\">
                                    <option value=\"\">Toutes les villes</option>
                                    ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["villes"]) || array_key_exists("villes", $context) ? $context["villes"] : (function () { throw new RuntimeError('Variable "villes" does not exist.', 64, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["ville"]) {
            // line 65
            yield "                                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["ville"], "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 65, $this->source); })()), "ville", [], "any", false, false, false, 65) == $context["ville"])) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["ville"], "html", null, true);
            yield "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['ville'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        yield "                                </select>
                            </div>

                            <!-- Delegation -->
                            <div class=\"filter-group\">
                                <label for=\"delegation\">Délégation</label>
                                <select id=\"delegation\" name=\"delegation\" class=\"form-select\">
                                    <option value=\"\">Toutes les délégations</option>
                                    ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["delegations"]) || array_key_exists("delegations", $context) ? $context["delegations"] : (function () { throw new RuntimeError('Variable "delegations" does not exist.', 75, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["delegation"]) {
            // line 76
            yield "                                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["delegation"], "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 76, $this->source); })()), "delegation", [], "any", false, false, false, 76) == $context["delegation"])) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["delegation"], "html", null, true);
            yield "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['delegation'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        yield "                                </select>
                            </div>

                            <!-- Filter Buttons -->
                            <div class=\"filter-buttons\">
                                <button type=\"submit\" class=\"btn btn-primary btn-filter\">
                                    <i class=\"mdi mdi-magnify\"></i>
                                    Appliquer
                                </button>
                                <a href=\"";
        // line 87
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_explore");
        yield "\" class=\"btn btn-secondary btn-reset\">
                                    <i class=\"mdi mdi-refresh\"></i>
                                    Réinitialiser
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Doctors Grid -->
                <div class=\"col-lg-9\">
                    <div class=\"results-header\">
                        <p class=\"results-count\">
                            <i class=\"mdi mdi-account-group\"></i>
                            ";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 101, $this->source); })())), "html", null, true);
        yield " médecin(s) trouvé(s)
                        </p>
                    </div>

                    ";
        // line 105
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 105, $this->source); })()))) {
            // line 106
            yield "                        <div class=\"no-results\">
                            <i class=\"mdi mdi-account-search\"></i>
                            <h3>Aucun médecin trouvé</h3>
                            <p>Essayez d'ajuster vos filtres ou critères de recherche</p>
                        </div>
                    ";
        } else {
            // line 112
            yield "                        <div class=\"doctors-grid\">
                            ";
            // line 113
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 113, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["medecin"]) {
                // line 114
                yield "                                <div class=\"doctor-card\">
                                    <div class=\"doctor-image\">
                                        ";
                // line 116
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "photo", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 117
                    yield "                                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "photo", [], "any", false, false, false, 117), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "fullName", [], "any", false, false, false, 117), "html", null, true);
                    yield "\" class=\"img-fluid\">
                                        ";
                } else {
                    // line 119
                    yield "                                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/frontend/img/person/person-m-9.webp"), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "fullName", [], "any", false, false, false, 119), "html", null, true);
                    yield "\" class=\"img-fluid\">
                                        ";
                }
                // line 121
                yield "                                    </div>
                                    <div class=\"doctor-info\">
                                        <h4>";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "fullName", [], "any", false, false, false, 123), "html", null, true);
                yield "</h4>
                                        <p class=\"specialty\">
                                            <i class=\"mdi mdi-stethoscope\"></i>
                                            ";
                // line 126
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "specialite", [], "any", false, false, false, 126), "html", null, true);
                yield "
                                        </p>
                                        <p class=\"location\">
                                            <i class=\"mdi mdi-map-marker\"></i>
                                            ";
                // line 130
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "ville", [], "any", false, false, false, 130)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "ville", [], "any", false, false, false, 130), "html", null, true);
                }
                // line 131
                yield "                                            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "delegation", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "delegation", [], "any", false, false, false, 131), "html", null, true);
                }
                // line 132
                yield "                                        </p>
                                        <p class=\"price\">
                                            <i class=\"mdi mdi-currency-usd\"></i>
                                            ";
                // line 135
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "prixConsultation", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 136
                    yield "                                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "prixConsultation", [], "any", false, false, false, 136), "html", null, true);
                    yield " DT
                                            ";
                } else {
                    // line 138
                    yield "                                                Contacter pour le prix
                                            ";
                }
                // line 140
                yield "                                        </p>
                                        <div class=\"doctor-actions\">
                                            <a href=\"#\" class=\"btn btn-primary btn-sm\">
                                                <i class=\"mdi mdi-calendar-check\"></i>
                                                Prendre RDV
                                            </a>
                                            <a href=\"#\" class=\"btn btn-outline-primary btn-sm\">
                                                <i class=\"mdi mdi-message\"></i>
                                                Contacter
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['medecin'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            yield "                        </div>
                    ";
        }
        // line 156
        yield "                </div>
            </div>
        </div>
    </section>
</div>

<style>
.explore-page {
    padding-top: 120px;
}

.page-header {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 3rem 0;
    text-align: center;
    margin-bottom: 2rem;
}

.page-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.page-header p {
    font-size: 1.1rem;
    opacity: 0.9;
}

.filter-sidebar {
    background: #fff;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 100px;
}

.filter-sidebar h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: #1f2937;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-group {
    margin-bottom: 1.25rem;
}

.filter-group label {
    display: block;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.filter-group .input-wrapper {
    position: relative;
}

.filter-group .input-wrapper i {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #10b981;
}

.filter-group .form-control {
    padding-left: 2.5rem;
    height: 42px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
}

.filter-group .form-control:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
}

.filter-group .form-select {
    height: 42px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
}

.filter-group .form-select:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
}

.price-range {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.price-range .form-control {
    flex: 1;
}

.price-range .separator {
    color: #6b7280;
}

.form-check-input:checked {
    background-color: #10b981;
    border-color: #10b981;
}

.form-check-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 1.5rem;
}

.btn-filter {
    width: 100%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    height: 42px;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
}

.btn-reset {
    width: 100%;
    color: #6b7280;
    border-color: #e5e7eb;
    height: 42px;
}

.btn-reset:hover {
    background: #f3f4f6;
    color: #374151;
}

.results-header {
    margin-bottom: 1.5rem;
}

.results-count {
    font-size: 1rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.no-results i {
    font-size: 3rem;
    color: #e5e7eb;
    margin-bottom: 1rem;
}

.no-results h3 {
    color: #374151;
    margin-bottom: 0.5rem;
}

.no-results p {
    color: #6b7280;
}

.doctors-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

.doctor-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.doctor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.doctor-image {
    position: relative;
    height: 180px;
    overflow: hidden;
}

.doctor-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.doctor-info {
    padding: 1.25rem;
}

.doctor-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.doctor-info p {
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.doctor-info .specialty {
    color: #10b981;
    font-weight: 500;
}

.doctor-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
}

.doctor-actions .btn {
    flex: 1;
    font-size: 0.8rem;
    padding: 0.5rem;
}

.btn-sm {
    padding: 0.5rem 0.75rem;
    font-size: 0.85rem;
}

@media (max-width: 1200px) {
    .doctors-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .doctors-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .filter-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
}

@media (max-width: 576px) {
    .doctors-grid {
        grid-template-columns: 1fr;
    }
    
    .page-header h1 {
        font-size: 1.75rem;
    }
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
        return "frontend/explore.html.twig";
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
        return array (  379 => 156,  375 => 154,  356 => 140,  352 => 138,  346 => 136,  344 => 135,  339 => 132,  333 => 131,  329 => 130,  322 => 126,  316 => 123,  312 => 121,  304 => 119,  296 => 117,  294 => 116,  290 => 114,  286 => 113,  283 => 112,  275 => 106,  273 => 105,  266 => 101,  249 => 87,  238 => 78,  223 => 76,  219 => 75,  209 => 67,  194 => 65,  190 => 64,  177 => 54,  169 => 49,  158 => 40,  143 => 38,  139 => 37,  127 => 28,  118 => 22,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Trouver un Médecin - Medicare{% endblock %}

{% block body %}
<div class=\"explore-page\">
    <section class=\"page-header\">
        <div class=\"container\">
            <h1>Trouver un Médecin</h1>
            <p>Découvrez les meilleurs médecins près de chez vous</p>
        </div>
    </section>

    <section class=\"explore-content\">
        <div class=\"container\">
            <div class=\"row\">
                <!-- Advanced Filter Sidebar -->
                <div class=\"col-lg-3\">
                    <div class=\"filter-sidebar\">
                        <h3><i class=\"mdi mdi-filter\"></i> Filtres Avancés</h3>
                        
                        <form action=\"{{ path('app_explore') }}\" method=\"get\" class=\"filter-form\">
                            <!-- Search -->
                            <div class=\"filter-group\">
                                <label for=\"search\">Rechercher un médecin</label>
                                <div class=\"input-wrapper\">
                                    <i class=\"mdi mdi-magnify\"></i>
                                    <input type=\"text\" id=\"search\" name=\"search\" value=\"{{ filters.search }}\" placeholder=\"Nom du médecin...\" class=\"form-control\">
                                </div>
                            </div>

                            <!-- Specialty -->
                            <div class=\"filter-group\">
                                <label for=\"specialite\">Spécialité Médicale</label>
                                <select id=\"specialite\" name=\"specialite\" class=\"form-select\">
                                    <option value=\"\">Toutes les spécialités</option>
                                    {% for specialty in specialties %}
                                        <option value=\"{{ specialty }}\" {% if filters.specialite == specialty %}selected{% endif %}>{{ specialty }}</option>
                                    {% endfor %}
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class=\"filter-group\">
                                <label>Prix de Consultation</label>
                                <div class=\"price-range\">
                                    <div class=\"input-wrapper\">
                                        <i class=\"mdi mdi-currency-usd\"></i>
                                        <input type=\"number\" id=\"prix_min\" name=\"prix_min\" value=\"{{ filters.prix_min }}\" placeholder=\"Min\" class=\"form-control\">
                                    </div>
                                    <span class=\"separator\">-</span>
                                    <div class=\"input-wrapper\">
                                        <i class=\"mdi mdi-currency-usd\"></i>
                                        <input type=\"number\" id=\"prix_max\" name=\"prix_max\" value=\"{{ filters.prix_max }}\" placeholder=\"Max\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>

                            <!-- Ville -->
                            <div class=\"filter-group\">
                                <label for=\"ville\">Ville</label>
                                <select id=\"ville\" name=\"ville\" class=\"form-select\">
                                    <option value=\"\">Toutes les villes</option>
                                    {% for ville in villes %}
                                        <option value=\"{{ ville }}\" {% if filters.ville == ville %}selected{% endif %}>{{ ville }}</option>
                                    {% endfor %}
                                </select>
                            </div>

                            <!-- Delegation -->
                            <div class=\"filter-group\">
                                <label for=\"delegation\">Délégation</label>
                                <select id=\"delegation\" name=\"delegation\" class=\"form-select\">
                                    <option value=\"\">Toutes les délégations</option>
                                    {% for delegation in delegations %}
                                        <option value=\"{{ delegation }}\" {% if filters.delegation == delegation %}selected{% endif %}>{{ delegation }}</option>
                                    {% endfor %}
                                </select>
                            </div>

                            <!-- Filter Buttons -->
                            <div class=\"filter-buttons\">
                                <button type=\"submit\" class=\"btn btn-primary btn-filter\">
                                    <i class=\"mdi mdi-magnify\"></i>
                                    Appliquer
                                </button>
                                <a href=\"{{ path('app_explore') }}\" class=\"btn btn-secondary btn-reset\">
                                    <i class=\"mdi mdi-refresh\"></i>
                                    Réinitialiser
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Doctors Grid -->
                <div class=\"col-lg-9\">
                    <div class=\"results-header\">
                        <p class=\"results-count\">
                            <i class=\"mdi mdi-account-group\"></i>
                            {{ medecins|length }} médecin(s) trouvé(s)
                        </p>
                    </div>

                    {% if medecins is empty %}
                        <div class=\"no-results\">
                            <i class=\"mdi mdi-account-search\"></i>
                            <h3>Aucun médecin trouvé</h3>
                            <p>Essayez d'ajuster vos filtres ou critères de recherche</p>
                        </div>
                    {% else %}
                        <div class=\"doctors-grid\">
                            {% for medecin in medecins %}
                                <div class=\"doctor-card\">
                                    <div class=\"doctor-image\">
                                        {% if medecin.photo %}
                                            <img src=\"{{ medecin.photo }}\" alt=\"{{ medecin.fullName }}\" class=\"img-fluid\">
                                        {% else %}
                                            <img src=\"{{ asset('build/assets/frontend/img/person/person-m-9.webp') }}\" alt=\"{{ medecin.fullName }}\" class=\"img-fluid\">
                                        {% endif %}
                                    </div>
                                    <div class=\"doctor-info\">
                                        <h4>{{ medecin.fullName }}</h4>
                                        <p class=\"specialty\">
                                            <i class=\"mdi mdi-stethoscope\"></i>
                                            {{ medecin.specialite }}
                                        </p>
                                        <p class=\"location\">
                                            <i class=\"mdi mdi-map-marker\"></i>
                                            {% if medecin.ville %}{{ medecin.ville }}{% endif %}
                                            {% if medecin.delegation %}, {{ medecin.delegation }}{% endif %}
                                        </p>
                                        <p class=\"price\">
                                            <i class=\"mdi mdi-currency-usd\"></i>
                                            {% if medecin.prixConsultation %}
                                                {{ medecin.prixConsultation }} DT
                                            {% else %}
                                                Contacter pour le prix
                                            {% endif %}
                                        </p>
                                        <div class=\"doctor-actions\">
                                            <a href=\"#\" class=\"btn btn-primary btn-sm\">
                                                <i class=\"mdi mdi-calendar-check\"></i>
                                                Prendre RDV
                                            </a>
                                            <a href=\"#\" class=\"btn btn-outline-primary btn-sm\">
                                                <i class=\"mdi mdi-message\"></i>
                                                Contacter
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            {% endfor %}
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.explore-page {
    padding-top: 120px;
}

.page-header {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 3rem 0;
    text-align: center;
    margin-bottom: 2rem;
}

.page-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.page-header p {
    font-size: 1.1rem;
    opacity: 0.9;
}

.filter-sidebar {
    background: #fff;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 100px;
}

.filter-sidebar h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: #1f2937;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-group {
    margin-bottom: 1.25rem;
}

.filter-group label {
    display: block;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.filter-group .input-wrapper {
    position: relative;
}

.filter-group .input-wrapper i {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #10b981;
}

.filter-group .form-control {
    padding-left: 2.5rem;
    height: 42px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
}

.filter-group .form-control:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
}

.filter-group .form-select {
    height: 42px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
}

.filter-group .form-select:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
}

.price-range {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.price-range .form-control {
    flex: 1;
}

.price-range .separator {
    color: #6b7280;
}

.form-check-input:checked {
    background-color: #10b981;
    border-color: #10b981;
}

.form-check-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 1.5rem;
}

.btn-filter {
    width: 100%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    height: 42px;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
}

.btn-reset {
    width: 100%;
    color: #6b7280;
    border-color: #e5e7eb;
    height: 42px;
}

.btn-reset:hover {
    background: #f3f4f6;
    color: #374151;
}

.results-header {
    margin-bottom: 1.5rem;
}

.results-count {
    font-size: 1rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.no-results i {
    font-size: 3rem;
    color: #e5e7eb;
    margin-bottom: 1rem;
}

.no-results h3 {
    color: #374151;
    margin-bottom: 0.5rem;
}

.no-results p {
    color: #6b7280;
}

.doctors-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

.doctor-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.doctor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.doctor-image {
    position: relative;
    height: 180px;
    overflow: hidden;
}

.doctor-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.doctor-info {
    padding: 1.25rem;
}

.doctor-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.doctor-info p {
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.doctor-info .specialty {
    color: #10b981;
    font-weight: 500;
}

.doctor-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
}

.doctor-actions .btn {
    flex: 1;
    font-size: 0.8rem;
    padding: 0.5rem;
}

.btn-sm {
    padding: 0.5rem 0.75rem;
    font-size: 0.85rem;
}

@media (max-width: 1200px) {
    .doctors-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .doctors-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .filter-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
}

@media (max-width: 576px) {
    .doctors-grid {
        grid-template-columns: 1fr;
    }
    
    .page-header h1 {
        font-size: 1.75rem;
    }
}
</style>
{% endblock %}
", "frontend/explore.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\explore.html.twig");
    }
}
