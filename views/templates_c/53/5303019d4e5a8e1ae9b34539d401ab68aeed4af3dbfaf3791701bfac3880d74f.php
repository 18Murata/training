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

/* detail.html.twig */
class __TwigTemplate_dee29a7c56b7885fb39d05d974314a4df983e47f53cf74a0421734f488e824f6 extends \Twig\Template
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
\t\t<meta http-equive=\"content-type\" content=\"text/html; charset=utf-8\"/>
\t\t<script language=\"JavaScript\" type=\"text/javascript\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "js/jquery-3.2.1.min.js\"></script>
\t\t<script language=\"JavaScript\" type-\"text/javascript\" src=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "js/training.js\"></script>
\t\t<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "css/training.css\" rel=\"stylesheet\" type=\"text/css\"/>
\t\t<title>筋トレメニュー</title>
\t</head>

\t<body>
\t\t<input type=\"hidden\" name=\"entry_url\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "\" id=\"entry_url\">
\t\t<div id=\"wrapper\">
\t\t\t";
        // line 13
        $this->loadTemplate("category_menu.html.twig", "detail.html.twig", 13)->display($context);
        // line 14
        echo "\t\t\t<div id=\"menu_detail\">
\t\t\t\t<div class=\"detail\">
\t\t\t\t\t<dl>
\t\t\t\t\t\t<dd>
\t\t\t\t\t\t\t<li style=\"font-size:120%;\">
\t\t\t\t\t\t\t\t";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["menuData"] ?? null), "menu_name", [], "any", false, false, false, 19), "html", null, true);
        echo "
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</dd>
\t\t\t\t\t\t<!--<dt>部位</dt>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<dd>";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["menuData"] ?? null), "category_id", [], "any", false, false, false, 23), "html", null, true);
        echo "</dd>-->
\t\t\t\t\t\t<dt>詳細</dt>
\t\t\t\t\t\t<dd>";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["menuData"] ?? null), "detail", [], "any", false, false, false, 25), "html", null, true);
        echo "</dd>
\t\t\t\t\t\t<input type=\"hidden\" naem=\"menu_id\" id=\"menu_id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["menuData"] ?? null), "menu_id", [], "any", false, false, false, 26), "html", null, true);
        echo "\">
\t\t\t\t\t</dl>
\t\t\t\t</div>
\t\t\t\t<div class=\"favorite_in\">
\t\t\t\t\t<input type=\"button\" name=\"back\" value=\"検索へ戻る\" onclick=\"history.back(); return false;\"/>
\t\t\t\t\t<input type=\"button\" name=\"favorite_in\" value=\"お気に入りする\" id=\"favorite_in\"/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 26,  84 => 25,  79 => 23,  72 => 19,  65 => 14,  63 => 13,  58 => 11,  50 => 6,  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "detail.html.twig", "C:\\xampp\\htdocs\\training\\views\\templates\\Detail.html.twig");
    }
}
