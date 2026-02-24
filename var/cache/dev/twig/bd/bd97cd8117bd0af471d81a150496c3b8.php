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

/* dashboard/settings.html.twig */
class __TwigTemplate_b83ac3f4217fb3d60dae169f9c8437d2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/settings.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/settings.html.twig"));

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

        yield "Settings - Medicare";
        
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
        yield "<div class=\"container mt-5\">
    <div class=\"row\">
        <div class=\"col-md-8 offset-md-2\">
            <h1>Settings</h1>
            <hr>
            
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-person-circle\"></i> Account Settings</h5>
                </div>
                <div class=\"card-body\">
                    <p><strong>Email:</strong> ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17), "email", [], "any", false, false, false, 17), "html", null, true);
        yield "</p>
                    <p><strong>Name:</strong> 
                        ";
        // line 19
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19), "prenom", [], "any", false, false, false, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19), "prenom", [], "any", false, false, false, 19), "html", null, true);
        }
        // line 20
        yield "                        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20), "nom", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20), "nom", [], "any", false, false, false, 20), "html", null, true);
        }
        // line 21
        yield "                    </p>
                    <button class=\"btn btn-primary btn-sm\">Change Password</button>
                    <button class=\"btn btn-secondary btn-sm\">Edit Profile</button>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-moon-stars\"></i> Appearance</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"form-check form-switch\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"darkModeSwitch\">
                        <label class=\"form-check-label\" for=\"darkModeSwitch\">
                            Dark Mode (Night Mode)
                        </label>
                    </div>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-bell\"></i> Notifications</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"form-check mb-2\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"emailNotifications\" checked>
                        <label class=\"form-check-label\" for=\"emailNotifications\">
                            Email Notifications
                        </label>
                    </div>
                    <div class=\"form-check mb-2\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"appointmentReminders\" checked>
                        <label class=\"form-check-label\" for=\"appointmentReminders\">
                            Appointment Reminders
                        </label>
                    </div>
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"newsUpdates\" checked>
                        <label class=\"form-check-label\" for=\"newsUpdates\">
                            News and Updates
                        </label>
                    </div>
                </div>
            </div>

            ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "flashes", [], "any", false, false, false, 67));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 68
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 69
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield " alert-dismissible fade show\" role=\"alert\">
                        ";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        yield "
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-shield-lock\"></i> Privacy & Security</h5>
                </div>
                <div class=\"card-body\">
                    ";
        // line 81
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 81, $this->source); })()), 'form_start');
        yield "
                        <div class=\"mb-3\">
                            ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 83, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 83), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 84, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 84), 'widget');
        yield "
                            <div class=\"form-text\">Qui peut voir votre adresse email sur votre profil ?</div>
                        </div>
                        <div class=\"mb-3\">
                            ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 88, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 88), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 89
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 89, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 89), 'widget');
        yield "
                            <div class=\"form-text\">Qui peut voir votre numéro de téléphone ?</div>
                        </div>
                        <div class=\"mb-3\">
                            ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 93, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 93), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 94
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 94, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 94), 'widget');
        yield "
                            <div class=\"form-text\">Qui peut voir votre adresse ?</div>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary btn-sm\">Enregistrer la confidentialité</button>
                    ";
        // line 98
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["privacyForm"]) || array_key_exists("privacyForm", $context) ? $context["privacyForm"] : (function () { throw new RuntimeError('Variable "privacyForm" does not exist.', 98, $this->source); })()), 'form_end');
        yield "
                    
                    <hr>
                    <p>
                        <a href=\"#\">View Login Activity</a>
                    </p>
                    <p>
                        <a href=\"#\">Manage Connected Apps</a>
                    </p>
                    <button class=\"btn btn-danger btn-sm\">Delete Account</button>
                </div>
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-info-circle\"></i> About</h5>
                </div>
                <div class=\"card-body\">
                    <p><strong>Application:</strong> Medicare Healthcare System</p>
                    <p><strong>Version:</strong> 1.0.0</p>
                    <p>
                        <a href=\"";
        // line 119
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_privacy");
        yield "\">Privacy Policy</a> | 
                        <a href=\"";
        // line 120
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_terms");
        yield "\">Terms of Service</a>
                    </p>
                </div>
            </div>

            <div class=\"mt-4\">
                <a href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"btn btn-secondary\">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 1rem;
}

.card-header h5 {
    color: #10b981;
    margin-bottom: 0;
}

.form-check-label {
    cursor: pointer;
}

