<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\MacroNamespace;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/custom/etecsa_module/templates/internet-movil.html.twig */
class __TwigTemplate_371741a8d77c616ba9a2a512e941a01f extends Template
{
    private Source $source;
    /**
     * @var array<string, MacroNamespace>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        $this->sandbox = $env->getExtension(SandboxExtension::class)->getChecker();
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 2
            if (((($context["cliente"] ?? null) == "people") || (($context["cliente"] ?? null) == "personas"))) {
                // line 3
                yield "\t";
                $context["cpath"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("etecsa.paquete");
            } else {
                // line 5
                yield "\t";
                $context["cpath"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("etecsa.paquetemp");
            }
            // line 7
            yield "\t";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["data"] ?? null)) > 0)) {
                // line 8
                yield "\t\t<div class=\"container ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["visibility"] ?? null), "html", null, true);
                yield "\">
\t\t\t<div class=\"row justify-content-center\">
\t\t\t\t<div class=\"col-md-12 text-center\">
\t\t\t\t\t<h1 class=\"block-title-custom\">";
                // line 11
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("Mobile Services")), "html", null, true);
                yield "</h1>
\t\t\t\t\t<p class=\"block-subtitle-custom\">";
                // line 12
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Active your plans and connect with your people"));
                yield "</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"sesion-internet-movil col-12 col-sm-12 col-md-10 col-lg-10\">
\t\t\t\t\t<ul class=\"nav nav-tabs internet-movil\" id=\"myTab\" role=\"tablist\">
\t\t\t\t\t\t";
                // line 17
                $context["cont"] = 1;
                // line 18
                yield "\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["pqtes"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 19
                    yield "\t\t\t\t\t\t\t";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 20
                        yield "\t\t\t\t\t\t\t\t";
                        $context["active"] = "active";
                        // line 21
                        yield "\t\t\t\t\t\t\t";
                    } else {
                        // line 22
                        yield "\t\t\t\t\t\t\t\t";
                        $context["active"] = "";
                        // line 23
                        yield "\t\t\t\t\t\t\t";
                    }
                    // line 24
                    yield "\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t<a class=\"nav-link ";
                    // line 25
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["active"] ?? null), "html", null, true);
                    yield "\" data-toggle=\"tab\" href=\"#tabim";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cont"] ?? null), "html", null, true);
                    yield "\" role=\"tabpanel\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["item"], "html", null, true);
                    yield "</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                    // line 27
                    $context["cont"] = (($context["cont"] ?? null) + 1);
                    // line 28
                    yield "\t\t\t\t\t\t";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 29
                yield "\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" id=\"todos-tab\" href=\"";
                // line 30
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("all")), "html", null, true);
                yield "</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"tab-content\" id=\"myTabContent\">
\t\t\t\t\t\t";
                // line 34
                $context["cont"] = 1;
                // line 35
                yield "\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["keys"] => $context["item"]) {
                    // line 36
                    yield "\t\t\t\t\t\t\t";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 36)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 37
                        yield "\t\t\t\t\t\t\t\t";
                        $context["active"] = "active";
                        // line 38
                        yield "\t\t\t\t\t\t\t";
                    } else {
                        // line 39
                        yield "\t\t\t\t\t\t\t\t";
                        $context["active"] = "";
                        // line 40
                        yield "\t\t\t\t\t\t\t";
                    }
                    // line 41
                    yield "\t\t\t\t\t\t\t<div class=\"tab-pane fade show ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["active"] ?? null), "html", null, true);
                    yield "\" id=\"tabim";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cont"] ?? null), "html", null, true);
                    yield "\" role=\"tabpanel\">
\t\t\t\t\t\t\t\t<div id=\"carousel-hw-";
                    // line 42
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cont"] ?? null), "html", null, true);
                    yield "\" class=\"owl-carousel owl-carousel-hw mt-5\">
\t\t\t\t\t\t\t\t\t";
                    // line 43
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable($context["item"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["pqte"]) {
                        // line 44
                        yield "\t\t\t\t\t\t\t\t\t\t<div class=\"element position-relative\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 46
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, $context["pqte"], "svg", [], "any", false, false, true, 46)), "html", null, true);
                        yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 47
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["pqte"], "enlace", [], "any", false, false, true, 47)) > 0)) {
                            // line 48
                            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-purchase button--aylen\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
                            // line 49
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["pqte"], "enlace", [], "any", false, false, true, 49), ["internal:" => ""]), "html", null, true);
                            yield "\">";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["pqte"], "enlaceText", [], "any", false, false, true, 49), "html", null, true);
                            yield "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 51
                            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 53
                        yield "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['pqte'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent);
                    $context += $_parent;
                    // line 56
                    yield "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    // line 58
                    $context["cont"] = (($context["cont"] ?? null) + 1);
                    // line 59
                    yield "\t\t\t\t\t\t";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['keys'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 60
                yield "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
            }
            return; yield;
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield (string) Twig\Extension\CoreExtension::spaceless($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $_v0, "html", null, true));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["cliente", "data", "visibility", "pqtes", "loop"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/internet-movil.html.twig";
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
    public function getDefaultEscapeStrategy(): string|false
    {
        return "html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  267 => 1,  258 => 60,  243 => 59,  241 => 58,  237 => 56,  228 => 53,  224 => 51,  218 => 49,  215 => 48,  213 => 47,  209 => 46,  205 => 44,  201 => 43,  197 => 42,  190 => 41,  187 => 40,  184 => 39,  181 => 38,  178 => 37,  175 => 36,  157 => 35,  155 => 34,  146 => 30,  143 => 29,  128 => 28,  126 => 27,  117 => 25,  114 => 24,  111 => 23,  108 => 22,  105 => 21,  102 => 20,  99 => 19,  81 => 18,  79 => 17,  71 => 12,  67 => 11,  60 => 8,  57 => 7,  53 => 5,  49 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/internet-movil.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/internet-movil.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2, "set" => 3, "for" => 18];
        static $filters = ["length" => 7, "escape" => 8, "upper" => 11, "t" => 11, "replace" => 49, "spaceless" => 1];
        static $functions = ["path" => 3, "file_url" => 46];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "length", 1 => "escape", 2 => "upper", 3 => "t", 4 => "replace", 5 => "spaceless"],
                [0 => "path", 1 => "file_url"],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
