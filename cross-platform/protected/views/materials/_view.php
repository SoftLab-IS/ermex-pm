<?php
/* @var $this MaterialsController */
/* @var $data Materials */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('maId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->maId), array('view', 'id'=>$data->maId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enterDate')); ?>:</b>
	<?php echo CHtml::encode($data->enterDate); ?>
	<br />


</div>