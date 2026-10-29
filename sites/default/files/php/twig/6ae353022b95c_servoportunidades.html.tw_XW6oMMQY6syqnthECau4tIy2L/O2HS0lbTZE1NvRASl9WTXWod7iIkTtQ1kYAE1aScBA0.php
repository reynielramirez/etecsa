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

/* modules/custom/etecsa_module/templates/servoportunidades.html.twig */
class __TwigTemplate_93997e37b5602b2aa32ddbc00651316f extends Template
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
            yield " 
    ";
            // line 2
            if (((($context["cliente"] ?? null) == "personas") || (($context["cliente"] ?? null) == "people"))) {
                // line 3
                yield "      ";
                $context["cpath"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("etecsa.servoportpersonas");
                // line 4
                yield "    ";
            } else {
                // line 5
                yield "      ";
                $context["cpath"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("etecsa.servoportvisitantes");
                // line 6
                yield "    ";
            }
            // line 7
            yield "  ";
            if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 8
                yield "    <div class=\"sesion-servicios-oportunidades ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["visibility"] ?? null), "html", null, true);
                yield "\">
      <div class=\"container mt-3 mb-3\">
        <div class=\"section-heading\">
          <h1 class=\"title-color\">";
                // line 11
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["titulo"] ?? null), "html", null, true);
                yield "</h1>
        </div>
        <div class=\"d-block d-xs-block d-sm-block d-md-block d-lg-none\">
          <div id=\"carousel-servoport\" class=\"owl-carousel owl-carousel-servoport owl-theme\">
            ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                    // line 16
                    yield "              ";
                    $context["content"] = $context["res"];
                    // line 17
                    yield "              ";
                    if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_clasif_enlace_descrip", [], "any", false, false, true, 17), "value", [], "any", false, false, true, 17) == "descripcion") && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_descripcion", [], "any", false, false, true, 17), "value", [], "any", false, false, true, 17)) > 0))) {
                        // line 18
                        yield "                ";
                        $context["link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "get", ["nid"], "method", false, false, true, 18), "value", [], "any", false, false, true, 18)]);
                        // line 19
                        yield "              ";
                    } elseif (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_clasif_enlace_descrip", [], "any", false, false, true, 19), "value", [], "any", false, false, true, 19) == "enlace") && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_enlace", [], "any", false, false, true, 19), "value", [], "any", false, false, true, 19)) > 0))) {
                        yield "  
                ";
                        // line 20
                        $context["link"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_enlace", [], "any", false, false, true, 20), "uri", [], "any", false, false, true, 20);
                        // line 21
                        yield "              ";
                    }
                    yield " 
              <a href=\"";
                    // line 22
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
                    yield "\" ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["style"] ?? null), "html", null, true);
                    yield ">
                <div class=\"servoport-item\">
                  <div class=\"servoport-img-item\">
                    <img src=\"";
                    // line 25
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 25), "entity", [], "any", false, false, true, 25), "uri", [], "any", false, false, true, 25), "value", [], "any", false, false, true, 25)), "html", null, true);
                    yield "\"
                        alt=\"";
                    // line 26
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 26), "alt", [], "any", false, false, true, 26), "html", null, true);
                    yield "\"/>
                  </div>
                  <div class=\"servoport-text\">
                    <h2 class=\"servoport-title\">";
                    // line 29
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["title"], "method", false, false, true, 29), "value", [], "any", false, false, true, 29), "html", null, true);
                    yield "</h2>
                  </div>
                  <div class=\"sombra pb-4 mb-1\">
                    <h3 class=\"servoport-subtitle\">";
                    // line 32
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_subtitulo"], "method", false, false, true, 32), "value", [], "any", false, false, true, 32), "html", null, true);
                    yield "</h3>
                    <div class=\"servoport-resumen  pl-4 pr-4 word-break\">";
                    // line 33
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_resumen_corto"], "method", false, false, true, 33), "value", [], "any", false, false, true, 33), "html", null, true);
                    yield "</div>
                  </div>
                </div>
              </a>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['res'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 38
                yield "          </div>
        </div>
        <div class=\"d-none d-xs-none d-sm-none d-md-none d-lg-block\">
        <div class=\"row text-center justify-content-center\">
        ";
                // line 42
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                    // line 43
                    yield "          <div class=\"col-4\">   
            ";
                    // line 44
                    $context["content"] = $context["res"];
                    // line 45
                    yield "            ";
                    if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_clasif_enlace_descrip", [], "any", false, false, true, 45), "value", [], "any", false, false, true, 45) == "descripcion") && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_descripcion", [], "any", false, false, true, 45), "value", [], "any", false, false, true, 45)) > 0))) {
                        // line 46
                        yield "              ";
                        $context["link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "get", ["nid"], "method", false, false, true, 46), "value", [], "any", false, false, true, 46)]);
                        // line 47
                        yield "            ";
                    } elseif (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_clasif_enlace_descrip", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47) == "enlace") && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_enlace", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47)) > 0))) {
                        yield "  
              ";
                        // line 48
                        $context["link"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_enlace", [], "any", false, false, true, 48), "uri", [], "any", false, false, true, 48);
                        // line 49
                        yield "            ";
                    }
                    yield " 
            <a href=\"";
                    // line 50
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
                    yield "\" ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["style"] ?? null), "html", null, true);
                    yield ">
              <div class=\"servoport-item\">
                <div class=\"servoport-img-item\">
                  <img src=\"";
                    // line 53
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 53), "entity", [], "any", false, false, true, 53), "uri", [], "any", false, false, true, 53), "value", [], "any", false, false, true, 53)), "html", null, true);
                    yield "\"
                      alt=\"";
                    // line 54
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_image"], "method", false, false, true, 54), "alt", [], "any", false, false, true, 54), "html", null, true);
                    yield "\"/>
                </div>
                <div class=\"servoport-text\">
                  <h2 class=\"servoport-title\">";
                    // line 57
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["title"], "method", false, false, true, 57), "value", [], "any", false, false, true, 57), "html", null, true);
                    yield "</h2>                  
                </div>
                <div class=\"sombra pb-4\">
                  <h3 class=\"servoport-subtitle\">";
                    // line 60
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_subtitulo"], "method", false, false, true, 60), "value", [], "any", false, false, true, 60), "html", null, true);
                    yield "</h3>
                  <div class=\"servoport-resumen mt-2 pl-4 pr-4 word-break\">";
                    // line 61
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "get", ["field_resumen_corto"], "method", false, false, true, 61), "value", [], "any", false, false, true, 61), "html", null, true);
                    yield "</div>
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
                // line 67
                yield "        </div>
        </div>

        <div class=\"text-align-center cmb\">    
          <a class=\"moreOport-link\" href=\"";
                // line 71
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("Read More")), "html", null, true);
                yield "
            <i class=\"flaticon-next-1 more\"></i></a>
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
            ->checkDeprecations($context, ["cliente", "data", "visibility", "titulo", "style"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/servoportunidades.html.twig";
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
        return array (  238 => 1,  225 => 71,  219 => 67,  206 => 61,  202 => 60,  196 => 57,  190 => 54,  186 => 53,  178 => 50,  173 => 49,  171 => 48,  166 => 47,  163 => 46,  160 => 45,  158 => 44,  155 => 43,  151 => 42,  145 => 38,  133 => 33,  129 => 32,  123 => 29,  117 => 26,  113 => 25,  105 => 22,  100 => 21,  98 => 20,  93 => 19,  90 => 18,  87 => 17,  84 => 16,  80 => 15,  73 => 11,  66 => 8,  63 => 7,  60 => 6,  57 => 5,  54 => 4,  51 => 3,  49 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/servoportunidades.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/servoportunidades.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2, "set" => 3, "for" => 15];
        static $filters = ["escape" => 8, "length" => 17, "upper" => 71, "t" => 71, "spaceless" => 1];
        static $functions = ["path" => 3, "file_url" => 25];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "escape", 1 => "length", 2 => "upper", 3 => "t", 4 => "spaceless"],
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
