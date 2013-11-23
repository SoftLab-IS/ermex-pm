<?php
/* @var $this DeliveriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deliveries',
);

$this->menu=array(
	array('label'=>'Create Deliveries', 'url'=>array('create')),
	array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
?>

<h1>Deliveries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
