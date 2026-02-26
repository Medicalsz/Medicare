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

/* admin/medecins/index.html.twig */
class __TwigTemplate_68815819e0199a2ecd4ae798fb76d58e extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/medecins/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/medecins/index.html.twig"));

        $this->parent = $this->load("base_admin.html.twig", 1);
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

        yield "Gestion des Médecins - Medicare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "<style>
    .medecin-card {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .medecin-photo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #10b981;
    }
    
    .medecin-info {
        flex: 1;
    }
    
    .medecin-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }
    
    .medecin-details {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .medecin-detail {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        color: #6b7280;
    }
    
    .medecin-detail i {
        color: #10b981;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .status-verified {
        background: #d1fae5;
        color: #059669;
    }
    
    .status-pending {
        background: #fef3c7;
        color: #d97706;
    }
    
    .action-buttons {
        display: flex;
        gap: 10px;
    }
    
    .btn-verify {
        background: #10b981;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-verify:hover {
        background: #059669;
        color: white;
    }
    
    .btn-delete {
        background: #ef4444;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }
    
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #10b981;
    }
    
    .stat-label {
        font-size: 0.9rem;
        color: #6b7280;
        margin-top: 5px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 144
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 145
        yield "<div class=\"row\">
    <div class=\"col-sm-12\">
        <div class=\"home-tab\">
            <div class=\"d-sm-flex align-items-center justify-content-between border-bottom\">
                <ul class=\"nav nav-tabs\" role=\"tablist\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" id=\"medecins-tab\" data-bs-toggle=\"tab\" href=\"#medecins\" role=\"tab\" aria-controls=\"medecins\" aria-selected=\"true\">Médecins</a>
                    </li>
                </ul>
            </div>
            
            <!-- Stats Cards -->
            <div class=\"stats-cards\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\">";
        // line 159
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 159, $this->source); })())), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">Total Médecins</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-number\">";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 163, $this->source); })()), function ($__m__) use ($context, $macros) { $context["m"] = $__m__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 163, $this->source); })()), "isVerified", [], "any", false, false, false, 163); })), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">Vérifiés</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-number\">";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 167, $this->source); })()), function ($__m__) use ($context, $macros) { $context["m"] = $__m__; return  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 167, $this->source); })()), "isVerified", [], "any", false, false, false, 167); })), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">En attente</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-number\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 171, $this->source); })()), function ($__m__) use ($context, $macros) { $context["m"] = $__m__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 171, $this->source); })()), "specialite", [], "any", false, false, false, 171); })), 0), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">Spécialités</div>
                </div>
            </div>

            <!-- Flash Messages -->
            ";
        // line 177
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 177, $this->source); })()), "flashes", [], "any", false, false, false, 177));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 178
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 179
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield " alert-dismissible fade show\" role=\"alert\">
                        ";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 184
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        yield "
            <!-- Medecins List -->
            <div class=\"tab-content\" id=\"myTabContent\">
                <div class=\"tab-pane fade show active\" id=\"medecins\" role=\"tabpanel\" aria-labelledby=\"medecins-tab\">
                    ";
        // line 189
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 189, $this->source); })()))) {
            // line 190
            yield "                        <div class=\"text-center py-5\">
                            <i class=\"mdi mdi-doctor\" style=\"font-size: 4rem; color: #e5e7eb;\"></i>
                            <h4 class=\"mt-3 text-muted\">Aucun médecin inscrit</h4>
                            <p class=\"text-muted\">Les médecins apparaîtront ici après inscription.</p>
                        </div>
                    ";
        } else {
            // line 196
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["medecins"]) || array_key_exists("medecins", $context) ? $context["medecins"] : (function () { throw new RuntimeError('Variable "medecins" does not exist.', 196, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["medecin"]) {
                // line 197
                yield "                            <div class=\"medecin-card\">
                                <img src=\"";
                // line 198
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "photo", [], "any", true, true, false, 198)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "photo", [], "any", false, false, false, 198), $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/frontend/img/person/person-m-9.webp"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/assets/frontend/img/person/person-m-9.webp"))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "fullName", [], "any", false, false, false, 198), "html", null, true);
                yield "\" class=\"medecin-photo\">
                                
                                <div class=\"medecin-info\">
                                    <div class=\"medecin-name\">";
                // line 201
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "fullName", [], "any", false, false, false, 201), "html", null, true);
                yield "</div>
                                    <div class=\"medecin-details\">
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-email\"></i>
                                            ";
                // line 205
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "email", [], "any", false, false, false, 205), "html", null, true);
                yield "
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-phone\"></i>
                                            ";
                // line 209
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "numero", [], "any", true, true, false, 209)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "numero", [], "any", false, false, false, 209), "N/A")) : ("N/A")), "html", null, true);
                yield "
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-stethoscope\"></i>
                                            ";
                // line 213
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "specialite", [], "any", true, true, false, 213)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "specialite", [], "any", false, false, false, 213), "Non spécifié")) : ("Non spécifié")), "html", null, true);
                yield "
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-map-marker\"></i>
                                            ";
                // line 217
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "ville", [], "any", false, false, false, 217)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "ville", [], "any", false, false, false, 217), "html", null, true);
                } else {
                    yield "Non spécifié";
                }
                // line 218
                yield "                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-currency-usd\"></i>
                                            ";
                // line 221
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "prixConsultation", [], "any", false, false, false, 221)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "prixConsultation", [], "any", false, false, false, 221), "html", null, true);
                    yield " DT";
                } else {
                    yield "N/A";
                }
                // line 222
                yield "                                        </div>
                                    </div>
                                </div>
                                
                                <div class=\"action-section\">
                                    <span class=\"status-badge ";
                // line 227
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "isVerified", [], "any", false, false, false, 227)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "status-verified";
                } else {
                    yield "status-pending";
                }
                yield "\">
                                        ";
                // line 228
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "isVerified", [], "any", false, false, false, 228)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 229
                    yield "                                            <i class=\"mdi mdi-check-circle\"></i> Vérifié
                                        ";
                } else {
                    // line 231
                    yield "                                            <i class=\"mdi mdi-clock-outline\"></i> En attente
                                        ";
                }
                // line 233
                yield "                                    </span>
                                    
                                    <div class=\"action-buttons mt-2\">
                                        ";
                // line 236
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "isVerified", [], "any", false, false, false, 236)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 237
                    yield "                                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_medecins_verify", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "id", [], "any", false, false, false, 237)]), "html", null, true);
                    yield "\" class=\"btn-verify\" onclick=\"return confirm('Êtes-vous sûr de vouloir vérifier ce médecin ?')\">
                                                <i class=\"mdi mdi-check\"></i> Vérifier
                                            </a>
                                        ";
                } else {
                    // line 241
                    yield "                                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_medecins_unverify", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "id", [], "any", false, false, false, 241)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-warning btn-sm\" onclick=\"return confirm('Marquer ce médecin comme non vérifié ?')\">
                                                <i class=\"mdi mdi-close-circle\"></i> Annuler vérification
                                            </a>
                                        ";
                }
                // line 245
                yield "                                        
                                        <a href=\"";
                // line 246
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_medecins_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["medecin"], "id", [], "any", false, false, false, 246)]), "html", null, true);
                yield "\" class=\"btn-delete\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce médecin ?')\">
                                            <i class=\"mdi mdi-delete\"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['medecin'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 253
            yield "                    ";
        }
        // line 254
        yield "                </div>
            </div>
        </div>
    </div>
