<?php
/* @var $this RadniNaloziController */
/* @var $data WorkAccounts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('woId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->woId), array('view', 'id'=>$data->woId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workAccountSerial')); ?>:</b>
	<?php echo CHtml::encode($data->workAccountSerial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payeeName')); ?>:</b>
	<?php echo CHtml::encode($data->payeeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payeeContactPerson')); ?>:</b>
	<?php echo CHtml::encode($data->payeeContactPerson); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payeeContactInfo')); ?>:</b>
	<?php echo CHtml::encode($data->payeeContactInfo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creationDate')); ?>:</b>
	<?php echo CHtml::encode($data->creationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadlineDate')); ?>:</b>
	<?php echo CHtml::encode($data->deadlineDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional')); ?>:</b>
	<?php echo CHtml::encode($data->additional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invalid')); ?>:</b>
	<?php echo CHtml::encode($data->invalid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reconciled')); ?>:</b>
	<?php echo CHtml::encode($data->reconciled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payeeId')); ?>:</b>
	<?php echo CHtml::encode($data->payeeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('authorId')); ?>:</b>
	<?php echo CHtml::encode($data->authorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reconciledId')); ?>:</b>
	<?php echo CHtml::encode($data->reconciledId); ?>
	<br />

	*/ ?>

</div>