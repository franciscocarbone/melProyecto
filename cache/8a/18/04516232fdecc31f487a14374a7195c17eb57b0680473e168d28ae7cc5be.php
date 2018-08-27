<?php

/* abm_listado_donaciones.twig.html */
class __TwigTemplate_8a1804516232fdecc31f487a14374a7195c17eb57b0680473e168d28ae7cc5be extends Twig_Template
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
        echo "            ";
        $this->env->loadTemplate("const/mensaje.twig.html")->display($context);
        // line 21
        echo "            
            <!--    <li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
            
                <li><span><a href=\"abm_donaciones.php?action=listAdmin\" class=\"color_active\">donacionES</a></span></li> -->

            <section >
                    
                <input class=\"btnAgregarAlimento\" type=\"submit\" onclick=\"location.href='backend.php?ctl=alta_donacion'\"  value=\"Agregar donacion\" >   
                <form name=\"alta_donacion\"  method=\"post\" accept-charset=\"utf-8\">
                        <div class=\"busqueda\">
                            <label>Buscar</label>
                            <input class=\"buscar\" type=\"search\" id=\"descripcion\" name=\"descripcion\" >   
                        </div>
                </form>

                <div class=\"clear\"></div>
                <table class=\"tablaAbmListadodonaciones\">
                    <caption><h1>Registro de Donaciónes</h1></caption>
                        <thead>
                           <tr class=\"encabezado\">

                            <th class=\"th_donante\">Donante</th>
                            <th class=\"th_fecha\">Fecha</th>
                            <th class=\"th_botones\">Operaciones</th>
                           </tr>
                        </thead>
                        <tbody>
                            ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["donaciones"]) ? $context["donaciones"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["donacion"]) {
            // line 49
            echo "                                <tr>
                                    <td class=\"td_donante\">";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "donante_Razon_Social"), "html", null, true);
            echo "</td>
                                    <td class=\"td_fecha\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "fecha"), "html", null, true);
            echo "</td>
                                    <td class=\"td_botones\"> 
                                    <a href=\"backend.php?ctl=agregar_detalles_donacion&id=";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "id"), "html", null, true);
            echo "\"><img src=\"imagenes/alimentoPedido20.png\" alt=\"agregar alimentos\" title=\"Agregar Alimentos\"></a>
                                    <a href=\"backend.php?ctl=editar_donacion&id=";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "id"), "html", null, true);
            echo "\"><img src=\"imagenes/Edit16.png\" alt=\"modificar\" title=\"Modificar Donación\"></a>
                                    <a href=\"backend.php?ctl=eliminar_donacion&id=";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "id"), "html", null, true);
            echo "\" onclick=\"return confirm('¿Esta seguro que desea borrar la donación de ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "donante_Razon_Social"), "html", null, true);
            echo "?')\"><img src=\"imagenes/errase24.png\" alt=\"eliminar\" title=\"Eliminar Donación\"></a>      
                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['donacion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo " 
                        </tbody>

                </table>    
            </section>

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 68
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 69
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_listado_donaciones.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 69,  127 => 68,  115 => 58,  103 => 55,  99 => 54,  95 => 53,  90 => 51,  86 => 50,  83 => 49,  79 => 48,  50 => 21,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
