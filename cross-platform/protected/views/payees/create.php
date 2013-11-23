<?php
/* @var $this PayeesController */
/* @var $model Payees */

$this->breadcrumbs=array(
	'Payees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>Create Payees</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>