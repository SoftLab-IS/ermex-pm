<?php
/* @var $this WorkAccountsExtraController */
/* @var $data WorkAccountsExtra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('woId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->woId), array('view', 'id'=>$data->woId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workAccountId')); ?>:</b>
	<?php echo CHtml::encode($data->workAccountId); ?>
	<br />


</div>