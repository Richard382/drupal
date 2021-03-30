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

/* themes/ticketmatic/template/paragraphs/paragraph--image-with-description.html.twig */
class __TwigTemplate_88206b62a627d99d7974e356991da958504f48e7c35372d69c11811cdc05e2e6 extends \Twig\Template
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
        $context["description"] = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_description", [], "any", false, false, true, 49);
        // line 50
        $context["json"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_upload_lottie_json", [], "any", false, false, true, 50), "entity", [], "any", false, false, true, 50), "fileuri", [], "any", false, false, true, 50), 50, $this->source)]);
        // line 51
        echo "
<section class=\"section section--image-with-description container\">
  <div class=\"row\">
    <div class=\"section--description-image-with-description-content\">  
      <div class=\"lottie-content\">
        <lottie-player src=\"";
        // line 56
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["json"] ?? null), 56, $this->source), "html", null, true);
        echo "\" background=\"transparent\" speed=\"1\" loop autoplay></lottie-player>
      </div> 
      ";
        // line 58
        if (($context["description"] ?? null)) {
            // line 59
            echo "        <div class=\"description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 59, $this->source), "html", null, true);
            echo "</div>
      ";
        }
        // line 60
        echo "     
    </div> 
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/ticketmatic/template/paragraphs/paragraph--image-with-description.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 60,  62 => 59,  60 => 58,  55 => 56,  48 => 51,  46 => 50,  44 => 49,  42 => 46,  41 => 45,  40 => 44,  39 => 42,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/ticketmatic/template/paragraphs/paragraph--image-with-description.html.twig", "C:\\xampp\\htdocs\\ticketmatic\\ticketmatic\\themes\\ticketmatic\\template\\paragraphs\\paragraph--image-with-description.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 42, "if" => 58);
        static $filters = array("clean_class" => 44, "escape" => 56);
        static $functions = array("file_url" => 50);

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
