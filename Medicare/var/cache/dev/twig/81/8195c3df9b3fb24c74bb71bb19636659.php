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

/* partner/form.html.twig */
class __TwigTemplate_16f9c05f4245b844042516d1ca657e2f extends Template
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
            'scripts' => [$this, 'block_scripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partner/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partner/form.html.twig"));

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

        yield (((($tmp = (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Edit") : ("New"));
        yield " Partner - MediCare";
        
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
        yield "<section class=\"container section\">
    <h2>";
        // line 7
        yield (((($tmp = (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 7, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Edit") : ("New"));
        yield " Partner</h2>
    <form id=\"form\">
        <input type=\"hidden\" id=\"id\" value=\"";
        // line 9
        yield (((isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 9, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["id"], "html", null, true)) : (""));
        yield "\" />
        <div class=\"mb-3\"><label for=\"type\" class=\"form-label\">Type</label><input id=\"type\" class=\"form-control\" value=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["partner"] ?? null), "type", [], "any", true, true, false, 10)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partner"]) || array_key_exists("partner", $context) ? $context["partner"] : (function () { throw new RuntimeError('Variable "partner" does not exist.', 10, $this->source); })()), "type", [], "any", false, false, false, 10), "")) : ("")), "html", null, true);
        yield "\" /></div>
        <div class=\"mb-3\"><label for=\"name\" class=\"form-label\">Name</label><input id=\"name\" class=\"form-control\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["partner"] ?? null), "name", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partner"]) || array_key_exists("partner", $context) ? $context["partner"] : (function () { throw new RuntimeError('Variable "partner" does not exist.', 11, $this->source); })()), "name", [], "any", false, false, false, 11), "")) : ("")), "html", null, true);
        yield "\" /></div>
        <div class=\"mb-3\"><label for=\"phone\" class=\"form-label\">Phone</label><input id=\"phone\" class=\"form-control\" value=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["partner"] ?? null), "phone", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partner"]) || array_key_exists("partner", $context) ? $context["partner"] : (function () { throw new RuntimeError('Variable "partner" does not exist.', 12, $this->source); })()), "phone", [], "any", false, false, false, 12), "")) : ("")), "html", null, true);
        yield "\" /></div>
        <div class=\"mb-3\"><label for=\"email\" class=\"form-label\">Email</label><input id=\"email\" class=\"form-control\" value=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["partner"] ?? null), "email", [], "any", true, true, false, 13)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partner"]) || array_key_exists("partner", $context) ? $context["partner"] : (function () { throw new RuntimeError('Variable "partner" does not exist.', 13, $this->source); })()), "email", [], "any", false, false, false, 13), "")) : ("")), "html", null, true);
        yield "\" /></div>
        <div style=\"margin-top:8px\"><button type=\"submit\" class=\"btn btn-primary\">Save</button> <a href=\"/home/partners\" class=\"btn btn-secondary\">Cancel</a></div>
    </form>
    <div id=\"msg\" class=\"text-danger\"></div>
</section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        // line 21
        yield from $this->yieldParentBlock("scripts", $context, $blocks);
        yield "
<script>
document.getElementById('form').addEventListener('submit', async e=>{
  e.preventDefault();
  const id = document.getElementById('id').value;
  const body = {
    type: document.getElementById('type').value,
    name: document.getElementById('name').value,
    phone: document.getElementById('phone').value,
    email: document.getElementById('email').value,
  };
  const url = id ? '/partners/' + id : '/partners';
  const method = id ? 'PUT' : 'POST';
  const res = await fetch(url, {method, headers:{'Content-Type':'application/json','Accept':'application/json'}, body: JSON.stringify(body)});
  const json = await res.json().catch(()=>null);
  if(res.status >= 400) document.getElementById('msg').innerText = 'Error: '+(json?.error||res.status);
  else location.href = '/home/partners';
});
</script>
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
        return "partner/form.html.twig";
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
        return array (  156 => 21,  143 => 20,  126 => 13,  122 => 12,  118 => 11,  114 => 10,  110 => 9,  105 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ id ? 'Edit' : 'New' }} Partner - MediCare{% endblock %}

{% block body %}
<section class=\"container section\">
    <h2>{{ id ? 'Edit' : 'New' }} Partner</h2>
    <form id=\"form\">
        <input type=\"hidden\" id=\"id\" value=\"{{ id ?: '' }}\" />
        <div class=\"mb-3\"><label for=\"type\" class=\"form-label\">Type</label><input id=\"type\" class=\"form-control\" value=\"{{ partner.type|default('') }}\" /></div>
        <div class=\"mb-3\"><label for=\"name\" class=\"form-label\">Name</label><input id=\"name\" class=\"form-control\" value=\"{{ partner.name|default('') }}\" /></div>
        <div class=\"mb-3\"><label for=\"phone\" class=\"form-label\">Phone</label><input id=\"phone\" class=\"form-control\" value=\"{{ partner.phone|default('') }}\" /></div>
        <div class=\"mb-3\"><label for=\"email\" class=\"form-label\">Email</label><input id=\"email\" class=\"form-control\" value=\"{{ partner.email|default('') }}\" /></div>
        <div style=\"margin-top:8px\"><button type=\"submit\" class=\"btn btn-primary\">Save</button> <a href=\"/home/partners\" class=\"btn btn-secondary\">Cancel</a></div>
    </form>
    <div id=\"msg\" class=\"text-danger\"></div>
</section>
{% endblock %}

{% block scripts %}
{{ parent() }}
<script>
document.getElementById('form').addEventListener('submit', async e=>{
  e.preventDefault();
  const id = document.getElementById('id').value;
  const body = {
    type: document.getElementById('type').value,
    name: document.getElementById('name').value,
    phone: document.getElementById('phone').value,
    email: document.getElementById('email').value,
  };
  const url = id ? '/partners/' + id : '/partners';
  const method = id ? 'PUT' : 'POST';
  const res = await fetch(url, {method, headers:{'Content-Type':'application/json','Accept':'application/json'}, body: JSON.stringify(body)});
  const json = await res.json().catch(()=>null);
  if(res.status >= 400) document.getElementById('msg').innerText = 'Error: '+(json?.error||res.status);
  else location.href = '/home/partners';
});
</script>
{% endblock %}
", "partner/form.html.twig", "C:\\Users\\b3nr\\VS\\Medicare\\Medicare\\templates\\partner\\form.html.twig");
    }
}
