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

/* modules/custom/etecsa_module/templates/equipos-accesorios.html.twig */
class __TwigTemplate_6f07cd1ff945f068ebd19d280a2c56e1 extends Template
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
            if ((($context["language"] ?? null) == "es")) {
                // line 3
                yield "\t";
                $context["text"] = "/equipos-accesorios";
                // line 4
                yield "\t";
                $context["param"] = "/todos";
            } else {
                // line 6
                yield "\t";
                $context["text"] = "/equipment-accessories";
                // line 7
                yield "\t";
                $context["param"] = "/all";
            }
            // line 9
            yield "
";
            // line 10
            if ((($context["cliente"] ?? null) == "inicio")) {
                yield "\t\t\t
\t";
                // line 11
                $context["cpath"] = (((($context["base_path"] ?? null) . ($context["language"] ?? null)) . ($context["text"] ?? null)) . ($context["param"] ?? null));
            } else {
                // line 13
                yield "\t";
                $context["cpath"] = (((((($context["base_path"] ?? null) . ($context["language"] ?? null)) . "/") . ($context["cliente"] ?? null)) . ($context["text"] ?? null)) . ($context["param"] ?? null));
            }
            // line 15
            yield "
";
            // line 16
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["data"] ?? null)) > 0)) {
                // line 17
                yield "<div class=\"container ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["visibility"] ?? null), "html", null, true);
                yield "\" id=\"block-equipos-accesorios-persona\">
\t<div class=\"row justify-content-center\">
\t\t<div class=\"col-md-12 text-center\">
\t\t\t<h1 class=\"block-title-custom\">";
                // line 20
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("EQUIPMENT AND ACCESSORIES ")), "html", null, true);
                yield "</h1>
\t\t\t<p class=\"block-subtitle-custom\">";
                // line 21
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Available in our offices"));
                yield "</p>
\t\t</div>

\t\t<div class=\"sesion-equipos-accesorios col-12\">

\t\t\t";
                // line 27
                yield "\t\t\t<ul class=\"nav nav-tabs equipos-accesorios d-none d-md-flex\" id=\"myTab\" role=\"tablist\">
\t\t\t\t";
                // line 28
                $context["cont"] = 1;
                // line 29
                yield "\t\t\t\t";
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
                    // line 30
                    yield "\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link ";
                    // line 31
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("")));
                    yield "\" 
\t\t\t\t\t\t   data-toggle=\"tab\" 
\t\t\t\t\t\t   href=\"#tabeq";
                    // line 33
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cont"] ?? null), "html", null, true);
                    yield "\" 
\t\t\t\t\t\t   role=\"tabpanel\">
\t\t\t\t\t\t   ";
                    // line 35
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["keys"], "html", null, true);
                    yield "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t";
                    // line 38
                    $context["cont"] = (($context["cont"] ?? null) + 1);
                    // line 39
                    yield "\t\t\t\t";
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
                // line 40
                yield "
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" id=\"todos-tab\" href=\"";
                // line 42
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
                yield "\">
\t\t\t\t\t\t";
                // line 43
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("all")), "html", null, true);
                yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t</ul>

\t\t\t";
                // line 49
                yield "\t\t\t<div class=\"tab-content d-none d-md-block\" id=\"myTabContent\">
\t\t\t\t";
                // line 50
                $context["cont"] = 1;
                // line 51
                yield "\t\t\t\t";
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
                    // line 52
                    yield "\t\t\t\t\t<div class=\"tab-pane fade show ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("")));
                    yield "\" 
\t\t\t\t\t\t id=\"tabeq";
                    // line 53
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cont"] ?? null), "html", null, true);
                    yield "\" 
\t\t\t\t\t\t role=\"tabpanel\">

\t\t\t\t\t\t";
                    // line 56
                    $context["total"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["item"]);
                    // line 57
                    yield "
