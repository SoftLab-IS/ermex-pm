<?php
/* @var $this WorkAccountsController */
/* @var $model WorkAccounts */

$this->breadcrumbs=array(
	'Work Accounts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WorkAccounts', 'url'=>array('index')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h1>Create WorkAccounts</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>