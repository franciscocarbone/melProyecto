<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/bootstrap.min.css'); ?>

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" /> -->
    <link href="images/favicon.png" type="image/x-icon" rel="shortcut icon">
	<link href="images/favicon.png" type="image/x-icon" rel="icon">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php
    $inicio= array(array('label'=>Yii::t('app','Inicio'), 'url'=>array('/site/index')));
    $about= array(array('label'=>Yii::t('app','Nosotros'), 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest));
   // $entidades= array(array('label'=>Yii::t('app','Entidades'), 'url'=>array('/site/page', 'view'=>'entidades'), 'visible'=>Yii::app()->user->isGuest));
   // $donantes= array(array('label'=>Yii::t('app','Donantes'), 'url'=>array('/site/page', 'view'=>'donantes'), 'visible'=>Yii::app()->user->isGuest));
    $contact= array(array('label'=>Yii::t('app','Contacto'), 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest));
    $login=array(array('label'=>Yii::t('app','Login'), 'url'=>Yii::app()->user->ui->loginUrl, 'visible'=>Yii::app()->user->isGuest),

               array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>Yii::app()->user->ui->logoutUrl, 'visible'=>!Yii::app()->user->isGuest), );
    $menu=Yii::app()->user->rbac->getMenu();
    //$menu_final=array_merge($inicio,$about,$entidades,$donantes,$menu,$contact,$login);
    $menu_final=array_merge($inicio,$about,$menu,$contact,$login);
?>  
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items' => $menu_final,
        ),
            ),
    ) 
    ); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Proyecto de Desarrollo de Software UNLP.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
</body>
</html>
