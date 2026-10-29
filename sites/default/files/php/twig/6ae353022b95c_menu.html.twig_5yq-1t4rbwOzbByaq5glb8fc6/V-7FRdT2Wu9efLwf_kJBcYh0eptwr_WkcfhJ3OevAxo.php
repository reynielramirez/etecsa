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

/* themes/contrib/classy/templates/navigation/menu.html.twig */
class __TwigTemplate_2778fa2233db5d81dee3bb4457c94556 extends Template
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
        // line 21
        $macros["menus"] = $this->macros["menus"] = $this->getMacroNamespace();
        // line 22
        yield "
";
        // line 27
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($macros["menus"] ?? $this->throwUninitializedMacroNamespace(27))->call("menu_links", [($context["items"] ?? null), ($context["attributes"] ?? null), 0], $context, 27, $this->source));
        yield "

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "items", "attributes", "menu_level"]);        return; yield;
    }

    protected function loadDeclaredMacros(): array
    {
        return [
            "menu_links" => new \Twig\TwigMacro("menu_links", function ($items = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup {
                // line 29
                $macros = $this->macros;
                $context = [
                    "items" => $items,
                    "attributes" => $attributes,
                    "menu_level" => $menu_level,
                    "varargs" => $varargs,
                ] + $this->env->getGlobals();

                $blocks = [];

                return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 30
                    yield "  ";
                    $context["primary_nav_level"] = ("menu--level-" . (($context["menu_level"] ?? null) + 1));
                    // line 31
                    yield "  ";
                    $macros["menus"] = $this->getMacroNamespace();
                    // line 32
                    yield "  ";
                    if ((($tmp = ($context["items"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 33
                        yield "    ";
                        if ((($context["menu_level"] ?? null) == 0)) {
                            // line 34
                            yield "      <ul";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["menu", ($context["primary_nav_level"] ?? null)], "method", false, false, true, 34), "html", null, true);
                            yield ">
    ";
                        } else {
                            // line 36
                            yield "      <ul class=\"menu\">
    ";
                        }
                        // line 38
                        yield "    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 39
                            yield "      ";
                            // line 40
                            $context["classes"] = ["menu-item", (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                             // line 42
$context["item"], "is_expanded", [], "any", false, false, true, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("menu-item--expanded") : ("")), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                             // line 43
$context["item"], "is_collapsed", [], "any", false, false, true, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("menu-item--collapsed") : ("")), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                             // line 44
$context["item"], "in_active_trail", [], "any", false, false, true, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("menu-item--active-trail") : (""))];
                            // line 47
                            yield "      <li";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 47), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 47), "html", null, true);
                            yield ">
        ";
                            // line 48
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 48), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 48)), "html", null, true);
                            yield "
        ";
                            // line 49
                            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                // line 50
                                yield "          ";
                                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($macros["menus"] ?? $this->throwUninitializedMacroNamespace(50))->call("menu_links", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 50), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)], $context, 50, $this->source));
                                yield "
        ";
                            }
                            // line 52
                            yield "      </li>
    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent);
                        $context += $_parent;
                        // line 54
                        yield "    </ul>
  ";
                    }
                    return; yield;
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
            }, ["items" => false, "attributes" => false, "menu_level" => false], false),
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/classy/templates/navigation/menu.html.twig";
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
        return array (  134 => 54,  126 => 52,  120 => 50,  118 => 49,  114 => 48,  109 => 47,  107 => 44,  106 => 43,  105 => 42,  104 => 40,  102 => 39,  97 => 38,  93 => 36,  87 => 34,  84 => 33,  81 => 32,  78 => 31,  75 => 30,  63 => 29,  50 => 27,  47 => 22,  45 => 21,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/classy/templates/navigation/menu.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/themes/contrib/classy/templates/navigation/menu.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 21, "macro" => 29, "set" => 30, "if" => 32, "for" => 38];
        static $filters = ["escape" => 34];
        static $functions = ["link" => 48];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "import", 1 => "macro", 2 => "set", 3 => "if", 4 => "for"],
                [0 => "escape"],
                [0 => "link"],
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
