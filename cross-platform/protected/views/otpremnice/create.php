<?php
/**
 * @author Ilija Tesic
 *
 * @var $this OtpremniceController
 * @var $model Deliveries
 *
 */

$this->menu=array(
	array('label'=>'List Deliveries', 'url'=>array('index')),
	array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
?>

<header>
    <h2>Kreiranje nove otpremnice</h2>
</header>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>