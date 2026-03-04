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

/* security/login.html.twig */
class __TwigTemplate_dc7710655c2b3be29a66470a4208d48f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Login - Medicare</title>
    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\" rel=\"stylesheet\">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 2rem;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .login-header {
            background: #fff;
            color: #1f2937;
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .login-logo {
            margin-bottom: 1rem;
        }
        .login-logo h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin: 0;
        }
        .login-header h2 {
            font-size: 1.25rem;
            margin: 0 0 0.5rem 0;
            font-weight: 600;
            color: #1f2937;
        }
        .login-header p {
            margin: 0;
            color: #6b7280;
            font-size: 0.9rem;
        }
        .login-body {
            padding: 1.5rem 2rem 2rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.9rem;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #10b981;
            font-size: 1.1rem;
        }
        .input-wrapper .form-control {
            padding-left: 2.8rem;
            height: 48px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .input-wrapper .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
        }
        .btn-login {
            width: 100%;
            height: 48px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
        }
        .alert-danger {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .login-footer p {
            margin: 0.5rem 0;
            color: #6b7280;
            font-size: 0.85rem;
        }
        .login-footer .copyright {
            font-weight: 600;
            color: #10b981;
        }
        .login-footer .developed-by a {
            color: #059669;
            font-weight: 700;
        }
        .login-footer a {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            .login-header {
                padding: 1.5rem 1.25rem 1rem;
            }
            .login-body {
                padding: 1.25rem 1.5rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <main class=\"login-main\">
        <div class=\"login-container\">
            <div class=\"login-card\">
                <div class=\"login-header\">
                    <div class=\"login-logo\">
                        <h1 class=\"sitename\">Medicare</h1>
                    </div>
                    <h2>Sign In</h2>
                    <p>Enter your credentials to access</p>
                </div>

                <div class=\"login-body\">
                    ";
        // line 174
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 174, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 175
            yield "                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            wrong informations
                        </div>
                    ";
        }
        // line 180
        yield "
                    <form method=\"post\" class=\"login-form\">
                        <div class=\"form-group\">
                            <label for=\"inputUsername\" class=\"form-label\">Email or Username</label>
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-person\"></i>
                                <input type=\"text\" id=\"inputUsername\" name=\"_username\" value=\"";
        // line 186
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 186, $this->source); })()), "html", null, true);
        yield "\" required autofocus class=\"form-control\" placeholder=\"Enter email or username\">
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label for=\"inputPassword\" class=\"form-label\">Password</label>
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-lock\"></i>
                                <input type=\"password\" id=\"inputPassword\" name=\"_password\" required class=\"form-control\" placeholder=\"Enter your password\">
                            </div>
                        </div>

                        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 198
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">
                        <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 199
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">

                        <button type=\"submit\" class=\"btn btn-primary btn-login\">Sign In</button>
                    </form>

                    <div class=\"login-footer\">
                        <p>Don't have an account? <a href=\"";
        // line 205
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">Sign Up</a></p>
                        <p class=\"copyright\">&copy; 2025 Medicare. All rights reserved.</p>
                        <p class=\"developed-by\">Developed by <a href=\"#\">Nomade Team</a></p>
                        <p><a href=\"";
        // line 208
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
        return "security/login.html.twig";
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
        return array (  274 => 208,  268 => 205,  259 => 199,  255 => 198,  240 => 186,  232 => 180,  225 => 175,  223 => 174,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Login - Medicare</title>
    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\" rel=\"stylesheet\">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 2rem;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .login-header {
            background: #fff;
            color: #1f2937;
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .login-logo {
            margin-bottom: 1rem;
        }
        .login-logo h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin: 0;
        }
        .login-header h2 {
            font-size: 1.25rem;
            margin: 0 0 0.5rem 0;
            font-weight: 600;
            color: #1f2937;
        }
        .login-header p {
            margin: 0;
            color: #6b7280;
            font-size: 0.9rem;
        }
        .login-body {
            padding: 1.5rem 2rem 2rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.9rem;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #10b981;
            font-size: 1.1rem;
        }
        .input-wrapper .form-control {
            padding-left: 2.8rem;
            height: 48px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .input-wrapper .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
        }
        .btn-login {
            width: 100%;
            height: 48px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
        }
        .alert-danger {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .login-footer p {
            margin: 0.5rem 0;
            color: #6b7280;
            font-size: 0.85rem;
        }
        .login-footer .copyright {
            font-weight: 600;
            color: #10b981;
        }
        .login-footer .developed-by a {
            color: #059669;
            font-weight: 700;
        }
        .login-footer a {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            .login-header {
                padding: 1.5rem 1.25rem 1rem;
            }
            .login-body {
                padding: 1.25rem 1.5rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <main class=\"login-main\">
        <div class=\"login-container\">
            <div class=\"login-card\">
                <div class=\"login-header\">
                    <div class=\"login-logo\">
                        <h1 class=\"sitename\">Medicare</h1>
                    </div>
                    <h2>Sign In</h2>
                    <p>Enter your credentials to access</p>
                </div>

                <div class=\"login-body\">
                    {% if error %}
                        <div class=\"alert alert-danger\" role=\"alert\">
                            <i class=\"bi bi-exclamation-circle\"></i>
                            wrong informations
                        </div>
                    {% endif %}

                    <form method=\"post\" class=\"login-form\">
                        <div class=\"form-group\">
                            <label for=\"inputUsername\" class=\"form-label\">Email or Username</label>
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-person\"></i>
                                <input type=\"text\" id=\"inputUsername\" name=\"_username\" value=\"{{ last_username }}\" required autofocus class=\"form-control\" placeholder=\"Enter email or username\">
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label for=\"inputPassword\" class=\"form-label\">Password</label>
                            <div class=\"input-wrapper\">
                                <i class=\"bi bi-lock\"></i>
                                <input type=\"password\" id=\"inputPassword\" name=\"_password\" required class=\"form-control\" placeholder=\"Enter your password\">
                            </div>
                        </div>

                        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
                        <input type=\"hidden\" name=\"_target_path\" value=\"{{ path('app_home') }}\">

                        <button type=\"submit\" class=\"btn btn-primary btn-login\">Sign In</button>
                    </form>

                    <div class=\"login-footer\">
                        <p>Don't have an account? <a href=\"{{ path('app_register') }}\">Sign Up</a></p>
                        <p class=\"copyright\">&copy; 2025 Medicare. All rights reserved.</p>
                        <p class=\"developed-by\">Developed by <a href=\"#\">Nomade Team</a></p>
                        <p><a href=\"{{ path('app_home') }}\">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
", "security/login.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\security\\login.html.twig");
    }
}
