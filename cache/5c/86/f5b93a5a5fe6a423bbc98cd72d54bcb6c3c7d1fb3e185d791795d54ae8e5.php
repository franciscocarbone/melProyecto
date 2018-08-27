<?php

/* abm_insertEdit_pedidos.twig.html */
class __TwigTemplate_5c86f5b93a5a5fe6a423bbc98cd72d54bcb6c3c7d1fb3e185d791795d54ae8e5 extends Twig_Template
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
        echo "    
                    <!-- <li id=\"abms\"><span class=\"color_active\"><a href=#>ABMS</a></span></li>
                    <li><span><a href=\"abm_alimentos.php?action=listAdmin\" class=\"color_active\">ALIMENTOS</a></span></li> -->

            <div class=\"formularioAltaPedido\">
                <h1>Formulario de Pedidos</h1>
                
                <form class=\"altaPedido\" name=\"altaPedido\" action=\"backend.php?ctl=";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "numero"), "html", null, true);
        echo "\" hidden>
                    <fieldset>
                        <legend>";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend> 
                        <ul>  
                        <li class=\"required\"><label for=\"fecha\">Fecha de Ingreso:</label>  
                            <input type=\"date\" id=\"fecha\" name=\"fecha\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "fecha_ingreso"), "html", null, true);
        echo "\" required></li>

                            <li><label for=\"entidad\">Entidad Receptora:</label>  
                           <select id=\"entidad\" name=\"entidad\" required>
                               ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entidades"]) ? $context["entidades"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entidad"]) {
            // line 38
            echo "                                    ";
            if (($this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "id") == $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "entidad_receptora_id"))) {
                // line 39
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "id"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "razon_social"), "html", null, true);
                echo "</option>
                                    ";
            } else {
                // line 41
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : null), "razon_social"), "html", null, true);
                echo "</option>
                                    ";
            }
            // line 43
            echo "                               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entidad'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "                           </select></li>

                           <li><label for=\"estado\">Estado del Pedido:</label>  
                           <select id=\"estado\" name=\"estado\" required>
                               ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["estados"]) ? $context["estados"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["estado"]) {
            // line 49
            echo "                                    ";
            if (($this->getAttribute((isset($context["estado"]) ? $context["estado"] : null), "id") == $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "estado_pedido_id"))) {
                // line 50
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["estado"]) ? $context["estado"] : null), "id"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["estado"]) ? $context["estado"] : null), "descripcion"), "html", null, true);
                echo "</option>
                                    ";
            } else {
                // line 52
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["estado"]) ? $context["estado"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["estado"]) ? $context["estado"] : null), "descripcion"), "html", null, true);
                echo "</option>
                                    ";
            }
            // line 54
            echo "                               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['estado'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                           </select></li>


                            <li><label for=\"turno\">Turno de Entrega:</label>  
                               <select id=\"turno\" name=\"turno\" required>
                                   ";
        // line 60
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["turnos"]) ? $context["turnos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["turno"]) {
            // line 61
            echo "                                        ";
            if (($this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "id") == $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "turno_entrega_id"))) {
                // line 62
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "id"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "fecha"), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "hora"), "html", null, true);
                echo "</option>
                                        ";
            } else {
                // line 64
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "fecha"), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["turno"]) ? $context["turno"] : null), "hora"), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 66
            echo "                                   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['turno'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                               </select>
                               <a href=\"backend.php?ctl=agregar_turno\" alt=\"add alimento\"><img class=\"addAlimento\" src=\"imagenes/add16.png\" title=\"Añadir Alimento\"></a>
                            </li>

                            <li>
                                <label for=\"envio\">Envio:</label> 
                                ";
        // line 73
        if (($this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "envio") == 1)) {
            echo " 
                                    <input type=\"checkBox\" id=\"envio\" name=\"envio\"  checked>
                                ";
        } else {
            // line 76
            echo "                                    <input type=\"checkBox\" id=\"envio\" name=\"envio\" >
                                ";
        }
        // line 78
        echo "                            </li>

                            <li><input class=\"btnAltaAlimento\" type=\"submit\" value=\"Guardar\"></li>  
                        </ul> 
                    </fieldset>
                </form>

            </div>  

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 91
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 92
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_insertEdit_pedidos.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 92,  215 => 91,  200 => 78,  196 => 76,  190 => 73,  182 => 67,  176 => 66,  166 => 64,  156 => 62,  153 => 61,  149 => 60,  142 => 55,  136 => 54,  128 => 52,  120 => 50,  117 => 49,  113 => 48,  107 => 44,  101 => 43,  93 => 41,  85 => 39,  82 => 38,  78 => 37,  71 => 33,  65 => 30,  60 => 28,  56 => 27,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
