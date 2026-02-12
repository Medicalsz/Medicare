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

/* home/index.html.twig */
class __TwigTemplate_ee28efee8d6a50b9faca75c40a47b667 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Home - MediCare";
        
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
        yield "    <!-- Hero Section -->
    <section id=\"hero\" class=\"hero section\">
      <div class=\"container\">
        <div class=\"row align-items-center\">
          <div class=\"col-lg-5\">
            <div class=\"hero-image\" data-aos=\"fade-right\" data-aos-delay=\"100\">
              <img src=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/health/staff-8.webp"), "html", null, true);
        yield "\" alt=\"Healthcare Professional\" class=\"img-fluid main-image\">
              <div class=\"floating-card emergency-card\" data-aos=\"fade-up\" data-aos-delay=\"300\">
                <div class=\"card-content\">
                  <i class=\"bi bi-telephone-fill\"></i>
                  <div class=\"text\">
                    <span class=\"label\">24/7 Emergency</span>
                    <span class=\"number\">+1 (555) 911-2468</span>
                  </div>
                </div>
              </div>
              <div class=\"floating-card stats-card\" data-aos=\"fade-up\" data-aos-delay=\"400\">
                <div class=\"stat-item\">
                  <span class=\"number\">25K+</span>
                  <span class=\"label\">Patients Treated</span>
                </div>
                <div class=\"stat-item\">
                  <span class=\"number\">98%</span>
                  <span class=\"label\">Satisfaction Rate</span>
                </div>
              </div>
            </div>
          </div>

          <div class=\"col-lg-7\">
            <div class=\"hero-content\" data-aos=\"fade-left\" data-aos-delay=\"200\">
              <div class=\"badge-container\">
                <span class=\"hero-badge\">Trusted Healthcare Provider</span>
              </div>

              <h1 class=\"hero-title\">Excellence in Medical Care</h1>
              <p class=\"hero-description\">Welcome to MediCare, your trusted partner in health management.</p>

            </div>
          </div>
        </div>
      </div>

      <div class=\"background-elements\">
        <div class=\"bg-shape shape-1\"></div>
        <div class=\"bg-shape shape-2\"></div>
        <div class=\"bg-pattern\"></div>
      </div>
    </section><!-- /Hero Section -->
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
        return "home/index.html.twig";
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
        return array (  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Home - MediCare{% endblock %}

{% block body %}
    <!-- Hero Section -->
    <section id=\"hero\" class=\"hero section\">
      <div class=\"container\">
        <div class=\"row align-items-center\">
          <div class=\"col-lg-5\">
            <div class=\"hero-image\" data-aos=\"fade-right\" data-aos-delay=\"100\">
              <img src=\"{{ asset('assets/img/health/staff-8.webp') }}\" alt=\"Healthcare Professional\" class=\"img-fluid main-image\">
              <div class=\"floating-card emergency-card\" data-aos=\"fade-up\" data-aos-delay=\"300\">
                <div class=\"card-content\">
                  <i class=\"bi bi-telephone-fill\"></i>
                  <div class=\"text\">
                    <span class=\"label\">24/7 Emergency</span>
                    <span class=\"number\">+1 (555) 911-2468</span>
                  </div>
                </div>
              </div>
              <div class=\"floating-card stats-card\" data-aos=\"fade-up\" data-aos-delay=\"400\">
                <div class=\"stat-item\">
                  <span class=\"number\">25K+</span>
                  <span class=\"label\">Patients Treated</span>
                </div>
                <div class=\"stat-item\">
                  <span class=\"number\">98%</span>
                  <span class=\"label\">Satisfaction Rate</span>
                </div>
              </div>
            </div>
          </div>

          <div class=\"col-lg-7\">
            <div class=\"hero-content\" data-aos=\"fade-left\" data-aos-delay=\"200\">
              <div class=\"badge-container\">
                <span class=\"hero-badge\">Trusted Healthcare Provider</span>
              </div>

              <h1 class=\"hero-title\">Excellence in Medical Care</h1>
              <p class=\"hero-description\">Welcome to MediCare, your trusted partner in health management.</p>

            </div>
          </div>
        </div>
      </div>

      <div class=\"background-elements\">
        <div class=\"bg-shape shape-1\"></div>
        <div class=\"bg-shape shape-2\"></div>
        <div class=\"bg-pattern\"></div>
      </div>
    </section><!-- /Hero Section -->
{% endblock %}
", "home/index.html.twig", "C:\\Users\\b3nr\\VS\\Medicare\\Medicare\\templates\\home\\index.html.twig");
    }
}
