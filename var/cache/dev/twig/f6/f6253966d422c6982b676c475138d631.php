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

/* security/admin_login.html.twig */
class __TwigTemplate_faf3f691e063f444ad59ebab9c28f414 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/admin_login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/admin_login.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Medicare Admin - Connexion</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/mdi/css/materialdesignicons.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/css/vendor.bundle.base.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        yield "\">
    <link rel=\"shortcut icon\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/favicon.ico"), "html", null, true);
        yield "\">
    <style>
        body {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .auth-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 30px;
            text-align: center;
        }
        
        .auth-header .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .auth-header .logo-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-header .logo-icon i {
            font-size: 28px;
            color: #10b981;
        }
        
        .auth-header .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }
        
        .auth-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin: 0;
        }
        
        .auth-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }
        
        .form-group .form-control {
            height: 50px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-group .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            outline: none;
        }
        
        .form-group textarea.form-control {
            height: auto;
            resize: vertical;
        }
        
        .btn-submit {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
        }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert-danger {
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            border-radius: 10px 0 0 10px;
            height: 50px;
            padding: 0 15px;
            color: #6b7280;
        }
        
        .input-group .form-control {
            border-radius: 0 10px 10px 0;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .auth-footer {
            text-align: center;
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #e5e7eb;
        }
        
        .auth-footer a {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
        
        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class=\"auth-wrapper\">
        <div class=\"auth-card\">
            <div class=\"auth-header\">
                <div class=\"logo\">
                    <div class=\"logo-icon\">
                        <i class=\"mdi mdi-hospital-building\"></i>
                    </div>
                    <span class=\"logo-text\">Medicare</span>
                </div>
                <p>Administration Backoffice</p>
            </div>
            
            <div class=\"auth-body\">
                ";
        // line 190
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 190, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 191
            yield "                    <div class=\"alert alert-danger\">
                        <i class=\"mdi mdi-alert-circle me-2\"></i>
                        ";
            // line 193
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 193, $this->source); })()), "messageKey", [], "any", false, false, false, 193), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 193, $this->source); })()), "messageData", [], "any", false, false, false, 193), "security"), "html", null, true);
            yield "
                    </div>
                ";
        }
        // line 196
        yield "                
                <form method=\"post\" action=\"";
        // line 197
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_login");
        yield "\">
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 198
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">
                    
                    <div class=\"form-group\">
                        <label for=\"inputEmail\">Adresse email</label>
                        <div class=\"input-group\">
                            <span class=\"input-group-text\">
                                <i class=\"mdi mdi-email-outline\"></i>
                            </span>
                            <input type=\"email\" 
                                   name=\"_email\" 
                                   id=\"inputEmail\" 
                                   class=\"form-control\" 
                                   placeholder=\"admin@medicare.com\" 
                                   required 
                                   autofocus>
                        </div>
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"inputPassword\">Mot de passe</label>
                        <div class=\"input-group\">
                            <span class=\"input-group-text\">
                                <i class=\"mdi mdi-lock-outline\"></i>
                            </span>
                            <input type=\"password\" 
                                   name=\"_password\" 
                                   id=\"inputPassword\" 
                                   class=\"form-control\" 
                                   placeholder=\"••••••••\" 
                                   required>
                        </div>
                    </div>
                    
                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"mdi mdi-login me-2\"></i>
                        Se connecter
                    </button>
                </form>
            </div>
            
            <div class=\"auth-footer\">
                <a href=\"";
        // line 239
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                    <i class=\"mdi mdi-arrow-left me-1\"></i>
                    Retour au site
                </a>
            </div>
        </div>
    </div>
    
    <script src=\"";
        // line 247
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/js/vendor.bundle.base.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 248
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/off-canvas.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/hoverable-collapse.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 250
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/template.js"), "html", null, true);
        yield "\"></script>
