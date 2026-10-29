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

/* modules/custom/etecsa_persona_module/templates/recargas-persona.html.twig */
class __TwigTemplate_30538601c488586c79ac7323fb2e53c7 extends Template
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
            yield "  ";
            if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 3
                yield "    <div class=\"sesion-recargas ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["visibility"] ?? null), "html", null, true);
                yield "\">
      <div class=\"container white\">
          <div class=\"row\">
              <div class=\"col-md-12 section-heading pb-2\">
              <h1>";
                // line 7
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Online Top-ups"));
                yield "</h1>
            </div>
          </div>
        <div class= \"mt-2 mb-2 pb-2\">
          <div class=\"row no-gutters\">
            ";
                // line 12
                $context["count"] = 0;
                // line 13
                yield "            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                    // line 14
                    yield "              ";
                    if ((($context["count"] ?? null) == 0)) {
                        // line 15
                        yield "                <div class=\"col-md-4\">
              ";
                    }
                    // line 17
                    yield "              <div class=\"enlace-aux mb-3 pb-2\">
                <div class=\"d-flex align-items-center\">
                  <img class=\"img-fluid\" src=\"";
                    // line 19
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 19), "entity", [], "any", false, false, true, 19), "uri", [], "any", false, false, true, 19), "value", [], "any", false, false, true, 19)), "html", null, true);
                    yield "\"
                       alt=\"";
                    // line 20
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 20), "alt", [], "any", false, false, true, 20), "html", null, true);
                    yield "\"/>
                  ";
                    // line 21
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 21), 0, [], "any", false, false, true, 21), "url", [], "any", false, false, true, 21), "external", [], "any", false, false, true, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 22
                        yield "                    ";
                        $context["target"] = "_blank";
                        // line 23
                        yield "                  ";
                    } else {
                        // line 24
                        yield "                       ";
                        $context["target"] = "";
                        // line 25
                        yield "                  ";
                    }
                    yield "        
                  
                  <a class=\"recarga-title pl-1\" href=\"";
                    // line 27
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 27), 0, [], "any", false, false, true, 27), "url", [], "any", false, false, true, 27), "html", null, true);
                    yield "\"
                     target=\"";
                    // line 28
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["target"] ?? null), "html", null, true);
                    yield "\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_enlace"], "method", false, false, true, 28), 0, [], "any", false, false, true, 28), "title", [], "any", false, false, true, 28), "html", null, true);
                    yield "</a>
                </div>
              </div>
              ";
                    // line 31
                    if ((($context["count"] ?? null) == 2)) {
                        // line 32
                        yield "                </div>
                ";
                        // line 33
                        $context["count"] = 0;
                        // line 34
                        yield "              ";
                    } else {
                        // line 35
                        yield "                ";
                        $context["count"] = (($context["count"] ?? null) + 1);
                        // line 36
                        yield "              ";
                    }
                    // line 37
                    yield "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['res'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 38
                yield "          </div>
        </div>
      </div>
    </div>
  ";
            }
            return; yield;
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield (string) Twig\Extension\CoreExtension::spaceless($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $_v0, "html", null, true));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data", "visibility"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_persona_module/templates/recargas-persona.html.twig";
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
        return array (  153 => 1,  144 => 38,  137 => 37,  134 => 36,  131 => 35,  128 => 34,  126 => 33,  123 => 32,  121 => 31,  113 => 28,  109 => 27,  103 => 25,  100 => 24,  97 => 23,  94 => 22,  92 => 21,  88 => 20,  84 => 19,  80 => 17,  76 => 15,  73 => 14,  68 => 13,  66 => 12,  58 => 7,  50 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_persona_module/templates/recargas-persona.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_persona_module/templates/recargas-persona.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2, "set" => 12, "for" => 13];
        static $filters = ["escape" => 3, "t" => 7, "spaceless" => 1];
        static $functions = ["file_url" => 19];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "escape", 1 => "t", 2 => "spaceless"],
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
