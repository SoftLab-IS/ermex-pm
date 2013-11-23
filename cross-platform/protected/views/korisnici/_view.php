<?php
/* @var $this KorisniciController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usId), array('view', 'id'=>$data->usId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realName')); ?>:</b>
	<?php echo CHtml::encode($data->realName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realSurname')); ?>:</b>
	<?php echo CHtml::encode($data->realSurname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registerDate')); ?>:</b>
	<?php echo CHtml::encode($data->registerDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isLoggedBy')); ?>:</b>
	<?php echo CHtml::encode($data->isLoggedBy); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('privilegeLevel')); ?>:</b>
	<?php echo CHtml::encode($data->privilegeLevel); ?>
	<br />

	*/ ?>

</div>