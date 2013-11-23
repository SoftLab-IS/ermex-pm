<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */

$this->breadcrumbs=array(
	'Work Accounts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WorkAccounts', 'url'=>array('index')),
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'Update WorkAccounts', 'url'=>array('update', 'id'=>$model->woId)),
	array('label'=>'Delete WorkAccounts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->woId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h1>View WorkAccounts #<?php echo $model->woId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'woId',
		'workAccountSerial',
		'name',
		'description',
		'payeeName',
		'payeeContactPerson',
		'payeeContactInfo',
		'creationDate',
		'deadlineDate',
		'amount',
		'price',
		'note',
		'additional',
		'invalid',
		'reconciled',
		'payeeId',
		'authorId',
		'reconciledId',
	),
)); ?>
