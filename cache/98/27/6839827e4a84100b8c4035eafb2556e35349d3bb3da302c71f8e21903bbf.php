<?php

/* abm_insertEdit_detalle_alimentos.twig.html */
class __TwigTemplate_98276839827e4a84100b8c4035eafb2556e35349d3bb3da302c71f8e21903bbf extends Twig_Template
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
        echo "    <!--<meta name=\"menu\" value=\"submenubackend_abm\" />
    <meta submenu=\"submenu\" value=\"\" /> -->
<body> 
    <div class=\"tope\">

        <header>
            <img src=\"imagenes/logo_web3.jpg\" alt=\"logo Banco Alimentario La Plata\">
        </header>

    </div>

    <div class=\"conteiner\">
        
        <div class=\"content\">

            ";
        // line 19
        $this->env->loadTemplate("const/log_usuario.twig.html")->display($context);
        // line 20
        echo "            <div class=\"clear\"></div>

            ";
        // line 22
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        // line 23
        echo "    
                    <!-- <li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
                    <li><span><a href=\"abm_alimentos.php?action=listAdmin\" class=\"color_active\">ALIMENTOS</a></span></li> -->

            <div class=\"formularioAltaAlimento\">
                <h1>Formulario de Alimentos</h1>
                <form name=\"altaAlimento\" action=\"backend.php?ctl=";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "id"), "html", null, true);
        echo "\" hidden></li>
                    <fieldset>
                        <legend class=\"detalle_alimento\">";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend>  
                        <ul>  
                            <li><label for=\"alimento\">Alimento:</label>  
                               <select id=\"alimento\" name=\"alimento\" required>
                                   ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["alimentos"]) ? $context["alimentos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["alimento"]) {
            // line 37
            echo "                                       ";
            if (($this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "codigo") == $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "alimento_codigo"))) {
                // line 38
                echo "                                             <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "codigo"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "descripcion"), "html", null, true);
                echo "</option>
                                       ";
            } else {
                // line 40
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "codigo"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "descripcion"), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 42
            echo "                                   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alimento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                               </select>
                               <a href=\"backend.php?ctl=listar_alimentos\" alt=\"add alimento\"><img class=\"addAlimento\" src=\"imagenes/add16.png\" title=\"Añadir Alimento\"></a>
                           </li>   

                            <li class=\"required\"><label for=\"fecha\">Fecha de Vencimiento:</label>  
                            <input type=\"date\" id=\"fecha\" name=\"fecha\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "fecha_vencimiento"), "html", null, true);
        echo "\" required></li> 
                            <li class=\"required\"><label for=\"contenido\">Contenido:</label>  
                            <input type=\"text\" id=\"contenido\" name=\"contenido\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "contenido"), "html", null, true);
        echo "\" placeholder=\"Contenido del Alimento\" required></li>

                            <li class=\"required\"><label for=\"peso\">Peso:</label>  
                            <input type=\"number\" id=\"peso\" name=\"peso\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "peso_paquete"), "html", null, true);
        echo "\" placeholder=\"Peso del Alimento\" required></li>

                            <li><input class=\"btnAltaAlimento\" type=\"submit\" name=\"btnAltaAlimento\" value=\"Guardar\"></li>  
                        </ul> 
                    </fieldset>
                </form>
            </div>  

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 65
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 66
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_insertEdit_detalle_alimentos.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 66,  136 => 65,  121 => 53,  115 => 50,  110 => 48,  103 => 43,  97 => 42,  89 => 40,  81 => 38,  78 => 37,  74 => 36,  67 => 32,  62 => 30,  58 => 29,  50 => 23,  48 => 22,  44 => 20,  42 => 19,  25 => 4,  23 => 3,  19 => 1,);
    }
}
