<?php
/**
 * Login Form for user switching
 *
 * @author Aleksandar Panic
 *
 * @var $this CControler Current controller.
 * @var $notActive Boolean Is logged user active
 * @var $user Users User to which you want to switch.
 */

$this->pageTitle = Yii::app()->name . ' - Login';
?>
<section class="system-login large-centered large-4 columns">
    <hgroup>
        <h1>Promjena korisnika</h1>
        <p>Da bi ste sistem koristili kao
            <strong><?php echo $user->getFullName(); ?></strong>
            morate se ulogovati.</p>
    </hgroup>

    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Prijavi me',array('class' => 'button small center')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
</section>