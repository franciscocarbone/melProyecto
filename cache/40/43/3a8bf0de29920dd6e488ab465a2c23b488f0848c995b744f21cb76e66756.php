<?php

/* const/alertas.twig.html */
class __TwigTemplate_40433a8bf0de29920dd6e488ab465a2c23b488f0848c995b744f21cb76e66756 extends Twig_Template
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
        if ((isset($context["alertaVencimientos"]) ? $context["alertaVencimientos"] : null)) {
            // line 2
            echo "    <table class=\"tablaAlertasVencimientos\">
        <caption>ALIMENTOS POR VENCER</caption>
            <thead>
               <tr class=\"encabezado\">
                <th class=\"th_detalle_alimento\">Detalle Alimento</th>
                <th class=\"th_alimento\">Alimento</th>
                <th class=\"th_cantidad\">Cantidad</th>      
                <th class=\"th_vencimiento\">Vencimiento</th>
               </tr>
            </thead>
            <tbody>
                ";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["alertaVencimientos"]) ? $context["alertaVencimientos"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["vencimiento"]) {
                // line 14
                echo "                    <tr>
                        <td class=\"td_detalle_alimento\">";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vencimiento"]) ? $context["vencimiento"] : null), "contenido"), "html", null, true);
                echo "</td>
                        <td class=\"td_alimento\">";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vencimiento"]) ? $context["vencimiento"] : null), "alimento"), "html", null, true);
                echo "</td>
                        <td class=\"td_cantidad\">";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vencimiento"]) ? $context["vencimiento"] : null), "cantidad"), "html", null, true);
                echo "</td>
                        <td class=\"td_vencimiento\">";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vencimiento"]) ? $context["vencimiento"] : null), "vencimiento"), "html", null, true);
                echo "</td>                            
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vencimiento'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo " 
            </tbody>
    </table>   
";
        }
        // line 23
        echo " 


";
        // line 26
        if ((isset($context["alertaEnvios"]) ? $context["alertaEnvios"] : null)) {
            // line 27
            echo "    <table class=\"tablaAlertasEnvios\">
        <caption>ENVIOS DEL DÍA</caption>
            <thead>
               <tr class=\"encabezado\">
                <th class=\"th_detalle_alimento\">Entidad Receptora</th>
                <th class=\"th_estado\">Estado</th>
                <th class=\"th_fecha\">Fecha</th>      
                <th class=\"th_hora\">Hora</th>
                <th class=\"th_envio\">Nro Pedido</th>
               </tr>
            </thead>
            <tbody>
                ";
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["alertaEnvios"]) ? $context["alertaEnvios"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["envio"]) {
                // line 40
                echo "                   
                    <tr class=\"envio\">
                        <td class=\"td_entidad_receptora\">";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "razon_social"), "html", null, true);
                echo "</td>
                        <td class=\"td_estado\">";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "descripcion"), "html", null, true);
                echo "</td>
                        <td class=\"td_fecha_envio\">";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "fecha"), "html", null, true);
                echo "</td>
                        <td class=\"td_hora_envio\">";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "hora"), "html", null, true);
                echo "</td> 
                        <td class=\"td_numero\">";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numero"), "html", null, true);
                echo "</td>            
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['envio'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo " 
            </tbody>
    </table>   
";
        }
    }

    public function getTemplateName()
    {
        return "const/alertas.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 48,  113 => 46,  109 => 45,  105 => 44,  101 => 43,  97 => 42,  93 => 40,  89 => 39,  75 => 27,  73 => 26,  68 => 23,  62 => 20,  53 => 18,  49 => 17,  45 => 16,  41 => 15,  38 => 14,  34 => 13,  21 => 2,  35 => 12,  31 => 11,  66 => 31,  64 => 30,  55 => 24,  51 => 22,  48 => 21,  46 => 20,  42 => 18,  40 => 17,  25 => 4,  23 => 3,  19 => 1,);
    }
}
