<?php

/* abm_insertEdit_configuraciones.twig.html */
class __TwigTemplate_02aba1998e9be08d70a77e3ccfcecc685fba7a3077c2fa8e4e2d242523a4de7b extends Twig_Template
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
        echo "
<body> 
    <div class=\"tope\">

        <header>
            <img src=\"imagenes/logo_web3.jpg\" alt=\"logo Banco Alimentario La Plata\">
        </header>

    </div>

    <div class=\"conteiner\">
        
        <div class=\"content\">
            ";
        // line 17
        $this->env->loadTemplate("const/log_usuario.twig.html")->display($context);
        // line 18
        echo "            <div class=\"clear\"></div>
            ";
        // line 19
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        // line 20
        echo "            <!--<li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
            
            <li><span><a href=\"abm_entidades.php?action=listAdmin\" class=\"color_active\">ENTIDADES</a></span></li> -->
            <h1>Formulario de Configuraciónes</h1>
            <div class=\"formularioAltaAlimento\">
                <form name=\"altaConfiguracion\" action=\"backend.php?ctl=";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "usuario_id"), "html", null, true);
        echo "\" hidden></li>
                    <fieldset>
                        <legend class=\"detalle_alimento\">";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend> 
                        <ul>  
                           <li class=\"required\"><label for=\"latitud\">Latitud:</label>  
                           <input type=\"text\" id=\"latitud\" name=\"latitud\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "latitud"), "html", null, true);
        echo "\" placeholder=\"Latitud del Banco\" required></li> 
                    
                           <li class=\"required\"><label for=\"longitud\">Longitud:</label>  
                           <input type=\"text\" id=\"longitud\" name=\"longitud\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "longitud"), "html", null, true);
        echo "\" placeholder=\"Longitud del Banco\" required></li> 
                    
                           <li class=\"required\"><label for=\"vencimiento\">Vencimiento Mínimo:</label>  
                           <input type=\"number\" id=\"vencimiento\" name=\"vencimiento\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "vencimiento_stock"), "html", null, true);
        echo "\" placeholder=\"Días para Vencimiento\" required></li>

                           <li class=\"required\"><label for=\"api\">Clave API LinkedIn:</label>  
                           <input type=\"text\" id=\"api\" name=\"api\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "clave_api"), "html", null, true);
        echo "\" placeholder=\"Clave API Linkedin\" required></li>

                           <li class=\"required\"><label for=\"clave\">Clave Secreta LinkedIn:</label>  
                           <input type=\"text\" id=\"clave\" name=\"clave\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "clave_secreta"), "html", null, true);
        echo "\" placeholder=\"Clave Secreta Linkedin\" required></li>

                           <li class=\"required\"><label for=\"credencial\">Credencial Usuario LinkedIn:</label>  
                           <input type=\"text\" id=\"credencial\" name=\"credencial\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "credencial_usuario"), "html", null, true);
        echo "\" placeholder=\"Credencial Usuario\" required></li>

                           <li class=\"required\"><label for=\"secreto\">Secreto Usuario LinkedIn:</label>  
                           <input type=\"text\" id=\"secreto\" name=\"secreto\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "secreto_usuario"), "html", null, true);
        echo "\" placeholder=\"Secreto Usuario\" required></li>
                    
                    
                           <li><input class=\"btnAltaAlimento\" type=\"submit\" value=\"Guardar\"></li>          
                        </ul> 
                             
                    </fieldset>
                </form>
            </div>  

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 63
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 64
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_insertEdit_configuraciones.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 64,  122 => 63,  105 => 49,  99 => 46,  93 => 43,  87 => 40,  81 => 37,  75 => 34,  69 => 31,  63 => 28,  58 => 26,  54 => 25,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
