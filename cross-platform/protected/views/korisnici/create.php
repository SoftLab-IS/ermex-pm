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


<header class="clearfix">
    <h2 class="large-4 columns">Novi korisnik</h2>

    <div class="button-bar large-8 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::link('Lista korisnika', array('korisnici/index'), array('class' => 'button small secondary')); ?></li>
            </ul>
        </div>
    </div>
</header>

<?php $this->renderPartial('_form', array('model' => $model)); ?>

