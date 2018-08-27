<?php

/* const/footer_backend.twig.html */
class __TwigTemplate_fe5107fb18fdd0ff36ea1e9d4f34935a41d6fea9ea698efc71a21e7d04c1634d extends Twig_Template
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
        echo "<footer>
    <script src=\"https://maps.googleapis.com/maps/api/js?sensor=false\"></script>
\t<script type=\"text/javascript\" src=\"js/jquery-1.11.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"js/application.js\"></script>  
    <script type=\"text/javascript\" src=\"js/ajax.js\"></script>
    <script type=\"text/javascript\" src=\"js/torta.js\"></script> 
    <script type=\"text/javascript\" src=\"js/barra.js\"></script>
    <script type=\"text/javascript\" src=\"js/highcharts.js\"></script>
</footer>";
    }

    public function getTemplateName()
    {
        return "const/footer_backend.twig.html";
    }

    public function getDebugInfo()
    {
        return array (  120 => 71,  118 => 70,  107 => 61,  98 => 58,  94 => 57,  90 => 56,  86 => 55,  83 => 54,  79 => 53,  55 => 32,  25 => 4,  23 => 3,  19 => 1,);
    }
}
