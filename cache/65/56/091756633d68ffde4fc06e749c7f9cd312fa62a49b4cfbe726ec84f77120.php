<?php

/* resumen_donantes.twig.html */
class __TwigTemplate_6556091756633d68ffde4fc06e749c7f9cd312fa62a49b4cfbe726ec84f77120 extends Twig_Template
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
\t\t\t\t\t<li><a href=\"index.php?ctl=resumen_entidades\">AYUDAMOS A</a></li>
\t\t\t\t\t<li><a href=\"index.php?ctl=resumen_donantes\" class=\"color_active\">DONANTES</a></li>
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
\t        <div class=\"clear\"></div>
\t        
\t\t
\t\t\t<!--";
        // line 32
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        echo "-->
\t\t\t
\t\t\t<!--\t<li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
\t\t\t\t
\t\t\t\t<li><span><a href=\"abm_donantes.php?action=listAdmin\" class=\"color_active\">DONANTES</a></span></li>
\t\t\t\t-->
\t\t\t
\t\t\t<section >\t

\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t<table class=\"tabla\">
\t\t\t\t\t<caption><h1>Nuestros Donantes</h1></caption>
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr class=\"encabezado\">
\t\t\t\t\t\t\t<th class=\"th_razon_soc_don\">Razon Social</th>
\t\t\t\t\t\t\t<th class=\"th_apellido_don\">Apellido</th>
\t\t\t\t\t\t\t<th class=\"th_nombre_don\">Nombre</th>
\t\t\t\t\t\t\t<th class=\"th_mail_don\">Mail</th>      
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["donantes"]) ? $context["donantes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["donante"]) {
            // line 54
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"td_razon_soc_don\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "razon_social"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"td_apellido_don\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "apellido_contacto"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"td_nombre_don\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "nombre_contacto"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"td_mail_don\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "mail_contacto"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['donante'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "\t\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t<input class=\"btnAgregarAlimento\" type=\"submit\" onclick=\"location.href='index.php'\"  value=\"Volver\" >\t
\t\t\t</section>

\t\t</div>

\t</div>
\t<div class=\"clear\"></div>
\t";
        // line 70
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 71
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "resumen_donantes.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 71,  118 => 70,  107 => 61,  98 => 58,  94 => 57,  90 => 56,  86 => 55,  83 => 54,  79 => 53,  55 => 32,  25 => 4,  23 => 3,  19 => 1,);
    }
}
