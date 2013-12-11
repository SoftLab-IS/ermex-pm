<?php
/**
 * Parcijalni view za pretragu radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $model WorkAccounts Model za radne naloge.
 * @var $form CActiveForm Forma za pretragu radnih naloga
 */

$userArray = array();

$userArray['0'] = 'Nepoznato';

foreach($users as $u)
	$userArray[$u->usId] = $u->realName . ' ' . $u->realSurname;

?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'workAccountSerial'); ?>
		<?php echo $form->textField($model,'workAccountSerial',array('size'=>60,'maxlength'=>90)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payeeName'); ?>
		<?php echo $form->textField($model,'payeeName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadlineDate'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
                    'name' => 'WorkAccounts[deadlineDate]',
                    'id' => 'WorkAccounts_deadlineDate',
                    'options' => array(
                        'showAnim' => 'fold',
                        'dayNamesMin' =>  array('Ned' ,'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'),
                        'dateFormat' => "dd.mm.yy",
                        'firstDay' => 1,
                        'monthNames' => array('Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'),
                        'monthNamesShort' => array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'),
                        'changeMonth' => true,
                        'changeYear' => true
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:2.3125rem;',
                    ),
                    'value' => ($model->deadlineDate > 0) ? date("d.m.Y", $model->deadlineDate) : "",
                ));

		?>
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
		<?php echo $form->checkBox($model,'invalid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reconciled'); ?>
		<?php echo $form->checkBox($model,'reconciled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'authorId'); ?>
		<?php echo $form->dropDownList($model,'authorId', $userArray); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reconciledId'); ?>
		<?php echo $form->dropDownList($model,'reconciledId', $userArray); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pretraži naloge'); ?>
		<input type="reset" value="Očisti formular" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->