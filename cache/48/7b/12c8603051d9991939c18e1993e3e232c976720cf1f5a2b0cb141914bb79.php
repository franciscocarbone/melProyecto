<?php

/* backend.twig.html */
class __TwigTemplate_487b12c8603051d9991939c18e1993e3e232c976720cf1f5a2b0cb141914bb79 extends Twig_Template
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
\t\t</header>

\t</div>

\t<div class=\"conteiner\">
\t\t
\t\t<div class=\"content\">

\t\t\t";
        // line 17
        $this->env->loadTemplate("const/log_usuario.twig.html")->display($context);
        // line 18
        echo "\t
\t\t\t<div class=\"clear\"></div>
\t\t\t";
        // line 20
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        // line 21
        echo "\t\t\t";
        $this->env->loadTemplate("const/mensaje.twig.html")->display($context);
        // line 22
        echo "
\t\t\t<div class=\"clear\"></div>
\t\t\t";
        // line 24
        $this->env->loadTemplate("const/alertas.twig.html")->display($context);
        echo "    
\t\t\t      
\t\t</div>

\t</div>
\t<div class=\"clear\"></div>
\t";
        // line 30
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 31
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "backend.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 31,  64 => 30,  55 => 24,  51 => 22,  48 => 21,  46 => 20,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
