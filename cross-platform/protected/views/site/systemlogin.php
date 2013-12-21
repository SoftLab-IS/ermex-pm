<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this SiteController Kontroler statickih stranica.
 * @var $model LoginForm Model login forme.
 */
?>
<section class="system-login large-centered large-3 columns">
    <hgroup>
        <h1>Ermex Printing Management</h1>
        <h2>System Login</h2>
    </hgroup>

    <div class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' =>
            array(
                'validateOnSubmit'=>true,
                ),
            ));
            ?>

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
                <?php echo $form->label($model,'rememberMe', array('class' => 'inline-label')); ?>
                <?php echo $form->error($model,'rememberMe'); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Prijavi me', array('class' => 'button small center')); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
</section>