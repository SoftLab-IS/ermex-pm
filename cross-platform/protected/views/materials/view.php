<?php
/* @var $this MaterialsController */
/* @var $model Materials */

$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Materials', 'url'=>array('index')),
	array('label'=>'Create Materials', 'url'=>array('create')),
	array('label'=>'Update Materials', 'url'=>array('update', 'id'=>$model->maId)),
	array('label'=>'Delete Materials', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->maId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Materials', 'url'=>array('admin')),
);
?>

<h1>View Materials #<?php echo $model->maId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'maId',
		'name',
		'description',
		'amount',
		'enterDate',
	),
)); ?>
