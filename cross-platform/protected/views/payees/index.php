<?php
/* @var $this PayeesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payees',
);

$this->menu=array(
	array('label'=>'Create Payees', 'url'=>array('create')),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>Payees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
