<?php

/* const/menu_backend.twig.html */
class __TwigTemplate_9cbd4e8c99bf8a0d47c00e34b83dda031c545cac95accb4f4d0fc0cbe668d702 extends Twig_Template
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
        echo "<nav class=\"menubackend\">
\t<ul>
\t\t<li id=\"inicio\"><span><a href=\"backend.php\">INICIO</a></span></li>
\t\t<li id=\"abms\"><span><a href=#>ABMS</a></span></li>
\t\t<li id=\"pedidos\"><span><a href=#>PEDIDOS</a></span></li>
\t\t<li id=\"donacion\"><span><a href=\"backend.php?ctl=listar_donaciones\">DONACIONES</a></span></li>
\t\t<li id=\"listado\"><span><a href=#>LISTADOS</a></span></li>
\t</ul>
</nav>
<nav class=\"submenubackend abm\" id=\"submenubackend_abm\">
\t<ul>
\t\t<li><span><a href=\"backend.php?ctl=listar_detalle_alimentos\" >ALIMENTOS</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=listar_donantes\">DONANTES</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=listar_entidades\">ENTIDADES</a></span></li>
\t\t<li><span><a href=#>SERVICIOS</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=listar_usuarios\">USUARIOS</a></span></li>
\t</ul>
</nav>
<nav class=\"submenubackend pedidos\" id=\"submenubackend_pedido\">
\t<ul>
\t\t<li><span><a href=\"backend.php?ctl=listar_pedidos\" >ARMADO</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=listar_directos\">ENTREGA DIRECTA</a></span></li>
\t</ul>
</nav>
<nav class=\"submenubackend listado\">
\t<ul>
\t\t<li><span><a href=\"backend.php?ctl=ver_stock_alimentos\">STOCK</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=ver_donantes\">DONANTES</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=ver_entidades\">ENTIDADES</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=ver_envios\">ENVIOS</a></span></li>
\t\t<li><span><a href=\"backend.php?ctl=graficos\">PDF</a></span></li>
\t</ul>
</nav>";
    }

    public function getTemplateName()
    {
        return "const/menu_backend.twig.html";
    }

    public function getDebugInfo()
    {
        return array (  120 => 71,  118 => 70,  107 => 61,  98 => 58,  94 => 57,  90 => 56,  86 => 55,  83 => 54,  79 => 53,  55 => 32,  25 => 4,  23 => 3,  19 => 1,);
    }
}
