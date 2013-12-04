<?php
/* @var $this OtpremniceController */
/* @var $model Deliveries */
/* @var $form CActiveForm */
/* @autor Golub*/
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'deId'); ?>
		<?php echo $form->textField($model,'deId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deliveryDate'); ?>
		<?php echo $form->textField($model,'deliveryDate',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payType'); ?>
		<?php echo $form->textField($model,'payType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reconciled'); ?>
		<?php echo $form->textField($model,'reconciled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invalid'); ?>
		<?php echo $form->textField($model,'invalid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'authorId'); ?>
		<?php echo $form->textField($model,'authorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workAccountId'); ?>
		<?php echo $form->textField($model,'workAccountId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->