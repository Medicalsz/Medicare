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

/* frontend/departments.html.twig */
class __TwigTemplate_990d063269569c1d8d22a0a155cf09d1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/departments.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/departments.html.twig"));

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

        yield "Departments - Medicare";
        
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
        yield "<main class=\"main\">
    <section class=\"breadcrumbs\">
        <div class=\"container\">
            <h2>Our Departments</h2>
            <p>Explore our medical departments and specialties</p>
        </div>
    </section>

    <section class=\"departments-section\">
        <div class=\"container\">
            <h1>Medical Departments</h1>
            <div class=\"row\">
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Cardiology</h5>
                            <p class=\"card-text\">Heart and cardiovascular system care.</p>
                            <a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_department_details", ["id" => 1]);
        yield "\" class=\"btn btn-sm btn-primary\">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Neurology</h5>
                            <p class=\"card-text\">Brain and nervous system care.</p>
                            <a href=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_department_details", ["id" => 2]);
        yield "\" class=\"btn btn-sm btn-primary\">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Orthopedics</h5>
                            <p class=\"card-text\">Bone and joint care.</p>
                            <a href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_department_details", ["id" => 3]);
        yield "\" class=\"btn btn-sm btn-primary\">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
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
        return "frontend/departments.html.twig";
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
        return array (  143 => 41,  131 => 32,  119 => 23,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base_frontend.html.twig\" %}

{% block title %}Departments - Medicare{% endblock %}

{% block body %}
<main class=\"main\">
    <section class=\"breadcrumbs\">
        <div class=\"container\">
            <h2>Our Departments</h2>
            <p>Explore our medical departments and specialties</p>
        </div>
    </section>

    <section class=\"departments-section\">
        <div class=\"container\">
            <h1>Medical Departments</h1>
            <div class=\"row\">
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Cardiology</h5>
                            <p class=\"card-text\">Heart and cardiovascular system care.</p>
                            <a href=\"{{ path('app_department_details', {id: 1}) }}\" class=\"btn btn-sm btn-primary\">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Neurology</h5>
                            <p class=\"card-text\">Brain and nervous system care.</p>
                            <a href=\"{{ path('app_department_details', {id: 2}) }}\" class=\"btn btn-sm btn-primary\">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Orthopedics</h5>
                            <p class=\"card-text\">Bone and joint care.</p>
                            <a href=\"{{ path('app_department_details', {id: 3}) }}\" class=\"btn btn-sm btn-primary\">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
{% endblock %}
", "frontend/departments.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\departments.html.twig");
    }
}
