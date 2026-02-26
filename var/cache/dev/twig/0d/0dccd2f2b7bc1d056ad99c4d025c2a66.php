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

/* frontend/home.html.twig */
class __TwigTemplate_3140bdb8080cbf2b07425cb161689c37 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend/home.html.twig"));

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

        yield "Home - Medicare Medical Care";
        
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
        yield "<!-- Hidden element to store registration message for JS -->
";
        // line 7
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "session", [], "any", false, false, false, 7), "get", ["show_registration_message"], "method", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "    <div id=\"registrationMessage\" data-message=\"Votre compte est en cours de vérification. Vous pourrez vous connecter une fois approuvé par l'administrateur.\"></div>
    ";
            // line 9
            $context["flash_macro"] = true;
        }
        // line 11
        yield "
<!-- Hero Section -->
<section id=\"hero\" class=\"hero section\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-lg-5\">
                <div class=\"hero-image\" data-aos=\"fade-right\" data-aos-delay=\"100\">
                    <img src=\"";
        // line 18
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

                    <h1 class=\"hero-title\">Excellence in Medical Care Since 1985</h1>
                    <p class=\"hero-description\">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>

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
                            <a href=\"";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\" class=\"btn btn-primary\">Schedule Consultation</a>
                            <a href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\" class=\"btn btn-secondary\">
                                <i class=\"bi bi-play-circle\"></i>
                                Watch Our Story
                            </a>
                        </div>

                        <div class=\"quick-actions\">
                            <a href=\"";
        // line 86
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment");
        yield "\" class=\"action-link\">
                                <i class=\"bi bi-calendar-check\"></i>
                                <span>Find Available Times</span>
                            </a>
                            <a href=\"";
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\" class=\"action-link\">
                                <i class=\"bi bi-chat-dots\"></i>
                                <span>Chat with Support</span>
                            </a>
                            <a href=\"#\" class=\"action-link\">
                                <i class=\"bi bi-file-medical\"></i>
                                <span>Patient Portal</span>
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
</section><!-- /Hero Section -->

<!-- Home About Section -->
<section id=\"home-about\" class=\"home-about section\">
    <div class=\"container\" data-aos=\"fade-up\" data-aos-delay=\"100\">
        <div class=\"row\">
            <div class=\"col-lg-8 mx-auto text-center mb-5\" data-aos=\"fade-up\" data-aos-delay=\"150\">
                <h2 class=\"section-heading\">Excellence in Healthcare Since 1985</h2>
                <p class=\"lead-description\">We are committed to providing world-class medical care through innovation, compassion, and unwavering dedication to our patients' wellbeing and recovery.</p>
            </div>
        </div>

        <div class=\"row align-items-center gy-5\">
            <div class=\"col-lg-7\" data-aos=\"fade-right\" data-aos-delay=\"200\">
                <div class=\"image-grid\">
                    <div class=\"primary-image\">
                        <img src=\"";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/health/facilities-6.webp"), "html", null, true);
        yield "\" alt=\"Modern hospital facility\" class=\"img-fluid\">
                        <div class=\"certification-badge\">
                            <i class=\"bi bi-award\"></i>
                            <span>JCI Accredited</span>
                        </div>
                    </div>
                    <div class=\"secondary-images\">
                        <div class=\"small-image\">
                            <img src=\"";
        // line 134
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/health/consultation-3.webp"), "html", null, true);
        yield "\" alt=\"Doctor consultation\" class=\"img-fluid\">
                        </div>
                        <div class=\"small-image\">
                            <img src=\"";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/health/surgery-2.webp"), "html", null, true);
        yield "\" alt=\"Medical procedure\" class=\"img-fluid\">
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"col-lg-5\" data-aos=\"fade-left\" data-aos-delay=\"300\">
                <div class=\"content-wrapper\">
                    <div class=\"highlight-box\">
                        <div class=\"highlight-icon\">
                            <i class=\"bi bi-heart-pulse-fill\"></i>
                        </div>
                        <div class=\"highlight-content\">
                            <h4>Patient-Centered Approach</h4>
                            <p>Every treatment plan is carefully customized to meet individual patient needs and medical history.</p>
                        </div>
                    </div>

                    <div class=\"feature-list\">
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">Advanced diagnostic technology and imaging</div>
                        </div>
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">Board-certified physicians and specialists</div>
                        </div>
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">Comprehensive rehabilitation programs</div>
                        </div>
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">24/7 emergency and critical care services</div>
                        </div>
                    </div>

                    <div class=\"metrics-row\">
                        <div class=\"metric-box\">
                            <div class=\"metric-number\">
                                <span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"98\" data-purecounter-duration=\"0\">98</span>%
                            </div>
                            <div class=\"metric-label\">Patient Satisfaction</div>
                        </div>
                        <div class=\"metric-box\">
                            <div class=\"metric-number\">
                                <span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"35\" data-purecounter-duration=\"0\">35</span>K+
                            </div>
                            <div class=\"metric-label\">Lives Improved</div>
                        </div>
                    </div>

                    <div class=\"action-buttons\">
                        <a href=\"";
        // line 198
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\" class=\"btn-explore\">Explore Our Services</a>
                        <a href=\"";
        // line 199
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\" class=\"btn-contact\">
                            <i class=\"bi bi-telephone\"></i>
                            Schedule Consultation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Home About Section -->

