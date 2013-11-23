<?php
/* @var $this DeliveriesController */
/* @var $model Deliveries */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	$model->deId=>array('view','id'=>$model->deId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Deliveries', 'url'=>array('index')),
	array('label'=>'Create Deliveries', 'url'=>array('create')),
	array('label'=>'View Deliveries', 'url'=>array('view', 'id'=>$model->deId)),
	array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
?>

<h1>Update Deliveries <?php echo $model->deId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>