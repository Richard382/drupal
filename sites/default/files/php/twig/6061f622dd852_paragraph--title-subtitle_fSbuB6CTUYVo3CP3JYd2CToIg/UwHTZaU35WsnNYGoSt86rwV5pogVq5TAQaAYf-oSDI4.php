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

/* themes/ticketmatic/template/paragraphs/paragraph--title-subtitle-description-and-t.html.twig */
class __TwigTemplate_0ce7dbb712e1ad45447790bdcebe4cda6baebd1de05edd91c42132a6a8562e15 extends \Twig\Template
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
        // line 42
        $context["classes"] = [0 => "paragraph", 1 => ("paragraph--type--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 44
($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 44), 44, $this->source))), 2 => ((        // line 45
($context["view_mode"] ?? null)) ? (("paragraph--view-mode--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 45, $this->source)))) : ("")), 3 => (( !twig_get_attribute($this->env, $this->source,         // line 46
($context["paragraph"] ?? null), "isPublished", [], "method", false, false, true, 46)) ? ("paragraph--unpublished") : (""))];
        // line 49
        $context["title"] = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 49);
        // line 50
        $context["sub_title"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_sub_title", [], "any", false, false, true, 50), "value", [], "any", false, false, true, 50);
        // line 51
        $context["description"] = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_description", [], "any", false, false, true, 51);
        // line 52
        $context["image_alignment"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_image_alignment", [], "any", false, false, true, 52), "value", [], "any", false, false, true, 52);
        // line 53
        $context["icon"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_sub_title_icon", [], "any", false, false, true, 53), "entity", [], "any", false, false, true, 53), "fileuri", [], "any", false, false, true, 53), 53, $this->source)]);
        // line 54
        $context["json"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_upload_lottie_json", [], "any", false, false, true, 54), "entity", [], "any", false, false, true, 54), "fileuri", [], "any", false, false, true, 54), 54, $this->source)]);
        // line 55
        $context["testimonial_image"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_image", [], "any", false, false, true, 55), "entity", [], "any", false, false, true, 55), "fileuri", [], "any", false, false, true, 55), 55, $this->source)]);
        // line 56
        $context["testimonial_description"] = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_testimonial_description", [], "any", false, false, true, 56);
        // line 57
        $context["testimonial_name"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_name", [], "any", false, false, true, 57), "value", [], "any", false, false, true, 57);
        // line 58
        $context["testimonial_designation"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_designation", [], "any", false, false, true, 58), "value", [], "any", false, false, true, 58);
        // line 59
        $context["testimonial_venue_logo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_venue_logo", [], "any", false, false, true, 59), "entity", [], "any", false, false, true, 59), "fileuri", [], "any", false, false, true, 59), 59, $this->source)]);
        // line 60
        echo "

";
        // line 62
        if ((($context["image_alignment"] ?? null) == "right")) {
            // line 63
            echo "<section class=\"section section--description-testimonial container\">
  <div class=\"row\">
    <div class=\"section--description-testimonial-content-left col-sm-6 ";
            // line 65
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image_alignment"] ?? null), 65, $this->source), "html", null, true);
            echo "\">  
        <div class=\"icon-subtitle\">
         ";
            // line 67
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_sub_title_icon", [], "any", false, false, true, 67), "value", [], "any", false, false, true, 67) == true)) {
                // line 68
                echo "            <div class=\"icon\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 68, $this->source), "html", null, true);
                echo "\" /></div>
         ";
            }
            // line 70
            echo "         ";
            if (($context["sub_title"] ?? null)) {
                // line 71
                echo "            <h4 class=\"title-subtitle\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_title"] ?? null), 71, $this->source), "html", null, true);
                echo "</h4>
         ";
            }
            // line 73
            echo "        </div> 
        ";
            // line 74
            if (($context["title"] ?? null)) {
                // line 75
                echo "          <h1 class=\"title\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 75, $this->source), "html", null, true);
                echo "</h1>
        ";
            }
            // line 76
            echo "  
        ";
            // line 77
            if (($context["description"] ?? null)) {
                // line 78
                echo "          <div class=\"description\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 78, $this->source), "html", null, true);
                echo "</div>
        ";
            }
            // line 79
            echo " 
        ";
            // line 80
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_url_link", [], "any", false, false, true, 80), "value", [], "any", false, false, true, 80) == true)) {
                // line 81
                echo "          <div class=\"cta-button\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_url_link", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
                echo "</div>
        ";
            }
            // line 82
            echo "   
        ";
            // line 83
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_icon", [], "any", false, false, true, 83), "value", [], "any", false, false, true, 83) == true)) {
                // line 84
                echo "          <div class=\"icon pb-4\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 84, $this->source), "html", null, true);
                echo "\" /></div>
        ";
            }
            // line 85
            echo "  
    </div> 
    <div class=\"section--description-testimonial-content-left col-sm-6\">  
      <div class=\"lottie-content\"><lottie-player src=\"";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["json"] ?? null), 88, $this->source), "html", null, true);
            echo "\" background=\"transparent\" speed=\"1\" loop autoplay></lottie-player></div> 
      <div class=\"testimonial\">
        ";
            // line 90
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_image", [], "any", false, false, true, 90), "value", [], "any", false, false, true, 90) == true)) {
                // line 91
                echo "          <div class=\"testimonial_image\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_image"] ?? null), 91, $this->source), "html", null, true);
                echo "\" /></div>
        ";
            }
            // line 93
            echo "        <div class=\"testimonial-content\">
          ";
            // line 94
            if (($context["testimonial_description"] ?? null)) {
                // line 95
                echo "            <div class=\"testimonial-description\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_description"] ?? null), 95, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            // line 96
            echo " 
          ";
            // line 97
            if (($context["testimonial_name"] ?? null)) {
                // line 98
                echo "            <div class=\"testimonial-name\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_name"] ?? null), 98, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            // line 99
            echo " 
          ";
            // line 100
            if (($context["testimonial_designation"] ?? null)) {
                // line 101
                echo "            <div class=\"testimonial-designation\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_designation"] ?? null), 101, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            // line 102
            echo " 
          ";
            // line 103
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_venue_logo", [], "any", false, false, true, 103), "value", [], "any", false, false, true, 103) == true)) {
                // line 104
                echo "            <div class=\"testimonial-venue-logo\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_venue_logo"] ?? null), 104, $this->source), "html", null, true);
                echo "\" /></div>
          ";
            }
            // line 106
            echo "        </div>
      </div>
    </div>     
  </div>
