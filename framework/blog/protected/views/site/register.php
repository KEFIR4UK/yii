<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);



?>
<?php if(Yii::app()->user->hasFlash('success')):?>
	<div class="info">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
	<?php else:?>

<h1>Register</h1>

<p>Please fill out the following form with your Register credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Register',
	'enableClientValidation'=>true,
	'enableAjaxValidation' =>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>



	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name'); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name'); ?>
		<?php echo $form->error($model,'last_name'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->emailField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Repeat password'); ?>
		<?php echo $form->textField($model,'repeat_password'); ?>
		<?php echo $form->error($model,'repeat_password'); ?>

	</div>
    <div>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
    </div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Register'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>