\t\t\t\t\t\t";
                    // line 59
                    yield "\t\t\t\t\t\t";
                    if ((($context["total"] ?? null) > 4)) {
                        // line 60
                        yield "\t\t\t\t\t\t\t<div id=\"carousel-eq-";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cont"] ?? null), "html", null, true);
                        yield "\" class=\"owl-carousel owl-carousel-eq mt-5\">
\t\t\t\t\t\t\t\t";
                        // line 61
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable($context["item"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["eq"]) {
                            // line 62
                            yield "\t\t\t\t\t\t\t\t\t<div class=\"card text-center equipos-a\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body-equipos\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 64
                            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_nuevo", [], "any", false, false, true, 64), "value", [], "any", false, false, true, 64) == 1)) {
                                // line 65
                                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"nuevo\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                                // line 66
                                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("New")), "html", null, true);
                                yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 69
                            yield "\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"eq-ratio\" src=\"";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_image", [], "any", false, false, true, 69), "entity", [], "any", false, false, true, 69), "uri", [], "any", false, false, true, 69), "value", [], "any", false, false, true, 69)), "html", null, true);
                            yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title-marca\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                            // line 71
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "marca", [], "any", false, false, true, 71), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title-modelo\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                            // line 74
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "modelo", [], "any", false, false, true, 74), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"sub\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"precio\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"monto\">";
                            // line 78
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_precio", [], "any", false, false, true, 78), "value", [], "any", false, false, true, 78), "html", null, true);
                            yield " </span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"moneda\"> ";
                            // line 79
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_moneda", [], "any", false, false, true, 79), "value", [], "any", false, false, true, 79)), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"ebtn\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"blanco button--aylen\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            // line 84
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "nid", [], "any", false, false, true, 84), "value", [], "any", false, false, true, 84)]), "html", null, true);
                            yield "\">";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("See details")), "html", null, true);
                            yield "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"azul\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['eq'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent);
                        $context += $_parent;
                        // line 90
                        yield "\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
                        // line 93
                        yield "\t\t\t\t\t\t";
                    } else {
                        // line 94
                        yield "
\t\t\t\t\t\t\t";
                        // line 96
                        yield "\t\t\t\t\t\t\t";
                        if ((($context["total"] ?? null) == 6)) {
                            // line 97
                            yield "\t\t\t\t\t\t\t\t";
                            $context["col"] = 12;
                            // line 98
                            yield "\t\t\t\t\t\t\t";
                        } elseif ((($context["total"] ?? null) == 2)) {
                            // line 99
                            yield "\t\t\t\t\t\t\t\t";
                            $context["col"] = 6;
                            // line 100
                            yield "\t\t\t\t\t\t\t";
                        } elseif ((($context["total"] ?? null) == 3)) {
                            // line 101
                            yield "\t\t\t\t\t\t\t\t";
                            $context["col"] = 4;
                            // line 102
                            yield "\t\t\t\t\t\t\t";
                        } else {
                            // line 103
                            yield "\t\t\t\t\t\t\t\t";
                            $context["col"] = 3;
                            // line 104
                            yield "\t\t\t\t\t\t\t";
                        }
                        // line 105
                        yield "
\t\t\t\t\t\t\t<div class=\"row mt-5 justify-content-center\">
\t\t\t\t\t\t\t\t";
                        // line 107
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable($context["item"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["eq"]) {
                            // line 108
                            yield "\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["col"] ?? null), "html", null, true);
                            yield " mb-4 d-flex\">
\t\t\t\t\t\t\t\t\t\t<div class=\"text-center equipos-a w-100\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body-equipos\">

\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 112
                            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_nuevo", [], "any", false, false, true, 112), "value", [], "any", false, false, true, 112) == 1)) {
                                // line 113
                                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"nuevo\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                                // line 114
                                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("New")), "html", null, true);
                                yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 117
                            yield "
\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"eq-ratio\" src=\"";
                            // line 118
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_image", [], "any", false, false, true, 118), "entity", [], "any", false, false, true, 118), "uri", [], "any", false, false, true, 118), "value", [], "any", false, false, true, 118)), "html", null, true);
                            yield "\">

\t\t\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title-marca\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                            // line 121
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "marca", [], "any", false, false, true, 121), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</h5>

\t\t\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title-modelo\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                            // line 125
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "modelo", [], "any", false, false, true, 125), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</h5>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"sub\"></div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"precio\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"monto\">";
                            // line 131
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_precio", [], "any", false, false, true, 131), "value", [], "any", false, false, true, 131), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"moneda\">";
                            // line 132
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_moneda", [], "any", false, false, true, 132), "value", [], "any", false, false, true, 132)), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"ebtn\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"blanco button--aylen\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            // line 138
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "nid", [], "any", false, false, true, 138), "value", [], "any", false, false, true, 138)]), "html", null, true);
                            yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 139
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("See details")), "html", null, true);
                            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"azul\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['eq'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent);
                        $context += $_parent;
                        // line 147
                        yield "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 149
                    yield "
\t\t\t\t\t</div>
\t\t\t\t\t";
                    // line 151
                    $context["cont"] = (($context["cont"] ?? null) + 1);
                    // line 152
                    yield "\t\t\t\t";
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
                // line 153
                yield "\t\t\t</div>

\t\t\t";
                // line 156
                yield "\t\t\t<div class=\"d-block d-md-none\">
\t\t\t\t<div id=\"carousel-eq-todos\" class=\"owl-carousel owl-carousel-todos mt-3\">
\t\t\t\t\t";
                // line 158
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["keys"] => $context["item"]) {
                    // line 159
                    yield "\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable($context["item"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["eq"]) {
                        // line 160
                        yield "\t\t\t\t\t\t\t<div class=\"card text-center equipos-a\">
\t\t\t\t\t\t\t\t<div class=\"card-body-equipos\">

\t\t\t\t\t\t\t\t\t";
                        // line 163
                        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_nuevo", [], "any", false, false, true, 163), "value", [], "any", false, false, true, 163) == 1)) {
                            // line 164
                            yield "\t\t\t\t\t\t\t\t\t\t<div class=\"nuevo\">
\t\t\t\t\t\t\t\t\t\t\t<span>";
                            // line 165
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("New")), "html", null, true);
                            yield "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 168
                        yield "
