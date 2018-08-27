<?php

/* abm_listado_entregas_directas.twig.html */
class __TwigTemplate_c6b29e5e89d3dacb508e0792934744e4e322e582af67a11366e219b0263e0be2 extends Twig_Template
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
                
                <input class=\"btnAgregarpedido\" type=\"submit\" onclick=\"location.href='backend.php?ctl=alta_directo'\"  value=\"Agregar Entrega\" >
                <form name=\"alta_pedido\" method=\"post\" accept-charset=\"utf-8\">
                        <div class=\"busqueda\">
                            <label>Buscar</label>
                            <input class=\"buscar\" type=\"search\" id=\"descripcion\" name=\"descripcion\" >   
                        </div>
                </form>

                <div class=\"clear\"></div>
                <table class=\"tablaAbmListadoPedidos\">
                    <caption><h1>Formulario de entregas directas</h1></caption>
                    <thead>
                        <tr class=\"encabezado\">                      
                            <th class=\"th_entidad\">Entidad</th>
                            <th class=\"th_numero\">Numero</th>
                            <th class=\"th_fecha\">Entrega</th>   
                        </tr>
                    </thead>
                    <tbody>

                        ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["directos"]) ? $context["directos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["directo"]) {
            // line 49
            echo "                            <tr>
                                <td class=\"td_entidad\">";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["directo"]) ? $context["directo"] : null), "razon_social"), "html", null, true);
            echo "</td>
                                <td class=\"td_numero\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["directo"]) ? $context["directo"] : null), "id"), "html", null, true);
            echo "</td>
                                <td class=\"td_numero\">";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["directo"]) ? $context["directo"] : null), "fecha"), "html", null, true);
            echo "</td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['directo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                        
                    </tbody>
                </table>    
            </section>
            
        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 64
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 65
        echo "</body> 
</html> ";
    }

    public function getTemplateName()
    {
        return "abm_listado_entregas_directas.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 65,  114 => 64,  103 => 55,  94 => 52,  90 => 51,  86 => 50,  83 => 49,  79 => 48,  50 => 21,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