</body>
</html>
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
        return "security/admin_login.html.twig";
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
        return array (  337 => 250,  333 => 249,  329 => 248,  325 => 247,  314 => 239,  270 => 198,  266 => 197,  263 => 196,  257 => 193,  253 => 191,  251 => 190,  68 => 10,  64 => 9,  60 => 8,  56 => 7,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Medicare Admin - Connexion</title>
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/css/vendor.bundle.base.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/style.css') }}\">
    <link rel=\"shortcut icon\" href=\"{{ asset('assets/images/favicon.ico') }}\">
    <style>
        body {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .auth-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 30px;
            text-align: center;
        }
        
        .auth-header .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .auth-header .logo-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-header .logo-icon i {
            font-size: 28px;
            color: #10b981;
        }
        
        .auth-header .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }
        
        .auth-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin: 0;
        }
        
        .auth-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }
        
        .form-group .form-control {
            height: 50px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-group .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            outline: none;
        }
        
        .form-group textarea.form-control {
            height: auto;
            resize: vertical;
        }
        
        .btn-submit {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
        }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert-danger {
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            border-radius: 10px 0 0 10px;
            height: 50px;
            padding: 0 15px;
            color: #6b7280;
        }
        
        .input-group .form-control {
            border-radius: 0 10px 10px 0;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .auth-footer {
            text-align: center;
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #e5e7eb;
        }
        
        .auth-footer a {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
        
        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class=\"auth-wrapper\">
        <div class=\"auth-card\">
            <div class=\"auth-header\">
                <div class=\"logo\">
                    <div class=\"logo-icon\">
                        <i class=\"mdi mdi-hospital-building\"></i>
                    </div>
                    <span class=\"logo-text\">Medicare</span>
                </div>
                <p>Administration Backoffice</p>
            </div>
            
            <div class=\"auth-body\">
                {% if error %}
                    <div class=\"alert alert-danger\">
                        <i class=\"mdi mdi-alert-circle me-2\"></i>
                        {{ error.messageKey|trans(error.messageData, 'security') }}
                    </div>
                {% endif %}
                
                <form method=\"post\" action=\"{{ path('app_admin_login') }}\">
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
                    
                    <div class=\"form-group\">
                        <label for=\"inputEmail\">Adresse email</label>
                        <div class=\"input-group\">
                            <span class=\"input-group-text\">
                                <i class=\"mdi mdi-email-outline\"></i>
                            </span>
                            <input type=\"email\" 
                                   name=\"_email\" 
                                   id=\"inputEmail\" 
                                   class=\"form-control\" 
                                   placeholder=\"admin@medicare.com\" 
                                   required 
                                   autofocus>
                        </div>
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"inputPassword\">Mot de passe</label>
                        <div class=\"input-group\">
                            <span class=\"input-group-text\">
                                <i class=\"mdi mdi-lock-outline\"></i>
                            </span>
                            <input type=\"password\" 
                                   name=\"_password\" 
                                   id=\"inputPassword\" 
                                   class=\"form-control\" 
                                   placeholder=\"••••••••\" 
                                   required>
                        </div>
                    </div>
                    
                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"mdi mdi-login me-2\"></i>
                        Se connecter
                    </button>
                </form>
            </div>
            
            <div class=\"auth-footer\">
                <a href=\"{{ path('app_home') }}\">
                    <i class=\"mdi mdi-arrow-left me-1\"></i>
                    Retour au site
                </a>
            </div>
        </div>
    </div>
    
    <script src=\"{{ asset('assets/vendors/js/vendor.bundle.base.js') }}\"></script>
    <script src=\"{{ asset('assets/js/off-canvas.js') }}\"></script>
    <script src=\"{{ asset('assets/js/hoverable-collapse.js') }}\"></script>
    <script src=\"{{ asset('assets/js/template.js') }}\"></script>
</body>
</html>
", "security/admin_login.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\security\\admin_login.html.twig");
    }
}
