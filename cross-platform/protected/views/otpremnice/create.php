<?php
/**
 * @author Ilija Tesic
 *
 * @var $this OtpremniceController
 * @var $model Deliveries
 *
 */
?>

<header>
    <h2>Kreiranje nove otpremnice</h2>
</header>

<?php $this->renderPartial('_form', array('model'=>$model, 'orders' => $orders, 'products' => $products)); ?>
<?php $this->renderPartial('_products', array('products' => $products)); ?>