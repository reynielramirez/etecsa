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

/* modules/custom/etecsa_module/templates/noticias.html.twig */
class __TwigTemplate_6d3e25b55276236a3af0cf35c8307aa0 extends Template
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
        if ((($tmp = ($context["data"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "\t";
            if ((($context["language"] ?? null) == "es")) {
                // line 3
                yield "\t\t";
                $context["text"] = "/noticias";
                // line 4
                yield "\t";
            } else {
                // line 5
                yield "\t\t";
                $context["text"] = "/news";
                // line 6
                yield "\t";
            }
            // line 7
            yield "\t";
            if (((($context["cliente"] ?? null) == "personas") || (($context["cliente"] ?? null) == "people"))) {
                // line 8
                yield "\t\t";
                $context["cpath"] = ((($context["base_path"] ?? null) . ($context["language"] ?? null)) . ($context["text"] ?? null));
                // line 9
                yield "\t";
            } else {
                // line 10
                yield "\t\t";
                $context["cpath"] = ((((($context["base_path"] ?? null) . ($context["language"] ?? null)) . "/") . ($context["cliente"] ?? null)) . ($context["text"] ?? null));
                // line 11
                yield "\t";
            }
            // line 12
            yield "\t<div class=\"container ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["visibility"] ?? null), "html", null, true);
            yield "\" id=\"block-noticias-persona\">
\t\t<div class=\"sesion-noticia-home ";
            // line 13
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (($_v0 = ($context["data"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 13)), "field_image", [], "any", false, false, true, 13)) > 0)) {
                yield " block-1 ";
            }
            yield "\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col text-center\">
\t\t\t\t\t<h1 class=\"block-title-n-custom\">";
            // line 16
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("News")), "html", null, true);
            yield "</h1>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"d-none d-xs-none d-sm-none d-md-block d-lg-block\">
\t\t\t\t";
            // line 20
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (($_v1 = ($context["data"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 20)), "field_image", [], "any", false, false, true, 20)) > 0)) {
                // line 21
                yield "\t\t\t\t\t<div class=\"sesion-noticias row\">
\t\t\t\t\t\t<div class=\"n-principal col-xs-12 col-sm-12 col-md-6 col-lg-6\">
\t\t\t\t\t\t\t<div class=\"fecha\">
\t\t\t\t\t\t\t\t";
                // line 24
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v2 = ($context["data"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 24)), "field_promo", [], "any", false, false, true, 24), "value", [], "any", false, false, true, 24) == 1)) {
                    // line 25
                    yield "\t\t\t\t\t\t\t\t\t";
                    $context["rojo"] = "rojo";
                    // line 26
                    yield "\t\t\t\t\t\t\t\t";
                } else {
                    // line 27
                    yield "\t\t\t\t\t\t\t\t\t";
                    $context["rojo"] = "";
                    // line 28
                    yield "\t\t\t\t\t\t\t\t";
                }
                // line 29
                yield "\t\t\t\t\t\t\t\t<div class=\"dia ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rojo"] ?? null), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v3 = ($context["data"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 29)), "field_fecha_publicacion_noti", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29), "d"), "html", null, true);
                yield "</div>
