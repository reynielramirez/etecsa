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

/* modules/custom/etecsa_module/templates/promcortas.html.twig */
class __TwigTemplate_ccbdc27b07bf7162ce305f9c2bfc1908 extends Template
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
            yield "<div style=\"background-color: #000066; height: 120px;\">
        ";
            // line 3
            if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 4
                yield "            ";
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
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    // line 5
                    yield "            
            <div class=\"prom pl-0 ";
                    // line 6
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 6) != 1)) {
                        yield " pdesactive ";
                    }
                    yield "\" style=\"float:right;\" >
                <div class=\"row\">
                <div class=\"col-lg-8 col-md-7 pt-3 no-gutters\">
                    <p style=\"color: #39c; font-size: 18px; margin-bottom: 0.5rem;\">";
                    // line 9
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["d"], "title", [], "any", false, false, true, 9), "value", [], "any", false, false, true, 9), "html", null, true);
                    yield "</p>
                    <p style=\"color: #ffffff; font-style: italic;\">";
                    // line 10
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["d"], "resumen", [], "any", false, false, true, 10), "html", null, true);
                    yield "</p>
                </div>
                <div class=\"col-2 col-xl-2\">
                    <div class=\"ebtn2\">
                        <div class=\"azul3\">
                            ";
                    // line 15
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["d"], "field_enlace", [], "any", false, false, true, 15), 0, [], "any", false, false, true, 15), "url", [], "any", false, false, true, 15), "external", [], "any", false, false, true, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 16
                        yield "                                ";
                        $context["target"] = "_blank";
                        // line 17
                        yield "                            ";
                    } else {
                        // line 18
                        yield "                                ";
                        $context["target"] = "";
                        // line 19
                        yield "                            ";
                    }
                    yield "    
                            <a href=\"";
                    // line 20
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["d"], "field_enlace", [], "any", false, false, true, 20), 0, [], "any", false, false, true, 20), "url", [], "any", false, false, true, 20), "html", null, true);
                    yield "\" target=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["target"] ?? null), "html", null, true);
                    yield "\"><span>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["d"], "field_enlace", [], "any", false, false, true, 20), 0, [], "any", false, false, true, 20), "title", [], "any", false, false, true, 20)), "html", null, true);
                    yield "</span></a>
                        </div>
                        <div class=\"azul2\"></div>
                    </div>
                </div>
            </div>
            </div>
        ";
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
                unset($context['_seq'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 28
                yield "        ";
            }
            // line 29
            yield "</div>
";
            return; yield;
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield (string) Twig\Extension\CoreExtension::spaceless($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $_v0, "html", null, true));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data", "loop"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/promcortas.html.twig";
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
        return array (  144 => 1,  139 => 29,  136 => 28,  109 => 20,  104 => 19,  101 => 18,  98 => 17,  95 => 16,  93 => 15,  85 => 10,  81 => 9,  73 => 6,  70 => 5,  52 => 4,  50 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/promcortas.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/promcortas.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 3, "for" => 4, "set" => 16];
        static $filters = ["escape" => 9, "upper" => 20, "spaceless" => 1];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "for", 3 => "set"],
                [0 => "escape", 1 => "upper", 2 => "spaceless"],
                [],
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
