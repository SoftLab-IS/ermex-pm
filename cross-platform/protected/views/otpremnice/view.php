<?php
/* @var $this OtpremniceController */
/* @var $model Deliveries */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	$model->deId,
);

$this->menu=array(
	array('label'=>'List Deliveries', 'url'=>array('index')),
	array('label'=>'Create Deliveries', 'url'=>array('create')),
	array('label'=>'Update Deliveries', 'url'=>array('update', 'id'=>$model->deId)),
	array('label'=>'Delete Deliveries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->deId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
?>

<h1>View Deliveries #<?php echo $model->deId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deId',
		'deliveryDate',
		'price',
		'note',
		'payType',
		'reconciled',
		'invalid',
		'authorId',
		'workAccountId',
	),
)); ?>
