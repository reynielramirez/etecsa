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

/* themes/etecsa_subtheme/templates/page.html.twig */
class __TwigTemplate_a15e29d56877767079c45e6352582937 extends Template
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
        // line 56
        if ((($context["language"] ?? null) == "en")) {
            // line 57
            yield "\t";
            $context["top"] = "Go up";
            // line 58
            yield "\t";
            $context["title"] = "Home";
            // line 59
            yield "
";
        } else {
            // line 61
            yield "\t";
            $context["top"] = "Ir arriba";
            // line 62
            yield "\t";
            $context["title"] = "Inicio";
        }
        // line 64
        yield "
<section>
\t<!-- start header -->
\t";
        // line 67
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 68
            yield "\t\t<header>
\t\t\t";
            // line 69
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 69), "html", null, true);
            yield "
\t\t</header>
\t";
        }
        // line 72
        yield "\t<!-- end header -->

\t<!-- start navigation -->
\t<section id=\"top-hm\" class=\"session-nevegacion\" style=\"background-color: #000066;\"> <div class=\"container\" style=\"height: 60px;\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-3 col-lg-3 d-none d-sm-none d-md-block d-lg-block\">
\t\t\t\t<a href=\"";
        // line 78
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        yield "\" title=\"";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "\">
\t\t\t\t\t<i class=\"logo-header mt-2\"></i>
\t\t\t\t</a>
\t\t\t</div>
\t\t\t<div class=\"col-md-9 col-lg-9 d-none d-sm-none d-md-block d-lg-block\">
\t\t\t\t";
        // line 83
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 84
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 84), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 86
        yield "\t\t\t</div>
\t\t</div>
\t\t<div class=\"d-block d-sm-block d-md-none d-lg-none col px-0\">
\t\t\t<nav class=\"navbar navbar-expand-md navbar-dark\" style=\"width: 100%\">
\t\t\t\t<!-- Brand -->
\t\t\t\t<a href=\"";
        // line 91
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        yield "\" title=\"";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "\" class=\"navbar-brand\">
\t\t\t\t\t<i class=\"logo-header-m mt-2\"></i>
\t\t\t\t</a>
\t\t\t\t<span class=\"menu-et-activo\">";
        // line 94
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Personas"));
        yield "</span>
\t\t\t\t<div class=\"alternadordeidioma lang-movil\">";
        // line 95
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "alternadordeidioma", "full", null, false), "html", null, true);
        yield "</div>
\t\t\t\t<a class=\"search-movil\" href=\"";
        // line 96
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["base_path"] ?? null), "html", null, true);
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["language"] ?? null), "html", null, true);
        yield "/search/resultados\">
\t\t\t\t\t<i class=\"fas fa-search\"></i>
\t\t\t\t</a>
\t\t\t\t<div class=\"sfm\">
\t\t\t\t\t";
        // line 100
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 100)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 101
            yield "\t\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 101), "html", null, true);
            yield "
\t\t\t\t\t";
        }
        // line 103
        yield "\t\t\t\t</div>
\t\t\t</nav>
\t\t</div>
\t</section>
\t<!-- end navigation -->
</section>

\t<!-- start carousel -->
\t<section id=\"main-carousel\">
\t\t";
        // line 112
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "carousel", [], "any", false, false, true, 112)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 113
            yield "\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "carousel", [], "any", false, false, true, 113), "html", null, true);
            yield "
\t\t";
        }
        // line 115
        yield "\t</section>
\t<!-- end carousel-->

\t<section class=\"cont-pro-enl-aux\">
\t\t<div class=\"row no-gutters\">
\t\t\t<div class=\"col\">
\t\t\t\t<!-- start Promociones cortas -->
\t\t\t\t";
        // line 122
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "promocortas", [], "any", false, false, true, 122)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 123
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "promocortas", [], "any", false, false, true, 123), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 125
        yield "\t\t\t\t<!-- end Promociones cortas-->
\t\t\t</div>
\t\t\t<div class=\"col\">
\t\t\t\t<!-- start Enlaces Auxiliares -->
\t\t\t\t";
        // line 129
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "enlacesauxiliar", [], "any", false, false, true, 129)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 130
            yield "\t\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "enlacesauxiliar", [], "any", false, false, true, 130), "html", null, true);
            yield "
\t\t\t\t";
        }
        // line 132
        yield "\t\t\t\t<!-- end Enlaces Auxiliares -->
\t\t\t</div>
\t\t</div>
\t</section>
\t<section id=\"breadcrumb-et\">
\t\t<div class=\"container\">
\t\t\t<!-- start breadcrumb -->
\t\t\t";
        // line 139
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 139)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 140
            yield "\t\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 140), "html", null, true);
            yield "
\t\t\t";
        }
        // line 142
        yield "\t\t\t<!-- end breadcrumb -->
\t\t</div>
\t</section>

\t<!-- start content -->
\t";
        // line 147
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 147)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "\t
\t\t<section id=\"page-content\" class=\"contsect\">
\t\t\t<div class=\"container\">
\t\t\t\t";
            // line 150
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 150), "html", null, true);
            yield "
