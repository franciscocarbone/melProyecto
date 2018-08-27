<?php

/* _select_fecha_envios.twig.html */
class __TwigTemplate_7dcb6556260e5d5f134c16c7b2ad90b4e97f7b6249e13c91e2eede28a0153210 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["envios"]) ? $context["envios"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["envio"]) {
            echo "                
    <tr class=\"envios\">
        <td class=\"td_numero\" hidden>";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numero"), "html", null, true);
            echo "</td>
        <td class=\"td_entidad\">";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "razon_social"), "html", null, true);
            echo "</td>
        <td class=\"td_fecha\">";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "fecha"), "html", null, true);
            echo "</td>
        <td class=\"td_hora\">";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "hora"), "html", null, true);
            echo "</td>
        <td class=\"td_estado\">";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "descripcion"), "html", null, true);
            echo "</td>
        <td class=\"td_latitud\" hidden>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "latitud"), "html", null, true);
            echo "</td>
        <td class=\"td_longitud\" hidden>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "longitud"), "html", null, true);
            echo "</td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['envio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "
";
    }

    public function getTemplateName()
    {
        return "_select_fecha_envios.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 12,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  19 => 1,);
    }
}
