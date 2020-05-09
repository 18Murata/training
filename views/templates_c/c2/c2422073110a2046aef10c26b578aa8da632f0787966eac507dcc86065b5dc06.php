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

/* search.html.twig */
class __TwigTemplate_4cc605182bcebb71bb48711476b75abae4b4c8904f36a26c512b8c72e8f7e4f6 extends \Twig\Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<html>
\t<head>
\t\t<meta htto-equive=\"content-type\" content=\"text/html; charaset=utf-8\"/>
\t\t<link href=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "css/training.css\" rel=\"stylesheet\" type=\"text/css\"/>
\t\t<title>筋トレメニュー</title>
\t</head>

\t<body>
\t\t<div id=\"wrapper\">
\t\t\t<div id=\"category\">
\t\t\t\t";
        // line 11
        $this->loadTemplate("category_menu.html.twig", "search.html.twig", 11)->display($context);
        // line 12
        echo "\t\t\t</div>
\t\t\t<div id=\"menu_list\">
\t\t\t\t<span style=\"font-size:120%;\">メニュー</span>
\t\t\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dataArr"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 16
            echo "\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li class=\"name\">
\t\t\t\t\t\t\t\t<a href=\"";
            // line 19
            echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
            echo "index.php?display=detail&menu_id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "menu_id", [], "any", false, false, false, 19), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "menu_name", [], "any", false, false, false, 19), "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "\t\t\t</div>
\t\t\t<div id=\"favorite_button\">
\t\t\t\t<input type=\"button\" name=\"favorite_in\" onclick=\"location.href='./index.php?display=favorite'\" value=\"お気に入りリスト\"/>
\t\t\t</div>
\t\t</body>
\t</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 24,  68 => 19,  63 => 16,  59 => 15,  54 => 12,  52 => 11,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "search.html.twig", "C:\\xampp\\htdocs\\training\\views\\templates\\search.html.twig");
    }
}
