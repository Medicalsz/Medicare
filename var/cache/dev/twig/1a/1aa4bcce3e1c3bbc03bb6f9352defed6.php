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

/* frontend/contact.html.twig */
class __TwigTemplate_6c2f0ca3c7d4324e6fb18f606e7c3532 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/contact.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/contact.html.twig"));

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

        yield "Contact - Medicare";
        
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
            <h2>Contact Us</h2>
        </div>
    </section>

    <section class=\"contact-section\">
        <div class=\"container\">
            <h1>Get in Touch</h1>
            <div class=\"row\">
                <div class=\"col-md-6 mb-4\">
                    <h3>Contact Information</h3>
                    <p><strong>Address:</strong> 123 Medical Street, Healthcare City</p>
                    <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                    <p><strong>Email:</strong> info@medicare.com</p>
                    <p><strong>Hours:</strong> Mon-Fri 9am-5pm, Sat 10am-2pm</p>
                </div>
                <div class=\"col-md-6 mb-4\">
                    <h3>Send us a Message</h3>
                    <form method=\"post\" class=\"contact-form\">
                        <div class=\"mb-3\">
                            <label for=\"name\" class=\"form-label\">Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"message\" class=\"form-label\">Message</label>
                            <textarea class=\"form-control\" id=\"message\" name=\"message\" rows=\"4\" required></textarea>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">Send Message</button>
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
        return "frontend/contact.html.twig";
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

{% block title %}Contact - Medicare{% endblock %}

{% block body %}
<main class=\"main\">
    <section class=\"breadcrumbs\">
        <div class=\"container\">
            <h2>Contact Us</h2>
        </div>
    </section>

    <section class=\"contact-section\">
        <div class=\"container\">
            <h1>Get in Touch</h1>
            <div class=\"row\">
                <div class=\"col-md-6 mb-4\">
                    <h3>Contact Information</h3>
                    <p><strong>Address:</strong> 123 Medical Street, Healthcare City</p>
                    <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                    <p><strong>Email:</strong> info@medicare.com</p>
                    <p><strong>Hours:</strong> Mon-Fri 9am-5pm, Sat 10am-2pm</p>
                </div>
                <div class=\"col-md-6 mb-4\">
                    <h3>Send us a Message</h3>
                    <form method=\"post\" class=\"contact-form\">
                        <div class=\"mb-3\">
                            <label for=\"name\" class=\"form-label\">Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"message\" class=\"form-label\">Message</label>
                            <textarea class=\"form-control\" id=\"message\" name=\"message\" rows=\"4\" required></textarea>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
{% endblock %}
", "frontend/contact.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\contact.html.twig");
    }
}
