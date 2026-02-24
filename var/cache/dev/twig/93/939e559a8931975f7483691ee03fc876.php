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

/* partials/admin/_footer.html.twig */
class __TwigTemplate_f46eea46e55617cdf2632ec90045ef3e extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/admin/_footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/admin/_footer.html.twig"));

        // line 1
        yield "<footer class=\"footer\">
    <div class=\"d-sm-flex justify-content-center justify-content-sm-between\">
        <span class=\"text-muted text-center text-sm-left d-block d-sm-inline-block\">Copyright © 2024 <a href=\"#\" target=\"_blank\">Medicare</a>. Tous droits réservés.</span>
        <span class=\"text-muted text-center text-sm-left d-block d-sm-inline-block\">Développé par <a href=\"#\" target=\"_blank\">Nomade Team</a></span>
        <span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\">Hand-crafted & made with <i class=\"mdi mdi-heart text-danger\"></i></span>
    </div>
</footer>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/admin/_footer.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer class=\"footer\">
    <div class=\"d-sm-flex justify-content-center justify-content-sm-between\">
        <span class=\"text-muted text-center text-sm-left d-block d-sm-inline-block\">Copyright © 2024 <a href=\"#\" target=\"_blank\">Medicare</a>. Tous droits réservés.</span>
        <span class=\"text-muted text-center text-sm-left d-block d-sm-inline-block\">Développé par <a href=\"#\" target=\"_blank\">Nomade Team</a></span>
        <span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\">Hand-crafted & made with <i class=\"mdi mdi-heart text-danger\"></i></span>
    </div>
</footer>
", "partials/admin/_footer.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\partials\\admin\\_footer.html.twig");
    }
}
