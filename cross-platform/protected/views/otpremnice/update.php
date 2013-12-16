<?php
/* @var $this OtpremniceController */
/* @var $model Deliveries */


?>

<h1>Izmjeni otpremnicu <?php echo $model->deliverySerial; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'orders'=>$orders)); ?>