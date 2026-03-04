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

/* partials/frontend_footer.html.twig */
class __TwigTemplate_1af3939ed3663238ff9b5eb4f0a4bf77 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/frontend_footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/frontend_footer.html.twig"));

        // line 1
        yield "<footer id=\"footer\" class=\"footer dark-background\">
    <div class=\"container footer-top\">
        <div class=\"row gy-4\">
            <div class=\"col-lg-4 col-md-6 footer-about\">
                <a href=\"";
        // line 5
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"logo d-flex align-items-center\">
                    <span class=\"sitename\">Medicare</span>
                </a>
                <div class=\"footer-contact pt-3\">
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class=\"mt-3\"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
                <div class=\"social-links d-flex mt-4\">
                    <a href=\"\"><i class=\"bi bi-twitter-x\"></i></a>
                    <a href=\"\"><i class=\"bi bi-facebook\"></i></a>
                    <a href=\"\"><i class=\"bi bi-instagram\"></i></a>
                    <a href=\"\"><i class=\"bi bi-linkedin\"></i></a>
                </div>
            </div>

            <div class=\"col-lg-2 col-md-3 footer-links\">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></li>
                    <li><a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\">About us</a></li>
                    <li><a href=\"";
        // line 27
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\">Services</a></li>
                    <li><a href=\"";
        // line 28
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_terms");
        yield "\">Terms of service</a></li>
                    <li><a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_privacy");
        yield "\">Privacy policy</a></li>
                </ul>
            </div>

            <div class=\"col-lg-2 col-md-3 footer-links\">
                <h4>Our Services</h4>
                <ul>
                    <li><a href=\"#\">Web Design</a></li>
                    <li><a href=\"#\">Web Development</a></li>
                    <li><a href=\"#\">Product Management</a></li>
                    <li><a href=\"#\">Marketing</a></li>
                    <li><a href=\"#\">Graphic Design</a></li>
                </ul>
            </div>

            <div class=\"col-lg-4 col-md-12 footer-newsletter\">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action=\"forms/newsletter.php\" method=\"post\" class=\"php-email-form\">
                    <div class=\"newsletter-form\"><input type=\"email\" name=\"email\"><input type=\"submit\" value=\"Subscribe\"></div>
                    <div class=\"loading\">Loading</div>
                    <div class=\"error-message\"></div>
                    <div class=\"sent-message\">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>
        </div>
    </div>

    <div class=\"container copyright text-center mt-4\">
        <p>© <span>Copyright</span> <strong class=\"px-1 sitename\">Medicare</strong> <span>All Rights Reserved</span></p>
        <div class=\"credits\">
            Designed by <a href=\"#\">Nomade Team</a>
        </div>
    </div>
</footer>

<a href=\"#\" id=\"scroll-top\" class=\"scroll-top d-flex align-items-center justify-content-center\"><i class=\"bi bi-arrow-up-short\"></i></a>

<!-- Preloader -->
<div id=\"preloader\"></div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/frontend_footer.html.twig";
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
        return array (  93 => 29,  89 => 28,  85 => 27,  81 => 26,  77 => 25,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer id=\"footer\" class=\"footer dark-background\">
    <div class=\"container footer-top\">
        <div class=\"row gy-4\">
            <div class=\"col-lg-4 col-md-6 footer-about\">
                <a href=\"{{ path('app_home') }}\" class=\"logo d-flex align-items-center\">
                    <span class=\"sitename\">Medicare</span>
                </a>
                <div class=\"footer-contact pt-3\">
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class=\"mt-3\"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
                <div class=\"social-links d-flex mt-4\">
                    <a href=\"\"><i class=\"bi bi-twitter-x\"></i></a>
                    <a href=\"\"><i class=\"bi bi-facebook\"></i></a>
                    <a href=\"\"><i class=\"bi bi-instagram\"></i></a>
                    <a href=\"\"><i class=\"bi bi-linkedin\"></i></a>
                </div>
            </div>

            <div class=\"col-lg-2 col-md-3 footer-links\">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href=\"{{ path('app_home') }}\">Home</a></li>
                    <li><a href=\"{{ path('app_about') }}\">About us</a></li>
                    <li><a href=\"{{ path('app_services') }}\">Services</a></li>
                    <li><a href=\"{{ path('app_terms') }}\">Terms of service</a></li>
                    <li><a href=\"{{ path('app_privacy') }}\">Privacy policy</a></li>
                </ul>
            </div>

            <div class=\"col-lg-2 col-md-3 footer-links\">
                <h4>Our Services</h4>
                <ul>
                    <li><a href=\"#\">Web Design</a></li>
                    <li><a href=\"#\">Web Development</a></li>
                    <li><a href=\"#\">Product Management</a></li>
                    <li><a href=\"#\">Marketing</a></li>
                    <li><a href=\"#\">Graphic Design</a></li>
                </ul>
            </div>

            <div class=\"col-lg-4 col-md-12 footer-newsletter\">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action=\"forms/newsletter.php\" method=\"post\" class=\"php-email-form\">
                    <div class=\"newsletter-form\"><input type=\"email\" name=\"email\"><input type=\"submit\" value=\"Subscribe\"></div>
                    <div class=\"loading\">Loading</div>
                    <div class=\"error-message\"></div>
                    <div class=\"sent-message\">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>
        </div>
    </div>

    <div class=\"container copyright text-center mt-4\">
        <p>© <span>Copyright</span> <strong class=\"px-1 sitename\">Medicare</strong> <span>All Rights Reserved</span></p>
        <div class=\"credits\">
            Designed by <a href=\"#\">Nomade Team</a>
        </div>
    </div>
</footer>

<a href=\"#\" id=\"scroll-top\" class=\"scroll-top d-flex align-items-center justify-content-center\"><i class=\"bi bi-arrow-up-short\"></i></a>

<!-- Preloader -->
<div id=\"preloader\"></div>", "partials/frontend_footer.html.twig", "C:\\Users\\LENOVO\\Documents\\gestion user\\Medicare\\templates\\partials\\frontend_footer.html.twig");
    }
}
