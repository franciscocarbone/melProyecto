<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


			


<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Bienvenidos al '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Conciencia por el hambre.</p>

<?php $this->endWidget(); ?>

<img src="images/voluntariado-cooperativo2.jpg" alt="Grupo de voluntarios">

<div class="content_comedor">
    <div class="desc_comedor">
        <p>NUESTROS PROYECTOS</p>
    </div>
    <img src="images/imagen-comedores.jpg" class="img_comedor" alt="Comedores">
</div>

<div class="content_comedor">
    <div class="desc_comedor">
        <p>¿QUERES SER VOLUNTARIO?</p>
    </div>
    <img src="images/sumate-como-voluntario.jpg" class="img_comedor" alt="Sumate como voluntario">
</div>

<div class="content_comedor">
    <div class="desc_comedor">
        <p>ENTIDADES</p>
    </div>
    <a href="#"><img src="images/nene-con-hambre.png" class="img_comedor" alt="Nene con hambre"></a>
</div>

<div class="content_comedor">
    <div class="desc_comedor">
        <p>DONANTES</p>
    </div>
    <a href="#"><img src="images/mailchimp.jpg" class="img_comedor" alt="Colecta de leche"></a>
</div>	

<div class="clear"></div>

<!-- <p>You may change the content of this page by modifying the following two files:</p>

<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul> -->

<!-- <p>Para mas detalles sobre la aplicación, por favor lea
    la <a href="https://git.proyecto2014.linti.unlp.edu.ar/ayudantes/grupo_39/wikis/pages">wiki</a>. -->
   <!-- Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>, 
    should you have any questions. --> </p>
