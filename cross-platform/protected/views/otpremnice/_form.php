<?php
/* @var $this OtpremniceController */
/* @var $model Deliveries */
/* @var $form CActiveForm */
/* @autor Golub*/
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

    <div class="clearfix">
        <div class="large-8 columns">
            <?php echo $form->labelEx($model,'peyeeName'); ?>
            <?php echo $form->textField($model,'peyeeName',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'peyeeName'); ?>

            <?php echo $form->labelEx($model,'peyeeContactInfo'); ?>
            <?php echo $form->textArea($model,'peyeeContactInfo',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'peyeeContactInfo'); ?>
        </div>
        <div class="large-4 columns">
            <?php echo $form->labelEx($model,'payType'); ?>
            <?php echo $form->listBox($model,'payType',array('0' => 'Gotovina', '1' => 'Žiralno'), array('size' => '0')); ?>
            <?php echo $form->error($model,'payType'); ?>


        </div>
    </div>

    <fieldset>
        <legend>Proizvodi</legend>


        <div class="clearfix addOrder large-12 columns">
            <input type="button" value="Dodaj postojeći proizvod" class="button small"/>
            <input type="button" value="Upiši novi proizvod" class="addO button small secondary"/>
        </div>

    </fieldset>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

    <div class="clearfix">
        <div class="large-12 columns">
            <?php echo $form->labelEx($model,'note'); ?>
            <?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'note'); ?>
        </div>
    </div>

	<div class="row buttons text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj otpremnicu' : 'Sačuvaj otpremnicu', array('class' => 'button small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->