</section>
";
        } else {
            // line 112
            echo "<section class=\"section section--description-testimonial container\">
  <div class=\"row\">
    <div class=\"section--description-testimonial-content-left col-sm-6\">  
      <div class=\"lottie-content\"><lottie-player src=\"";
            // line 115
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["json"] ?? null), 115, $this->source), "html", null, true);
            echo "\" background=\"transparent\" speed=\"1\" loop autoplay></lottie-player></div> 
      <div class=\"testimonial\">
        ";
            // line 117
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_image", [], "any", false, false, true, 117), "value", [], "any", false, false, true, 117) == true)) {
                // line 118
                echo "          <div class=\"testimonial_image\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_image"] ?? null), 118, $this->source), "html", null, true);
                echo "\" /></div>
        ";
            }
            // line 120
            echo "        <div class=\"testimonial-content\">
          ";
            // line 121
            if (($context["testimonial_description"] ?? null)) {
                // line 122
                echo "            <div class=\"testimonial-description\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_description"] ?? null), 122, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            // line 123
            echo " 
          ";
            // line 124
            if (($context["testimonial_name"] ?? null)) {
                // line 125
                echo "            <div class=\"testimonial-name\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_name"] ?? null), 125, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            // line 126
            echo " 
          ";
            // line 127
            if (($context["testimonial_designation"] ?? null)) {
                // line 128
                echo "            <div class=\"testimonial-designation\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_designation"] ?? null), 128, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            // line 129
            echo " 
          ";
            // line 130
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_testimonial_venue_logo", [], "any", false, false, true, 130), "value", [], "any", false, false, true, 130) == true)) {
                // line 131
                echo "            <div class=\"testimonial-venue-logo\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["testimonial_venue_logo"] ?? null), 131, $this->source), "html", null, true);
                echo "\" /></div>
          ";
            }
            // line 133
            echo "        </div>
      </div>
    </div> 
    <div class=\"section--description-testimonial-content-left ";
            // line 136
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image_alignment"] ?? null), 136, $this->source), "html", null, true);
            echo " col-sm-6\">  
        <div class=\"icon-subtitle\">
         ";
            // line 138
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_sub_title_icon", [], "any", false, false, true, 138), "value", [], "any", false, false, true, 138) == true)) {
                // line 139
                echo "            <div class=\"icon\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 139, $this->source), "html", null, true);
                echo "\" /></div>
         ";
            }
            // line 141
            echo "         ";
            if (($context["sub_title"] ?? null)) {
                // line 142
                echo "            <h4 class=\"title-subtitle\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_title"] ?? null), 142, $this->source), "html", null, true);
                echo "</h4>
         ";
            }
            // line 144
            echo "        </div> 
        ";
            // line 145
            if (($context["title"] ?? null)) {
                // line 146
                echo "          <h1 class=\"title\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 146, $this->source), "html", null, true);
                echo "</h1>
        ";
            }
            // line 147
            echo "  
        ";
            // line 148
            if (($context["description"] ?? null)) {
                // line 149
                echo "          <div class=\"description\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 149, $this->source), "html", null, true);
                echo "</div>
        ";
            }
            // line 150
            echo " 
        ";
            // line 151
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_url_link", [], "any", false, false, true, 151), "value", [], "any", false, false, true, 151) == true)) {
                // line 152
                echo "          <div class=\"cta-button\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_url_link", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
                echo "</div>
        ";
            }
            // line 153
            echo "   
        ";
            // line 154
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_icon", [], "any", false, false, true, 154), "value", [], "any", false, false, true, 154) == true)) {
                // line 155
                echo "          <div class=\"icon pb-4\"><img src=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 155, $this->source), "html", null, true);
                echo "\" /></div>
        ";
            }
            // line 156
            echo "  
    </div>     
  </div>
