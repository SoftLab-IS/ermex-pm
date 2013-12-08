<?php
/* @var $this MaterijaliController */
/* @var $model Materials */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'materials-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <fieldset>
        <legend>Materijal</legend>
        <div class="materials clearfix">
            <div class="large-8 columns">
                <?php echo $form->labelEx($model,'name'); ?>
                <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>
            <div class="large-2 columns">
                <?php echo $form->labelEx($model,'amount'); ?>
                <?php echo $form->textField($model,'amount'); ?>
                <?php echo $form->error($model,'amount'); ?>
            </div>
            <div class="large-2 columns">
                <?php echo $form->labelEx($model,'dimensionUnit'); ?>
                <?php echo $form->textField($model,'dimensionUnit',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'dimensionUnit'); ?>
            </div>
        </div>
    </fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->