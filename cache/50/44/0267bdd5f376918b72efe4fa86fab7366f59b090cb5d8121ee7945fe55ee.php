<?php

/* index.twig.html */
class __TwigTemplate_50440267bdd5f376918b72efe4fa86fab7366f59b090cb5d8121ee7945fe55ee extends Twig_Template
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
\t\t\t\t\t<li><a href=\"index.php\" class=\"color_active\">INICIO</a></li>
\t\t\t\t\t<li><a href=\"index.php?ctl=linked_in\">NOSOTROS</a></li>
\t\t\t\t\t<li><a>VOLUNTARIADO</a></li>
\t\t\t\t\t<li><a href=\"index.php?ctl=resumen_entidades\">AYUDAMOS A</a></li>
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
\t\t\t<div class=\"login\" ><a href=\"index.php?ctl=login\">Login</a></div>
\t\t\t<h1>Bienvenidos al Banco Alimentario de La Plata</h1>
\t\t
\t\t\t<div class=\"content_voluntariado\">
\t\t\t    <div class=\"desc_voluntariado\">
\t\t\t       
\t\t\t    </div>
\t\t\t    <img src=\"imagenes/voluntariado-cooperativo.jpg\" class=\"img_voluntariado\" alt=\"Voluntariado\">
\t\t\t</div>\t\t
\t\t\t
\t\t\t<div class=\"content_comedor\">
\t\t\t    <div class=\"desc_comedor\">
\t\t\t        <p>NUESTROS PROYECTOS</p>
\t\t\t    </div>
\t\t\t    <img src=\"imagenes/imagen-comedores.jpg\" class=\"img_comedor\" alt=\"Comedores\">
\t\t\t</div>

\t\t\t<div class=\"content_comedor\">
\t\t\t    <div class=\"desc_comedor\">
\t\t\t        <p>¿QUERES SER VOLUNTARIO?</p>
\t\t\t    </div>
\t\t\t    <img src=\"imagenes/sumate-como-voluntario.jpg\" class=\"img_comedor\" alt=\"Sumate como voluntario\">
\t\t\t</div>

\t\t\t<div class=\"content_comedor\">
\t\t\t    <div class=\"desc_comedor\">
\t\t\t        <p>ENTIDADES</p>
\t\t\t    </div>
\t\t\t    <a href=\"index.php?ctl=resumen_entidades\"><img src=\"imagenes/nene-con-hambre.png\" class=\"img_comedor\" alt=\"Nene con hambre\"></a>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"content_comedor\">
\t\t\t    <div class=\"desc_comedor\">
\t\t\t        <p>DONANTES</p>
\t\t\t    </div>
\t\t\t    <a href=\"index.php?ctl=resumen_donantes\"><img src=\"imagenes/mailchimp.jpg\" class=\"img_comedor\" alt=\"Colecta de leche\"></a>
\t\t\t</div>\t

\t\t</div>
\t</div>
\t<div class=\"clear\"></div>
\t";
        // line 67
        $this->env->loadTemplate("const/footer.twig.html")->display($context);
        // line 68
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "index.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 68,  90 => 67,  25 => 4,  23 => 3,  19 => 1,);
    }
}
