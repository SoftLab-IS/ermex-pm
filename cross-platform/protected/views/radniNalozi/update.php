<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */

$this->breadcrumbs=array(
	'Work Accounts'=>array('index'),
	$model->name=>array('view','id'=>$model->woId),
	'Update',
);

$this->menu=array(
	array('label'=>'List WorkAccounts', 'url'=>array('index')),
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'View WorkAccounts', 'url'=>array('view', 'id'=>$model->woId)),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h1>Update WorkAccounts <?php echo $model->woId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>