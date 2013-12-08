<?php
/**
 * View za dodavanje korisnika.
 *
 * @author Aleksandar Panic
 *
 * @var $this KorisniciController Kontroler radnih naloga.
 * @var $model Users Model jednog korisnika.
*/
?>

<h1>Novi korisnik</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>

<?php echo CHtml::link('Svi korisnici', array('korisnici/index')); ?>