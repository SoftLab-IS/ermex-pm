<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */
?>

<div class="form" xmlns="http://www.w3.org/1999/html">

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




	<div class="clearfix">
		<?php echo $form->labelEx($model,'payeeName'); ?>
		<?php echo $form->textField($model,'payeeName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payeeName'); ?>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'payeeContactInfo'); ?>
		<?php echo $form->textArea($model,'payeeContactInfo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'payeeContactInfo'); ?>
	</div>
	
	<div class="clearfix">
		<?php echo $form->labelEx($model,'deadlineDate'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'WorkAccounts[deadlineDate]',
			    'id'=>'WorkAccounts_deadlineDate',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dayNamesMin'=> array('Ned' ,'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'), 
					'dateFormat'=>"dd.mm.yy",
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


	<div class="clearfix">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'additional'); ?>
		<?php echo $form->textArea($model,'additional',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'additional'); ?>
	</div>

    <div class="clearfix">
        <?php echo $form->labelEx($model,'usersList'); ?>
        <?php echo $form->textField($model,'usersList',array('size'=>60,'maxlength'=>90)); ?>
        <?php echo $form->error($model,'usersList'); ?>
    </div>

<!--    ORDER-->
    <div class="clearfix oneOrder">
        <div class="large-4 columns">
            <label>Naziv</label>
            <input type="text" name="Order[][title]"/>
        </div>
        <div class="large-5 columns">
            <label>Opis</label>
            <input type="text" name="Order[][description]"/>
        </div>
        <div class="large-1 columns">
            <label>Kolicina</label>
            <input type="text" name="Order[][amount]"/>
        </div>
        <div class="large-1 columns">
            <label>Mjera</label>
            <input type="text" name="Order[][measurementUnit]"/>
        </div>
        <div class="large-1 columns">
            <label>Cijena</label>
            <input type="text" name="Order[][price]"/>
        </div>

    </div>
    <div class="clearfix addOrder">
        <input type="button" value="Dodaj" class="addO"/>
    </div>

    <div class="clearfix buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj' : 'Sačuvaj'); ?>
	</div>

	
	
<?php $this->endWidget(); ?>

</div><!-- form -->