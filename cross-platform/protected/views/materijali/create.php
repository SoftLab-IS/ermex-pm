<?php
/* @var $this MaterijaliController */
/* @var $model Materials */


$this->menu=array(
	array('label'=>'List Materials', 'url'=>array('index')),
	array('label'=>'Manage Materials', 'url'=>array('admin')),
);
?>

<header>
    <h2>Kreiranje novog materijala</h2>
</header>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>