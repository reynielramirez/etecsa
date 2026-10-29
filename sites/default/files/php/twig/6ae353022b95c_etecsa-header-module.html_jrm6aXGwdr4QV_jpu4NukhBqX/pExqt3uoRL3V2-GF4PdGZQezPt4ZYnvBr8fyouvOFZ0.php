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

/* modules/custom/etecsa_header_module/templates/etecsa-header-module.html.twig */
class __TwigTemplate_68e461caaee6254b8f2c389ffbd32d4b extends Template
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
        yield "<div class=\"container d-none d-xs-none d-sm-none d-md-block d-lg-block\" >
  <div id=\"header-container\" class=\"row\">
    <div>
      <label class=\"title-e\">";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["etecsa"] ?? null), "html", null, true);
        yield "</label>
    </div>
    <div class=\"header-item\">
      <a href=\"";
        // line 7
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("etecsa.atencionclientes"));
        yield "\" class=\"title-atencion float-left\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["atencion"] ?? null), "html", null, true);
        yield "</a>
      <div class=\"float-left separador\"></div>
      <a href=\"";
        // line 9
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("etecsa.nosotros"));
        yield "\" class=\"title-sobrenos float-left\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["sobrenos"] ?? null), "html", null, true);
        yield "</a>
    </div>
    <div class=\"header-item\">
      ";
        // line 12
        $context["text"] = "Search content";
        // line 13
        yield "      <form id=\"searchForm\" class=\"form-inline\" accept-charset=\"UTF-8\" method=\"get\" action=\"";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["base_path"] ?? null), "html", null, true);
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["language"] ?? null), "html", null, true);
        yield "/search/resultados\" data-drupal-form-fields=\"edit-keys\">
            <input id=\"edit-keys\" type=\"search\" value=\"\" placeholder=\"";
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t(($context["text"] ?? null)));
        yield "\" name=\"keys\" data-drupal-selector=\"edit-keys\" class=\"form-control size-search\">
            <button class=\"btn btn-info btn-searchs\" type=\"submit\"><i class=\"fas fa-search\"></i></button>
      </form>      
    </div class=\"header-item\">
    <div>
      <ul>
        <li><a href=\"https://www.tienda.etecsa.cu/visitantes/home?login=true\" target=\"_blank\" alt=\"\"><span class=\"title-mi-cuenta\">";
        // line 20
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("My Acount"));
        yield "</span></a></li>
      </ul>
    </div>
    <div class=\"header-item\">
      <ul> 
        <li class=\"alternadordeidioma\">";
        // line 25
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "alternadordeidioma", "full", null, false), "html", null, true);
        yield "</li>
      </ul>
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["etecsa", "atencion", "sobrenos", "base_path", "language"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_header_module/templates/etecsa-header-module.html.twig";
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
        return array (  96 => 25,  88 => 20,  79 => 14,  73 => 13,  71 => 12,  63 => 9,  56 => 7,  50 => 4,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_header_module/templates/etecsa-header-module.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_header_module/templates/etecsa-header-module.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 12];
        static $filters = ["escape" => 4, "t" => 14];
        static $functions = ["path" => 7, "drupal_entity" => 25];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set"],
                [0 => "escape", 1 => "t"],
                [0 => "path", 1 => "drupal_entity"],
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
