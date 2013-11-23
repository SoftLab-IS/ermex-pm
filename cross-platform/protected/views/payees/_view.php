<?php
/* @var $this PayeesController */
/* @var $data Payees */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('paId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->paId), array('view', 'id'=>$data->paId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactPerson')); ?>:</b>
	<?php echo CHtml::encode($data->contactPerson); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactInfo')); ?>:</b>
	<?php echo CHtml::encode($data->contactInfo); ?>
	<br />


</div>