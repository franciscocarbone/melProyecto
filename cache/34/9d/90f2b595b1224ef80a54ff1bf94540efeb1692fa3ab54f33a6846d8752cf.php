<?php

/* _clima_envio.twig.html */
class __TwigTemplate_349d90f2b595b1224ef80a54ff1bf94540efeb1692fa3ab54f33a6846d8752cf extends Twig_Template
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
        echo "
";
        // line 2
        if ((isset($context["mensajeError"]) ? $context["mensajeError"] : null)) {
            // line 3
            echo "    <div class=\"clear\"></div>
    ";
            // line 4
            $this->env->loadTemplate("const/mensaje.twig.html")->display($context);
        } else {
            // line 6
            echo "    <div class=\"clima\">              
        <p><strong>Pronóstico del clima: </strong>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "descripcion"), "html", null, true);
            echo " | ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "temp"), 0, ",", "."), "html", null, true);
            echo " ºC</p>
        <img src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "url"), "html", null, true);
            echo "\" />
        <p><strong>Ciudad: </strong>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "ciudad"), "html", null, true);
            echo "</p>
        <p><strong>Máxima: </strong>";
            // line 10
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "tempMax"), 1, ",", "."), "html", null, true);
            echo "ºC</p>
        <p><strong>Mínima: </strong>";
            // line 11
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "tempMin"), 1, ",", "."), "html", null, true);
            echo "ºC</p>
        <p> <strong>Presión: </strong>";
            // line 12
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "presion"), 2, ",", "."), "html", null, true);
            echo " hPa</p>
        <p> <strong>Humedad: </strong>";
            // line 13
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["clima"]) ? $context["clima"] : null), "humedad"), 1, ",", "."), "html", null, true);
            echo "%</p>    
    </div> 
";
        }
        // line 16
        echo "
";
    }

    public function getTemplateName()
    {
        return "_clima_envio.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 16,  59 => 13,  55 => 12,  51 => 11,  47 => 10,  43 => 9,  39 => 8,  33 => 7,  30 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
