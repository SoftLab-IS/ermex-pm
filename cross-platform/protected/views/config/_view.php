<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('coId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->coId), array('view', 'id'=>$data->coId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workAccountIncrement')); ?>:</b>
	<?php echo CHtml::encode($data->workAccountIncrement); ?>
	<br />


</div>