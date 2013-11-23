<?php
/* @var $this PayeesController */
/* @var $model Payees */

$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Create Payees', 'url'=>array('create')),
	array('label'=>'Update Payees', 'url'=>array('update', 'id'=>$model->paId)),
	array('label'=>'Delete Payees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->paId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>View Payees #<?php echo $model->paId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'paId',
		'name',
		'address',
		'contactPerson',
		'contactInfo',
	),
)); ?>
