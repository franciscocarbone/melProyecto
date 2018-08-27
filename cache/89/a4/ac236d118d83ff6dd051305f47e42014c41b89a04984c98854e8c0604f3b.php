<?php

/* const/log_usuario.twig.html */
class __TwigTemplate_89a4ac236d118d83ff6dd051305f47e42014c41b89a04984c98854e8c0604f3b extends Twig_Template
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
        echo "<div class=\"configuracion\">
     
</div>

<div class=\"usuario\">
 <a href=\"backend.php?ctl=editar_configuracion\">
        <img src=\"imagenes/settings16.png\" alt=\"Configuraciones\" title=\"CONFIGURACIÓNES\">
    </a>
\t<span id=\"optlogout\" ><a href=\"backend.php?ctl=logout\">CERRAR SESION</a></span>

\t<span id=\"optusuario\" >";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["nombre"]) ? $context["nombre"] : null), "html", null, true);
        echo "</span>
    | <span id=\"optrol\" >";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["rol"]) ? $context["rol"] : null), "html", null, true);
        echo "</span>
</div>";
    }

    public function getTemplateName()
    {
        return "const/log_usuario.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 12,  31 => 11,  66 => 31,  64 => 30,  55 => 24,  51 => 22,  48 => 21,  46 => 20,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
