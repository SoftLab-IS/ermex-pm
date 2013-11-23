<?php
/* @var $this KorisniciController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->usId=>array('view','id'=>$model->usId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->usId)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Update Users <?php echo $model->usId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>