\t\t\t\t\t\t\t\t<div class=\"mes-anno\">
\t\t\t\t\t\t\t\t\t<span>";
                // line 31
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v4 = ($context["data"] ?? null)) && is_array($_v4) || $_v4 instanceof ArrayAccess && in_array($_v4::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v4[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 31)), "field_fecha_publicacion_noti", [], "any", false, false, true, 31), "value", [], "any", false, false, true, 31), "m"), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t\t\t<span>";
                // line 32
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v5 = ($context["data"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess && in_array($_v5::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v5[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 32)), "field_fecha_publicacion_noti", [], "any", false, false, true, 32), "value", [], "any", false, false, true, 32), "y"), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"block-compartir-1\">
\t\t\t\t\t\t\t\t\t<div class=\"compartir-1\">
\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-share-alt\"></span>
\t\t\t\t\t\t\t\t\t\t<div class=\"redesocN\">
\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"facebook\" data-title=\"";
                // line 38
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v6 = ($context["data"] ?? null)) && is_array($_v6) || $_v6 instanceof ArrayAccess && in_array($_v6::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v6[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 38)), "title", [], "any", false, false, true, 38), "value", [], "any", false, false, true, 38), "html", null, true);
                yield "\" data-url=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v7 = ($context["data"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess && in_array($_v7::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v7[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 38)), "nid", [], "any", false, false, true, 38), "value", [], "any", false, false, true, 38)]), "html", null, true);
                yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-facebook-f so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"twitter\" data-title=\"";
                // line 41
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v8 = ($context["data"] ?? null)) && is_array($_v8) || $_v8 instanceof ArrayAccess && in_array($_v8::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v8[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 41)), "title", [], "any", false, false, true, 41), "value", [], "any", false, false, true, 41), "html", null, true);
                yield "\" data-url=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v9 = ($context["data"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess && in_array($_v9::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v9[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 41)), "nid", [], "any", false, false, true, 41), "value", [], "any", false, false, true, 41)]), "html", null, true);
                yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-twitter so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"whatsapp\" data-title=\"";
                // line 44
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v10 = ($context["data"] ?? null)) && is_array($_v10) || $_v10 instanceof ArrayAccess && in_array($_v10::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v10[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 44)), "title", [], "any", false, false, true, 44), "value", [], "any", false, false, true, 44), "html", null, true);
                yield "\" data-url=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v11 = ($context["data"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess && in_array($_v11::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v11[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 44)), "nid", [], "any", false, false, true, 44), "value", [], "any", false, false, true, 44)]), "html", null, true);
                yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-whatsapp so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"telegram\" data-title=\"";
                // line 47
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v12 = ($context["data"] ?? null)) && is_array($_v12) || $_v12 instanceof ArrayAccess && in_array($_v12::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v12[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 47)), "title", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47), "html", null, true);
                yield "\" data-url=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v13 = ($context["data"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess && in_array($_v13::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v13[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 47)), "nid", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47)]), "html", null, true);
                yield "\" data-web=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-telegram-plane so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t";
                // line 55
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (($_v14 = ($context["data"] ?? null)) && is_array($_v14) || $_v14 instanceof ArrayAccess && in_array($_v14::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v14[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 55)), "field_image", [], "any", false, false, true, 55)) > 0)) {
                    // line 56
                    yield "\t\t\t\t\t\t\t\t\t<a href=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v15 = ($context["data"] ?? null)) && is_array($_v15) || $_v15 instanceof ArrayAccess && in_array($_v15::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v15[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 56)), "nid", [], "any", false, false, true, 56), "value", [], "any", false, false, true, 56)]), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t<img class=\"col-md-12\" src=\"";
                    // line 57
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v16 = ($context["data"] ?? null)) && is_array($_v16) || $_v16 instanceof ArrayAccess && in_array($_v16::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v16[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 57)), "field_image", [], "any", false, false, true, 57), "entity", [], "any", false, false, true, 57), "uri", [], "any", false, false, true, 57), "value", [], "any", false, false, true, 57)), "html", null, true);
                    yield "\" alt=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v17 = ($context["data"] ?? null)) && is_array($_v17) || $_v17 instanceof ArrayAccess && in_array($_v17::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v17[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 57)), "field_image", [], "any", false, false, true, 57), "entity", [], "any", false, false, true, 57), "alt", [], "any", false, false, true, 57), "html", null, true);
                    yield "\"/>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                }
                // line 60
                yield "\t\t\t\t\t\t\t\t<div class=\"card-body mt-3\">
\t\t\t\t\t\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 62
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v18 = ($context["data"] ?? null)) && is_array($_v18) || $_v18 instanceof ArrayAccess && in_array($_v18::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v18[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 62)), "nid", [], "any", false, false, true, 62), "value", [], "any", false, false, true, 62)]), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v19 = ($context["data"] ?? null)) && is_array($_v19) || $_v19 instanceof ArrayAccess && in_array($_v19::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v19[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 62)), "title", [], "any", false, false, true, 62), "value", [], "any", false, false, true, 62), "html", null, true);
                yield "</a>
