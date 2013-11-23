<?php
/* @var $this WorkAccountsExtraController */
/* @var $model WorkAccountsExtra */

$this->breadcrumbs=array(
	'Work Accounts Extras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WorkAccountsExtra', 'url'=>array('index')),
	array('label'=>'Manage WorkAccountsExtra', 'url'=>array('admin')),
);
?>

<h1>Create WorkAccountsExtra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>