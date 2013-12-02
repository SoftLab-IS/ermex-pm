<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

$this->breadcrumbs=array(
	'Work Accounts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WorkAccounts', 'url'=>array('index')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h2>Kreirenje novog radnog naloga</h2>

<?php $this->renderPartial('_form', array('model'=>$model,'workers'=>$workers)); ?>