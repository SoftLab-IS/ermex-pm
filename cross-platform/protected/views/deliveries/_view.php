<?php
/* @var $this DeliveriesController */
/* @var $data Deliveries */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('deId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->deId), array('view', 'id'=>$data->deId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deliveryDate')); ?>:</b>
	<?php echo CHtml::encode($data->deliveryDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payType')); ?>:</b>
	<?php echo CHtml::encode($data->payType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reconciled')); ?>:</b>
	<?php echo CHtml::encode($data->reconciled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invalid')); ?>:</b>
	<?php echo CHtml::encode($data->invalid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('authorId')); ?>:</b>
	<?php echo CHtml::encode($data->authorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workAccountId')); ?>:</b>
	<?php echo CHtml::encode($data->workAccountId); ?>
	<br />

	*/ ?>

</div>