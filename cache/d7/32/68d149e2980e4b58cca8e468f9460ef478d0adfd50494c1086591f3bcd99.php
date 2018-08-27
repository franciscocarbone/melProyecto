<?php

/* abm_listado_detalle_alimentos.twig.html */
class __TwigTemplate_d73268d149e2980e4b58cca8e468f9460ef478d0adfd50494c1086591f3bcd99 extends Twig_Template
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
            
                <li><span><a href=\"abm_alimentos.php?action=listAdmin\" class=\"color_active\">ALIMENTOS</a></span></li> -->
            
            <section >  

                <input class=\"btnAgregarAlimento\" type=\"submit\" onclick=\"location.href='backend.php?ctl=alta_detalle_alimento'\"  value=\"Agregar Alimento\" >
                <form name=\"alta_alimento\"  method=\"post\" accept-charset=\"utf-8\">
                        <div class=\"busqueda\">
                            <label>Buscar</label>
                            <input class=\"buscar\" type=\"search\" id=\"descripcion\" name=\"descripcion\" >   
                        </div>
                </form>

                <div class=\"clear\"></div>
                <table class=\"tablaDetalleAlimento\">
                    <caption><h1>Registro de Alimentos</h1></caption>
                    <thead>
                        <tr class=\"encabezado\">
                            <th class=\"th_codigo\">Contenido</th>
                            <th class=\"th_descripcion\">Alimento</th>
                            <th class=\"th_descripcion\">Codigo</th>
                            <th class=\"th_descripcion\">Peso</th>
                            <th class=\"th_descripcion\">Stock</th>
                            <th class=\"th_descripcion\">Reservado</th>
                            <th class=\"th_botones\">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["detalle_alimentos"]) ? $context["detalle_alimentos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["detalle"]) {
            // line 53
            echo "                            <tr>
                                <td class=\"td_descripcion\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "contenido"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "descripcion"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "alimento_codigo"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "peso_paquete"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "stock"), "html", null, true);
            echo "</td>
                                <td class=\"td_codigo\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "reservado"), "html", null, true);
            echo "</td>
                                <td class=\"td_botones\"> 
                                <a href=\"backend.php?ctl=editar_detalle_alimento&id=";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "id"), "html", null, true);
            echo "\"><img src=\"imagenes/Edit16.png\" alt=\"modificar\" title=\"Modificar\"></a>
                                <a href=\"backend.php?ctl=eliminar_detalle_alimento&id=";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "id"), "html", null, true);
            echo "\" onclick=\"return confirm('¿Esta seguro que desea borrar ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "codigo"), "html", null, true);
            echo " -> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "descripcion"), "html", null, true);
            echo "?')\"><img src=\"imagenes/errase24.png\" alt=\"eliminar\" title=\"Eliminar\"></a> 
                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detalle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        
                    </tbody>
                </table>    
            </section>
            
        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 75
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 76
        echo "</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_listado_detalle_alimentos.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 76,  144 => 75,  133 => 66,  119 => 62,  115 => 61,  110 => 59,  106 => 58,  102 => 57,  98 => 56,  94 => 55,  90 => 54,  87 => 53,  83 => 52,  50 => 21,  47 => 20,  45 => 19,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
