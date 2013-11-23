<?php
/* @var $this MaterijaliController */
/* @var $model Materials */

$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->name=>array('view','id'=>$model->maId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Materials', 'url'=>array('index')),
	array('label'=>'Create Materials', 'url'=>array('create')),
	array('label'=>'View Materials', 'url'=>array('view', 'id'=>$model->maId)),
	array('label'=>'Manage Materials', 'url'=>array('admin')),
);
?>

<h1>Update Materials <?php echo $model->maId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>