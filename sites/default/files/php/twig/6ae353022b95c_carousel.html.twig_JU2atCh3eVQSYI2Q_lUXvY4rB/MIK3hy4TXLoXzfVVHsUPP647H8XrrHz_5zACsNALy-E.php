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

/* modules/custom/etecsa_module/templates/carousel.html.twig */
class __TwigTemplate_9c5be763a05094bd3b2b41e9f7d835ac extends Template
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
            yield "\t";
            if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 3
                yield "\t\t<div class=\"d-none d-sm-none d-md-block d-lg-block\">
\t\t\t<div id=\"carousel-d\" class=\"carousel slide animated\" data-ride=\"carousel\">
\t\t\t\t<!-- Indicators -->
\t\t\t\t<ul class=\"carousel-indicators\">
\t\t\t\t\t";
                // line 7
                $context["indicator"] = 0;
                // line 8
                yield "\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["car_image"]) {
                    // line 9
                    yield "\t\t\t\t\t\t";
                    if ((($context["indicator"] ?? null) == 0)) {
                        // line 10
                        yield "\t\t\t\t\t\t\t<li data-target=\"#carousel-d\" data-slide-to=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["indicator"] ?? null), "html", null, true);
                        yield "\" class=\"active\"></li>
\t\t\t\t\t\t";
                    } else {
                        // line 12
                        yield "\t\t\t\t\t\t\t<li data-target=\"#carousel-d\" data-slide-to=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["indicator"] ?? null), "html", null, true);
                        yield "\"></li>
\t\t\t\t\t\t";
                    }
                    // line 14
                    yield "\t\t\t\t\t\t";
                    $context["indicator"] = (($context["indicator"] ?? null) + 1);
                    // line 15
                    yield "\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['car_image'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 16
                yield "\t\t\t\t</ul>
\t\t\t\t<!-- Indicators -->

\t\t\t\t<!-- The slideshow -->
\t\t\t\t<div class=\"carousel-inner\" role=\"listbox\">
\t\t\t\t\t";
                // line 21
                $context["first"] = 0;
                // line 22
                yield "\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["car_image"]) {
                    // line 23
                    yield "\t\t\t\t\t\t";
                    if ((($context["first"] ?? null) == 0)) {
                        // line 24
                        yield "\t\t\t\t\t\t\t<div class=\"carousel-item active\">
\t\t\t\t\t\t\t\t";
                        // line 25
                        $context["first"] = 1;
                        // line 26
                        yield "\t\t\t\t\t\t\t";
                    } else {
                        // line 27
                        yield "\t\t\t\t\t\t\t\t<div class=\"carousel-item\">
\t\t\t\t\t\t\t\t";
                    }
                    // line 29
                    yield "\t\t\t\t\t\t\t\t<div style=\"background: url(\x27";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_imagen", [], "any", false, false, true, 29), "entity", [], "any", false, false, true, 29), "uri", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29)), "html", null, true);
                    yield "\x27);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                        background-position: center; background-repeat: no-repeat; background-size: cover; width: 100%;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                        height: 412px;\"></div>
