<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
		'id'           =>'register',
		'actionPrefix' => 'register',
		// additional javascript options for the dialog plugin
		'options'=>array(
			'title'=>'registration',
			'autoOpen'=>false,
			'width'  =>800,
			'height'  =>400,
		),
	));
	var_dump($_GET);
	//$this->beginContent('register',array('model'=>$model));
	$this->endWidget('zii.widgets.jui.CJuiDialog');

	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
		'id'        =>'login',
		// additional javascript options for the dialog plugin
		'options'=>array(
			'title'=>'login',
			'autoOpen'=>false,
			'width'  =>800,
			'height'  =>400,
		),
	));

	$this->endWidget('zii.widgets.jui.CJuiDialog');

	// the link that may open the dialog
	echo CHtml::link('Register', '#', array(
		'onclick'=>'$("#register").dialog("open"); return false;',
	));
	echo CHtml::link('login', '#', array(
		'onclick'=>'$("#login").dialog("open"); return false;',
	));
	?>

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Own Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Register', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)

			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
