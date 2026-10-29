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

/* @etecsa_subtheme/footer.html.twig */
class __TwigTemplate_24ceb745987f77973b17452cb45b5121 extends Template
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
        yield "<section id=\"footer-section\">
\t<div class=\"panel-back\">
\t\t<div class=\"items-left\">
\t\t\t<div class=\"mi-empresa\">
\t\t\t\t";
        // line 5
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_miempresa", [], "any", false, false, true, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 6
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_miempresa", [], "any", false, false, true, 6), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 8
        yield "\t\t\t</div>
\t\t\t<div class=\"panel-front\">
\t\t\t\t<div class=\"panel-front-container\">
\t\t\t\t\t<div class=\"links\">
\t\t\t\t\t\t<div class=\"links-col\">
\t\t\t\t\t\t\t";
        // line 13
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_nosotros", [], "any", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "\t\t\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_nosotros", [], "any", false, false, true, 14), "html", null, true);
            yield "
\t\t\t\t\t\t\t";
        }
        // line 16
        yield "\t\t\t\t\t\t\t<div class=\"space\"></div>
\t\t\t\t\t\t\t";
        // line 17
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_servicios_terminos", [], "any", false, false, true, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "\t\t\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_servicios_terminos", [], "any", false, false, true, 18), "html", null, true);
            yield "
\t\t\t\t\t\t\t";
        }
        // line 20
        yield "\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"links-col\">
\t\t\t\t\t\t\t";
        // line 22
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_teayudamos", [], "any", false, false, true, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "\t\t\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_teayudamos", [], "any", false, false, true, 23), "html", null, true);
            yield "
\t\t\t\t\t\t\t";
        }
        // line 25
        yield "\t\t\t\t\t\t\t<div class=\"space\"></div>
\t\t\t\t\t\t\t";
        // line 26
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_publicos", [], "any", false, false, true, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "\t\t\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_publicos", [], "any", false, false, true, 27), "html", null, true);
            yield "
\t\t\t\t\t\t\t";
        }
        // line 29
        yield "\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"links-col\">
\t\t\t\t\t\t\t";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_enlaces", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "\t\t\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_enlaces", [], "any", false, false, true, 32), "html", null, true);
            yield "
\t\t\t\t\t\t\t";
        }
        // line 34
        yield "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"networks\">
\t\t\t\t\t\t";
        // line 37
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_redes", [], "any", false, false, true, 37)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "\t\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_redes", [], "any", false, false, true, 38), "html", null, true);
            yield "
\t\t\t\t\t\t";
        }
        // line 40
        yield "\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"desktop-copyright\">
\t\t\t\t\t\t";
        // line 42
        yield from $this->load("@etecsa_subtheme/copyright.html.twig", 42)->unwrap()->yield($context);
        // line 43
        yield "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"items-right\">
\t\t\t<div class=\"subscribe footer-item\">
\t\t\t    <h2>";
        // line 49
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subscribe!"));
        yield "</h2>
\t\t\t\t<div class=\"field-content\">
\t\t\t\t\t";
        // line 51
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("If you want to receive information about our new services and products."));
        yield "
\t\t\t\t</div>
\t\t\t\t";
        // line 53
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_suscripcion", [], "any", false, false, true, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 54
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_suscripcion", [], "any", false, false, true, 54), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 56
        yield "\t\t\t</div>
\t\t\t<div class=\"feedback-form footer-item\">
\t\t\t\t";
        // line 58
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_formcontactos", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_formcontactos", [], "any", false, false, true, 59), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 61
        yield "\t\t\t\t<div class=\"texto-etecsa pt-2 col-6\">
\t\t\t\t\t<p>";
        // line 62
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("ETECSA\x27s working team will promptly process the information and will dispense with comments and offensive or inappropriate content."));
        yield ".</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"contact footer-item\">
\t\t\t\t";
        // line 66
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_contactos", [], "any", false, false, true, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 67
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_contactos", [], "any", false, false, true, 67), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 69
        yield "\t\t\t</div>
\t\t\t";
        // line 70
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_opinion", [], "any", false, false, true, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 71
            yield "\t\t\t<div class=\"status-opinion footer-item\">
\t\t\t\t<div class=\"opinion\">
\t\t\t\t\t<span class=\"action\">
\t\t\t\t\t\t<svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z\"></path></svg>
\t\t\t\t\t</span>
\t\t\t\t\t<div class=\"opinion-form\">
\t\t\t\t\t\t";
            // line 77
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_opinion", [], "any", false, false, true, 77), "html", null, true);
            yield "\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        // line 82
        yield "\t\t</div>
\t</div>
\t<div id=\"mobil-copyright\">
\t\t";
        // line 85
        yield from $this->load("@etecsa_subtheme/copyright.html.twig", 85)->unwrap()->yield($context);
        // line 86
        yield "\t</div>
</section>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@etecsa_subtheme/footer.html.twig";
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
        return array (  223 => 86,  221 => 85,  216 => 82,  208 => 77,  200 => 71,  198 => 70,  195 => 69,  189 => 67,  187 => 66,  180 => 62,  177 => 61,  171 => 59,  169 => 58,  165 => 56,  159 => 54,  157 => 53,  152 => 51,  147 => 49,  139 => 43,  137 => 42,  133 => 40,  127 => 38,  125 => 37,  120 => 34,  114 => 32,  112 => 31,  108 => 29,  102 => 27,  100 => 26,  97 => 25,  91 => 23,  89 => 22,  85 => 20,  79 => 18,  77 => 17,  74 => 16,  68 => 14,  66 => 13,  59 => 8,  53 => 6,  51 => 5,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@etecsa_subtheme/footer.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/themes/etecsa_subtheme/templates/footer.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 5, "include" => 42];
        static $filters = ["escape" => 6, "t" => 49];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "include"],
                [0 => "escape", 1 => "t"],
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