a {
    color: #10b981;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const darkModeSwitch = document.getElementById('darkModeSwitch');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Set checkbox state based on current theme
    if (currentTheme === 'dark') {
        darkModeSwitch.checked = true;
    }
    
    // Toggle theme when checkbox changes
    darkModeSwitch.addEventListener('change', function() {
        const newTheme = this.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
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
        return "dashboard/settings.html.twig";
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
        return array (  288 => 126,  279 => 120,  275 => 119,  251 => 98,  244 => 94,  240 => 93,  233 => 89,  229 => 88,  222 => 84,  218 => 83,  213 => 81,  205 => 75,  199 => 74,  189 => 70,  184 => 69,  179 => 68,  175 => 67,  127 => 21,  122 => 20,  118 => 19,  113 => 17,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base_frontend.html.twig\" %}

{% block title %}Settings - Medicare{% endblock %}

{% block body %}
<div class=\"container mt-5\">
    <div class=\"row\">
        <div class=\"col-md-8 offset-md-2\">
            <h1>Settings</h1>
            <hr>
            
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-person-circle\"></i> Account Settings</h5>
                </div>
                <div class=\"card-body\">
                    <p><strong>Email:</strong> {{ app.user.email }}</p>
                    <p><strong>Name:</strong> 
                        {% if app.user.prenom %}{{ app.user.prenom }}{% endif %}
                        {% if app.user.nom %}{{ app.user.nom }}{% endif %}
                    </p>
                    <button class=\"btn btn-primary btn-sm\">Change Password</button>
                    <button class=\"btn btn-secondary btn-sm\">Edit Profile</button>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-moon-stars\"></i> Appearance</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"form-check form-switch\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"darkModeSwitch\">
                        <label class=\"form-check-label\" for=\"darkModeSwitch\">
                            Dark Mode (Night Mode)
                        </label>
                    </div>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-bell\"></i> Notifications</h5>
                </div>
                <div class=\"card-body\">
                    <div class=\"form-check mb-2\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"emailNotifications\" checked>
                        <label class=\"form-check-label\" for=\"emailNotifications\">
                            Email Notifications
                        </label>
                    </div>
                    <div class=\"form-check mb-2\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"appointmentReminders\" checked>
                        <label class=\"form-check-label\" for=\"appointmentReminders\">
                            Appointment Reminders
                        </label>
                    </div>
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" id=\"newsUpdates\" checked>
                        <label class=\"form-check-label\" for=\"newsUpdates\">
                            News and Updates
                        </label>
                    </div>
                </div>
            </div>

            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ label }} alert-dismissible fade show\" role=\"alert\">
                        {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                {% endfor %}
            {% endfor %}

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-shield-lock\"></i> Privacy & Security</h5>
                </div>
                <div class=\"card-body\">
                    {{ form_start(privacyForm) }}
                        <div class=\"mb-3\">
                            {{ form_label(privacyForm.emailPrivacy, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(privacyForm.emailPrivacy) }}
                            <div class=\"form-text\">Qui peut voir votre adresse email sur votre profil ?</div>
                        </div>
                        <div class=\"mb-3\">
                            {{ form_label(privacyForm.phonePrivacy, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(privacyForm.phonePrivacy) }}
                            <div class=\"form-text\">Qui peut voir votre numéro de téléphone ?</div>
                        </div>
                        <div class=\"mb-3\">
                            {{ form_label(privacyForm.addressPrivacy, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(privacyForm.addressPrivacy) }}
                            <div class=\"form-text\">Qui peut voir votre adresse ?</div>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary btn-sm\">Enregistrer la confidentialité</button>
                    {{ form_end(privacyForm) }}
                    
                    <hr>
                    <p>
                        <a href=\"#\">View Login Activity</a>
                    </p>
                    <p>
                        <a href=\"#\">Manage Connected Apps</a>
                    </p>
                    <button class=\"btn btn-danger btn-sm\">Delete Account</button>
                </div>
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-info-circle\"></i> About</h5>
                </div>
                <div class=\"card-body\">
                    <p><strong>Application:</strong> Medicare Healthcare System</p>
                    <p><strong>Version:</strong> 1.0.0</p>
                    <p>
                        <a href=\"{{ path('app_privacy') }}\">Privacy Policy</a> | 
                        <a href=\"{{ path('app_terms') }}\">Terms of Service</a>
                    </p>
                </div>
            </div>

            <div class=\"mt-4\">
                <a href=\"{{ path('app_dashboard') }}\" class=\"btn btn-secondary\">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 1rem;
}

.card-header h5 {
    color: #10b981;
    margin-bottom: 0;
}

.form-check-label {
    cursor: pointer;
}

a {
    color: #10b981;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const darkModeSwitch = document.getElementById('darkModeSwitch');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Set checkbox state based on current theme
    if (currentTheme === 'dark') {
        darkModeSwitch.checked = true;
    }
    
    // Toggle theme when checkbox changes
    darkModeSwitch.addEventListener('change', function() {
        const newTheme = this.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
});
</script>
{% endblock %}
", "dashboard/settings.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\dashboard\\settings.html.twig");
    }
}
