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

/* modules/contrib/superfish/templates/superfish-menu-items.html.twig */
class __TwigTemplate_e5625b1fd091b1d95ae60e2699821ee6 extends Template
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
        yield "
";
        // line 22
        $context["classes"] = [];
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["menu_items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 24
            yield "
  ";
            // line 25
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, true, 25))) {
                // line 26
                yield "    ";
                $context["item_class"] = (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "item_class", [], "any", false, false, true, 26) . " menuparent");
                // line 27
                yield "    ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_column", [], "any", false, false, true, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 28
                    yield "      ";
                    $context["item_class"] = (($context["item_class"] ?? null) . " sf-multicolumn-column");
                    // line 29
                    yield "    ";
                }
                // line 30
                yield "  ";
            }
            // line 31
            yield "
  <li";
            // line 32
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 32), "html", null, true);
            yield " role=\"none\">
    ";
            // line 33
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_column", [], "any", false, false, true, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 34
                yield "    <div class=\"sf-multicolumn-column\">
    ";
            }
            // line 36
            yield "
    ";
            // line 37
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, true, 37))) {
                // line 38
                yield "      ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link_menuparent", [], "any", false, false, true, 38), ["#attributes" => ["role" => "menuitem", "aria-haspopup" => "menu", "aria-expanded" => "false"]]), "html", null, true);
                yield "
    ";
            } else {
                // line 40
                yield "      ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 40), ["#attributes" => ["role" => "menuitem"]]), "html", null, true);
                yield "
    ";
            }
            // line 42
            yield "
    ";
            // line 43
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_wrapper", [], "any", false, false, true, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 44
                yield "      <ul class=\"sf-multicolumn\" role=\"menu\">
      <li class=\"sf-multicolumn-wrapper ";
                // line 45
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "item_class", [], "any", false, false, true, 45), "html", null, true);
                yield "\" role=\"none\">
    ";
            }
            // line 47
            yield "
    ";
            // line 48
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, true, 48))) {
                // line 49
                yield "
      ";
                // line 50
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_content", [], "any", false, false, true, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 51
                    yield "        <ol role=\"menu\">
      ";
                } else {
                    // line 53
                    yield "        <ul role=\"menu\">
      ";
                }
                // line 55
                yield "
      ";
                // line 56
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, true, 56), "html", null, true);
                yield "

      ";
                // line 58
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_content", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 59
                    yield "        </ol>
      ";
                } else {
                    // line 61
                    yield "        </ul>
      ";
                }
                // line 63
                yield "
    ";
            }
            // line 65
            yield "
    ";
            // line 66
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_wrapper", [], "any", false, false, true, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                yield "      </li>
      </ul>
    ";
            }
            // line 70
            yield "
    ";
            // line 71
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "multicolumn_column", [], "any", false, false, true, 71)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 72
                yield "    </div>
    ";
            }
            // line 74
            yield "  </li>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["menu_items"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/superfish/templates/superfish-menu-items.html.twig";
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
        return array (  176 => 74,  172 => 72,  170 => 71,  167 => 70,  162 => 67,  160 => 66,  157 => 65,  153 => 63,  149 => 61,  145 => 59,  143 => 58,  138 => 56,  135 => 55,  131 => 53,  127 => 51,  125 => 50,  122 => 49,  120 => 48,  117 => 47,  112 => 45,  109 => 44,  107 => 43,  104 => 42,  98 => 40,  92 => 38,  90 => 37,  87 => 36,  83 => 34,  81 => 33,  77 => 32,  74 => 31,  71 => 30,  68 => 29,  65 => 28,  62 => 27,  59 => 26,  57 => 25,  54 => 24,  50 => 23,  48 => 22,  45 => 21,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/superfish/templates/superfish-menu-items.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/contrib/superfish/templates/superfish-menu-items.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 22, "for" => 23, "if" => 25];
        static $filters = ["escape" => 32, "merge" => 38];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "for", 2 => "if"],
                [0 => "escape", 1 => "merge"],
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
