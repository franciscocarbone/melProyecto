<?php

/* linkedin.twig.html */
class __TwigTemplate_d1f2b1bf0934545e1ea3831b87257d40c864ead61f4154601c633c419da40a5c extends Twig_Template
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
    <div class=\"tope\">

        <header>
            <img src=\"imagenes/logo_web3.jpg\" alt=\"logo Banco Alimentario La Plata\">
            <nav class=\"menu\">
                <ul>
                    <li><a href=\"index.php\">INICIO</a></li>
                    <li><a href=\"index.php?ctl=linked_in\" class=\"color_active\">NOSOTROS</a></li>
                    <li><a>VOLUNTARIADO</a></li>
                    <li><a href=\"index.php?ctl=resumen_entidades\">AYUDAMOS A</a></li>
                    <li><a href=\"index.php?ctl=resumen_donantes\">DONANTES</a></li>
                    <li><a>COLABORADORES</a></li>
                    <li><a>CONTACTO</a></li>
                </ul>
            </nav>
        </header>

    </div>

    <div class=\"conteiner\">
        
        <div class=\"content\">
            <div class=\"usuario\"></div> 
            <div class=\"clear\"></div>      
                <p>Nombre: ";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["nombre"]) ? $context["nombre"] : null), "html", null, true);
        echo "</p>
                <p>Apellido: ";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["apellido"]) ? $context["apellido"] : null), "html", null, true);
        echo "</p>
                <p>Actividad: ";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["actividad"]) ? $context["actividad"] : null), "html", null, true);
        echo "</p>
                <img src='\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["imagen"]) ? $context["imagen"] : null), "html", null, true);
        echo "\"' alt='imagen de perfil' />  
        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 37
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 38
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "linkedin.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 38,  72 => 37,  64 => 32,  60 => 31,  56 => 30,  52 => 29,  25 => 4,  23 => 3,  19 => 1,);
    }
}
