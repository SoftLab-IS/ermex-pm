<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @var $form CActiveForm */
/* @autor Golub*/
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'woId'); ?>
		<?php echo $form->textField($model,'woId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workAccountSerial'); ?>
		<?php echo $form->textField($model,'workAccountSerial',array('size'=>60,'maxlength'=>90)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payeeName'); ?>
		<?php echo $form->textField($model,'payeeName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payeeContactPerson'); ?>
		<?php echo $form->textField($model,'payeeContactPerson',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payeeContactInfo'); ?>
		<?php echo $form->textField($model,'payeeContactInfo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creationDate'); ?>
		<?php echo $form->textField($model,'creationDate',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadlineDate'); ?>
		<?php echo $form->textField($model,'deadlineDate',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
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
		<?php echo $form->label($model,'additional'); ?>
		<?php echo $form->textArea($model,'additional',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invalid'); ?>
		<?php echo $form->textField($model,'invalid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reconciled'); ?>
		<?php echo $form->textField($model,'reconciled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payeeId'); ?>
		<?php echo $form->textField($model,'payeeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'authorId'); ?>
		<?php echo $form->textField($model,'authorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reconciledId'); ?>
		<?php echo $form->textField($model,'reconciledId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->