<?php

/* _select_detalles_alimento_pedido.twig.html */
class __TwigTemplate_68c0e78c7722b55c3ee71d987d72d01832ffb49a48cd9b52ce82c176dd7745bd extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable((isset($context["detalles"]) ? $context["detalles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["detalle"]) {
            echo "  
    <tr>
      <td class=\"contenido\"><input class=\"id_contenido\" type=\"number\" value=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "id"), "html", null, true);
            echo "\" hidden>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "contenido"), "html", null, true);
            echo "</td>
      <td>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "descripcion"), "html", null, true);
            echo "</td>
      <td class=\"vencimiento\">";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "vencimiento"), "html", null, true);
            echo "</td>
      <td>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detalle"]) ? $context["detalle"] : null), "maximo"), "html", null, true);
            echo "</td>
      <td><input class=\"cant\" type=\"number\"></td> 
    </tr> 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detalle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "_select_detalles_alimento_pedido.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  36 => 5,  32 => 4,  26 => 3,  19 => 1,);
    }
}
