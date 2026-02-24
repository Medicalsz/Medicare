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

/* registration/medecin_verification.html.twig */
class __TwigTemplate_a293e8505805e8750c8de7ec4e063983 extends Template
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
        return "base_frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/medecin_verification.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/medecin_verification.html.twig"));

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

        yield "Compte en attente de validation - Medicare";
        
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
    .verification-card {
        max-width: 600px;
        margin: 50px auto;
        padding: 40px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .verification-icon {
        font-size: 80px;
        color: #ffc107;
        margin-bottom: 20px;
    }
    
    .verification-title {
        font-size: 28px;
        color: #333;
        margin-bottom: 15px;
    }
    
    .verification-text {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .alert-info {
        background: #fff3cd;
        border: 1px solid #ffc107;
        color: #856404;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        text-align: left;
    }
    
    .alert-info h5 {
        margin-bottom: 10px;
        color: #856404;
    }
    
    .alert-info ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .alert-info li {
        margin: 5px 0;
    }
    
    .btn-home {
        background: #007bff;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-home:hover {
        background: #0056b3;
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 79
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

        // line 80
        yield "<div class=\"container\">
    <div class=\"verification-card\">
        <div class=\"verification-icon\">
            <i class=\"mdi mdi-clock-outline\"></i>
        </div>
        
        <h1 class=\"verification-title\">Votre compte est en cours de vérification</h1>
        
        <p class=\"verification-text\">
            Votre inscription a été soumise avec succès.
        </p>
        
        <div class=\"alert-info\">
            <h5><i class=\"mdi mdi-information-outline me-2\"></i>Votre compte est en cours de vérification par l'administrateur.</h5>
            <ul>
                <li>Vous pourrez vous connecter une fois votre compte approuvé</li>
                <li>Le délai de traitement est de 2 à 3 jours ouvrables</li>
                <li>Vous recevrez un email de confirmation lorsque votre compte sera activé</li>
            </ul>
        </div>
        
        <p class=\"verification-text\">
            Merci pour votre patience.
        </p>
        
        <a href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn-home\">
            <i class=\"mdi mdi-home me-2\"></i>Retour à l'accueil
        </a>
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
        return "registration/medecin_verification.html.twig";
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
        return array (  223 => 105,  196 => 80,  183 => 79,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Compte en attente de validation - Medicare{% endblock %}

{% block stylesheets %}
<style>
    .verification-card {
        max-width: 600px;
        margin: 50px auto;
        padding: 40px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .verification-icon {
        font-size: 80px;
        color: #ffc107;
        margin-bottom: 20px;
    }
    
    .verification-title {
        font-size: 28px;
        color: #333;
        margin-bottom: 15px;
    }
    
    .verification-text {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .alert-info {
        background: #fff3cd;
        border: 1px solid #ffc107;
        color: #856404;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        text-align: left;
    }
    
    .alert-info h5 {
        margin-bottom: 10px;
        color: #856404;
    }
    
    .alert-info ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .alert-info li {
        margin: 5px 0;
    }
    
    .btn-home {
        background: #007bff;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-home:hover {
        background: #0056b3;
        color: white;
    }
</style>
{% endblock %}

{% block content %}
<div class=\"container\">
    <div class=\"verification-card\">
        <div class=\"verification-icon\">
            <i class=\"mdi mdi-clock-outline\"></i>
        </div>
        
        <h1 class=\"verification-title\">Votre compte est en cours de vérification</h1>
        
        <p class=\"verification-text\">
            Votre inscription a été soumise avec succès.
        </p>
        
        <div class=\"alert-info\">
            <h5><i class=\"mdi mdi-information-outline me-2\"></i>Votre compte est en cours de vérification par l'administrateur.</h5>
            <ul>
                <li>Vous pourrez vous connecter une fois votre compte approuvé</li>
                <li>Le délai de traitement est de 2 à 3 jours ouvrables</li>
                <li>Vous recevrez un email de confirmation lorsque votre compte sera activé</li>
            </ul>
        </div>
        
        <p class=\"verification-text\">
            Merci pour votre patience.
        </p>
        
        <a href=\"{{ path('app_home') }}\" class=\"btn-home\">
            <i class=\"mdi mdi-home me-2\"></i>Retour à l'accueil
        </a>
    </div>
</div>
{% endblock %}
", "registration/medecin_verification.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\registration\\medecin_verification.html.twig");
    }
}
