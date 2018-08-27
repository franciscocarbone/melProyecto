<?php

/* abm_insertEdit_items_donacion.twig.html */
class __TwigTemplate_fcd08549c960d7d7851290cf056561db224cece80fc0405e4e64eeb43d71293d extends Twig_Template
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
        echo "           
            <div class=\"formularioAltaItemsDonacion\">
                <h1>Formulario de Alimentos Donados</h1>
                <form class=\"altaItems\" name=\"altaItems\" action=\"backend.php?ctl=";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "id"), "html", null, true);
        echo "\" hidden></li>
                    <fieldset>
                        <legend class=\"items_donacion\">";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend> 
                        <ul>             

                          <li><label for=\"alimento\">Alimento:</label>  
                          <select id=\"alimento\" name=\"alimento\">
                             ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["alimentos"]) ? $context["alimentos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["alimento"]) {
            echo " 
                                <option value=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "codigo"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "descripcion"), "html", null, true);
            echo "</option>
                             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alimento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "
                          </select></li><li><label for=\"detalle\">Detalle:</label>  
                          <select id=\"detalle\" name=\"detalle\">                     
                          </select></li>

                          <li><label for=\"vencimiento\">Fecha Vencimiento:</label>  
                          <input type=\"date\" id=\"vencimiento\" name=\"vencimiento\"  placeholder=\"Fecha de Vencimiento\"></li> 

                          <li><label for=\"cantidad\">Cantidad:</label>  
                          <input type=\"number\" id=\"cantidad\" name=\"cantidad\" placeholder=\"Cantidad\"></li>             

                          <li><input id=\"addDetalle\" class=\"btnAgregarAlimento\" type=\"button\" value=\"Agregar alimento\"></li>
                       
                        </ul> 
                             
                    </fieldset>

                    <table id=\"tablaDetalle\">
                        <thead>
                           <tr class=\"encabezado\">
                              <th class=\"th_detalle_alimento\">Cantidad</th>
                              <th class=\"th_alimento\">Alimento</th>
                              <th class=\"th_contenido\">Contenido</th>
                              <th class=\"th_fecha\">Vencimiento</th>
                              <th class=\"th_botones\">Operaciones</th>
                           </tr>
                        </thead>
                        <tbody>
                          ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["detalles"]) ? $context["detalles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["detalle"]) {
            // line 63
            echo "                              <tr>
                                 <td><input id=\"cant\" hidden value=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "cantidad"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "cantidad"), "html", null, true);
            echo "</td>
                                  <td>";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "descripcion"), "html", null, true);
            echo "</td>
                                  <td><input id=\"det_id\" hidden value=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "detalle_alimento_id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "contenido"), "html", null, true);
            echo "</td>
                                  <td><input id=\"ven\" hidden value=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "vencimiento"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "vencimiento"), "html", null, true);
            echo "</td>
                                  <td><a class=\"eliminar\"><img src=\"imagenes/eliminar.png\" alt=\"eliminar\" title=\"Eliminar\"></a></td>
                              </tr>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detalle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                      </tbody>
                  </table>
                   <li><input class=\"btnAltaAlimento\" type=\"submit\" value=\"Guardar\"></li> 
                </form>
            </div>  

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 81
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 82
        echo "    <script type=\"text/javascript\"> 
       //Carga por ajax el detalle cuando carga la pagina.
      cargarDetallesAlimento(\$(\"#alimento\"));
    </script>
</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_insertEdit_items_donacion.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 82,  162 => 81,  150 => 71,  138 => 67,  132 => 66,  128 => 65,  122 => 64,  119 => 63,  115 => 62,  85 => 34,  75 => 32,  69 => 31,  61 => 26,  56 => 24,  52 => 23,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
