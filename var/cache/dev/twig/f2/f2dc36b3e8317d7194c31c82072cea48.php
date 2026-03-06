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

/* partials/admin/_navbar.html.twig */
class __TwigTemplate_4b440babc974d4a12399aee9993fc8f6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/admin/_navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/admin/_navbar.html.twig"));

        // line 1
        yield "<nav class=\"navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row\">
    <div class=\"text-center navbar-brand-wrapper d-flex align-items-center justify-content-start\">
        <div class=\"me-3\">
            <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-bs-toggle=\"minimize\">
                <span class=\"icon-menu\"></span>
            </button>
        </div>
        <div>
            <a class=\"navbar-brand brand-logo\" href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\">
                <img src=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/images/logo.svg"), "html", null, true);
        yield "\" alt=\"logo\" />
            </a>
            <a class=\"navbar-brand brand-logo-mini\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\">
                <img src=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/images/logo-mini.svg"), "html", null, true);
        yield "\" alt=\"logo\" />
            </a>
        </div>
    </div>
    <div class=\"navbar-menu-wrapper d-flex align-items-top\">
        <ul class=\"navbar-nav\">
            <li class=\"nav-item fw-semibold d-none d-lg-block ms-0\">
                <h1 class=\"welcome-text\">Bonjour, <span class=\"text-black fw-bold\">";
        // line 20
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20), "email", [], "any", false, false, false, 20), "html", null, true)) : ("Admin"));
        yield "</span></h1>
                <h3 class=\"welcome-sub-text\">Tableau de bord Medicare </h3>
            </li>
        </ul>
        <ul class=\"navbar-nav ms-auto\">
            <li class=\"nav-item dropdown d-none d-lg-block\">
                <a class=\"nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split\" id=\"messageDropdown\" href=\"#\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"> ";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("select_language"), "html", null, true);
        yield " </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0\" aria-labelledby=\"messageDropdown\">
                    <a class=\"dropdown-item py-3\">
                        <p class=\"mb-0 fw-medium float-start\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("select_language"), "html", null, true);
        yield "</p>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\" href=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_locale", ["locale" => "fr"]);
        yield "\">
                        <div class=\"preview-item-content flex-grow py-2\">
                            <p class=\"preview-subject ellipsis fw-medium text-dark\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("french"), "html", null, true);
        yield "</p>
                        </div>
                    </a>
                    <a class=\"dropdown-item preview-item\" href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_locale", ["locale" => "ar"]);
        yield "\">
                        <div class=\"preview-item-content flex-grow py-2\">
                            <p class=\"preview-subject ellipsis fw-medium text-dark\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("arabic"), "html", null, true);
        yield "</p>
                        </div>
                    </a>
                    <a class=\"dropdown-item preview-item\" href=\"";
        // line 42
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_locale", ["locale" => "en"]);
        yield "\">
                        <div class=\"preview-item-content flex-grow py-2\">
                            <p class=\"preview-subject ellipsis fw-medium text-dark\">";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("english"), "html", null, true);
        yield "</p>
                        </div>
                    </a>
                </div>
            </li>
            <li class=\"nav-item d-none d-lg-block\">
                <div id=\"datepicker\"></div>
            </li>
            ";
        // line 52
        yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\AdminController::notifications"));
        yield "
            <li class=\"nav-item dropdown d-none d-lg-block\">
                <a class=\"nav-link\" id=\"appsDropdown\" href=\"#\" data-bs-toggle=\"dropdown\">
                    <i class=\"mdi mdi-apps\"></i>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown\" aria-labelledby=\"appsDropdown\">
                    <div class=\"dropdown-header d-flex justify-content-between\">
                        <p class=\"dropdown-item-text\">Applications</p>
                    </div>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"";
        // line 62
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\">
                        <i class=\"mdi mdi-view-dashboard me-2\"></i> Dashboard
                    </a>
                    <a class=\"dropdown-item\" href=\"#\">
                        <i class=\"mdi mdi-account-multiple me-2\"></i> Médecins
                    </a>
                    <a class=\"dropdown-item\" href=\"#\">
                        <i class=\"mdi mdi-account-group me-2\"></i> Patients
                    </a>
                    <a class=\"dropdown-item\" href=\"#\">
                        <i class=\"mdi mdi-calendar-check me-2\"></i> Rendez-vous
                    </a>
                </div>
            </li>
            <li class=\"nav-item navbar-dropdown-right dropdown\">
                <a class=\"nav-link\" id=\"profileDropdown\" href=\"#\" data-bs-toggle=\"dropdown\">
                    <div class=\"navbar-profile\">
                        <img class=\"img-xs rounded-circle\" src=\"";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/backend/images/faces/face1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                        <p class=\"mb-0 d-none d-sm-block navbar-profile-name\">";
        // line 80
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "user", [], "any", false, false, false, 80)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "user", [], "any", false, false, false, 80), "email", [], "any", false, false, false, 80), "html", null, true)) : ("Admin"));
        yield "</p>
                        <i class=\"mdi mdi-menu-down d-none d-sm-block\"></i>
                    </div>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"profileDropdown\">
                    <h6 class=\"p-3 mb-0\">Profil</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-item-content d-flex align-items-center flex-grow\">
                            <div class=\"flex-grow\">
                                <p class=\"p-0 mb-0 text-muted\">Modifier le profil</p>
                            </div>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\" href=\"";
        // line 95
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_logout");
        yield "\">
                        <div class=\"preview-item-content d-flex align-items-center flex-grow\">
                            <div class=\"flex-grow\">
                                <p class=\"p-0 mb-0 text-muted\">Déconnexion</p>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-bs-toggle=\"offcanvas\">
            <span class=\"mdi mdi-menu\"></span>
        </button>
    </div>
