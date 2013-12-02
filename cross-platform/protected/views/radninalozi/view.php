<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

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

<h2>Prikaz radnog naloga br. <?php echo $model->woId; ?></h2>

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
		array(
			'name' => 'creationDate',
			'value' => date('d.m.Y',$model->creationDate)//Yii :: app () -> format-> formatDate ($model->creationDate)	
		),
		array(
			'name' => 'deadlineDate',
			'value' => date('d.m.Y',$model->deadlineDate)	
		),
		'amount',
		array(
		'name' => 'price',
		'value' => number_format($model->price, 2, '.', ',') . ' KM',
		),
		'note',
		'additional',
		array(
			'name' => 'invalid',
			'value' => ($model->invalid == 0) ? 'Ne' : 'Da',
		),
		array(
			'name' => 'reconciled',	
			'value' => ($model->reconciled == 0) ? 'Ne' : 'Da',
		),
		array(
			'name' => 'authorId',
			'value' => $model->author->realName. ' ' .$model->author->realSurname, 
		),
		array(
			'name' => 'reconciledId',
			'value' => ($model->reconciled == 1) ? $model->reconciled0->realName. ' ' .$model->reconciled0->realSurname : 'Niko',

		),
	),
)); ?>
