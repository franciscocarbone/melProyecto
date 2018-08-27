<?php

/* resumen_entidades.twig.html */
class __TwigTemplate_1f561dde9b8adfdea867ad97f19475c8ffe4f60659592715d92805736adb9a4c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html> 
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"es\"> 
";
        // line 3
        $this->env->loadTemplate("const/head.twig.html")->display($context);
        // line 4
        echo "<body> 
\t<div class=\"tope\">

\t\t<header>
\t\t\t<img src=\"imagenes/logo_web3.jpg\" alt=\"logo Banco Alimentario La Plata\">
\t\t\t<nav class=\"menu\">
\t\t\t\t<ul>
\t\t\t\t\t<li><a href=\"index.php\">INICIO</a></li>
\t\t\t\t\t<li><a href=\"index.php?ctl=linked_in\">NOSOTROS</a></li>
\t\t\t\t\t<li><a>VOLUNTARIADO</a></li>
\t\t\t\t\t<li><a href=\"index.php?ctl=resumen_entidades\" class=\"color_active\">AYUDAMOS A</a></li>
\t\t\t\t\t<li><a href=\"index.php?ctl=resumen_donantes\">DONANTES</a></li>
\t\t\t\t\t<li><a>COLABORADORES</a></li>
\t\t\t\t\t<li><a>CONTACTO</a></li>
\t\t\t\t</ul>
\t\t\t</nav>
\t\t</header>

\t</div>

\t<div class=\"conteiner\">
\t\t
\t\t<div class=\"content\">
\t\t\t<div class=\"usuario\"></div>\t
\t\t\t<div class=\"clear\"></div>
\t\t\t<!--";
        // line 29
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        echo "-->
\t\t\t
\t\t\t<!--\t<li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
\t\t\t
\t\t\t\t<li><span><a href=\"abm_entidades.php?action=listAdmin\" class=\"color_active\">ENTIDADES</a></span></li> -->
\t\t\t\t
\t\t\t<section >\t\t\t\t\t
\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t<table class=\"tabla\">
\t\t\t\t\t<caption><h1>Nuestras Entidades</h1></caption>
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t   <tr class=\"encabezado\">
\t\t\t\t\t\t\t<th class=\"th_razon_social\">Razon Social</th>
\t\t\t\t\t\t\t<th class=\"th_telefono\">Telefono</th>
\t\t\t\t\t\t\t<th class=\"th_domicilio\">Domicilio</th>
\t\t\t\t\t\t   </tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entidades"]) ? $context["entidades"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entidad"]) {
            // line 48
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"td_razon_social\">";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "razon_social"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"td_telefono\">";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "telefono"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"td_domicilio\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "domicilio"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entidad'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "\t
\t\t\t\t\t\t</tbody>

\t\t\t\t</table>
\t\t\t<input class=\"btnAgregarAlimento\" type=\"submit\" onclick=\"location.href='index.php'\"  value=\"Volver\" >\t\t
\t\t\t</section>

\t\t</div>

\t</div>
\t<div class=\"clear\"></div>
\t";
        // line 64
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 65
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "resumen_entidades.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 65,  110 => 64,  97 => 53,  88 => 51,  84 => 50,  80 => 49,  77 => 48,  73 => 47,  52 => 29,  25 => 4,  23 => 3,  19 => 1,);
    }
}
