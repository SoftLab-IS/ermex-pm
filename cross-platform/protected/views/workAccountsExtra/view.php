<?php
/* @var $this WorkAccountsExtraController */
/* @var $model WorkAccountsExtra */

$this->breadcrumbs=array(
	'Work Accounts Extras'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WorkAccountsExtra', 'url'=>array('index')),
	array('label'=>'Create WorkAccountsExtra', 'url'=>array('create')),
	array('label'=>'Update WorkAccountsExtra', 'url'=>array('update', 'id'=>$model->woId)),
	array('label'=>'Delete WorkAccountsExtra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->woId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WorkAccountsExtra', 'url'=>array('admin')),
);
?>

<h1>View WorkAccountsExtra #<?php echo $model->woId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'woId',
		'name',
		'description',
		'workAccountId',
	),
)); ?>
