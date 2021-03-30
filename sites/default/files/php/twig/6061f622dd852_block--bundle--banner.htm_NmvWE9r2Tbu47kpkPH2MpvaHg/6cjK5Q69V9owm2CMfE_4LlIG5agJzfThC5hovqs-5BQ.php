<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/ticketmatic/template/block/block--bundle--banner.html.twig */
class __TwigTemplate_c19c6e5f3e0f1a7a80f2025345fc3d0101ef65d255dca9da928c007ef73f4228 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        $context["classes"] = [0 => "block", 1 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 51
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 51), 51, $this->source))), 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 52
($context["plugin_id"] ?? null), 52, $this->source))), 3 => "banner"];
        // line 56
        echo "

";
        // line 58
        $context["imageUrl"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_upload_image", [], "any", false, false, true, 58), 0, [], "any", false, false, true, 58)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#item"] ?? null) : null), "entity", [], "any", false, false, true, 58), "uri", [], "any", false, false, true, 58), "value", [], "any", false, false, true, 58), 58, $this->source)]);
        // line 59
        echo "
<section";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 60), 60, $this->source), "html", null, true);
        echo ">
  ";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 61, $this->source), "html", null, true);
        echo "

  ";
        // line 63
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 63, $this->source), "html", null, true);
        echo "
  
  ";
        // line 65
        $this->displayBlock('content', $context, $blocks);
        // line 80
        echo "</section>

";
    }

    // line 65
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
        echo "    <div class=\"banner-wrapper-box\" style=\"background-image:url(/themes/ticketmatic/images/rip.png), url(";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["imageUrl"] ?? null), 66, $this->source), "html", null, true);
        echo ");\">    
      <div class=\"banner-wrapper-box-content\">
        ";
        // line 68
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_titles", [], "any", false, false, true, 68)) {
            // line 69
            echo "          <h1 class=\"title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["content"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["#block_content"] ?? null) : null), "get", [0 => "field_titles"], "method", false, false, true, 69), "value", [], "any", false, false, true, 69), 69, $this->source));
            echo "</h1>
        ";
        }
        // line 71
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_sub_title", [], "any", false, false, true, 71)) {
            // line 72
            echo "          <h4 class=\"sub_title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["content"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["#block_content"] ?? null) : null), "get", [0 => "field_sub_title"], "method", false, false, true, 72), "value", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
            echo "</h4>
        ";
        }
        // line 73
        echo "  
        ";
        // line 74
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["content"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["#block_content"] ?? null) : null), "get", [0 => "field_url_link"], "method", false, false, true, 74), "title", [], "any", false, false, true, 74) == "true")) {
            // line 75
            echo "          <div class=\"cta-button\"><a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["content"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["#block_content"] ?? null) : null), "get", [0 => "field_url_link"], "method", false, false, true, 75), "uri", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["content"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["#block_content"] ?? null) : null), "get", [0 => "field_url_link"], "method", false, false, true, 75), "title", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "</a></div>
        ";
        }
        // line 76
        echo " 
      </div>
    </div>
  ";
    }

    public function getTemplateName()
    {
        return "themes/ticketmatic/template/block/block--bundle--banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 76,  107 => 75,  105 => 74,  102 => 73,  96 => 72,  93 => 71,  87 => 69,  85 => 68,  79 => 66,  75 => 65,  69 => 80,  67 => 65,  62 => 63,  57 => 61,  53 => 60,  50 => 59,  48 => 58,  44 => 56,  42 => 52,  41 => 51,  40 => 49,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/ticketmatic/template/block/block--bundle--banner.html.twig", "C:\\xampp\\htdocs\\ticketmatic\\ticketmatic\\themes\\ticketmatic\\template\\block\\block--bundle--banner.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 49, "block" => 65, "if" => 68);
        static $filters = array("clean_class" => 51, "escape" => 60, "raw" => 69);
        static $functions = array("file_url" => 58);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['clean_class', 'escape', 'raw'],
                ['file_url']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
