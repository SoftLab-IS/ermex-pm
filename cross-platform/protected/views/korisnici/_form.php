<?php
/**
 * Parcijalni view za formular izmjene ili dodavanja korisnika.
 *
 * @author Aleksandar Panic
 *
 * @var $this KorisniciController Kontroler radnih naloga.
 * @var $model Users Model jednog korisnika.
 * @var $form CActiveForm Aktivna forma za korisnika
*/
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
)); ?>

	<p class="note large-12 columns">Polja sa <span class="required">*</span> su neophodna.</p>

<?php echo $form->errorSummary($model); ?>

<div class="clearfix">
    <div class="large-6 columns">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

<?php if ($model->isNewRecord): ?>
    <div class="large-3 columns">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="large-3 columns">
        <?php echo $form->labelEx($model, 'verifyPassword'); ?>
        <?php echo $form->passwordField($model, 'verifyPassword', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'verifyPassword'); ?>
    </div>
<?php else: ?>
    <div class="large-3 columns">
        <?php echo $form->labelEx($model, 'newPassword'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 45, 'maxlength' => 45, 'value' => "")); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    
    <div class="large-3 columns">
        <?php echo $form->labelEx($model, 'verifyPassword'); ?>
        <?php echo $form->passwordField($model, 'verifyPassword', array('size' => 45, 'maxlength' => 45, 'value' => "")); ?>
        <?php echo $form->error($model, 'verifyPassword'); ?>
    </div>
<?php endif; ?>

</div>

<div class="clearfix">
    <div class="large-6 columns">
        <?php echo $form->labelEx($model, 'realName'); ?>
        <?php echo $form->textField($model, 'realName', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'realName'); ?>
    </div>
    <div class="large-6 columns">
        <?php echo $form->labelEx($model, 'realSurname'); ?>
        <?php echo $form->textField($model, 'realSurname', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'realSurname'); ?>
    </div>

</div>

<div class="clearfix">
	<div class="large-6 columns">
		<?php echo $form->labelEx($model, 'privilegeLevel'); ?>
		<?php echo $form->dropDownList($model, 'privilegeLevel', 
		array(
			'0' => 'Nema pristup',
			'1' => 'Radnik',
			'2' => 'Računovođa',
			'3' => 'Administrator'
		)); ?>
		<?php echo $form->error($model, 'privilegeLevel'); ?>
	</div>
</div>
	<div class="row buttons text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj novog korisnika' : 'Snimi izmjene', array('class' => 'button small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->