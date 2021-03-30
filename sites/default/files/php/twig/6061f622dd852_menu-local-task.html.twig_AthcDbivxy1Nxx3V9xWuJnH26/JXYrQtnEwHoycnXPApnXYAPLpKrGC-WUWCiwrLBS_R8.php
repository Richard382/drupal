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

/* themes/contrib/bootstrap4/templates/navigation/menu-local-task.html.twig */
class __TwigTemplate_bb5ef6c69a2d05bc1f7d6cad5eb2fd29b5d834782c1d62fb2cf0080bea9aa63b extends \Twig\Template
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
        // line 18
        $context["classes"] = [0 => "nav-item", 1 => ((        // line 20
($context["is_active"] ?? null)) ? ("nav-link active") : (""))];
        // line 23
        echo "<li";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 23), 23, $this->source), "html", null, true);
        echo ">
  ";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null), 24, $this->source), "html", null, true);
        echo "
  ";
        // line 25
        if ((($context["is_active"] ?? null) && (($context["level"] ?? null) == "primary"))) {
            // line 26
            echo "    <a href=\"#\" class=\"tab-toggle dropdown-toggle\" data-drupal-nav-tabs-toggle aria-haspopup=\"true\" aria-expanded=\"false\">
      <span class=\"visually-hidden\">";
            // line 27
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle tabs as a menu"));
            echo "</span>
    </a>
  ";
        }
        // line 30
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap4/templates/navigation/menu-local-task.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 30,  56 => 27,  53 => 26,  51 => 25,  47 => 24,  42 => 23,  40 => 20,  39 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap4/templates/navigation/menu-local-task.html.twig", "C:\\xampp\\htdocs\\ticketmatic\\ticketmatic\\themes\\contrib\\bootstrap4\\templates\\navigation\\menu-local-task.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 18, "if" => 25);
        static $filters = array("escape" => 23, "t" => 27);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 't'],
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