</div>
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
        return "admin/medecins/index.html.twig";
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
        return array (  482 => 254,  479 => 253,  466 => 246,  463 => 245,  455 => 241,  447 => 237,  445 => 236,  440 => 233,  436 => 231,  432 => 229,  430 => 228,  422 => 227,  415 => 222,  408 => 221,  403 => 218,  397 => 217,  390 => 213,  383 => 209,  376 => 205,  369 => 201,  361 => 198,  358 => 197,  353 => 196,  345 => 190,  343 => 189,  337 => 185,  331 => 184,  321 => 180,  316 => 179,  311 => 178,  307 => 177,  298 => 171,  291 => 167,  284 => 163,  277 => 159,  261 => 145,  248 => 144,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block title %}Gestion des Médecins - Medicare{% endblock %}

{% block stylesheets %}
<style>
    .medecin-card {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .medecin-photo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #10b981;
    }
    
    .medecin-info {
        flex: 1;
    }
    
    .medecin-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }
    
    .medecin-details {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .medecin-detail {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        color: #6b7280;
    }
    
    .medecin-detail i {
        color: #10b981;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .status-verified {
        background: #d1fae5;
        color: #059669;
    }
    
    .status-pending {
        background: #fef3c7;
        color: #d97706;
    }
    
    .action-buttons {
        display: flex;
        gap: 10px;
    }
    
    .btn-verify {
        background: #10b981;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-verify:hover {
        background: #059669;
        color: white;
    }
    
    .btn-delete {
        background: #ef4444;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }
    
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #10b981;
    }
    
    .stat-label {
        font-size: 0.9rem;
        color: #6b7280;
        margin-top: 5px;
    }
</style>
{% endblock %}

{% block content %}
<div class=\"row\">
    <div class=\"col-sm-12\">
        <div class=\"home-tab\">
            <div class=\"d-sm-flex align-items-center justify-content-between border-bottom\">
                <ul class=\"nav nav-tabs\" role=\"tablist\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" id=\"medecins-tab\" data-bs-toggle=\"tab\" href=\"#medecins\" role=\"tab\" aria-controls=\"medecins\" aria-selected=\"true\">Médecins</a>
                    </li>
                </ul>
            </div>
            
            <!-- Stats Cards -->
            <div class=\"stats-cards\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\">{{ medecins|length }}</div>
                    <div class=\"stat-label\">Total Médecins</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-number\">{{ medecins|filter(m => m.isVerified)|length }}</div>
                    <div class=\"stat-label\">Vérifiés</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-number\">{{ medecins|filter(m => not m.isVerified)|length }}</div>
                    <div class=\"stat-label\">En attente</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-number\">{{ medecins|filter(m => m.specialite)|length|default(0) }}</div>
                    <div class=\"stat-label\">Spécialités</div>
                </div>
            </div>

            <!-- Flash Messages -->
            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ label }} alert-dismissible fade show\" role=\"alert\">
                        {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                {% endfor %}
            {% endfor %}

            <!-- Medecins List -->
            <div class=\"tab-content\" id=\"myTabContent\">
                <div class=\"tab-pane fade show active\" id=\"medecins\" role=\"tabpanel\" aria-labelledby=\"medecins-tab\">
                    {% if medecins is empty %}
                        <div class=\"text-center py-5\">
                            <i class=\"mdi mdi-doctor\" style=\"font-size: 4rem; color: #e5e7eb;\"></i>
                            <h4 class=\"mt-3 text-muted\">Aucun médecin inscrit</h4>
                            <p class=\"text-muted\">Les médecins apparaîtront ici après inscription.</p>
                        </div>
                    {% else %}
                        {% for medecin in medecins %}
                            <div class=\"medecin-card\">
                                <img src=\"{{ medecin.photo|default(asset('build/assets/frontend/img/person/person-m-9.webp')) }}\" alt=\"{{ medecin.fullName }}\" class=\"medecin-photo\">
                                
                                <div class=\"medecin-info\">
                                    <div class=\"medecin-name\">{{ medecin.fullName }}</div>
                                    <div class=\"medecin-details\">
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-email\"></i>
                                            {{ medecin.email }}
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-phone\"></i>
                                            {{ medecin.numero|default('N/A') }}
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-stethoscope\"></i>
                                            {{ medecin.specialite|default('Non spécifié') }}
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-map-marker\"></i>
                                            {% if medecin.ville %}{{ medecin.ville }}{% else %}Non spécifié{% endif %}
                                        </div>
                                        <div class=\"medecin-detail\">
                                            <i class=\"mdi mdi-currency-usd\"></i>
                                            {% if medecin.prixConsultation %}{{ medecin.prixConsultation }} DT{% else %}N/A{% endif %}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class=\"action-section\">
                                    <span class=\"status-badge {% if medecin.isVerified %}status-verified{% else %}status-pending{% endif %}\">
                                        {% if medecin.isVerified %}
                                            <i class=\"mdi mdi-check-circle\"></i> Vérifié
                                        {% else %}
                                            <i class=\"mdi mdi-clock-outline\"></i> En attente
                                        {% endif %}
                                    </span>
                                    
                                    <div class=\"action-buttons mt-2\">
                                        {% if not medecin.isVerified %}
                                            <a href=\"{{ path('admin_medecins_verify', {'id': medecin.id}) }}\" class=\"btn-verify\" onclick=\"return confirm('Êtes-vous sûr de vouloir vérifier ce médecin ?')\">
                                                <i class=\"mdi mdi-check\"></i> Vérifier
                                            </a>
                                        {% else %}
                                            <a href=\"{{ path('admin_medecins_unverify', {'id': medecin.id}) }}\" class=\"btn btn-outline-warning btn-sm\" onclick=\"return confirm('Marquer ce médecin comme non vérifié ?')\">
                                                <i class=\"mdi mdi-close-circle\"></i> Annuler vérification
                                            </a>
                                        {% endif %}
                                        
                                        <a href=\"{{ path('admin_medecins_delete', {'id': medecin.id}) }}\" class=\"btn-delete\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce médecin ?')\">
                                            <i class=\"mdi mdi-delete\"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "admin/medecins/index.html.twig", "C:\\Users\\LENOVO\\Documents\\PI\\Medicare\\templates\\admin\\medecins\\index.html.twig");
    }
}
