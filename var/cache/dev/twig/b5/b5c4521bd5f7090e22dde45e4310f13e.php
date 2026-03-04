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
class __TwigTemplate_feec207a396ffde17a2bb7e6b138180a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

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

        yield "Home - Medicare";
        
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
        yield "<!-- Hero Section -->
<section id=\"hero\" class=\"hero section\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-lg-5\">
                <div class=\"hero-image\" data-aos=\"fade-right\" data-aos-delay=\"100\">
                    <img src=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/health/staff-8.webp"), "html", null, true);
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

                    <h1 class=\"hero-title\">Welcome to Medicare</h1>
                    <p class=\"hero-description\">Your medical appointment management system. We provide world-class healthcare services with compassionate care and innovative treatments.</p>

                    <div class=\"hero-stats\">
                        <div class=\"stat-group\">
                            <div class=\"stat\">
                                <i class=\"bi bi-award\"></i>
                                <div class=\"stat-text\">
                                    <span class=\"number\">35+</span>
                                    <span class=\"label\">Years Experience</span>
                                </div>
                            </div>
                            <div class=\"stat\">
                                <i class=\"bi bi-people\"></i>
                                <div class=\"stat-text\">
                                    <span class=\"number\">150+</span>
                                    <span class=\"label\">Medical Specialists</span>
                                </div>
                            </div>
                            <div class=\"stat\">
                                <i class=\"bi bi-geo-alt\"></i>
                                <div class=\"stat-text\">
                                    <span class=\"number\">12</span>
                                    <span class=\"label\">Clinic Locations</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"cta-section\">
                        <div class=\"cta-buttons\">
                            ";
        // line 72
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 73
            yield "                                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
            yield "\" class=\"btn btn-primary\">Go to Dashboard</a>
                            ";
        } else {
            // line 75
            yield "                                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-primary\">Login</a>
                                <a href=\"";
            // line 76
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"btn btn-secondary\">
                                    <i class=\"bi bi-person-plus\"></i>
                                    Register
                                </a>
                            ";
        }
        // line 81
        yield "                        </div>

                        <div class=\"quick-actions\">
                            <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\" class=\"action-link\">
                                <i class=\"bi bi-calendar-check\"></i>
                                <span>Book Appointment</span>
                            </a>
                            <a href=\"";
        // line 88
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_doctors");
        yield "\" class=\"action-link\">
                                <i class=\"bi bi-doctor\"></i>
                                <span>Find Doctors</span>
                            </a>
                            <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\" class=\"action-link\">
                                <i class=\"bi bi-chat-dots\"></i>
                                <span>Contact Us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"background-elements\">
        <div class=\"bg-shape shape-1\"></div>
        <div class=\"bg-shape shape-2\"></div>
        <div class=\"bg-pattern\"></div>
    </div>
</section>

