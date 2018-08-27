<?php

/* const/mensaje.twig.html */
class __TwigTemplate_bfdcb99ec9dafdb864cfba0a7f62d27c439544ca72eccc3be5cd8b14ecf1ecdc extends Twig_Template
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
        if (((isset($context["mensajeTipo"]) ? $context["mensajeTipo"] : null) == "ERROR")) {
            // line 2
            echo "    <div class=\"mensajeError\">
        <a >";
            // line 3
            echo twig_escape_filter($this->env, (isset($context["mensajeError"]) ? $context["mensajeError"] : null), "html", null, true);
            echo "</a>
    </div>
";
        } elseif (((isset($context["mensajeTipo"]) ? $context["mensajeTipo"] : null) == "SUCCESS")) {
            // line 6
            echo "    <div class=\"mensajeConfirmacion\">
        <a >";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["mensajeConfirmacion"]) ? $context["mensajeConfirmacion"] : null), "html", null, true);
            echo "</a>
    </div>
";
        }
        // line 10
        echo "

";
    }

    public function getTemplateName()
    {
        return "const/mensaje.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 10,  33 => 7,  30 => 6,  24 => 3,  21 => 2,  53 => 29,  51 => 28,  25 => 4,  23 => 3,  19 => 1,);
    }
}