<!-- Featured Departments Section -->
<section id=\"featured-departments\" class=\"featured-departments section\">
    <div class=\"container section-title\" data-aos=\"fade-up\">
        <h2>Featured Departments</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class=\"container\" data-aos=\"fade-up\" data-aos-delay=\"100\">
        <div class=\"departments-showcase\">
            <div class=\"featured-department\" data-aos=\"fade-up\" data-aos-delay=\"200\">
                <div class=\"row align-items-center\">
                    <div class=\"col-lg-6 order-lg-1\">
                        <div class=\"department-content\">
                            <div class=\"department-category\">Emergency Medicine</div>
                            <h2 class=\"department-title\">24/7 Emergency Care Services</h2>
                            <p class=\"department-description\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <div class=\"department-features\">
                                <div class=\"feature-item\">
                                    <i class=\"fas fa-check-circle\"></i>
                                    <span>24/7 Emergency Response</span>
                                </div>
                                <div class=\"feature-item\">
                                    <i class=\"fas fa-check-circle\"></i>
                                    <span>Advanced Life Support</span>
                                </div>
                                <div class=\"feature-item\">
                                    <i class=\"fas fa-check-circle\"></i>
                                    <span>Trauma Care Specialists</span>
                                </div>
                            </div>
                            <a href=\"";
        // line 240
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_department_details");
        yield "\" class=\"cta-link\">Learn More <i class=\"fas fa-arrow-right\"></i></a>
                        </div>
                    </div>
                    <div class=\"col-lg-6 order-lg-2\">
                        <div class=\"department-visual\">
                            <div class=\"image-wrapper\">
                                <img src=\"";
        // line 246
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/frontend/assets/img/health/emergency-3.webp"), "html", null, true);
        yield "\" alt=\"Emergency Department\" class=\"img-fluid\">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"departments-grid\">
                <div class=\"row\">
                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"300\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-heartbeat\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Cardiology</h3>
                                <p class=\"card-description\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">15+</span>
                                        <span class=\"stat-label\">Specialists</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">500+</span>
                                        <span class=\"stat-label\">Procedures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"350\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-brain\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Neurology</h3>
                                <p class=\"card-description\">Eos qui ratione voluptatem sequi nesciunt neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">8+</span>
                                        <span class=\"stat-label\">Specialists</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">200+</span>
                                        <span class=\"stat-label\">Treatments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"400\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-cut\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Surgery</h3>
                                <p class=\"card-description\">Consectetur adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">12+</span>
                                        <span class=\"stat-label\">Surgeons</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">1000+</span>
                                        <span class=\"stat-label\">Operations</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"450\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-baby\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Pediatrics</h3>
                                <p class=\"card-description\">Quaerat voluptatem ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">10+</span>
                                        <span class=\"stat-label\">Pediatricians</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">2000+</span>
                                        <span class=\"stat-label\">Young Patients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"500\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-eye\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Ophthalmology</h3>
                                <p class=\"card-description\">Nisi ut aliquid ex ea commodi consequatur quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">6+</span>
                                        <span class=\"stat-label\">Eye Doctors</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">800+</span>
                                        <span class=\"stat-label\">Eye Exams</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"550\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-band-aid\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Dermatology</h3>
                                <p class=\"card-description\">Quam nihil molestiae consequatur vel illum qui dolorem eum fugiat quo voluptas nulla pariatur at vero eos.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">7+</span>
                                        <span class=\"stat-label\">Dermatologists</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">600+</span>
                                        <span class=\"stat-label\">Skin Treatments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"departments-cta\" data-aos=\"fade-up\" data-aos-delay=\"600\">
                <div class=\"cta-content\">
                    <h3 class=\"cta-title\">Explore All Our Medical Departments</h3>
                    <p class=\"cta-description\">Et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                    <a href=\"";
        // line 393
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_departments");
        yield "\" class=\"btn btn-primary\">View All Departments</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Featured Departments Section -->

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
</section><!-- /Stats Section -->

