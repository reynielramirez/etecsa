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

/* @etecsa_subtheme/copyright.html.twig */
class __TwigTemplate_7d0f16982ff9c063b75feba25385220f extends Template
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
        yield "<div class=\"copyright\">
    <div class=\"copyright-logo\">
        <div class=\"logo-footer mt-4\"></div>
    </div>
    <div class=\"copyright-text\">
        <p class=\"copy-e\"> &copy; ";
        // line 6
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["fecha"] ?? null), "Y"), "html", null, true);
        yield "</p>
        <div class=\"col-12 pl-0 copyfont\">
            ";
        // line 8
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_copyright", [], "any", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "                ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_copyright", [], "any", false, false, true, 9), "html", null, true);
            yield "
            ";
        }
        // line 11
        yield "            <div class=\"col-12 pl-0 pt-3\">
                <p class=\"desoft\">";
        // line 12
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Developed by"));
        yield "
                    <a href=\"https://www.desoft.cu/es\" target=\"_blank\"> DESOFT</a>
                </p>
                <p>";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Designed by ETECSA"));
        yield "</p>
            </div>
        </div>
    </div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fecha", "page"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@etecsa_subtheme/copyright.html.twig";
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
        return array (  74 => 15,  68 => 12,  65 => 11,  59 => 9,  57 => 8,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@etecsa_subtheme/copyright.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/themes/etecsa_subtheme/templates/copyright.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 8];
        static $filters = ["escape" => 6, "date" => 6, "t" => 12];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
                [0 => "escape", 1 => "date", 2 => "t"],
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
