<?php
/**
 * Parcijalni view za formular izmjene ili dodavanja korisnika.
 *
 * @author Aleksandar Panic
 *
 * @var $this KorisniciController Kontroler radnih naloga.
 * @var $model Users Model jednog korisnika.
*/
?>

<h1>Izmjena korisnika: <?php echo $model->realName . ' ' . $model->realSurname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php echo CHtml::link('< Nazad na pogled', array('korisnici/view/' . $model->usId)); ?> | 
<?php echo CHtml::link('Svi korisnici', array('korisnici/index')); ?>