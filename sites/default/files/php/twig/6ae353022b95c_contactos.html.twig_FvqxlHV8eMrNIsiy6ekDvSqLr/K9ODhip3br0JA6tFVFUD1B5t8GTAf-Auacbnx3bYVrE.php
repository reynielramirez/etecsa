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

/* modules/custom/etecsa_module/templates/contactos.html.twig */
class __TwigTemplate_4ba93d1f3cc2b1f62245fa48ba6c5c3d extends Template
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
                yield "  <div>
    <div class=\"section-heading-footer pt-2 cpl pl-0\">
        <h3>";
                // line 5
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contacts"));
                yield "</h3>
    </div>
    <div class=\"row\">
\t\t<div class=\"contacto-info col-12 pl-2 mt-3\">
            <i class=\"contact-icon direccion-img\"></i> 
            <div class=\"contact-text\">
                <p class=\"\">";
                // line 11
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 11), "get", ["field_direcc"], "method", false, false, true, 11), "value", [], "any", false, false, true, 11), "html", null, true);
                yield "</p>
            </div>    
        </div> 
\t\t<div class=\"contacto-info col-12 pl-2\">
            <i class=\"contact-icon telefono-img\"></i> 
            <div class=\"contact-text\">
                <p class=\"tel-num telsize font-weight-bold d-lg-block d-none\">";
                // line 17
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 17), "get", ["field_tel_et"], "method", false, false, true, 17), "value", [], "any", false, false, true, 17), "html", null, true);
                yield "</p>
                <a class=\"telsize font-weight-bold d-lg-none d-sm-block\" href=\"tel:";
                // line 18
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 18), "get", ["field_tel_et"], "method", false, false, true, 18), "value", [], "any", false, false, true, 18), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 18), "get", ["field_tel_et"], "method", false, false, true, 18), "value", [], "any", false, false, true, 18), "html", null, true);
                yield "</a>
                <p class=\"\"> ";
                // line 19
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Commercial information and claims"));
                yield "</p> 
            </div>         
        </div>  
        <div class=\"contacto-info col-12 pl-2\">
            <i class=\"contact-icon correo-img\"></i> 
            <div class=\"contact-text\">
                <a class=\"email font-weight-bold\" href=\"mailto:";
                // line 25
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 25), "get", ["field_correo_etecsa"], "method", false, false, true, 25), "value", [], "any", false, false, true, 25), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "any", false, false, true, 25), "get", ["field_correo_etecsa"], "method", false, false, true, 25), "value", [], "any", false, false, true, 25), "html", null, true);
                yield "</a>
            </div>
        </div>\t\t
    </div>
  </div>    
";
            }
            return; yield;
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield (string) Twig\Extension\CoreExtension::spaceless($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $_v0, "html", null, true));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/contactos.html.twig";
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
        return array (  103 => 1,  90 => 25,  81 => 19,  75 => 18,  71 => 17,  62 => 11,  53 => 5,  49 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/contactos.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/contactos.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 1, "if" => 2];
        static $filters = ["t" => 5, "escape" => 11, "spaceless" => 1];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "apply", 1 => "if"],
                [0 => "t", 1 => "escape", 2 => "spaceless"],
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