\t\t\t</div>
\t\t</section>
\t";
        }
        // line 154
        yield "\t<!-- end content -->

\t<!-- start hospedaje -->
\t";
        // line 157
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "hospedaje", [], "any", false, false, true, 157)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 158
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 159
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "hospedaje", [], "any", false, false, true, 159), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 162
        yield "\t<!-- end hospedaje -->
\t<!-- start intermovil -->
\t";
        // line 164
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "intermovil", [], "any", false, false, true, 164)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 165
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 166
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "intermovil", [], "any", false, false, true, 166), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 169
        yield "\t<!-- end intermovil -->
\t<!-- start noticias -->
\t";
        // line 171
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "noticias_persona", [], "any", false, false, true, 171)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 172
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 173
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "noticias_persona", [], "any", false, false, true, 173), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 176
        yield "\t<!-- end noticias -->
\t<!-- start planes -->
\t";
        // line 178
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "planes", [], "any", false, false, true, 178)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 179
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 180
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "planes", [], "any", false, false, true, 180), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 183
        yield "\t<!-- end planes -->
\t<!-- start Equipos y accesorios -->
\t";
        // line 185
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "equipos", [], "any", false, false, true, 185)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 186
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 187
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "equipos", [], "any", false, false, true, 187), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 190
        yield "\t<!-- end equipos -->
\t<!-- start servicios y oportunidades -->
\t";
        // line 192
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "servicios", [], "any", false, false, true, 192)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 193
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 194
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "servicios", [], "any", false, false, true, 194), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 197
        yield "\t<!-- end servicios -->
\t<!-- start noticias -->
\t";
        // line 199
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "noticias_etecsa", [], "any", false, false, true, 199)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 200
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 201
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "noticias_etecsa", [], "any", false, false, true, 201), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 204
        yield "\t<!-- end noticias -->
\t<!-- start utilidades -->
\t";
        // line 206
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "utilidades", [], "any", false, false, true, 206)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 207
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 208
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "utilidades", [], "any", false, false, true, 208), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 211
        yield "\t<!-- end utilidades -->
\t<!-- start recargas -->
\t";
        // line 213
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "recargas", [], "any", false, false, true, 213)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 214
            yield "\t\t<section class=\"main-content\">
\t\t\t";
            // line 215
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "recargas", [], "any", false, false, true, 215), "html", null, true);
            yield "
\t\t</section>
\t";
        }
        // line 218
        yield "\t<!-- end recargas -->
\t
\t<!-- start footer -->
\t\t";
        // line 221
        yield from $this->load("@etecsa_subtheme/footer.html.twig", 221)->unwrap()->yield($context);
        // line 222
        yield "\t<!-- end footer -->
\t
\t<!-- start bottom-float -->
\t<section id=\"bottom-float\">
\t\t";
        // line 226
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "bottom_float", [], "any", false, false, true, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 227
            yield "\t\t\t";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "bottom_float", [], "any", false, false, true, 227), "html", null, true);
            yield "
\t\t";
        }
        // line 229
        yield "\t</section>
\t<!-- end bottom-float -->
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["language", "page", "base_path"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/etecsa_subtheme/templates/page.html.twig";
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
        return array (  389 => 229,  383 => 227,  381 => 226,  375 => 222,  373 => 221,  368 => 218,  362 => 215,  359 => 214,  357 => 213,  353 => 211,  347 => 208,  344 => 207,  342 => 206,  338 => 204,  332 => 201,  329 => 200,  327 => 199,  323 => 197,  317 => 194,  314 => 193,  312 => 192,  308 => 190,  302 => 187,  299 => 186,  297 => 185,  293 => 183,  287 => 180,  284 => 179,  282 => 178,  278 => 176,  272 => 173,  269 => 172,  267 => 171,  263 => 169,  257 => 166,  254 => 165,  252 => 164,  248 => 162,  242 => 159,  239 => 158,  237 => 157,  232 => 154,  225 => 150,  219 => 147,  212 => 142,  206 => 140,  204 => 139,  195 => 132,  189 => 130,  187 => 129,  181 => 125,  175 => 123,  173 => 122,  164 => 115,  158 => 113,  156 => 112,  145 => 103,  139 => 101,  137 => 100,  129 => 96,  125 => 95,  121 => 94,  113 => 91,  106 => 86,  100 => 84,  98 => 83,  88 => 78,  80 => 72,  74 => 69,  71 => 68,  69 => 67,  64 => 64,  60 => 62,  57 => 61,  53 => 59,  50 => 58,  47 => 57,  45 => 56,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/etecsa_subtheme/templates/page.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/themes/etecsa_subtheme/templates/page.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 56, "set" => 57, "include" => 221];
        static $filters = ["escape" => 69, "t" => 94];
        static $functions = ["url" => 78, "drupal_entity" => 95];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "set", 2 => "include"],
                [0 => "escape", 1 => "t"],
                [0 => "url", 1 => "drupal_entity"],
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
