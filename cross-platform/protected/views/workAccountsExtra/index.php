<?php
/* @var $this WorkAccountsExtraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Work Accounts Extras',
);

$this->menu=array(
	array('label'=>'Create WorkAccountsExtra', 'url'=>array('create')),
	array('label'=>'Manage WorkAccountsExtra', 'url'=>array('admin')),
);
?>

<h1>Work Accounts Extras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
