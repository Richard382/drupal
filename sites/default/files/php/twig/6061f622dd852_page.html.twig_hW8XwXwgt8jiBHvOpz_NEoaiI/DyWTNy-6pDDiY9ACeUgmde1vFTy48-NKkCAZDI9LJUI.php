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

/* themes/ticketmatic/template/layout/page.html.twig */
class __TwigTemplate_3e23ba351fd4c3b24f5e41badbf6d9273e87fd5d00bd9c1d45eda6dca767c007 extends \Twig\Template
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
          <div class=\"region region-nav-branding\">
            <div id=\"block-ticketmatic-branding\">
              <div class=\"navbar-brand d-flex align-items-center\">
                <a href=\"/\" title=\"Home\" rel=\"home\" class=\"site-logo d-block\">
                  <img src=\"/themes/ticketmatic/sitelogo.svg\" alt=\"Home\">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class=\"header-menu-bottom col-sm-9\">";
        // line 63
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
        echo "</div>
      </div>
    </div>
    </div>
</header>

";
        // line 69
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 69)) {
            // line 70
            echo "    <div class=\"banner_area\">
      ";
            // line 71
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
            echo "
    </div>
";
        }
        // line 74
        echo "

";
        // line 77
        $context["content_classes"] = [0 => (((twig_get_attribute($this->env, $this->source,         // line 78
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 78) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 78))) ? ("col-sm-6") : ("")), 1 => (((twig_get_attribute($this->env, $this->source,         // line 79
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 79) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 79)))) ? ("col-sm-9") : ("")), 2 => (((twig_get_attribute($this->env, $this->source,         // line 80
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 80) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 80)))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 81
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 81)) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 81)))) ? ("col-sm-12") : (""))];
        // line 84
        echo "<main role=\"main\" id=\"maindiv\">
  <div class=\"maincontent container\">
    <div class=\"row\">
\t\t\t<section";
        // line 87
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 87), 87, $this->source), "html", null, true);
        echo ">
\t\t\t\t";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
        echo "
\t\t\t</section>
    </div>
  </div>
</div>
";
        // line 93
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_area", [], "any", false, false, true, 93)) {
            // line 94
            echo "  <div class=\"content-bottom-wrapper\">
      <div class=\"content-bottom-area\">";
            // line 95
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_area", [], "any", false, false, true, 95), 95, $this->source), "html", null, true);
            echo "</div>
  </div>
";
        }
        // line 98
        echo "
";
        // line 99
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_container", [], "any", false, false, true, 99)) {
            // line 100
            echo "  <div class=\"content_bottom_container \">
      <div class=\"content-bottom-container-area\">";
            // line 101
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_container", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
            echo "</div>
  </div>
";
        }
        // line 104
        echo "
<footer class=\"footer-wrapper\">
  <div class=\"footer-top-section\">";
        // line 106
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 106), 106, $this->source), "html", null, true);
        echo "</div>
  <div class=\"footer-top\">
    <div class=\"container\">
      <div class=\"row\">
          <div class=\"col-sm-3 footer-first\">";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 110), 110, $this->source), "html", null, true);
        echo "</div>
          <div class=\"col-sm-3 footer-second\">";
        // line 111
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 111), 111, $this->source), "html", null, true);
        echo "</div>
          <div class=\"col-sm-3 footer-third\">";
        // line 112
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 112), 112, $this->source), "html", null, true);
        echo "</div>
          <div class=\"col-sm-3 footer-fourth\">";
        // line 113
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 113), 113, $this->source), "html", null, true);
        echo "</div>
       </div>
    </div>
  </div>
  <div class=\"footer-bottom\">
    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col-sm-10 footer-bottom-right\">
             ";
        // line 121
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_left", [], "any", false, false, true, 121), 121, $this->source), "html", null, true);
        echo "
        </div> 
        <div class=\"col-sm-2 footer-bottom-right\">
             ";
        // line 124
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_right", [], "any", false, false, true, 124), 124, $this->source), "html", null, true);
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
        return "themes/ticketmatic/template/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 124,  168 => 121,  157 => 113,  153 => 112,  149 => 111,  145 => 110,  138 => 106,  134 => 104,  128 => 101,  125 => 100,  123 => 99,  120 => 98,  114 => 95,  111 => 94,  109 => 93,  101 => 88,  97 => 87,  92 => 84,  90 => 81,  89 => 80,  88 => 79,  87 => 78,  86 => 77,  82 => 74,  76 => 71,  73 => 70,  71 => 69,  62 => 63,  43 => 47,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/ticketmatic/template/layout/page.html.twig", "C:\\Users\\DELL\\Sites\\devdesktop\\ticketmatic\\themes\\ticketmatic\\template\\layout\\page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 69, "set" => 77);
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
