<?php

/* envios_del_dia.twig.html */
class __TwigTemplate_7ccac2549d74f67677e425d0d88eee2d6eaa31c6a0a3148c3d80eb33fe260b74 extends Twig_Template
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
        // line 18
        $this->env->loadTemplate("const/log_usuario.twig.html")->display($context);
        // line 19
        echo "            <div class=\"clear\"></div>
            ";
        // line 20
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        // line 21
        echo "    
                    <!-- <li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
                    <li><span><a href=\"abm_alimentos.php?action=listAdmin\" class=\"color_active\">ALIMENTOS</a></span></li> -->

            <div class=\"formularioAltaPedido\">
                <h1>Formulario de Envio</h1>
                
                <form class=\"altaEnvio\" name=\"altaEnvio\" action=\"backend.php?ctl=";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numero"), "html", null, true);
        echo "\" hidden>
                    <fieldset>
                        <legend>";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend> 
                        <ul> 

                           <li><label for=\"turno\">Turno de Entrega:</label>  
                               <select id=\"turno\" name=\"turno\" required>
                                   ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["turnos"]) ? $context["turnos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["turno"]) {
            // line 37
            echo "                                        ";
            if (($this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "id") == $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "turno_entrega_id"))) {
                // line 38
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "fecha"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "fecha"), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "hora"), "html", null, true);
                echo "</option>
                                        ";
            } else {
                // line 40
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "fecha"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "fecha"), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 42
            echo "                                   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['turno'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                               </select>
                            </li>

                        </ul> 
                    </fieldset>
                </form>
            </div> 
            <table class=\"tablaEnvios\">
                <caption><h1>Puntos de Entrega</h1></caption>
                <thead>
                    <tr class=\"encabezado\">                      
                        <th class=\"th_entidad\">Entidad</th>
                        <th class=\"th_fecha\">Entrega</th>
                        <th class=\"th_hora\">Hora</th>
                        <th class=\"th_estado\">Estado</th>
                        <th class=\"th_latitud\" hidden>Latitud</th> 
                        <th class=\"th_longitud\" hidden>Longitud</th>                    
                    </tr>
                </thead>
                <tbody id=\"envios_del_dia\"> 
                        
                </tbody>
            </table> 
            <div class=\"clear\"></div> 
            <!--MAPA DE ENVIOS-->
            <div id=\"mapa\">
                <input id=\"latitud\" hidden value=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "latitud"), "html", null, true);
        echo "\">
                <input id=\"longitud\" hidden value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configuracion"]) ? $context["configuracion"] : null), "longitud"), "html", null, true);
        echo "\">
                <input id=\"destino_latitud\" hidden>
                <input id=\"destino_longitud\" hidden>
                <div id=\"map-canvas\"></div>
            </div>
            <!--MAPA DE ENVIOS-->
            <div id=\"clima_envio\">
            
            </div>
            
        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 84
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 85
        echo "    <script type=\"text/javascript\" src=\"js/googlemaps.js\"></script>
    
</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "envios_del_dia.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 85,  154 => 84,  137 => 70,  133 => 69,  105 => 43,  99 => 42,  91 => 40,  81 => 38,  78 => 37,  74 => 36,  66 => 31,  61 => 29,  57 => 28,  48 => 21,  46 => 20,  43 => 19,  41 => 18,  25 => 4,  23 => 3,  19 => 1,);
    }
}