\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t<p class=\"small card-source\">
\t\t\t\t\t\t\t\t\t\t";
                // line 65
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v20 = ($context["data"] ?? null)) && is_array($_v20) || $_v20 instanceof ArrayAccess && in_array($_v20::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v20[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 65)), "field_fuente", [], "any", false, false, true, 65), "value", [], "any", false, false, true, 65), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<span class=\"card-text\">
\t\t\t\t\t\t\t\t\t\t";
                // line 68
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v21 = ($context["data"] ?? null)) && is_array($_v21) || $_v21 instanceof ArrayAccess && in_array($_v21::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v21[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), 0, [], "array", false, false, true, 68)), "field_noticia_resumen", [], "any", false, false, true, 68), "value", [], "any", false, false, true, 68), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"block-secundaria col-xs-12 col-sm-12 col-md-6 col-lg-6\">
\t\t\t\t\t\t<div class=\"n-secundaria\">
\t\t\t\t\t\t\t";
                // line 75
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["new"]) {
                    // line 76
                    yield "\t\t\t\t\t\t\t\t";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 76) != 1)) {
                        // line 77
                        yield "\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t\t<div class=\"fecha\">
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 79
                        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_promo", [], "any", false, false, true, 79), "value", [], "any", false, false, true, 79) == 1)) {
                            // line 80
                            yield "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["rojo"] = "rojo";
                            // line 81
                            yield "\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 82
                            yield "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["rojo"] = "";
                            // line 83
                            yield "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 84
                        yield "\t\t\t\t\t\t\t\t\t\t\t<div class=\"dia ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rojo"] ?? null), "html", null, true);
                        yield "\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 84), "value", [], "any", false, false, true, 84), "d"), "html", null, true);
                        yield "</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"mes-anno\">
\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                        // line 86
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 86), "value", [], "any", false, false, true, 86), "m"), "html", null, true);
                        yield "</span>
\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                        // line 87
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 87), "value", [], "any", false, false, true, 87), "y"), "html", null, true);
                        yield "</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"block-compartir-1\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compartir-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-share-alt\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"redesocN df\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"facebook\" data-title=\"";
                        // line 93
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 93), "value", [], "any", false, false, true, 93), "html", null, true);
                        yield "\" data-url=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 93), "value", [], "any", false, false, true, 93)]), "html", null, true);
                        yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-facebook-f so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"twitter\" data-title=\"";
                        // line 96
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 96), "value", [], "any", false, false, true, 96), "html", null, true);
                        yield "\" data-url=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 96), "value", [], "any", false, false, true, 96)]), "html", null, true);
                        yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-twitter so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"whatsapp\" data-title=\"";
                        // line 99
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 99), "value", [], "any", false, false, true, 99), "html", null, true);
                        yield "\" data-url=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 99), "value", [], "any", false, false, true, 99)]), "html", null, true);
                        yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-whatsapp so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"telegram\" data-title=\"";
                        // line 102
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 102), "value", [], "any", false, false, true, 102), "html", null, true);
                        yield "\" data-url=\"";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 102), "value", [], "any", false, false, true, 102)]), "html", null, true);
                        yield "\" data-web=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-telegram-plane so2\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 112
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 112), "value", [], "any", false, false, true, 112)]), "html", null, true);
                        yield "\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 112), "value", [], "any", false, false, true, 112), "html", null, true);
                        yield "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"small card-source\">";
                        // line 114
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fuente", [], "any", false, false, true, 114), "value", [], "any", false, false, true, 114), "html", null, true);
                        yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-text\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 116
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_noticia_resumen", [], "any", false, false, true, 116), "value", [], "any", false, false, true, 116), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 122
                    yield "\t\t\t\t\t\t\t";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['new'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 123
                yield "\t\t\t\t\t\t\t<div class=\"mas-noticias col-12\">
\t\t\t\t\t\t\t\t<a href=\"";
                // line 124
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
                yield "\" class=\"btn btn-link\">
\t\t\t\t\t\t\t\t\t<span>";
                // line 125
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("More News ")), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t\t\t<i class=\"flaticon-next-1 more\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t";
            } else {
                // line 134
                yield "\t\t\t\t<div class=\"sesion-noticias row\">
\t\t\t\t\t";
                // line 135
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["new"]) {
                    // line 136
                    yield "\t\t\t\t\t\t<div class=\"col-xs-12 col-sm-12 col-md-4 col-lg-4 container-new\">
\t\t\t\t\t\t\t<div class=\"block-secundaria\">
\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t<div class=\"fecha\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 140
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_promo", [], "any", false, false, true, 140), "value", [], "any", false, false, true, 140) == 1)) {
                        // line 141
                        yield "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["rojo"] = "rojo";
                        // line 142
                        yield "\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 143
                        yield "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["rojo"] = "";
                        // line 144
                        yield "\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 145
                    yield "\t\t\t\t\t\t\t\t\t\t<div class=\"dia ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rojo"] ?? null), "html", null, true);
                    yield "\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 145), "value", [], "any", false, false, true, 145), "d"), "html", null, true);
                    yield "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"mes-anno\">
