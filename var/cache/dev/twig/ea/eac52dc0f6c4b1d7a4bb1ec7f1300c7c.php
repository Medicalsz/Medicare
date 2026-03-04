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

/* frontend/appointment.html.twig */
class __TwigTemplate_f92ea2be0cb10e472f38c76241a87847 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/appointment.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/appointment.html.twig"));

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

        yield "Appointment - Medicare";
        
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
            <h2>Book an Appointment</h2>
        </div>
    </section>

    <section class=\"appointment-section\">
        <div class=\"container\">
            <h1>Schedule Your Appointment</h1>
            <div class=\"row justify-content-center\">
                <div class=\"col-md-6\">
                    <form method=\"post\" class=\"appointment-form\">
                        <div class=\"mb-3\">
                            <label for=\"name\" class=\"form-label\">Full Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"phone\" class=\"form-label\">Phone</label>
                            <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"date\" class=\"form-label\">Preferred Date</label>
                            <input type=\"date\" class=\"form-control\" id=\"date\" name=\"date\" required>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">Book Appointment</button>
                    </form>
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
        return "frontend/appointment.html.twig";
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
        return array (  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base_frontend.html.twig\" %}

{% block title %}Appointment - Medicare{% endblock %}

{% block body %}
<main class=\"main\">
    <section class=\"breadcrumbs\">
        <div class=\"container\">
            <h2>Book an Appointment</h2>
        </div>
    </section>

    <section class=\"appointment-section\">
        <div class=\"container\">
            <h1>Schedule Your Appointment</h1>
            <div class=\"row justify-content-center\">
                <div class=\"col-md-6\">
                    <form method=\"post\" class=\"appointment-form\">
                        <div class=\"mb-3\">
                            <label for=\"name\" class=\"form-label\">Full Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"phone\" class=\"form-label\">Phone</label>
                            <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"date\" class=\"form-label\">Preferred Date</label>
                            <input type=\"date\" class=\"form-control\" id=\"date\" name=\"date\" required>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">Book Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
{% endblock %}
", "frontend/appointment.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\appointment.html.twig");
    }
}
