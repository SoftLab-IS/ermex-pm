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
	


	<p class="note">Polja označena sa <span class="required">*</span> su obavezna.</p>

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
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'payeeContactPerson'); ?>
		<?php echo $form->textField($model,'payeeContactPerson',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payeeContactPerson'); ?>
	</div>
	-->
	<div class="row">
		<?php echo $form->labelEx($model,'payeeContactInfo'); ?>
		<?php echo $form->textArea($model,'payeeContactInfo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'payeeContactInfo'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'deadlineDate'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'WorkAccounts[deadlineDate]',
			    'id'=>'WorkAccounts_deadlineDate',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dayNamesMin'=> array('Ned' ,'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'), 
					'dateFormat'=>"dd.mm.yy.",
					'firstDay'=>1,
					'monthNames'=>array('Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'),
				 	'monthNamesShort'=>array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'),
				 	'changeMonth'=>true,
				 	'changeYear'=>true
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:2.3125rem;',
			    ),
			));
		?>
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
	<!--
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
		<?php echo $form->labelEx($model,'reconciledId'); ?>
		<?php echo $form->textField($model,'reconciledId'); ?>
		<?php echo $form->error($model,'reconciledId'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'authorId'); ?>
		<?php echo $form->textField($model,'authorId'); ?>
		<?php echo $form->error($model,'authorId'); ?>
	</div>
	-->
	<div class="row">
		<?php echo $form->label($model,'Nalog upućen na:')?>
		<?php foreach($workers as $worker): ?>
			<?php echo CHtml::checkBox("workersId[]",null,array("value"=>$model->woId,"id"=>"cid_".$worker->usId)) . ' ' .'<span class="worker-name">'. $worker->realName. ' '. $worker->realSurname.'</span></br>'; ?>
			
	<?php endforeach; ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj' : 'Sačuvaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->