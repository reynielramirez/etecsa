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

/* modules/custom/etecsa_persona_module/templates/utilidades-persona.html.twig */
class __TwigTemplate_ffd7b6ceda0f3fe7463271954f885f00 extends Template
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
            if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 3
                yield "<div class=\"color-background ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["visibility"] ?? null), "html", null, true);
                yield "\">
  <div class=\"container\">
    <div class=\"section-heading pb-3 pt-3\">
        <h1 class=\"text-white\">";
                // line 6
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Utilities and Applications"));
                yield "</h1>
    </div>
    <div class=\"container pt-2 pb-2 d-none d-xs-none d-sm-none d-md-block d-lg-block\">
      <div class=\"row \">
      ";
                // line 10
                $context["count"] = 0;
                // line 11
                yield "        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                    // line 12
                    yield "          ";
                    if ((($context["count"] ?? null) == 0)) {
                        // line 13
                        yield "            <div class=\"col-md-4 utilidad-items mb-5\">
              ";
                    }
                    // line 15
                    yield "            ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 15), 0, [], "any", false, false, true, 15), "url", [], "any", false, false, true, 15), "external", [], "any", false, false, true, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 16
                        yield "              ";
                        $context["target"] = "_blank";
                        // line 17
                        yield "            ";
                    } else {
                        // line 18
                        yield "                 ";
                        $context["target"] = "";
                        // line 19
                        yield "            ";
                    }
                    yield " 
             <a  href=\"";
                    // line 20
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 20), 0, [], "any", false, false, true, 20), "url", [], "any", false, false, true, 20), "html", null, true);
                    yield "\" target=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["target"] ?? null), "html", null, true);
                    yield "\" title=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 20), 0, [], "any", false, false, true, 20), "title", [], "any", false, false, true, 20), "html", null, true);
                    yield "\">
              <div class=\"d-flex align-item-start enlace-aux mb-2\">
                  <div class=\"pt-1 pr-3\">
                    <img src=\"";
                    // line 23
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 23), "entity", [], "any", false, false, true, 23), "uri", [], "any", false, false, true, 23), "value", [], "any", false, false, true, 23)), "html", null, true);
                    yield "\" alt=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 23), "alt", [], "any", false, false, true, 23), "html", null, true);
                    yield "\"/>
                  </div>
                  <div>
                    <h6 class=\"utilidades-title\">";
                    // line 26
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["title"], "method", false, false, true, 26), "value", [], "any", false, false, true, 26), "html", null, true);
                    yield "</h6>
                    <div class=\"word-break utilidades-descrip fa-fac\">";
                    // line 27
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_descripcion"], "method", false, false, true, 27), "value", [], "any", false, false, true, 27));
                    yield "</div>
                  </div>
              </div>
               </a>  
          ";
                    // line 31
                    if ((($context["count"] ?? null) == 2)) {
                        // line 32
                        yield "            </div>
            ";
                        // line 33
                        $context["count"] = 0;
                        // line 34
                        yield "           ";
                    } else {
                        // line 35
                        yield "          ";
                        $context["count"] = (($context["count"] ?? null) + 1);
                        // line 36
                        yield "          ";
                    }
                    // line 37
                    yield "       
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['res'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 39
                yield "      </div>
    </div>
    <div class=\"d-block d-xs-block d-sm-block d-md-none d-lg-none\">
      <div id=\"carousel-uti-person\" class=\"owl-carousel owl-carousel-uti-person owl-theme\">
        ";
                // line 43
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                    // line 44
                    yield "            <div class=\"utilidad-items\">
              ";
                    // line 45
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 45), 0, [], "any", false, false, true, 45), "url", [], "any", false, false, true, 45), "external", [], "any", false, false, true, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 46
                        yield "                ";
                        $context["target"] = "_blank";
                        // line 47
                        yield "              ";
                    } else {
                        // line 48
                        yield "                ";
                        $context["target"] = "";
                        // line 49
                        yield "              ";
                    }
                    // line 50
                    yield "              <a  href=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 50), 0, [], "any", false, false, true, 50), "url", [], "any", false, false, true, 50), "html", null, true);
                    yield "\" target=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["target"] ?? null), "html", null, true);
                    yield "\" title=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 50), 0, [], "any", false, false, true, 50), "title", [], "any", false, false, true, 50), "html", null, true);
                    yield "\">
                <div class=\"enlace-aux mb-2\">
                    <div class=\"px-2\">
                      <img src=\"";
                    // line 53
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 53), "entity", [], "any", false, false, true, 53), "uri", [], "any", false, false, true, 53), "value", [], "any", false, false, true, 53)), "html", null, true);
                    yield "\" alt=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 53), "alt", [], "any", false, false, true, 53), "html", null, true);
                    yield "\"/>
                    </div>
                    <div>
                      <h6 class=\"utilidades-title\">";
                    // line 56
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["title"], "method", false, false, true, 56), "value", [], "any", false, false, true, 56), "html", null, true);
                    yield "</h6>
                    </div>
                </div>
              </a>
            </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['res'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 62
                yield "      </div>
    </div>
  </div>
</div>
";
            }
            return; yield;
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield (string) Twig\Extension\CoreExtension::spaceless($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $_v0, "html", null, true));
        // line 68
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("etecsa_persona_module/utility-people"), "html", null, true);
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data", "visibility"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_persona_module/templates/utilidades-persona.html.twig";
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
        return array (  217 => 68,  215 => 1,  206 => 62,  193 => 56,  185 => 53,  174 => 50,  171 => 49,  168 => 48,  165 => 47,  162 => 46,  160 => 45,  157 => 44,  153 => 43,  147 => 39,  139 => 37,  136 => 36,  133 => 35,  130 => 34,  128 => 33,  125 => 32,  123 => 31,  116 => 27,  112 => 26,  104 => 23,  94 => 20,  89 => 19,  86 => 18,  83 => 17,  80 => 16,  77 => 15,  73 => 13,  70 => 12,  65 => 11,  63 => 10,  56 => 6,  49 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_persona_module/templates/utilidades-persona.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_persona_module/templates/utilidades-persona.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2, "set" => 10, "for" => 11];
        static $filters = ["escape" => 3, "t" => 6, "raw" => 27, "spaceless" => 1];
        static $functions = ["file_url" => 23, "attach_library" => 68];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "escape", 1 => "t", 2 => "raw", 3 => "spaceless"],
                [0 => "file_url", 1 => "attach_library"],
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
