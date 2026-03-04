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

/* frontend/privacy.html.twig */
class __TwigTemplate_ffb8a8cbefd25fc30c563a9855fc7d78 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/privacy.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/privacy.html.twig"));

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

        yield "Privacy Policy - Medicare";
        
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
            <h2>Privacy Policy</h2>
        </div>
    </section>

    <section class=\"privacy-section\">
        <div class=\"container\">
            <h1>Privacy Policy</h1>
            
            <h3>1. Information We Collect</h3>
            <p>We collect information you provide directly to us, such as when you create an account, schedule an appointment, or contact us. This may include:</p>
            <ul>
                <li>Name and contact information (email, phone number, address)</li>
                <li>Medical history and health information</li>
                <li>Payment information</li>
                <li>Other information you choose to provide</li>
            </ul>
            
            <h3>2. How We Use Your Information</h3>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Provide, maintain, and improve our services</li>
                <li>Process appointments and payments</li>
                <li>Send you technical notices and support messages</li>
                <li>Respond to your comments and questions</li>
                <li>Send promotional communications (with your consent)</li>
            </ul>
            
            <h3>3. Information Sharing</h3>
            <p>We do not sell, trade, or rent your information to third parties. We may share your information with healthcare providers as necessary to provide our services.</p>
            
            <h3>4. Data Security</h3>
            <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
            
            <h3>5. Your Privacy Rights</h3>
            <p>You have the right to access, correct, or delete your personal information. To exercise these rights, please contact us at info@medicare.com.</p>
            
            <h3>6. Changes to This Privacy Policy</h3>
            <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new privacy policy on our website.</p>
            
            <h3>7. Contact Us</h3>
            <p>If you have any questions about this privacy policy, please contact us at:</p>
            <p>
                <strong>Email:</strong> privacy@medicare.com<br>
                <strong>Address:</strong> 123 Medical Street, Healthcare City
            </p>
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
        return "frontend/privacy.html.twig";
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

{% block title %}Privacy Policy - Medicare{% endblock %}

{% block body %}
<main class=\"main\">
    <section class=\"breadcrumbs\">
        <div class=\"container\">
            <h2>Privacy Policy</h2>
        </div>
    </section>

    <section class=\"privacy-section\">
        <div class=\"container\">
            <h1>Privacy Policy</h1>
            
            <h3>1. Information We Collect</h3>
            <p>We collect information you provide directly to us, such as when you create an account, schedule an appointment, or contact us. This may include:</p>
            <ul>
                <li>Name and contact information (email, phone number, address)</li>
                <li>Medical history and health information</li>
                <li>Payment information</li>
                <li>Other information you choose to provide</li>
            </ul>
            
            <h3>2. How We Use Your Information</h3>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Provide, maintain, and improve our services</li>
                <li>Process appointments and payments</li>
                <li>Send you technical notices and support messages</li>
                <li>Respond to your comments and questions</li>
                <li>Send promotional communications (with your consent)</li>
            </ul>
            
            <h3>3. Information Sharing</h3>
            <p>We do not sell, trade, or rent your information to third parties. We may share your information with healthcare providers as necessary to provide our services.</p>
            
            <h3>4. Data Security</h3>
            <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
            
            <h3>5. Your Privacy Rights</h3>
            <p>You have the right to access, correct, or delete your personal information. To exercise these rights, please contact us at info@medicare.com.</p>
            
            <h3>6. Changes to This Privacy Policy</h3>
            <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new privacy policy on our website.</p>
            
            <h3>7. Contact Us</h3>
            <p>If you have any questions about this privacy policy, please contact us at:</p>
            <p>
                <strong>Email:</strong> privacy@medicare.com<br>
                <strong>Address:</strong> 123 Medical Street, Healthcare City
            </p>
        </div>
    </section>
</main>
{% endblock %}
", "frontend/privacy.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\frontend\\privacy.html.twig");
    }
}
