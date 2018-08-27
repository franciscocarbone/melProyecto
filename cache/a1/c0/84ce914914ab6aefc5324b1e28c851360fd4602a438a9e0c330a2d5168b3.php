<?php

/* abm_listado_pedidos.twig.html */
class __TwigTemplate_a1c084ce914914ab6aefc5324b1e28c851360fd4602a438a9e0c330a2d5168b3 extends Twig_Template
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
            
                <li><span><a href=\"abm_pedidos.php?action=listAdmin\" class=\"color_active\">pedidoS</a></span></li> -->
            
            <section >
                
                <input class=\"btnAgregarpedido\" type=\"submit\" onclick=\"location.href='backend.php?ctl=alta_pedido'\"  value=\"Agregar pedido\" >
                <form name=\"alta_pedido\" method=\"post\" accept-charset=\"utf-8\">
                        <div class=\"busqueda\">
                            <label>Buscar</label>
                            <input class=\"buscar\" type=\"search\" id=\"descripcion\" name=\"descripcion\" >   
                        </div>
                </form>

                <div class=\"clear\"></div>
                <table class=\"tablaAbmListadoPedidos\">
                    <caption><h1>Formulario de pedidos</h1></caption>
                    <thead>
                        <tr class=\"encabezado\">                      
                            <th class=\"th_entidad\">Entidad</th>
                            <th class=\"th_numero\">Numero</th>
                            <th class=\"th_fecha\">Ingreso</th>
                            <th class=\"th_fecha\">Entrega</th>
                            <th class=\"th_hora\">Hora</th>
                            <th class=\"th_estado\">Estado</th>
                            <th class=\"th_botones\">Operaciones</th>                      
                        </tr>
                    </thead>
                    <tbody>

                        ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pedidos"]) ? $context["pedidos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["pedido"]) {
            // line 53
            echo "                            <tr>
                                <td class=\"td_entidad\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "razon_social"), "html", null, true);
            echo "</td>
                                <td class=\"td_numero\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "numero"), "html", null, true);
            echo "</td>
                                <td class=\"td_numero\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "fecha_ingreso"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "fecha"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "hora"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "descripcion"), "html", null, true);
            echo "</td>
                                <td class=\"td_botones\"> 
                                    ";
            // line 61
            if (($this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "descripcion") != "ENTREGADO")) {
                // line 62
                echo "                                        <a href=\"backend.php?ctl=agregar_detalles_pedido&id=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "numero"), "html", null, true);
                echo "\"><img src=\"imagenes/alimentoPedido20.png\" alt=\"agregar alimentos\" title=\"Agregar Alimentos\"></a>
                                        <a href=\"backend.php?ctl=editar_pedido&id=";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "numero"), "html", null, true);
                echo "\"><img src=\"imagenes/Edit16.png\" alt=\"modificar\" title=\"Modificar Pedido\"></a>
                                        <a href=\"backend.php?ctl=eliminar_pedido&id=";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "numero"), "html", null, true);
                echo "\" onclick=\"return confirm('¿Esta seguro que desea borrar el pedido de ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pedido"]) ? $context["pedido"] : null), "razon_social"), "html", null, true);
                echo "?')\"><img src=\"imagenes/errase24.png\" alt=\"eliminar\" title=\"Eliminar Pedido\"></a>
                                    ";
            }
            // line 65
            echo " 
                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pedido'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "                        
                    </tbody>
                </table>    
            </section>
            
        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 78
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 79
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_listado_pedidos.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 79,  153 => 78,  142 => 69,  133 => 65,  126 => 64,  122 => 63,  117 => 62,  115 => 61,  110 => 59,  106 => 58,  102 => 57,  98 => 56,  94 => 55,  90 => 54,  87 => 53,  83 => 52,  50 => 21,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
