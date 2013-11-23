<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realName'); ?>
		<?php echo $form->textField($model,'realName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'realName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realSurname'); ?>
		<?php echo $form->textField($model,'realSurname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'realSurname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registerDate'); ?>
		<?php echo $form->textField($model,'registerDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'registerDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isLoggedBy'); ?>
		<?php echo $form->textField($model,'isLoggedBy'); ?>
		<?php echo $form->error($model,'isLoggedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'privilegeLevel'); ?>
		<?php echo $form->textField($model,'privilegeLevel'); ?>
		<?php echo $form->error($model,'privilegeLevel'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->