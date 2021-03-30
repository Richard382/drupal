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

/* themes/ticketmatic/template/layout/page--front.html.twig */
class __TwigTemplate_4c441e39529f0073b6ba8497d1b90ffc6bd0d94de5692c57b025590aaeccd421 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "<header class=\"header-wrapper\">
    <div class=\"header-top \">
      <div class=\"container\">";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
        echo "</div>
    </div>
    <div class=\"menu-bottom\">
      <div class=\"container\">
        <div class=\"row\">
        <div class=\"logo-area col-sm-3\">
          ";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo " 
        </div>
        <div class=\"header-menu-bottom col-sm-9\">";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
        echo "</div>
      </div>
    </div>
    </div>
</header>

";
        // line 61
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 61)) {
            // line 62
            echo "    <div class=\"banner_area\">
      ";
            // line 63
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
            echo "
    </div>
";
        }
        // line 66
        echo "

";
        // line 69
        $context["content_classes"] = [0 => (((twig_get_attribute($this->env, $this->source,         // line 70
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 70) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 70))) ? ("col-sm-6") : ("")), 1 => (((twig_get_attribute($this->env, $this->source,         // line 71
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 71) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 71)))) ? ("col-sm-9") : ("")), 2 => (((twig_get_attribute($this->env, $this->source,         // line 72
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 72) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 72)))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 73
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 73)) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 73)))) ? ("col-sm-12") : (""))];
        // line 76
        echo "<main role=\"main\" id=\"maindiv\">
  <div class=\"maincontent container\">
    <div class=\"row\">
\t\t\t<section";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 79), 79, $this->source), "html", null, true);
        echo ">
\t\t\t\t";
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
        echo "
\t\t\t</section>
    </div>
  </div>
</div>
";
        // line 85
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_area", [], "any", false, false, true, 85)) {
            // line 86
            echo "  <div class=\"content-bottom-wrapper\">
      <div class=\"content-bottom-area container\">";
            // line 87
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_area", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
            echo "</div>
  </div>
";
        }
        // line 90
        echo "
<footer class=\"footer-wrapper\">
  <div class=\"footer-top-section\">";
        // line 92
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 92), 92, $this->source), "html", null, true);
        echo "</div>
  <div class=\"footer-top\">
    <div class=\"container\">
      <div class=\"row\">
          <div class=\"col-sm-3 footer-first\">";
        // line 96
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 96), 96, $this->source), "html", null, true);
        echo "</div>
          <div class=\"col-sm-3 footer-second\">";
        // line 97
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
        echo "</div>
          <div class=\"col-sm-3 footer-third\">";
        // line 98
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 98), 98, $this->source), "html", null, true);
        echo "</div>
          <div class=\"col-sm-3 footer-fourth\">";
        // line 99
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
        echo "</div>
       </div>
    </div>
  </div>
  <div class=\"footer-bottom\">
    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col-sm-10 footer-bottom-right\">
             ";
        // line 107
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_left", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
        echo "
        </div> 
        <div class=\"col-sm-2 footer-bottom-right\">
             ";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_right", [], "any", false, false, true, 110), 110, $this->source), "html", null, true);
        echo "
        </div>
      </div>
    </div>
  </div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "themes/ticketmatic/template/layout/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 110,  149 => 107,  138 => 99,  134 => 98,  130 => 97,  126 => 96,  119 => 92,  115 => 90,  109 => 87,  106 => 86,  104 => 85,  96 => 80,  92 => 79,  87 => 76,  85 => 73,  84 => 72,  83 => 71,  82 => 70,  81 => 69,  77 => 66,  71 => 63,  68 => 62,  66 => 61,  57 => 55,  52 => 53,  43 => 47,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/ticketmatic/template/layout/page--front.html.twig", "C:\\xampp\\htdocs\\ticketmatic\\ticketmatic\\themes\\ticketmatic\\template\\layout\\page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 61, "set" => 69);
        static $filters = array("escape" => 47);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape'],
                []
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
