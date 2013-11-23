<?php
/* @var $this PayeesController */
/* @var $model Payees */

$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->name=>array('view','id'=>$model->paId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Create Payees', 'url'=>array('create')),
	array('label'=>'View Payees', 'url'=>array('view', 'id'=>$model->paId)),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>Update Payees <?php echo $model->paId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>