<script>
// Registration Success Modal - Display via JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const messageElement = document.getElementById('registrationMessage');
    
    if (messageElement && messageElement.dataset.message) {
        const message = messageElement.dataset.message;
        
        // Create modal
        const modal = document.createElement('div');
        modal.className = 'registration-modal-overlay';
        modal.innerHTML = 
            '<div class=\"registration-modal\">' +
                '<div class=\"modal-icon\">' +
                    '<i class=\"mdi mdi-check-circle\"></i>' +
                '</div>' +
                '<h3>Inscription réussie !</h3>' +
                '<p>' + message + '</p>' +
            '</div>';
        
        document.body.appendChild(modal);
        
        // Clear the session flag
        fetch('/clear-registration-message', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(() => {
            // Remove the hidden element
            messageElement.remove();
        });
        
        // Auto dismiss after 3 seconds
        setTimeout(function() {
            modal.style.animation = 'modalFadeOut 0.5s ease forwards';
            setTimeout(function() {
                modal.remove();
            }, 500);
        }, 3000);
    }
});
</script>

";
        // line 484
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 484, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 484));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_warning"]) {
            // line 485
            yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create warning modal
    const modal = document.createElement('div');
    modal.className = 'registration-modal-overlay';
    modal.innerHTML = 
        '<div class=\"registration-modal registration-warning\">' +
            '<div class=\"modal-icon warning-icon\">' +
                '<i class=\"mdi mdi-alert-circle\"></i>' +
            '</div>' +
            '<h3>Compte en attente de validation</h3>' +
            '<p>";
            // line 496
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_warning"], "html", null, true);
            yield "</p>' +
        '</div>';
    
    document.body.appendChild(modal);
    
    // Auto dismiss after 5 seconds
    setTimeout(function() {
        modal.style.animation = 'modalFadeOut 0.5s ease forwards';
        setTimeout(function() {
            modal.remove();
        }, 500);
    }, 5000);
});
</script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_warning'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 511
        yield "
<style>
/* Registration Success Modal Styles */
.registration-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    animation: modalFadeIn 0.3s ease;
}

.registration-modal {
    background: white;
    padding: 50px 70px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.35);
    animation: modalSlideUp 0.3s ease;
    max-width: 550px;
}

.modal-icon {
    font-size: 72px;
    color: #10b981;
    margin-bottom: 25px;
}

.registration-modal h3 {
    color: #10b981;
    margin-bottom: 20px;
    font-size: 26px;
    font-weight: 600;
}

.registration-warning .modal-icon {
    color: #f59e0b;
}

.registration-warning h3 {
    color: #f59e0b;
}

