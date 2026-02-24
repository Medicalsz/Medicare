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

/* frontend/profile.html.twig */
class __TwigTemplate_131a59117e7d50382281bd77aeeb7819 extends Template
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
            'body_class' => [$this, 'block_body_class'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/profile.html.twig"));

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

        yield "Mon Profil - Medicare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_class(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        yield "profile-page";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
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

        // line 10
        yield "<main class=\"profile-main\">
    <div class=\"page-title\">
        <div class=\"container\">
            <h1>Mon Profil</h1>
            <nav class=\"breadcrumbs\">
                <ol>
                    <li><a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a></li>
                    <li>Mon Profil</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class=\"profile-section\">
        <div class=\"container\">
            <div class=\"profile-card\">
                <div class=\"profile-header\">
                    <div class=\"profile-avatar-wrapper\">
                        ";
        // line 28
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 28, $this->source); })()), "photo", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "                            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 29, $this->source); })()), "photo", [], "any", false, false, false, 29), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 29, $this->source); })()), "prenom", [], "any", false, false, false, 29), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 29, $this->source); })()), "nom", [], "any", false, false, false, 29), "html", null, true);
            yield "\" class=\"profile-avatar\">
                        ";
        } else {
            // line 31
            yield "                            <div class=\"profile-avatar-placeholder\">
                                <i class=\"mdi mdi-account\"></i>
                            </div>
                            <div class=\"avatar-alert\">
                                <i class=\"mdi mdi-alert-circle\"></i>
                                <span>Photo de profil non définie</span>
                            </div>
                        ";
        }
        // line 39
        yield "                    </div>
                    
                    <div class=\"profile-info\">
                        <h2>";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "prenom", [], "any", false, false, false, 42), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "nom", [], "any", false, false, false, 42), "html", null, true);
        yield "</h2>
                        
                        ";
        // line 44
        if (CoreExtension::inFilter("ROLE_MEDECIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "roles", [], "any", false, false, false, 44))) {
            // line 45
            yield "                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-doctor\"></i> Médecin
                            </p>
                            ";
            // line 48
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "specialite", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 49
                yield "                                <p class=\"profile-specialty\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 49, $this->source); })()), "specialite", [], "any", false, false, false, 49), "html", null, true);
                yield "</p>
                            ";
            }
            // line 51
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "cabinet", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "                                <p class=\"profile-cabinet\">
                                    <i class=\"mdi mdi-hospital-building\"></i> ";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 53, $this->source); })()), "cabinet", [], "any", false, false, false, 53), "html", null, true);
                yield "
                                </p>
                            ";
            }
            // line 56
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 56, $this->source); })()), "ville", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 57
                yield "                                <p class=\"profile-location\">
                                    <i class=\"mdi mdi-map-marker\"></i> ";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 58, $this->source); })()), "ville", [], "any", false, false, false, 58), "html", null, true);
                yield "
                                </p>
                            ";
            }
            // line 61
            yield "                        ";
        } else {
            // line 62
            yield "                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-account\"></i> Patient
                            </p>
                        ";
        }
        // line 66
        yield "                    </div>
                </div>
                
                ";
        // line 69
        $context["is_owner"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69), "id", [], "any", false, false, false, 69) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 69, $this->source); })()), "id", [], "any", false, false, false, 69)));
        // line 70
        yield "                ";
        $context["can_see_address"] = ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 70, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 70) == "public") || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "user", [], "any", false, false, false, 70) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "user", [], "any", false, false, false, 70), "id", [], "any", false, false, false, 70) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 70, $this->source); })()), "id", [], "any", false, false, false, 70)) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 70, $this->source); })()), "addressPrivacy", [], "any", false, false, false, 70) == "doctors") && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MEDECIN")))));
        // line 71
        yield "                ";
        $context["can_see_phone"] = ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 71) == "public") || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "id", [], "any", false, false, false, 71) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "id", [], "any", false, false, false, 71)) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "phonePrivacy", [], "any", false, false, false, 71) == "doctors") && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MEDECIN")))));
        // line 72
        yield "                ";
        $context["can_see_email"] = ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 72) == "public") || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72), "id", [], "any", false, false, false, 72) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "id", [], "any", false, false, false, 72)) || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "emailPrivacy", [], "any", false, false, false, 72) == "doctors") && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MEDECIN")))));
        // line 73
        yield "
                <div class=\"profile-body\">
                    <div class=\"profile-section-title\">
                        <h3><i class=\"mdi mdi-information\"></i> Informations</h3>
                    </div>
                    
                    <div class=\"info-grid\">
                        <div class=\"info-item\">
                            <label>Nom</label>
                            <span>";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 82, $this->source); })()), "nom", [], "any", false, false, false, 82), "html", null, true);
        yield "</span>
                        </div>
                        
                        <div class=\"info-item\">
                            <label>Prénom</label>
                            <span>";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "prenom", [], "any", false, false, false, 87), "html", null, true);
        yield "</span>
                        </div>
                        
                        ";
        // line 90
        if ((($tmp = (isset($context["can_see_email"]) || array_key_exists("can_see_email", $context) ? $context["can_see_email"] : (function () { throw new RuntimeError('Variable "can_see_email" does not exist.', 90, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 91
            yield "                            <div class=\"info-item\">
                                <label>Email</label>
                                <span>";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 93, $this->source); })()), "email", [], "any", false, false, false, 93), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        // line 96
        yield "                        
                        ";
        // line 97
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 97, $this->source); })()), "numero", [], "any", false, false, false, 97) && (isset($context["can_see_phone"]) || array_key_exists("can_see_phone", $context) ? $context["can_see_phone"] : (function () { throw new RuntimeError('Variable "can_see_phone" does not exist.', 97, $this->source); })()))) {
            // line 98
            yield "                            <div class=\"info-item\">
                                <label>Téléphone</label>
                                <span>";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 100, $this->source); })()), "numero", [], "any", false, false, false, 100), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        // line 103
        yield "
                        ";
        // line 104
        if ((CoreExtension::inFilter("ROLE_MEDECIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 104, $this->source); })()), "roles", [], "any", false, false, false, 104)) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 104, $this->source); })()), "bio", [], "any", false, false, false, 104))) {
            // line 105
            yield "                            <div class=\"info-item full-width\">
                                <label>Biographie</label>
                                <span>";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 107, $this->source); })()), "bio", [], "any", false, false, false, 107), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        // line 110
        yield "                    </div>
                </div>
                
                ";
        // line 113
        if ((($tmp = (isset($context["is_owner"]) || array_key_exists("is_owner", $context) ? $context["is_owner"] : (function () { throw new RuntimeError('Variable "is_owner" does not exist.', 113, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 114
            yield "                <div class=\"profile-footer\">
                    <a href=\"";
            // line 115
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
            yield "\" class=\"btn-edit\">
                        <i class=\"mdi mdi-pencil\"></i> Modifier le profil
                    </a>
                </div>
                ";
        }
        // line 120
        yield "            </div>
        </div>
    </section>
</main>

<style>
    .profile-main {
        min-height: calc(100vh - 200px);
        background: #f8f9fa;
    }
    
    .page-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 60px 0 30px;
        margin-bottom: 0;
    }
    
    .page-title h1 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .breadcrumbs {
        color: rgba(255, 255, 255, 0.8);
    }
    
    .breadcrumbs ol {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumbs li {
        margin-right: 10px;
    }
    
    .breadcrumbs a {
        color: white;
        text-decoration: none;
    }
    
    .breadcrumbs a:hover {
        text-decoration: underline;
    }
    
    .profile-section {
        padding: 40px 0;
    }
    
    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 40px;
        display: flex;
        align-items: center;
        gap: 30px;
    }
    
    .profile-avatar-wrapper {
        position: relative;
        flex-shrink: 0;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }
    
    .profile-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid white;
    }
    
    .profile-avatar-placeholder i {
        font-size: 60px;
        color: white;
    }
    
    .avatar-alert {
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #ffc107;
        color: #333;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .profile-info h2 {
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }
    
    .profile-specialty,
    .profile-cabinet,
    .profile-location {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 3px;
    }
    
    .profile-body {
        padding: 30px 40px;
    }
    
    .profile-section-title {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .profile-section-title h3 {
        color: #10b981;
        font-size: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .info-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .info-item.full-width {
        grid-column: span 2;
    }
    
    .info-item label {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-item span {
        color: #333;
        font-size: 1rem;
        font-weight: 500;
        word-break: break-word;
    }
    
    .profile-footer {
        padding: 20px 40px;
        background: #f8f9fa;
        border-top: 1px solid #eee;
        text-align: center;
    }
    
    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 30px;
        background: #10b981;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-edit:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            padding: 30px 20px;
        }
        
        .profile-info h2 {
            font-size: 1.5rem;
        }
        
        .profile-role,
        .profile-specialty,
        .profile-cabinet,
        .profile-location {
            justify-content: center;
        }
        
        .profile-body {
            padding: 20px;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .info-item.full-width {
            grid-column: span 1;
        }
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
        return "frontend/profile.html.twig";
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
        return array (  330 => 120,  322 => 115,  319 => 114,  317 => 113,  312 => 110,  306 => 107,  302 => 105,  300 => 104,  297 => 103,  291 => 100,  287 => 98,  285 => 97,  282 => 96,  276 => 93,  272 => 91,  270 => 90,  264 => 87,  256 => 82,  245 => 73,  242 => 72,  239 => 71,  236 => 70,  234 => 69,  229 => 66,  223 => 62,  220 => 61,  214 => 58,  211 => 57,  208 => 56,  202 => 53,  199 => 52,  196 => 51,  190 => 49,  188 => 48,  183 => 45,  181 => 44,  174 => 42,  169 => 39,  159 => 31,  149 => 29,  147 => 28,  132 => 16,  124 => 10,  111 => 9,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Mon Profil - Medicare{% endblock %}

{% block body_class %}profile-page{% endblock %}

{# Header block removed to use default partials/frontend_header.html.twig from base layout #}

{% block body %}
<main class=\"profile-main\">
    <div class=\"page-title\">
        <div class=\"container\">
            <h1>Mon Profil</h1>
            <nav class=\"breadcrumbs\">
                <ol>
                    <li><a href=\"{{ path('app_home') }}\">Accueil</a></li>
                    <li>Mon Profil</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class=\"profile-section\">
        <div class=\"container\">
            <div class=\"profile-card\">
                <div class=\"profile-header\">
                    <div class=\"profile-avatar-wrapper\">
                        {% if user.photo %}
                            <img src=\"{{ user.photo }}\" alt=\"{{ user.prenom }} {{ user.nom }}\" class=\"profile-avatar\">
                        {% else %}
                            <div class=\"profile-avatar-placeholder\">
                                <i class=\"mdi mdi-account\"></i>
                            </div>
                            <div class=\"avatar-alert\">
                                <i class=\"mdi mdi-alert-circle\"></i>
                                <span>Photo de profil non définie</span>
                            </div>
                        {% endif %}
                    </div>
                    
                    <div class=\"profile-info\">
                        <h2>{{ user.prenom }} {{ user.nom }}</h2>
                        
                        {% if 'ROLE_MEDECIN' in user.roles %}
                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-doctor\"></i> Médecin
                            </p>
                            {% if user.specialite %}
                                <p class=\"profile-specialty\">{{ user.specialite }}</p>
                            {% endif %}
                            {% if user.cabinet %}
                                <p class=\"profile-cabinet\">
                                    <i class=\"mdi mdi-hospital-building\"></i> {{ user.cabinet }}
                                </p>
                            {% endif %}
                            {% if user.ville %}
                                <p class=\"profile-location\">
                                    <i class=\"mdi mdi-map-marker\"></i> {{ user.ville }}
                                </p>
                            {% endif %}
                        {% else %}
                            <p class=\"profile-role\">
                                <i class=\"mdi mdi-account\"></i> Patient
                            </p>
                        {% endif %}
                    </div>
                </div>
                
                {% set is_owner = app.user and app.user.id == user.id %}
                {% set can_see_address = user.addressPrivacy == 'public' or (app.user and (app.user.id == user.id or (user.addressPrivacy == 'doctors' and is_granted('ROLE_MEDECIN')))) %}
                {% set can_see_phone = user.phonePrivacy == 'public' or (app.user and (app.user.id == user.id or (user.phonePrivacy == 'doctors' and is_granted('ROLE_MEDECIN')))) %}
                {% set can_see_email = user.emailPrivacy == 'public' or (app.user and (app.user.id == user.id or (user.emailPrivacy == 'doctors' and is_granted('ROLE_MEDECIN')))) %}

                <div class=\"profile-body\">
                    <div class=\"profile-section-title\">
                        <h3><i class=\"mdi mdi-information\"></i> Informations</h3>
                    </div>
                    
                    <div class=\"info-grid\">
                        <div class=\"info-item\">
                            <label>Nom</label>
                            <span>{{ user.nom }}</span>
                        </div>
                        
                        <div class=\"info-item\">
                            <label>Prénom</label>
                            <span>{{ user.prenom }}</span>
                        </div>
                        
                        {% if can_see_email %}
                            <div class=\"info-item\">
                                <label>Email</label>
                                <span>{{ user.email }}</span>
                            </div>
                        {% endif %}
                        
                        {% if user.numero and can_see_phone %}
                            <div class=\"info-item\">
                                <label>Téléphone</label>
                                <span>{{ user.numero }}</span>
                            </div>
                        {% endif %}

                        {% if 'ROLE_MEDECIN' in user.roles and user.bio %}
                            <div class=\"info-item full-width\">
                                <label>Biographie</label>
                                <span>{{ user.bio }}</span>
                            </div>
                        {% endif %}
                    </div>
                </div>
                
                {% if is_owner %}
                <div class=\"profile-footer\">
                    <a href=\"{{ path('app_profile_edit') }}\" class=\"btn-edit\">
                        <i class=\"mdi mdi-pencil\"></i> Modifier le profil
                    </a>
                </div>
                {% endif %}
            </div>
        </div>
    </section>
</main>

<style>
    .profile-main {
        min-height: calc(100vh - 200px);
        background: #f8f9fa;
    }
    
    .page-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 60px 0 30px;
        margin-bottom: 0;
    }
    
    .page-title h1 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .breadcrumbs {
        color: rgba(255, 255, 255, 0.8);
    }
    
    .breadcrumbs ol {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumbs li {
        margin-right: 10px;
    }
    
    .breadcrumbs a {
        color: white;
        text-decoration: none;
    }
    
    .breadcrumbs a:hover {
        text-decoration: underline;
    }
    
    .profile-section {
        padding: 40px 0;
    }
    
    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 40px;
        display: flex;
        align-items: center;
        gap: 30px;
    }
    
    .profile-avatar-wrapper {
        position: relative;
        flex-shrink: 0;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }
    
    .profile-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid white;
    }
    
    .profile-avatar-placeholder i {
        font-size: 60px;
        color: white;
    }
    
    .avatar-alert {
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #ffc107;
        color: #333;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .profile-info h2 {
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }
    
    .profile-specialty,
    .profile-cabinet,
    .profile-location {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 3px;
    }
    
    .profile-body {
        padding: 30px 40px;
    }
    
    .profile-section-title {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .profile-section-title h3 {
        color: #10b981;
        font-size: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .info-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .info-item.full-width {
        grid-column: span 2;
    }
    
    .info-item label {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-item span {
        color: #333;
        font-size: 1rem;
        font-weight: 500;
        word-break: break-word;
    }
    
    .profile-footer {
        padding: 20px 40px;
        background: #f8f9fa;
        border-top: 1px solid #eee;
        text-align: center;
    }
    
    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 30px;
        background: #10b981;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-edit:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            padding: 30px 20px;
        }
        
        .profile-info h2 {
            font-size: 1.5rem;
        }
        
        .profile-role,
        .profile-specialty,
        .profile-cabinet,
        .profile-location {
            justify-content: center;
        }
        
        .profile-body {
            padding: 20px;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .info-item.full-width {
            grid-column: span 1;
        }
    }
</style>
{% endblock %}
", "frontend/profile.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\profile.html.twig");
    }
}