<!-- Stats Section -->
<section id=\"stats\" class=\"stats section\">
    <div class=\"container\" data-aos=\"fade-up\" data-aos-delay=\"100\">
        <div class=\"row gy-4\">
            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-hospital\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"15\" data-purecounter-duration=\"1\" class=\"purecounter\">15</span>
                    <p>Hospitals</p>
                </div>
            </div>

            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-people-fill\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"150\" data-purecounter-duration=\"1\" class=\"purecounter\">150</span>
                    <p>Medical Staff</p>
                </div>
            </div>

            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-person-hearts\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"25000\" data-purecounter-duration=\"1\" class=\"purecounter\">25000</span>
                    <p>Happy Patients</p>
                </div>
            </div>

            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-award\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"35\" data-purecounter-duration=\"1\" class=\"purecounter\">35</span>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id=\"services\" class=\"services section\">
    <div class=\"container section-title\" data-aos=\"fade-up\">
        <h2>Our Services</h2>
        <p>Comprehensive healthcare services tailored to your needs</p>
    </div>

    <div class=\"container\">
        <div class=\"row gy-4\">
            <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                <div class=\"service-card\">
                    <div class=\"card-icon\">
                        <i class=\"bi bi-heart-pulse\"></i>
                    </div>
                    <h3>Cardiology</h3>
                    <p>Complete heart care services from prevention to treatment</p>
                    <a href=\"";
        // line 165
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\" class=\"read-more\">
                        <span>Learn More</span> <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>

            <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"200\">
                <div class=\"service-card\">
                    <div class=\"card-icon\">
                        <i class=\"bi bi-brain\"></i>
                    </div>
                    <h3>Neurology</h3>
                    <p>Advanced neurological care and treatment options</p>
                    <a href=\"";
        // line 178
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\" class=\"read-more\">
                        <span>Learn More</span> <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>

            <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"300\">
                <div class=\"service-card\">
                    <div class=\"card-icon\">
                        <i class=\"bi bi-hospital\"></i>
                    </div>
                    <h3>Pediatrics</h3>
                    <p>Specialized care for children and adolescents</p>
                    <a href=\"";
        // line 191
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\" class=\"read-more\">
                        <span>Learn More</span> <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id=\"cta\" class=\"cta section\">
    <div class=\"container\" data-aos=\"zoom-out\" data-aos-delay=\"100\">
        <div class=\"row g-5\">
            <div class=\"col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first\">
                <h3>Book Your Appointment Today</h3>
                <p>Don't wait for your health concerns. Schedule an appointment with our experienced doctors and get the care you deserve.</p>
                <a class=\"cta-btn align-self-start\" href=\"";
        // line 207
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\">Book Now</a>
            </div>

            <div class=\"col-lg-4 col-md-6 position-relative\">
                <div class=\"cta-bg\" style=\"background-image: url('";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/health/facilities-6.webp"), "html", null, true);
        yield "')\"></div>
            </div>
        </div>
    </div>
