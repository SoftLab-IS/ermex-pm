<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usId'); ?>
		<?php echo $form->textField($model,'usId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'realName'); ?>
		<?php echo $form->textField($model,'realName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'realSurname'); ?>
		<?php echo $form->textField($model,'realSurname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registerDate'); ?>
		<?php echo $form->textField($model,'registerDate',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isLoggedBy'); ?>
		<?php echo $form->textField($model,'isLoggedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'privilegeLevel'); ?>
		<?php echo $form->textField($model,'privilegeLevel'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->