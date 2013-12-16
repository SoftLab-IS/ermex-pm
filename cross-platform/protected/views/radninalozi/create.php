<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/


?>
<header>
    <h2>Kreirenje novog radnog naloga</h2>
</header>

<?php $this->renderPartial('_form', array('model' => $model, 'materials' => $materials, 'radnici' => $radnici)); ?>
