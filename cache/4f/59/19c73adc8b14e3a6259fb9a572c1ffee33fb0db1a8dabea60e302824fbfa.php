<?php

/* abm_insertEdit_items_pedido.twig.html */
class __TwigTemplate_4f5919c73adc8b14e3a6259fb9a572c1ffee33fb0db1a8dabea60e302824fbfa extends Twig_Template
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
            <div class=\"formularioAltaItemsPedido\">
                <h1>Formulario de Alimentos Pedidos</h1>
                <form class=\"altaItemsPedido\" name=\"altaItemsPedido\" action=\"backend.php?ctl=";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "numero"), "html", null, true);
        echo "\" hidden></li>
                    <fieldset>
                        <legend class=\"items_pedido\">";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend> 
                        <ul>             
                          <li><label for=\"alimento_donado\">Alimento:</label>  
                          <select id=\"alimento_donado\" name=\"alimento_donado\">
                             ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["alimentos"]) ? $context["alimentos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["alimento"]) {
            echo " 
                                <option value=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "codigo"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alimento"]) ? $context["alimento"] : null), "descripcion"), "html", null, true);
            echo "</option>
                             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alimento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "                          </select>
                        </ul>              
                    </fieldset>
                    <div class=\"clear\"></div>
                    <table id=\"tablaAlimentosDonados\">
                      <thead>
                         <tr class=\"encabezado\">
                            <th class=\"th_contenido\">Contenido</th>  
                            <th class=\"th_alimento\">Alimento</th>
                            <th class=\"th_vencimiento\">Vencimiento</th>
                            <th class=\"th_maximo\">Máximo</th>
                            <th class=\"th_Cantidad\">Cantidad</th>
                         </tr>
                        </thead>
                        <tbody id=\"detalle_donado\">
                            
                        </tbody>
                    </table>                                        

                  <li><input id=\"addDetallePedido\" class=\"btnAgregarAlimento\" type=\"button\" value=\"Agregar alimento\"></li>
                    <div class=\"clear\"></div>   

                    <table id=\"tablaDetalle\">
                        <thead>
                           <tr class=\"encabezado\">
                              <th class=\"th_contenido\">Contenido</th>  
                              <th class=\"th_alimento\">Alimento</th>
                              <th class=\"th_Cantidad\">Cantidad</th>
                              <th class=\"vencimiento\">Vencimiento</th>
                              <th class=\"th_botones\">Operaciones</th>
                           </tr>
                        </thead>
                        <tbody>
                          <!--CARGO LOS ITEMS SELECCIONADOS-->
                          ";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["detalles"]) ? $context["detalles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["detalle"]) {
            // line 68
            echo "
                            <tr id=\"cant\">                
                                <td><input id=\"det_id\" type=\"hidden\" name=\"detalle[cant][id_detalle]\" value=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "donacion_detalle_alimento_id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "contenido"), "html", null, true);
            echo "</td>
                                <td>";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "descripcion"), "html", null, true);
            echo "</td>
                                <td><input id=\"cant\" type=\"hidden\" name=\"detalle[cant][cantidad]\" value=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "cantidad"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "cantidad"), "html", null, true);
            echo "</td>
                                <td>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "vencimiento"), "html", null, true);
            echo "</td>
                                <td><a class=\"eliminar\"><img src=\"imagenes/eliminar.png\" alt=\"eliminar\" title=\"Eliminar\"></a></td>
                            </tr>

                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detalle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "                      </tbody>
                  </table>
                   <li><input class=\"btnAltaAlimento\" type=\"submit\" value=\"Guardar\"></li> 
                </form>
            </div>  

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 88
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 89
        echo "    <script type=\"text/javascript\"> 
       //Carga por ajax el detalle cuando carga la pagina.
       cargarDetallesAlimentoPedidos(\$(\"#alimento_donado\"));
    </script>
</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_insertEdit_items_pedido.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 89,  167 => 88,  155 => 78,  144 => 73,  138 => 72,  134 => 71,  128 => 70,  124 => 68,  120 => 67,  84 => 33,  74 => 31,  68 => 30,  61 => 26,  56 => 24,  52 => 23,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
