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

/* frontend/verify_choice.html.twig */
class __TwigTemplate_43bf23720e14e39467e8b66544f47749 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/verify_choice.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/verify_choice.html.twig"));

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

        yield "Verify Your Account - Medicare";
        
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
        yield "<main class=\"main\" style=\"padding-top: 100px; background: #f8fafc; min-height: 80vh;\">
    <div class=\"container py-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-lg-8 text-center\" data-aos=\"fade-up\">
                <div class=\"verify-header mb-5\">
                    <div class=\"verify-icon-wrapper mb-4\">
                        <i class=\"bi bi-shield-lock-fill\"></i>
                    </div>
                    <h1 class=\"fw-bold mb-3\">Compte non vérifié</h1>
                    <p class=\"text-secondary lead\">Choisissez comment vous souhaitez vérifier votre compte pour accéder à toutes les fonctionnalités.</p>
                </div>

                <div class=\"row g-4 justify-content-center\">
                    <!-- Email Verification -->
                    <div class=\"col-md-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                        <div class=\"choice-card\">
                            <div class=\"choice-icon email-icon\">
                                <i class=\"bi bi-envelope-check\"></i>
                            </div>
                            <h3>Email Verification</h3>
                            <p>Nous vous enverrons un lien de confirmation à votre adresse e-mail.</p>
                            <a href=\"#\" class=\"btn btn-outline-primary w-100 mt-auto\">Choisir Email</a>
                        </div>
                    </div>

                    <!-- Phone Verification -->
                    <div class=\"col-md-5\" data-aos=\"fade-up\" data-aos-delay=\"200\">
                        <div class=\"choice-card\">
                            <div class=\"choice-icon phone-icon\">
                                <i class=\"bi bi-phone-vibrate\"></i>
                            </div>
                            <h3>Phone Verification</h3>
                            <p>Recevez un code de validation par SMS sur votre numéro de téléphone.</p>
                            <a href=\"#\" class=\"btn btn-outline-info w-100 mt-auto\">Choisir Téléphone</a>
                        </div>
                    </div>
                </div>

                <div class=\"mt-5 pt-4\">
                    <a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"text-decoration-none text-muted\">
                        <i class=\"bi bi-arrow-left me-1\"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .verify-icon-wrapper {
        width: 80px;
        height: 80px;
        background: white;
        color: #0ea5e9;
        font-size: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        margin: 0 auto;
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
    }

    .choice-card {
        background: white;
        padding: 40px 30px;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f1f5f9;
    }

    .choice-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }

    .choice-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin: 0 auto 24px;
    }

    .email-icon {
        background: #e0f2fe;
        color: #0ea5e9;
    }

    .phone-icon {
        background: #f0fdf4;
        color: #22c55e;
    }

    .choice-card h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 16px;
        color: #1e293b;
    }

    .choice-card p {
        color: #64748b;
        font-size: 15px;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .btn-outline-primary {
        border-color: #0ea5e9;
        color: #0ea5e9;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background: #0ea5e9;
        border-color: #0ea5e9;
        color: white;
    }

    .btn-outline-info {
        border-color: #22c55e;
        color: #22c55e;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
    }

    .btn-outline-info:hover {
        background: #22c55e;
        border-color: #22c55e;
        color: white;
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
        return "frontend/verify_choice.html.twig";
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
        return array (  141 => 45,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Verify Your Account - Medicare{% endblock %}

{% block body %}
<main class=\"main\" style=\"padding-top: 100px; background: #f8fafc; min-height: 80vh;\">
    <div class=\"container py-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-lg-8 text-center\" data-aos=\"fade-up\">
                <div class=\"verify-header mb-5\">
                    <div class=\"verify-icon-wrapper mb-4\">
                        <i class=\"bi bi-shield-lock-fill\"></i>
                    </div>
                    <h1 class=\"fw-bold mb-3\">Compte non vérifié</h1>
                    <p class=\"text-secondary lead\">Choisissez comment vous souhaitez vérifier votre compte pour accéder à toutes les fonctionnalités.</p>
                </div>

                <div class=\"row g-4 justify-content-center\">
                    <!-- Email Verification -->
                    <div class=\"col-md-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                        <div class=\"choice-card\">
                            <div class=\"choice-icon email-icon\">
                                <i class=\"bi bi-envelope-check\"></i>
                            </div>
                            <h3>Email Verification</h3>
                            <p>Nous vous enverrons un lien de confirmation à votre adresse e-mail.</p>
                            <a href=\"#\" class=\"btn btn-outline-primary w-100 mt-auto\">Choisir Email</a>
                        </div>
                    </div>

                    <!-- Phone Verification -->
                    <div class=\"col-md-5\" data-aos=\"fade-up\" data-aos-delay=\"200\">
                        <div class=\"choice-card\">
                            <div class=\"choice-icon phone-icon\">
                                <i class=\"bi bi-phone-vibrate\"></i>
                            </div>
                            <h3>Phone Verification</h3>
                            <p>Recevez un code de validation par SMS sur votre numéro de téléphone.</p>
                            <a href=\"#\" class=\"btn btn-outline-info w-100 mt-auto\">Choisir Téléphone</a>
                        </div>
                    </div>
                </div>

                <div class=\"mt-5 pt-4\">
                    <a href=\"{{ path('app_home') }}\" class=\"text-decoration-none text-muted\">
                        <i class=\"bi bi-arrow-left me-1\"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .verify-icon-wrapper {
        width: 80px;
        height: 80px;
        background: white;
        color: #0ea5e9;
        font-size: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        margin: 0 auto;
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
    }

    .choice-card {
        background: white;
        padding: 40px 30px;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f1f5f9;
    }

    .choice-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }

    .choice-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin: 0 auto 24px;
    }

    .email-icon {
        background: #e0f2fe;
        color: #0ea5e9;
    }

    .phone-icon {
        background: #f0fdf4;
        color: #22c55e;
    }

    .choice-card h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 16px;
        color: #1e293b;
    }

    .choice-card p {
        color: #64748b;
        font-size: 15px;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .btn-outline-primary {
        border-color: #0ea5e9;
        color: #0ea5e9;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background: #0ea5e9;
        border-color: #0ea5e9;
        color: white;
    }

    .btn-outline-info {
        border-color: #22c55e;
        color: #22c55e;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
    }

    .btn-outline-info:hover {
        background: #22c55e;
        border-color: #22c55e;
        color: white;
    }
</style>
{% endblock %}
", "frontend/verify_choice.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\verify_choice.html.twig");
    }
}