.registration-modal p {
    color: #374151;
    font-size: 16px;
    line-height: 1.7;
    margin: 0;
}

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes modalSlideUp {
    from { transform: translateY(40px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes modalFadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
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
        return "frontend/home.html.twig";
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
        return array (  662 => 511,  641 => 496,  628 => 485,  624 => 484,  531 => 393,  381 => 246,  372 => 240,  328 => 199,  324 => 198,  260 => 137,  254 => 134,  243 => 126,  204 => 90,  197 => 86,  187 => 79,  183 => 78,  120 => 18,  111 => 11,  108 => 9,  105 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_frontend.html.twig' %}

{% block title %}Home - Medicare Medical Care{% endblock %}

{% block body %}
<!-- Hidden element to store registration message for JS -->
{% if app.session.get('show_registration_message') %}
    <div id=\"registrationMessage\" data-message=\"Votre compte est en cours de vérification. Vous pourrez vous connecter une fois approuvé par l'administrateur.\"></div>
    {% set flash_macro = true %}
{% endif %}

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

                    <h1 class=\"hero-title\">Excellence in Medical Care Since 1985</h1>
                    <p class=\"hero-description\">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>

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
                            <a href=\"{{ path('app_appointment') }}\" class=\"btn btn-primary\">Schedule Consultation</a>
                            <a href=\"{{ path('app_about') }}\" class=\"btn btn-secondary\">
                                <i class=\"bi bi-play-circle\"></i>
                                Watch Our Story
                            </a>
                        </div>

                        <div class=\"quick-actions\">
                            <a href=\"{{ path('app_appointment') }}\" class=\"action-link\">
                                <i class=\"bi bi-calendar-check\"></i>
                                <span>Find Available Times</span>
                            </a>
                            <a href=\"{{ path('app_contact') }}\" class=\"action-link\">
                                <i class=\"bi bi-chat-dots\"></i>
                                <span>Chat with Support</span>
                            </a>
                            <a href=\"#\" class=\"action-link\">
                                <i class=\"bi bi-file-medical\"></i>
                                <span>Patient Portal</span>
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
</section><!-- /Hero Section -->

<!-- Home About Section -->
<section id=\"home-about\" class=\"home-about section\">
    <div class=\"container\" data-aos=\"fade-up\" data-aos-delay=\"100\">
        <div class=\"row\">
            <div class=\"col-lg-8 mx-auto text-center mb-5\" data-aos=\"fade-up\" data-aos-delay=\"150\">
                <h2 class=\"section-heading\">Excellence in Healthcare Since 1985</h2>
                <p class=\"lead-description\">We are committed to providing world-class medical care through innovation, compassion, and unwavering dedication to our patients' wellbeing and recovery.</p>
            </div>
        </div>

        <div class=\"row align-items-center gy-5\">
            <div class=\"col-lg-7\" data-aos=\"fade-right\" data-aos-delay=\"200\">
                <div class=\"image-grid\">
                    <div class=\"primary-image\">
                        <img src=\"{{ asset('build/frontend/assets/img/health/facilities-6.webp') }}\" alt=\"Modern hospital facility\" class=\"img-fluid\">
                        <div class=\"certification-badge\">
                            <i class=\"bi bi-award\"></i>
                            <span>JCI Accredited</span>
                        </div>
                    </div>
                    <div class=\"secondary-images\">
                        <div class=\"small-image\">
                            <img src=\"{{ asset('build/frontend/assets/img/health/consultation-3.webp') }}\" alt=\"Doctor consultation\" class=\"img-fluid\">
                        </div>
                        <div class=\"small-image\">
                            <img src=\"{{ asset('build/frontend/assets/img/health/surgery-2.webp') }}\" alt=\"Medical procedure\" class=\"img-fluid\">
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"col-lg-5\" data-aos=\"fade-left\" data-aos-delay=\"300\">
                <div class=\"content-wrapper\">
                    <div class=\"highlight-box\">
                        <div class=\"highlight-icon\">
                            <i class=\"bi bi-heart-pulse-fill\"></i>
                        </div>
                        <div class=\"highlight-content\">
                            <h4>Patient-Centered Approach</h4>
                            <p>Every treatment plan is carefully customized to meet individual patient needs and medical history.</p>
                        </div>
                    </div>

                    <div class=\"feature-list\">
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">Advanced diagnostic technology and imaging</div>
                        </div>
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">Board-certified physicians and specialists</div>
                        </div>
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">Comprehensive rehabilitation programs</div>
                        </div>
                        <div class=\"feature-item\">
                            <div class=\"feature-icon\">
                                <i class=\"bi bi-check-circle-fill\"></i>
                            </div>
                            <div class=\"feature-text\">24/7 emergency and critical care services</div>
                        </div>
                    </div>

                    <div class=\"metrics-row\">
                        <div class=\"metric-box\">
                            <div class=\"metric-number\">
                                <span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"98\" data-purecounter-duration=\"0\">98</span>%
                            </div>
                            <div class=\"metric-label\">Patient Satisfaction</div>
                        </div>
                        <div class=\"metric-box\">
                            <div class=\"metric-number\">
                                <span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"35\" data-purecounter-duration=\"0\">35</span>K+
                            </div>
                            <div class=\"metric-label\">Lives Improved</div>
                        </div>
                    </div>

                    <div class=\"action-buttons\">
                        <a href=\"{{ path('app_services') }}\" class=\"btn-explore\">Explore Our Services</a>
                        <a href=\"{{ path('app_contact') }}\" class=\"btn-contact\">
                            <i class=\"bi bi-telephone\"></i>
                            Schedule Consultation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Home About Section -->

<!-- Featured Departments Section -->
<section id=\"featured-departments\" class=\"featured-departments section\">
    <div class=\"container section-title\" data-aos=\"fade-up\">
        <h2>Featured Departments</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class=\"container\" data-aos=\"fade-up\" data-aos-delay=\"100\">
        <div class=\"departments-showcase\">
            <div class=\"featured-department\" data-aos=\"fade-up\" data-aos-delay=\"200\">
                <div class=\"row align-items-center\">
                    <div class=\"col-lg-6 order-lg-1\">
                        <div class=\"department-content\">
                            <div class=\"department-category\">Emergency Medicine</div>
                            <h2 class=\"department-title\">24/7 Emergency Care Services</h2>
                            <p class=\"department-description\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <div class=\"department-features\">
                                <div class=\"feature-item\">
                                    <i class=\"fas fa-check-circle\"></i>
                                    <span>24/7 Emergency Response</span>
                                </div>
                                <div class=\"feature-item\">
                                    <i class=\"fas fa-check-circle\"></i>
                                    <span>Advanced Life Support</span>
                                </div>
                                <div class=\"feature-item\">
                                    <i class=\"fas fa-check-circle\"></i>
                                    <span>Trauma Care Specialists</span>
                                </div>
                            </div>
                            <a href=\"{{ path('app_department_details') }}\" class=\"cta-link\">Learn More <i class=\"fas fa-arrow-right\"></i></a>
                        </div>
                    </div>
                    <div class=\"col-lg-6 order-lg-2\">
                        <div class=\"department-visual\">
                            <div class=\"image-wrapper\">
                                <img src=\"{{ asset('build/frontend/assets/img/health/emergency-3.webp') }}\" alt=\"Emergency Department\" class=\"img-fluid\">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"departments-grid\">
                <div class=\"row\">
                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"300\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-heartbeat\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Cardiology</h3>
                                <p class=\"card-description\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">15+</span>
                                        <span class=\"stat-label\">Specialists</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">500+</span>
                                        <span class=\"stat-label\">Procedures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"350\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-brain\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Neurology</h3>
                                <p class=\"card-description\">Eos qui ratione voluptatem sequi nesciunt neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">8+</span>
                                        <span class=\"stat-label\">Specialists</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">200+</span>
                                        <span class=\"stat-label\">Treatments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"400\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-cut\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Surgery</h3>
                                <p class=\"card-description\">Consectetur adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">12+</span>
                                        <span class=\"stat-label\">Surgeons</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">1000+</span>
                                        <span class=\"stat-label\">Operations</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"450\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-baby\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Pediatrics</h3>
                                <p class=\"card-description\">Quaerat voluptatem ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">10+</span>
                                        <span class=\"stat-label\">Pediatricians</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">2000+</span>
                                        <span class=\"stat-label\">Young Patients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"500\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-eye\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Ophthalmology</h3>
                                <p class=\"card-description\">Nisi ut aliquid ex ea commodi consequatur quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">6+</span>
                                        <span class=\"stat-label\">Eye Doctors</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">800+</span>
                                        <span class=\"stat-label\">Eye Exams</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-4 col-md-6\" data-aos=\"fade-up\" data-aos-delay=\"550\">
                        <div class=\"department-card\">
                            <div class=\"card-icon\">
                                <i class=\"fas fa-band-aid\"></i>
                            </div>
                            <div class=\"card-content\">
                                <h3 class=\"card-title\">Dermatology</h3>
                                <p class=\"card-description\">Quam nihil molestiae consequatur vel illum qui dolorem eum fugiat quo voluptas nulla pariatur at vero eos.</p>
                                <div class=\"card-stats\">
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">7+</span>
                                        <span class=\"stat-label\">Dermatologists</span>
                                    </div>
                                    <div class=\"stat-item\">
                                        <span class=\"stat-number\">600+</span>
                                        <span class=\"stat-label\">Skin Treatments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"departments-cta\" data-aos=\"fade-up\" data-aos-delay=\"600\">
                <div class=\"cta-content\">
                    <h3 class=\"cta-title\">Explore All Our Medical Departments</h3>
                    <p class=\"cta-description\">Et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                    <a href=\"{{ path('app_departments') }}\" class=\"btn btn-primary\">View All Departments</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Featured Departments Section -->

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
</section><!-- /Stats Section -->

<script>
// Registration Success Modal - Display via JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const messageElement = document.getElementById('registrationMessage');
    
    if (messageElement && messageElement.dataset.message) {
        const message = messageElement.dataset.message;
        
        // Create modal
        const modal = document.createElement('div');
        modal.className = 'registration-modal-overlay';
        modal.innerHTML = 
            '<div class=\"registration-modal\">' +
                '<div class=\"modal-icon\">' +
                    '<i class=\"mdi mdi-check-circle\"></i>' +
                '</div>' +
                '<h3>Inscription réussie !</h3>' +
                '<p>' + message + '</p>' +
            '</div>';
        
        document.body.appendChild(modal);
        
        // Clear the session flag
        fetch('/clear-registration-message', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(() => {
            // Remove the hidden element
            messageElement.remove();
        });
        
        // Auto dismiss after 3 seconds
        setTimeout(function() {
            modal.style.animation = 'modalFadeOut 0.5s ease forwards';
            setTimeout(function() {
                modal.remove();
            }, 500);
        }, 3000);
    }
});
</script>

{# Warning message for unverified medecins #}
{% for flash_warning in app.flashes('warning') %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create warning modal
    const modal = document.createElement('div');
    modal.className = 'registration-modal-overlay';
    modal.innerHTML = 
        '<div class=\"registration-modal registration-warning\">' +
            '<div class=\"modal-icon warning-icon\">' +
                '<i class=\"mdi mdi-alert-circle\"></i>' +
            '</div>' +
            '<h3>Compte en attente de validation</h3>' +
            '<p>{{ flash_warning }}</p>' +
        '</div>';
    
    document.body.appendChild(modal);
    
    // Auto dismiss after 5 seconds
    setTimeout(function() {
        modal.style.animation = 'modalFadeOut 0.5s ease forwards';
        setTimeout(function() {
            modal.remove();
        }, 500);
    }, 5000);
});
</script>
{% endfor %}

<style>
/* Registration Success Modal Styles */
.registration-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    animation: modalFadeIn 0.3s ease;
}

.registration-modal {
    background: white;
    padding: 50px 70px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.35);
    animation: modalSlideUp 0.3s ease;
    max-width: 550px;
}

.modal-icon {
    font-size: 72px;
    color: #10b981;
    margin-bottom: 25px;
}

.registration-modal h3 {
    color: #10b981;
    margin-bottom: 20px;
    font-size: 26px;
    font-weight: 600;
}

.registration-warning .modal-icon {
    color: #f59e0b;
}

.registration-warning h3 {
    color: #f59e0b;
}

.registration-modal p {
    color: #374151;
    font-size: 16px;
    line-height: 1.7;
    margin: 0;
}

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes modalSlideUp {
    from { transform: translateY(40px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes modalFadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}
</style>
{% endblock %}
", "frontend/home.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\frontend\\home.html.twig");
    }
}
