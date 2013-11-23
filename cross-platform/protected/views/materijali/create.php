<?php
/* @var $this MaterijaliController */
/* @var $model Materials */

$this->breadcrumbs=array(
	'Materials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Materials', 'url'=>array('index')),
	array('label'=>'Manage Materials', 'url'=>array('admin')),
);
?>

<h1>Create Materials</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>