</section>
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
        return array (  345 => 211,  338 => 207,  319 => 191,  303 => 178,  287 => 165,  211 => 92,  204 => 88,  197 => 84,  192 => 81,  184 => 76,  179 => 75,  173 => 73,  171 => 72,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Home - Medicare{% endblock %}

{% block body %}
<!-- Hero Section -->
<section id=\"hero\" class=\"hero section\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-lg-5\">
                <div class=\"hero-image\" data-aos=\"fade-right\" data-aos-delay=\"100\">
                    <img src=\"{{ asset('build/frontend/assets/img/health/staff-8.webp') }}\" alt=\"Healthcare Professional\" class=\"img-fluid main-image\">
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

                    <h1 class=\"hero-title\">Welcome to Medicare</h1>
                    <p class=\"hero-description\">Your medical appointment management system. We provide world-class healthcare services with compassionate care and innovative treatments.</p>

                    <div class=\"hero-stats\">
                        <div class=\"stat-group\">
                            <div class=\"stat\">
                                <i class=\"bi bi-award\"></i>
                                <div class=\"stat-text\">
                                    <span class=\"number\">35+</span>
                                    <span class=\"label\">Years Experience</span>
                                </div>
                            </div>
                            <div class=\"stat\">
                                <i class=\"bi bi-people\"></i>
                                <div class=\"stat-text\">
                                    <span class=\"number\">150+</span>
                                    <span class=\"label\">Medical Specialists</span>
                                </div>
                            </div>
                            <div class=\"stat\">
                                <i class=\"bi bi-geo-alt\"></i>
                                <div class=\"stat-text\">
                                    <span class=\"number\">12</span>
                                    <span class=\"label\">Clinic Locations</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"cta-section\">
                        <div class=\"cta-buttons\">
                            {% if app.user %}
                                <a href=\"{{ path('app_dashboard') }}\" class=\"btn btn-primary\">Go to Dashboard</a>
                            {% else %}
                                <a href=\"{{ path('app_login') }}\" class=\"btn btn-primary\">Login</a>
                                <a href=\"{{ path('app_register') }}\" class=\"btn btn-secondary\">
                                    <i class=\"bi bi-person-plus\"></i>
                                    Register
                                </a>
                            {% endif %}
                        </div>

                        <div class=\"quick-actions\">
                            <a href=\"{{ path('app_appointment') }}\" class=\"action-link\">
                                <i class=\"bi bi-calendar-check\"></i>
                                <span>Book Appointment</span>
                            </a>
                            <a href=\"{{ path('app_doctors') }}\" class=\"action-link\">
                                <i class=\"bi bi-doctor\"></i>
                                <span>Find Doctors</span>
                            </a>
                            <a href=\"{{ path('app_contact') }}\" class=\"action-link\">
                                <i class=\"bi bi-chat-dots\"></i>
                                <span>Contact Us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"background-elements\">
        <div class=\"bg-shape shape-1\"></div>
        <div class=\"bg-shape shape-2\"></div>
        <div class=\"bg-pattern\"></div>
    </div>
</section>

<!-- Stats Section -->
<section id=\"stats\" class=\"stats section\">
    <div class=\"container\" data-aos=\"fade-up\" data-aos-delay=\"100\">
        <div class=\"row gy-4\">
            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-hospital\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"15\" data-purecounter-duration=\"1\" class=\"purecounter\">15</span>
                    <p>Hospitals</p>
                </div>
            </div>

            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-people-fill\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"150\" data-purecounter-duration=\"1\" class=\"purecounter\">150</span>
                    <p>Medical Staff</p>
                </div>
            </div>

            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-person-hearts\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"25000\" data-purecounter-duration=\"1\" class=\"purecounter\">25000</span>
                    <p>Happy Patients</p>
                </div>
            </div>

            <div class=\"col-lg-3 col-md-6\">
                <div class=\"stats-item\">
                    <i class=\"bi bi-award\"></i>
                    <span data-purecounter-start=\"0\" data-purecounter-end=\"35\" data-purecounter-duration=\"1\" class=\"purecounter\">35</span>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id=\"services\" class=\"services section\">
    <div class=\"container section-title\" data-aos=\"fade-up\">
        <h2>Our Services</h2>
        <p>Comprehensive healthcare services tailored to your needs</p>
    </div>

    <div class=\"container\">
        <div class=\"row gy-4\">
            <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                <div class=\"service-card\">
                    <div class=\"card-icon\">
                        <i class=\"bi bi-heart-pulse\"></i>
                    </div>
                    <h3>Cardiology</h3>
                    <p>Complete heart care services from prevention to treatment</p>
                    <a href=\"{{ path('app_services') }}\" class=\"read-more\">
                        <span>Learn More</span> <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>

            <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"200\">
                <div class=\"service-card\">
                    <div class=\"card-icon\">
                        <i class=\"bi bi-brain\"></i>
                    </div>
                    <h3>Neurology</h3>
                    <p>Advanced neurological care and treatment options</p>
                    <a href=\"{{ path('app_services') }}\" class=\"read-more\">
                        <span>Learn More</span> <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>

            <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"300\">
                <div class=\"service-card\">
                    <div class=\"card-icon\">
                        <i class=\"bi bi-hospital\"></i>
                    </div>
                    <h3>Pediatrics</h3>
                    <p>Specialized care for children and adolescents</p>
                    <a href=\"{{ path('app_services') }}\" class=\"read-more\">
                        <span>Learn More</span> <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id=\"cta\" class=\"cta section\">
    <div class=\"container\" data-aos=\"zoom-out\" data-aos-delay=\"100\">
        <div class=\"row g-5\">
            <div class=\"col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first\">
                <h3>Book Your Appointment Today</h3>
                <p>Don't wait for your health concerns. Schedule an appointment with our experienced doctors and get the care you deserve.</p>
                <a class=\"cta-btn align-self-start\" href=\"{{ path('app_appointment') }}\">Book Now</a>
            </div>

            <div class=\"col-lg-4 col-md-6 position-relative\">
                <div class=\"cta-bg\" style=\"background-image: url('{{ asset('build/frontend/assets/img/health/facilities-6.webp') }}')\"></div>
            </div>
        </div>
    </div>
</section>
{% endblock %}
", "home/index.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\home\\index.html.twig");
    }
}