\t\t\t\t\t\t\t\t<div class=\"mipromocion\">
\t\t\t\t\t\t\t\t\t<div class=\"mipromocion-contenido\">
\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 34
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_imagen_overview_svg", [], "any", false, false, true, 34), "entity", [], "any", false, false, true, 34), "uri", [], "any", false, false, true, 34), "value", [], "any", false, false, true, 34)), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 35
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_enlace", [], "any", false, false, true, 35)) > 0)) {
                        // line 36
                        yield "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_enlace", [], "any", false, false, true, 36), 0, [], "any", false, false, true, 36), "url", [], "any", false, false, true, 36), "html", null, true);
                        yield "\" class=\"btn\" style=\"color: ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_color", [], "any", false, false, true, 36), "value", [], "any", false, false, true, 36), "html", null, true);
                        yield "; text-transform: uppercase;\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_enlace", [], "any", false, false, true, 36), 0, [], "any", false, false, true, 36), "title", [], "any", false, false, true, 36), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-right\"></i>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 40
                    yield "\t\t\t\t\t\t\t\t\t\t";
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_en_prot", [], "any", false, false, true, 40)) > 0)) {
                        // line 41
                        yield "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_en_prot", [], "any", false, false, true, 41), 0, [], "any", false, false, true, 41), "url", [], "any", false, false, true, 41), "html", null, true);
                        yield "\" class=\"btn comprar\" style=\"text-transform: uppercase; color: white; background-color: ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_color", [], "any", false, false, true, 41), "value", [], "any", false, false, true, 41), "html", null, true);
                        yield ";\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_en_prot", [], "any", false, false, true, 41), 0, [], "any", false, false, true, 41), "title", [], "any", false, false, true, 41), "html", null, true);
                        yield "</a>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 43
                    yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['car_image'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 47
                yield "\t\t\t\t\t</div>
\t\t\t\t\t<!-- Left and right controls -->
\t\t\t\t\t<a class=\"carousel-control-prev\" href=\"#carousel-d\" data-slide=\"prev\">
\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t<i class=\"fa fa-angle-left\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t</a>
\t\t\t\t\t<a class=\"carousel-control-next\" href=\"#carousel-d\" data-slide=\"next\">
\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t<i class=\"fa fa-angle-right\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"d-block d-xs-block d-sm-block d-md-none d-lg-none\">
\t\t\t<div id=\"carousel-dm\" class=\"owl-carousel slide\">
\t\t\t\t";
                // line 64
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
                foreach ($context['_seq'] as $context["_key"] => $context["car_image"]) {
                    // line 65
                    yield "\t\t\t\t\t<div class=\"";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield " active ";
                    }
                    yield "\">
\t\t\t\t\t\t<img src=\"";
                    // line 66
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_image", [], "any", false, false, true, 66), "entity", [], "any", false, false, true, 66), "uri", [], "any", false, false, true, 66), "value", [], "any", false, false, true, 66)), "html", null, true);
                    yield "\">
\t\t\t\t\t\t<div class=\"mipromocion-movil\">
\t\t\t\t\t\t\t<div class=\"mipromocion-contenido-movil\">
\t\t\t\t\t\t\t\t<img src=\"";
                    // line 69
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_imagen_overview_svg", [], "any", false, false, true, 69), "entity", [], "any", false, false, true, 69), "uri", [], "any", false, false, true, 69), "value", [], "any", false, false, true, 69)), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t<div class=\"mipromocion-contenido-movil-botones\">
\t\t\t\t\t\t\t\t\t";
                    // line 71
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_enlace", [], "any", false, false, true, 71)) > 0)) {
                        // line 72
                        yield "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_enlace", [], "any", false, false, true, 72), 0, [], "any", false, false, true, 72), "url", [], "any", false, false, true, 72), "html", null, true);
                        yield "\" class=\"btn\" style=\"color: ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_color", [], "any", false, false, true, 72), "value", [], "any", false, false, true, 72), "html", null, true);
                        yield "; text-transform: uppercase; font-size: 10px;\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_enlace", [], "any", false, false, true, 72), 0, [], "any", false, false, true, 72), "title", [], "any", false, false, true, 72), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-right\"></i>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 76
                    yield "\t\t\t\t\t\t\t\t\t";
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_en_prot", [], "any", false, false, true, 76)) > 0)) {
                        // line 77
                        yield "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_en_prot", [], "any", false, false, true, 77), 0, [], "any", false, false, true, 77), "url", [], "any", false, false, true, 77), "html", null, true);
                        yield "\" class=\"btn comprar-mv\" style=\"background-color: ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_color", [], "any", false, false, true, 77), "value", [], "any", false, false, true, 77), "html", null, true);
                        yield ";\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["car_image"], "field_en_prot", [], "any", false, false, true, 77), 0, [], "any", false, false, true, 77), "title", [], "any", false, false, true, 77), "html", null, true);
                        yield "</a>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 79
                    yield "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
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
                unset($context['_seq'], $context['_key'], $context['car_image'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 84
                yield "\t\t\t</div>

\t\t";
            }
            // line 87
            yield "\t";
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
        return "modules/custom/etecsa_module/templates/carousel.html.twig";
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
        return array (  276 => 1,  272 => 87,  267 => 84,  248 => 79,  238 => 77,  235 => 76,  223 => 72,  221 => 71,  216 => 69,  210 => 66,  203 => 65,  186 => 64,  167 => 47,  157 => 43,  147 => 41,  144 => 40,  132 => 36,  130 => 35,  126 => 34,  117 => 29,  113 => 27,  110 => 26,  108 => 25,  105 => 24,  102 => 23,  97 => 22,  95 => 21,  88 => 16,  81 => 15,  78 => 14,  72 => 12,  66 => 10,  63 => 9,  58 => 8,  56 => 7,  50 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/carousel.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/carousel.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2, "set" => 7, "for" => 8];
        static $filters = ["escape" => 10, "length" => 35, "spaceless" => 1];
        static $functions = ["file_url" => 29];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "escape", 1 => "length", 2 => "spaceless"],
                [0 => "file_url"],
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