\t\t\t\t\t\t\t\t\t\t\t<span>";
                    // line 147
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 147), "value", [], "any", false, false, true, 147), "m"), "html", null, true);
                    yield "</span>
\t\t\t\t\t\t\t\t\t\t\t<span>";
                    // line 148
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 148), "value", [], "any", false, false, true, 148), "y"), "html", null, true);
                    yield "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"block-compartir-1\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"compartir-1\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-share-alt\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"redesocN\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"facebook\" data-title=\"";
                    // line 154
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 154), "value", [], "any", false, false, true, 154), "html", null, true);
                    yield "\" data-url=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 154), "value", [], "any", false, false, true, 154)]), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-facebook-f\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"twitter\" data-title=\"";
                    // line 157
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 157), "value", [], "any", false, false, true, 157), "html", null, true);
                    yield "\" data-url=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 157), "value", [], "any", false, false, true, 157)]), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-twitter\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"whatsapp\" data-title=\"";
                    // line 160
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 160), "value", [], "any", false, false, true, 160), "html", null, true);
                    yield "\" data-url=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 160), "value", [], "any", false, false, true, 160)]), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-whatsapp\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"button\" data-sharer=\"telegram\" data-title=\"";
                    // line 163
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 163), "value", [], "any", false, false, true, 163), "html", null, true);
                    yield "\" data-url=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["host"] ?? null), "html", null, true);
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 163), "value", [], "any", false, false, true, 163)]), "html", null, true);
                    yield "\" data-web=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fab fa-telegram-plane\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 173
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 173), "value", [], "any", false, false, true, 173)]), "html", null, true);
                    yield "\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 173), "value", [], "any", false, false, true, 173), "html", null, true);
                    yield "</a>
\t\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t\t<p class=\"small card-source\">";
                    // line 175
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fuente", [], "any", false, false, true, 175), "value", [], "any", false, false, true, 175), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-text\">";
                    // line 176
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_noticia_resumen", [], "any", false, false, true, 176), "value", [], "any", false, false, true, 176), "html", null, true);
                    yield "</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['new'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 183
                yield "\t\t\t\t\t<div class=\"col mas-noticias col-12\">
\t\t\t\t\t\t<a href=\"";
                // line 184
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
                yield "\" class=\"btn btn-link\">
\t\t\t\t\t\t\t<span>";
                // line 185
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("More News")), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t<i class=\"flaticon-next-1 more\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
            }
            // line 192
            yield "\t</div>
\t<div class=\"d-block d-xs-block d-sm-block d-md-none d-lg-none\">
\t\t<div class=\"sesion-noticias row\">
\t\t\t<div id=\"carousel-noticias\" class=\"owl-carousel owl-carousel-noticias owl-theme\">
\t\t\t\t";
            // line 196
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["new"]) {
                // line 197
                yield "\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t<div class=\"block-secundaria\">
\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t<div class=\"fecha\">
\t\t\t\t\t\t\t\t\t";
                // line 201
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_promo", [], "any", false, false, true, 201), "value", [], "any", false, false, true, 201) == 1)) {
                    // line 202
                    yield "\t\t\t\t\t\t\t\t\t\t";
                    $context["rojo"] = "rojo";
                    // line 203
                    yield "\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 204
                    yield "\t\t\t\t\t\t\t\t\t\t";
                    $context["rojo"] = "";
                    // line 205
                    yield "\t\t\t\t\t\t\t\t\t";
                }
                // line 206
                yield "\t\t\t\t\t\t\t\t\t<div class=\"dia ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rojo"] ?? null), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 206), "value", [], "any", false, false, true, 206), "d"), "html", null, true);
                yield "</div>
