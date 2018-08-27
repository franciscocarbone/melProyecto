<?php

/* abm_insertEdit_donaciones.twig.html */
class __TwigTemplate_7ee4cb7335c94fc032b6dd3c8b8c9cbe4961c10cbb684a6251633388c1468e54 extends Twig_Template
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
        // line 16
        $this->env->loadTemplate("const/log_usuario.twig.html")->display($context);
        // line 17
        echo "            <div class=\"clear\"></div>
            ";
        // line 18
        $this->env->loadTemplate("const/menu_backend.twig.html")->display($context);
        // line 19
        echo "
           
            <div class=\"formularioAltaDonacion\">

                <h1>Formulario de Donaciónes</h1>

                <form class=\"altaDonacion\" name=\"altaDonacion\" action=\"backend.php?ctl=";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["accion"]) ? $context["accion"] : null), "html", null, true);
        echo "\" method=\"POST\" accept-charset=\"utf-8\">
                    <input type=\"text\" id=\"id\" name=\"id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "id"), "html", null, true);
        echo "\" hidden></li>
                    <fieldset>
                        <legend>";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</legend> 
                        <ul>  
                            <li><label for=\"donate\">Donante:</label>  
                            <select id=\"donate\" name=\"donate\" required>
                               ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["donantes"]) ? $context["donantes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["donante"]) {
            // line 33
            echo "                                  ";
            if (($this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "id") == $this->getAttribute((isset($context["donacion"]) ? $context["donacion"] : null), "donante_id"))) {
                // line 34
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "id"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "razon_social"), "html", null, true);
                echo "</option>
                                  ";
            } else {
                // line 36
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["donante"]) ? $context["donante"] : null), "razon_social"), "html", null, true);
                echo "</option>
                                  ";
            }
            // line 38
            echo "                               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['donante'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                            </select></li>   
                            <li><input class=\"btnAltaDonacion\" type=\"submit\" value=\"Guardar\"></li>         
                        </ul> 
                              
                    </fieldset>
                   
                </form>
            </div>  

        </div>

    </div>
    <div class=\"clear\"></div>
    ";
        // line 52
        $this->env->loadTemplate("const/footer_backend.twig.html")->display($context);
        // line 53
        echo "    <script type=\"text/javascript\"> 
        \$( document ).ready(function() {
            //Carga por ajax el detalle cuando carga la pagina.
            cargarDetallesAlimento(\$(\"#alimento\"));
        }
    </script>
</body> 
</html> 
";
    }

    public function getTemplateName()
    {
        return "abm_insertEdit_donaciones.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 53,  114 => 52,  99 => 39,  93 => 38,  85 => 36,  77 => 34,  74 => 33,  70 => 32,  63 => 28,  58 => 26,  54 => 25,  46 => 19,  44 => 18,  41 => 17,  39 => 16,  25 => 4,  23 => 3,  19 => 1,);
    }
}
