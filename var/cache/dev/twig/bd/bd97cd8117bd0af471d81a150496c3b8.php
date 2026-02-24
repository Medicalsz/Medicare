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

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-shield-lock\"></i> Privacy & Security</h5>
                </div>
                <div class=\"card-body\">
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
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_privacy");
        yield "\">Privacy Policy</a> | 
                        <a href=\"";
        // line 91
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_terms");
        yield "\">Terms of Service</a>
                    </p>
                </div>
            </div>

            <div class=\"mt-4\">
                <a href=\"";
        // line 97
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
        return array (  211 => 97,  202 => 91,  198 => 90,  127 => 21,  122 => 20,  118 => 19,  113 => 17,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
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

            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-shield-lock\"></i> Privacy & Security</h5>
                </div>
                <div class=\"card-body\">
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