\t\t\t\t\t\t\t\t\t<div class=\"mes-anno\">
\t\t\t\t\t\t\t\t\t\t<span>";
                // line 208
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 208), "value", [], "any", false, false, true, 208), "m"), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t\t\t\t<span>";
                // line 209
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fecha_publicacion_noti", [], "any", false, false, true, 209), "value", [], "any", false, false, true, 209), "y"), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card\" style=\"text-align: left;\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 215
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "nid", [], "any", false, false, true, 215), "value", [], "any", false, false, true, 215)]), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "title", [], "any", false, false, true, 215), "value", [], "any", false, false, true, 215), "html", null, true);
                yield "</a>
\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t<p class=\"small card-source\">";
                // line 217
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_fuente", [], "any", false, false, true, 217), "value", [], "any", false, false, true, 217), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-text\">";
                // line 218
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["new"], "field_noticia_resumen", [], "any", false, false, true, 218), "value", [], "any", false, false, true, 218), "html", null, true);
                yield "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['new'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 225
            yield "\t\t\t</div>
\t\t\t<div class=\"col mas-noticias col-12\">
\t\t\t\t<a href=\"";
            // line 227
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["cpath"] ?? null), "html", null, true);
            yield "\" class=\"btn btn-link\">
\t\t\t\t\t<span>";
            // line 228
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::upper($this->env->getCharset(), t("More News")), "html", null, true);
            yield "</span>
\t\t\t\t\t<i class=\"flaticon-next-1 more\"></i>
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>
</div></div>";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data", "language", "cliente", "base_path", "visibility", "host", "loop"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/etecsa_module/templates/noticias.html.twig";
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
        return array (  597 => 228,  593 => 227,  589 => 225,  575 => 218,  571 => 217,  564 => 215,  555 => 209,  551 => 208,  543 => 206,  540 => 205,  537 => 204,  534 => 203,  531 => 202,  529 => 201,  523 => 197,  519 => 196,  513 => 192,  503 => 185,  499 => 184,  496 => 183,  482 => 176,  478 => 175,  471 => 173,  455 => 163,  446 => 160,  437 => 157,  428 => 154,  419 => 148,  415 => 147,  407 => 145,  404 => 144,  401 => 143,  398 => 142,  395 => 141,  393 => 140,  387 => 136,  383 => 135,  380 => 134,  368 => 125,  364 => 124,  361 => 123,  346 => 122,  337 => 116,  332 => 114,  325 => 112,  309 => 102,  300 => 99,  291 => 96,  282 => 93,  273 => 87,  269 => 86,  261 => 84,  258 => 83,  255 => 82,  252 => 81,  249 => 80,  247 => 79,  243 => 77,  240 => 76,  223 => 75,  213 => 68,  207 => 65,  199 => 62,  195 => 60,  187 => 57,  182 => 56,  180 => 55,  166 => 47,  157 => 44,  148 => 41,  139 => 38,  130 => 32,  126 => 31,  118 => 29,  115 => 28,  112 => 27,  109 => 26,  106 => 25,  104 => 24,  99 => 21,  97 => 20,  90 => 16,  82 => 13,  77 => 12,  74 => 11,  71 => 10,  68 => 9,  65 => 8,  62 => 7,  59 => 6,  56 => 5,  53 => 4,  50 => 3,  47 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/etecsa_module/templates/noticias.html.twig", "/Users/reyniel-smart145/Herd/etecsa10/modules/custom/etecsa_module/templates/noticias.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1, "set" => 3, "for" => 75];
        static $filters = ["escape" => 12, "length" => 13, "upper" => 16, "t" => 16, "date" => 29];
        static $functions = ["path" => 38, "file_url" => 57];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "set", 2 => "for"],
                [0 => "escape", 1 => "length", 2 => "upper", 3 => "t", 4 => "date"],
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
