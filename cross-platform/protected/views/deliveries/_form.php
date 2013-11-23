<?php
/* @var $this DeliveriesController */
/* @var $model Deliveries */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deliveries-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deliveryDate'); ?>
		<?php echo $form->textField($model,'deliveryDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'deliveryDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payType'); ?>
		<?php echo $form->textField($model,'payType'); ?>
		<?php echo $form->error($model,'payType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reconciled'); ?>
		<?php echo $form->textField($model,'reconciled'); ?>
		<?php echo $form->error($model,'reconciled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invalid'); ?>
		<?php echo $form->textField($model,'invalid'); ?>
		<?php echo $form->error($model,'invalid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authorId'); ?>
		<?php echo $form->textField($model,'authorId'); ?>
		<?php echo $form->error($model,'authorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workAccountId'); ?>
		<?php echo $form->textField($model,'workAccountId'); ?>
		<?php echo $form->error($model,'workAccountId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->