<?php
/* @var $this DeliveriesController */
/* @var $model Deliveries */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Deliveries', 'url'=>array('index')),
	array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
?>

<h1>Create Deliveries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>