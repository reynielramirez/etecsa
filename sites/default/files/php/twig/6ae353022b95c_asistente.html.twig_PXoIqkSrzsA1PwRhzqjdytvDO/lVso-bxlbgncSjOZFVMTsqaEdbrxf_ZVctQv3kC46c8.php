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

/* modules/custom/etecsa_module/templates/asistente.html.twig */
class __TwigTemplate_8a56d807407864142040693e85fdb4f5 extends Template
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
        yield "<style type=\"text/css\" media=\"screen\">
\t.my-close label {
    font-family: \"MyriadPro-SemiboldCondIt\";
    color: #fff;
    font-size: 1.2rem;
    position: relative;
    right: 12rem;
}
</style>
";
        // line 10
        if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 11
            yield "    <a class=\"enlaceV\" title=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 11), "title", [], "any", false, false, true, 11), "value", [], "any", false, false, true, 11), "html", null, true);
            yield "\" target=\"_blank\" ";
            if ((($context["behaviour"] ?? null) == 2)) {
                // line 12
                yield "    href=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 12), "field_enlaceav", [], "any", false, false, true, 12), 0, [], "any", false, false, true, 12), "url", [], "any", false, false, true, 12), "html", null, true);
                yield "\" ";
            }
            yield ">
        <span class=\"position-absolute pl-3 text-nowrap d-flex overflow-hidden\">";
            // line 13
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 13), "title", [], "any", false, false, true, 13), "value", [], "any", false, false, true, 13), "html", null, true);
            yield "</span>
        <div id=\"asistenteVirtual\" class=\"itemcard etecsaAzulO d-flex overflow-hidden\">
            <img src=\"";
            // line 15
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 15), "field_imagen_svg", [], "any", false, false, true, 15), "entity", [], "any", false, false, true, 15), "uri", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15)), "html", null, true);
            yield "\" class=\"img-responsive p-2\">
        </div>  
    </a>
    ";
            // line 18
            if ((($context["behaviour"] ?? null) == 1)) {
                yield " 
    <div id=\"frame-asistente\" class=\"hidden\" style=\"right: 0; position: fixed; z-index: 2147483647; max-height: 400px !important; bottom: 0; visibility: visible; min-width: 320px; height: 100% !important; opacity: 1;\">
        <div class=\"my-close col-12\"><a class=\"link-close\"><i class=\"fa fa-times\"></i></a> </div>
        <iframe class=\"drift-frame-chat\" scrolling=\"no\" title=\"undefined\" allow=\"autoplay; encrypted-media; fullscreen;\" style=\"background: transparent none repeat scroll 0% 0%; width: 100% !important; height: 100%; border: medium none;\" src=\"";
                // line 21
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 21), "field_enlaceav", [], "any", false, false, true, 21), 0, [], "any", false, false, true, 21), "url", [], "any", false, false, true, 21), "html", null, true);
                yield "\" frameborder=\"0\"></iframe>
    </div>
    ";
            }
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data", "behaviour"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/asistente.html.twig";
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
        return array (  87 => 21,  81 => 18,  75 => 15,  70 => 13,  63 => 12,  58 => 11,  56 => 10,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/asistente.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/asistente.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 10];
        static $filters = ["escape" => 11];
        static $functions = ["file_url" => 15];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
                [0 => "escape"],
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
