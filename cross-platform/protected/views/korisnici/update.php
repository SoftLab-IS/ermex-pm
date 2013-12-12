<?php
/**
 * View za izmjenu korisnika
 *
 * @author Ilija Tesic
 *
 * @var $this KorisniciController Kontroler radnih naloga.
 * @var $model Users Model jednog korisnika.
*/
?>

<header class="clearfix">
   <h2 class="large-12 columns">Izmjena korisnika: <?php echo $model->getFullName(); ?></h2>
</header>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
