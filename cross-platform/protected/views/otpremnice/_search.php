<?php
/**
 * Parcijalni view za pretragu radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $model WorkAccounts Model za radne naloge.
 * @var $form CActiveForm Forma za pretragu radnih naloga
 */

$userArray = array();

$userArray['0'] = '';

foreach($users as $u)
	$userArray[$u->usId] = $u->getFullName();

?>

<div class="form wide filter-form panel">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
        'id' => 'filter-form',
    )); ?>

    <div class="clearfix">
        <div class="large-5 columns">
            <?php echo $form->textField($model,'peyeeName', array('size'=>45,'maxlength'=>45, 'placeholder' => 'Naziv naručioca')); ?>
        </div>

        <div class="large-3 columns">
            <span>
                <?php echo $form->checkBox($model,'invalid'); ?>
                <?php echo $form->label($model,'invalid'); ?>
            </span>
            <span>
                <?php echo $form->checkBox($model,'reconciled'); ?>
                <?php echo $form->label($model,'reconciled'); ?>
            </span>
        </div>

        <div class="large-4 columns buttons text-right">
            <a class="button secondary small show-filter-options" href="#">Dodatne opcije</a>
<!--            <a class="button secondary small" href="--><?php //echo Yii::app()->request->getRequestUri(); ?><!--">Poništi filter</a>-->
            <?php echo CHtml::link('Poništi filter', array('otpremnice/index'), array('class' => 'button secondary small')); ?>
            <?php echo CHtml::submitButton('Pretraži otpremnice', array('class' => 'button small')); ?>

        </div>
    </div>
    <div class="clearfix hidden-filter-options">

        <div class="large-1 columns text-right">
            <?php echo $form->label($model,'authorId'); ?>
        </div>
        <div class="large-2 columns">
            <?php echo $form->dropDownList($model,'authorId', $userArray, array('placeholder' => 'Autor')); ?>
        </div>

        <div class="large-1 columns text-right">
            <?php echo $form->label($model,'reconciledId'); ?>
        </div>
        <div class="large-2 column">
            <?php echo $form->dropDownList($model,'reconciledId', $userArray); ?>
        </div>
        <div class="large-4 columns">
            &nbsp;
        </div>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->