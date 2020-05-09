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

/* favorite.html.twig */
class __TwigTemplate_ab086737775b507dcca868c647b6b94ef982044b457064c2c6896a320c4ebeb2 extends \Twig\Template
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
\t\t<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>
\t\t<link href=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_constant("training\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "css/training.css\" rel=\"stylesheet\" type=\"text/css\"/>
\t\t<title>筋トレメニュー</title>
\t</head>

\t<body>
\t\t<div id=\"wrapper\">
\t\t\t<div id=\"favorite_list\">
\t\t\t\t<dd>
\t\t\t\t\t<span style=\"font-size:120%;\">
\t\t\t\t\t\tお気に入りリスト
\t\t\t\t\t</span>
\t\t\t\t</dd>
\t\t\t\t<p>お気に入りリスト</p>

\t\t\t\t";
        // line 18
        if ((twig_length_filter($this->env, ($context["dataArr"] ?? null)) == 0)) {
            // line 19
            echo "\t\t\t\t\t<p>お気に入りはありません</p>
\t\t\t\t";
        } else {
            // line 21
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["dataArr"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 22
                echo "\t\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t<li class=\"name\" style=\"font-size:120%;\">";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "menu_name", [], "any", false, false, false, 24), "html", null, true);
                echo "</li>
\t\t\t\t\t\t\t\t<dd>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "detail", [], "any", false, false, false, 25), "html", null, true);
                echo "</dd>
\t\t\t\t\t\t\t\t<dt>
\t\t\t\t\t\t\t\t\t<input type=\"button\" onclick=\"location.href='./index.php?display=favorite&fav_id=";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "fav_id", [], "any", false, false, false, 27), "html", null, true);
                echo "'\" value=\"削除\"/>
\t\t\t\t\t\t\t\t</dt>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "\t\t\t\t";
        }
        // line 33
        echo "\t\t\t\t<div id=\"search_button\">
\t\t\t\t\t<input type=\"button\" name=\"back\" onclick=\"location.href='./index.php'\" value=\"検索へ戻る\"/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "favorite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 33,  94 => 32,  83 => 27,  78 => 25,  74 => 24,  70 => 22,  65 => 21,  61 => 19,  59 => 18,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "favorite.html.twig", "C:\\xampp\\htdocs\\training\\views\\templates\\favorite.html.twig");
    }
}
