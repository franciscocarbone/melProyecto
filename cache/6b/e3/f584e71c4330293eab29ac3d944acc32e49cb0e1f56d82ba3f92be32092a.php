<?php

/* login.twig.html */
class __TwigTemplate_6be3f584e71c4330293eab29ac3d944acc32e49cb0e1f56d82ba3f92be32092a extends Twig_Template
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
\t";
        // line 3
        $this->env->loadTemplate("const/head.twig.html")->display($context);
        // line 4
        echo "\t<body> 
\t\t<div class=\"tope\">
\t\t\t<header>
\t\t\t\t<img src=\"imagenes/logo_web3.jpg\" alt=\"logo Banco Alimentario La Plata\">\t\t\t
\t\t\t</header>
\t\t</div>
\t\t<div class=\"conteiner\">
\t\t\t
\t\t\t<div class=\"content\">
\t\t\t\t
\t\t\t\t<section class=\"formularioLogin\">  
\t\t\t\t\t<div class=\"btnClose\" ><a href=\"index.php\">Volver</a></div>
\t\t\t\t    <form name=\"login\" action=\"backend.php?ctl=login\" method=\"post\" accept-charset=\"utf-8\">  
\t\t\t\t        <ul>  
\t\t\t\t            <li><label for=\"usuario\">Usuario</label>  
\t\t\t\t            <input type=\"text\" id=\"usuario\" name=\"usuario\" placeholder=\"Nombre Usuario\" required></li>  
\t\t\t\t            <li><label for=\"password\">Password</label>  
\t\t\t\t            <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"password\" required></li>  
\t\t\t\t            <li>  
\t\t\t\t            <input class=\"btnLogin\"  type=\"submit\" value=\"Login\"></li>  
\t\t\t\t        </ul>  
\t\t\t\t    </form>  
\t\t\t    </section> 
\t\t\t    <div class=\"clear\"></div>
\t\t\t\t";
        // line 28
        $this->env->loadTemplate("const/mensaje.twig.html")->display($context);
        // line 29
        echo "\t\t\t</div>
\t\t\t
\t\t</div>
\t\t<div class=\"clear\"></div>
\t\t<footer>
\t\t\t
\t\t</footer>
\t</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "login.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 29,  51 => 28,  25 => 4,  23 => 3,  19 => 1,);
    }
}
