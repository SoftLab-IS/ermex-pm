<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

$this->menu=array(
	array('label'=>'List WorkAccounts', 'url'=>array('index')),
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'View WorkAccounts', 'url'=>array('view', 'id'=>$model->woId)),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h1>Update WorkAccounts <?php echo $model->woId; ?></h1>

<?php $this->renderPartial('_update_form', array('model'=>$model, 'materials'=>$materials, 'radnici'=>$radnici, 'orders'=>$orders, 'usedMaterials'=>$usedMaterials)); ?>