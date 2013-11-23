<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-accounts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'workAccountSerial'); ?>
		<?php echo $form->textField($model,'workAccountSerial',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'workAccountSerial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payeeName'); ?>
		<?php echo $form->textField($model,'payeeName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payeeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payeeContactPerson'); ?>
		<?php echo $form->textField($model,'payeeContactPerson',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payeeContactPerson'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payeeContactInfo'); ?>
		<?php echo $form->textField($model,'payeeContactInfo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payeeContactInfo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creationDate'); ?>
		<?php echo $form->textField($model,'creationDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'creationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadlineDate'); ?>
		<?php echo $form->textField($model,'deadlineDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'deadlineDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
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
		<?php echo $form->labelEx($model,'additional'); ?>
		<?php echo $form->textArea($model,'additional',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'additional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invalid'); ?>
		<?php echo $form->textField($model,'invalid'); ?>
		<?php echo $form->error($model,'invalid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reconciled'); ?>
		<?php echo $form->textField($model,'reconciled'); ?>
		<?php echo $form->error($model,'reconciled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payeeId'); ?>
		<?php echo $form->textField($model,'payeeId'); ?>
		<?php echo $form->error($model,'payeeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authorId'); ?>
		<?php echo $form->textField($model,'authorId'); ?>
		<?php echo $form->error($model,'authorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reconciledId'); ?>
		<?php echo $form->textField($model,'reconciledId'); ?>
		<?php echo $form->error($model,'reconciledId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->