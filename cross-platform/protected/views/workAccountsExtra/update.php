<?php
/* @var $this WorkAccountsExtraController */
/* @var $model WorkAccountsExtra */

$this->breadcrumbs=array(
	'Work Accounts Extras'=>array('index'),
	$model->name=>array('view','id'=>$model->woId),
	'Update',
);

$this->menu=array(
	array('label'=>'List WorkAccountsExtra', 'url'=>array('index')),
	array('label'=>'Create WorkAccountsExtra', 'url'=>array('create')),
	array('label'=>'View WorkAccountsExtra', 'url'=>array('view', 'id'=>$model->woId)),
	array('label'=>'Manage WorkAccountsExtra', 'url'=>array('admin')),
);
?>

<h1>Update WorkAccountsExtra <?php echo $model->woId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>