</section>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/ticketmatic/template/paragraphs/paragraph--title-subtitle-description-and-t.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  345 => 156,  339 => 155,  337 => 154,  334 => 153,  328 => 152,  326 => 151,  323 => 150,  317 => 149,  315 => 148,  312 => 147,  306 => 146,  304 => 145,  301 => 144,  295 => 142,  292 => 141,  286 => 139,  284 => 138,  279 => 136,  274 => 133,  268 => 131,  266 => 130,  263 => 129,  257 => 128,  255 => 127,  252 => 126,  246 => 125,  244 => 124,  241 => 123,  235 => 122,  233 => 121,  230 => 120,  224 => 118,  222 => 117,  217 => 115,  212 => 112,  204 => 106,  198 => 104,  196 => 103,  193 => 102,  187 => 101,  185 => 100,  182 => 99,  176 => 98,  174 => 97,  171 => 96,  165 => 95,  163 => 94,  160 => 93,  154 => 91,  152 => 90,  147 => 88,  142 => 85,  136 => 84,  134 => 83,  131 => 82,  125 => 81,  123 => 80,  120 => 79,  114 => 78,  112 => 77,  109 => 76,  103 => 75,  101 => 74,  98 => 73,  92 => 71,  89 => 70,  83 => 68,  81 => 67,  76 => 65,  72 => 63,  70 => 62,  66 => 60,  64 => 59,  62 => 58,  60 => 57,  58 => 56,  56 => 55,  54 => 54,  52 => 53,  50 => 52,  48 => 51,  46 => 50,  44 => 49,  42 => 46,  41 => 45,  40 => 44,  39 => 42,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/ticketmatic/template/paragraphs/paragraph--title-subtitle-description-and-t.html.twig", "C:\\xampp\\htdocs\\ticketmatic\\ticketmatic\\themes\\ticketmatic\\template\\paragraphs\\paragraph--title-subtitle-description-and-t.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 42, "if" => 62);
        static $filters = array("clean_class" => 44, "escape" => 65);
        static $functions = array("file_url" => 53);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
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
