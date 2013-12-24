<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

?>
<header>
    <h2>Promjena radnog naloga <?php echo $model->workAccountSerial; ?></h2>
</header>

<?php $this->renderPartial('_update_form', array('model'=>$model, 'materials'=>$materials, 'radnici'=>$radnici, 'orders'=>$orders, 'usedMaterials'=>$usedMaterials)); ?>