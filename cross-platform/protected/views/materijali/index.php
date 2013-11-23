<?php
/* @var $this MaterijaliController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Materials',
);

$this->menu=array(
	array('label'=>'Create Materials', 'url'=>array('create')),
	array('label'=>'Manage Materials', 'url'=>array('admin')),
);
?>

<h1>Materials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