</nav>
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
        return "partials/admin/_navbar.html.twig";
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
        return array (  195 => 95,  177 => 80,  173 => 79,  153 => 62,  140 => 52,  129 => 44,  124 => 42,  118 => 39,  113 => 37,  107 => 34,  102 => 32,  96 => 29,  90 => 26,  81 => 20,  71 => 13,  67 => 12,  62 => 10,  58 => 9,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row\">
    <div class=\"text-center navbar-brand-wrapper d-flex align-items-center justify-content-start\">
        <div class=\"me-3\">
            <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-bs-toggle=\"minimize\">
                <span class=\"icon-menu\"></span>
            </button>
        </div>
        <div>
            <a class=\"navbar-brand brand-logo\" href=\"{{ path('app_admin_dashboard') }}\">
                <img src=\"{{ asset('build/assets/backend/images/logo.svg') }}\" alt=\"logo\" />
            </a>
            <a class=\"navbar-brand brand-logo-mini\" href=\"{{ path('app_admin_dashboard') }}\">
                <img src=\"{{ asset('build/assets/backend/images/logo-mini.svg') }}\" alt=\"logo\" />
            </a>
        </div>
    </div>
    <div class=\"navbar-menu-wrapper d-flex align-items-top\">
        <ul class=\"navbar-nav\">
            <li class=\"nav-item fw-semibold d-none d-lg-block ms-0\">
                <h1 class=\"welcome-text\">Bonjour, <span class=\"text-black fw-bold\">{{ app.user ? app.user.email : 'Admin' }}</span></h1>
                <h3 class=\"welcome-sub-text\">Tableau de bord Medicare </h3>
            </li>
        </ul>
        <ul class=\"navbar-nav ms-auto\">
            <li class=\"nav-item dropdown d-none d-lg-block\">
                <a class=\"nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split\" id=\"messageDropdown\" href=\"#\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"> {{ 'select_language'|trans }} </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0\" aria-labelledby=\"messageDropdown\">
                    <a class=\"dropdown-item py-3\">
                        <p class=\"mb-0 fw-medium float-start\">{{ 'select_language'|trans }}</p>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\" href=\"{{ path('change_locale', {locale: 'fr'}) }}\">
                        <div class=\"preview-item-content flex-grow py-2\">
                            <p class=\"preview-subject ellipsis fw-medium text-dark\">{{ 'french'|trans }}</p>
                        </div>
                    </a>
                    <a class=\"dropdown-item preview-item\" href=\"{{ path('change_locale', {locale: 'ar'}) }}\">
                        <div class=\"preview-item-content flex-grow py-2\">
                            <p class=\"preview-subject ellipsis fw-medium text-dark\">{{ 'arabic'|trans }}</p>
                        </div>
                    </a>
                    <a class=\"dropdown-item preview-item\" href=\"{{ path('change_locale', {locale: 'en'}) }}\">
                        <div class=\"preview-item-content flex-grow py-2\">
                            <p class=\"preview-subject ellipsis fw-medium text-dark\">{{ 'english'|trans }}</p>
                        </div>
                    </a>
                </div>
            </li>
            <li class=\"nav-item d-none d-lg-block\">
                <div id=\"datepicker\"></div>
            </li>
            {{ render(controller('App\\\\Controller\\\\AdminController::notifications')) }}
            <li class=\"nav-item dropdown d-none d-lg-block\">
                <a class=\"nav-link\" id=\"appsDropdown\" href=\"#\" data-bs-toggle=\"dropdown\">
                    <i class=\"mdi mdi-apps\"></i>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown\" aria-labelledby=\"appsDropdown\">
                    <div class=\"dropdown-header d-flex justify-content-between\">
                        <p class=\"dropdown-item-text\">Applications</p>
                    </div>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"{{ path('app_admin_dashboard') }}\">
                        <i class=\"mdi mdi-view-dashboard me-2\"></i> Dashboard
                    </a>
                    <a class=\"dropdown-item\" href=\"#\">
                        <i class=\"mdi mdi-account-multiple me-2\"></i> Médecins
                    </a>
                    <a class=\"dropdown-item\" href=\"#\">
                        <i class=\"mdi mdi-account-group me-2\"></i> Patients
                    </a>
                    <a class=\"dropdown-item\" href=\"#\">
                        <i class=\"mdi mdi-calendar-check me-2\"></i> Rendez-vous
                    </a>
                </div>
            </li>
            <li class=\"nav-item navbar-dropdown-right dropdown\">
                <a class=\"nav-link\" id=\"profileDropdown\" href=\"#\" data-bs-toggle=\"dropdown\">
                    <div class=\"navbar-profile\">
                        <img class=\"img-xs rounded-circle\" src=\"{{ asset('build/assets/backend/images/faces/face1.jpg') }}\" alt=\"\">
                        <p class=\"mb-0 d-none d-sm-block navbar-profile-name\">{{ app.user ? app.user.email : 'Admin' }}</p>
                        <i class=\"mdi mdi-menu-down d-none d-sm-block\"></i>
                    </div>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"profileDropdown\">
                    <h6 class=\"p-3 mb-0\">Profil</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-item-content d-flex align-items-center flex-grow\">
                            <div class=\"flex-grow\">
                                <p class=\"p-0 mb-0 text-muted\">Modifier le profil</p>
                            </div>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\" href=\"{{ path('app_admin_logout') }}\">
                        <div class=\"preview-item-content d-flex align-items-center flex-grow\">
                            <div class=\"flex-grow\">
                                <p class=\"p-0 mb-0 text-muted\">Déconnexion</p>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-bs-toggle=\"offcanvas\">
            <span class=\"mdi mdi-menu\"></span>
        </button>
    </div>
</nav>
", "partials/admin/_navbar.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\partials\\admin\\_navbar.html.twig");
    }
}
