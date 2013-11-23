<?php
/* @var $this RadniNaloziController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Work Accounts',
);

$this->menu=array(
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h1>Work Accounts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