\t\t\t\t\t\t\t\t\t<img class=\"eq-ratio\" src=\"";
                        // line 169
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_image", [], "any", false, false, true, 169), "entity", [], "any", false, false, true, 169), "uri", [], "any", false, false, true, 169), "value", [], "any", false, false, true, 169)), "html", null, true);
                        yield "\">

\t\t\t\t\t\t\t\t\t<h5 class=\"card-title-marca\">
\t\t\t\t\t\t\t\t\t\t<span>";
                        // line 172
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "marca", [], "any", false, false, true, 172), "html", null, true);
                        yield "</span>
\t\t\t\t\t\t\t\t\t</h5>

\t\t\t\t\t\t\t\t\t<h5 class=\"card-title-modelo\">
\t\t\t\t\t\t\t\t\t\t<span>";
                        // line 176
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "modelo", [], "any", false, false, true, 176), "html", null, true);
                        yield "</span>
\t\t\t\t\t\t\t\t\t</h5>

\t\t\t\t\t\t\t\t\t<div class=\"sub\"></div>

\t\t\t\t\t\t\t\t\t<div class=\"precio\">
\t\t\t\t\t\t\t\t\t\t<span class=\"monto\">";
                        // line 182
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_precio", [], "any", false, false, true, 182), "value", [], "any", false, false, true, 182), "html", null, true);
                        yield "</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"moneda\">";
                        // line 183
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "field_moneda", [], "any", false, false, true, 183), "value", [], "any", false, false, true, 183)), "html", null, true);
                        yield "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ebtn\">
\t\t\t\t\t\t\t\t\t<div class=\"blanco button--aylen\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 189
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["eq"], "nid", [], "any", false, false, true, 189), "value", [], "any", false, false, true, 189)]), "html", null, true);
                        yield "\">
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 190
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("See details")), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"azul\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['eq'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent);
                    $context += $_parent;
                    // line 197
                    yield "\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['keys'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 198
                yield "\t\t\t\t</div>

\t\t\t\t<div class=\"text-align-center cmb\">
\t\t\t\t\t<a class=\"moreOport-link\" href=\"";
                // line 201
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
                yield "\">
\t\t\t\t\t\t";
                // line 202
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("all")), "html", null, true);
                yield " 
\t\t\t\t\t\t<i class=\"flaticon-next-1 more\"></i>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t</div>
\t</div>
</div>
";
            }
            return; yield;
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield (string) Twig\Extension\CoreExtension::spaceless($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $_v0, "html", null, true));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["language", "cliente", "base_path", "data", "visibility", "loop"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/equipos-accesorios.html.twig";
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
        return array (  554 => 1,  539 => 202,  535 => 201,  530 => 198,  523 => 197,  509 => 190,  505 => 189,  496 => 183,  492 => 182,  483 => 176,  476 => 172,  470 => 169,  467 => 168,  461 => 165,  458 => 164,  456 => 163,  451 => 160,  446 => 159,  442 => 158,  438 => 156,  434 => 153,  419 => 152,  417 => 151,  413 => 149,  409 => 147,  394 => 139,  390 => 138,  381 => 132,  377 => 131,  368 => 125,  361 => 121,  355 => 118,  352 => 117,  346 => 114,  343 => 113,  341 => 112,  333 => 108,  329 => 107,  325 => 105,  322 => 104,  319 => 103,  316 => 102,  313 => 101,  310 => 100,  307 => 99,  304 => 98,  301 => 97,  298 => 96,  295 => 94,  292 => 93,  288 => 90,  273 => 84,  265 => 79,  261 => 78,  254 => 74,  248 => 71,  242 => 69,  236 => 66,  233 => 65,  231 => 64,  227 => 62,  223 => 61,  218 => 60,  215 => 59,  212 => 57,  210 => 56,  204 => 53,  199 => 52,  181 => 51,  179 => 50,  176 => 49,  168 => 43,  164 => 42,  160 => 40,  145 => 39,  143 => 38,  137 => 35,  132 => 33,  127 => 31,  124 => 30,  106 => 29,  104 => 28,  101 => 27,  93 => 21,  89 => 20,  82 => 17,  80 => 16,  77 => 15,  73 => 13,  70 => 11,  66 => 10,  63 => 9,  59 => 7,  56 => 6,  52 => 4,  49 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/equipos-accesorios.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/equipos-accesorios.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2, "set" => 3, "for" => 29];
        static $filters = ["length" => 16, "escape" => 17, "upper" => 20, "t" => 20, "spaceless" => 1];
        static $functions = ["file_url" => 69, "path" => 84];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "length", 1 => "escape", 2 => "upper", 3 => "t", 4 => "spaceless"],
                [0 => "file_url", 1 => "path"],
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
