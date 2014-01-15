<?php
/* @var $this OtpremniceController */
/* @var $model Deliveries */
/* @var $form CActiveForm */
/* @autor Golub*/

Yii::app()->clientScript->coreScriptPosition = CClientScript::POS_END;
Yii::app()->clientScript->registerCoreScript("jquery.ui");
Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->coreScriptUrl. '/jui/css/base/jquery-ui.css');
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
     'id'=>'deliveries-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
     'enableAjaxValidation'=>false,
     'htmlOptions' => array('data-abide' => 'true'),
     )); ?>

     <?php echo $form->errorSummary($model); ?>

     <div class="clearfix">
        <div class="large-8 columns">
            <?php echo $form->labelEx($model,'peyeeName'); ?>
            <?php echo $form->textField($model,'peyeeName',array('size'=>45, 'maxlength'=>45, 'required'=>'required')); ?>
            <small class="error"><?php echo $form->error($model,'peyeeName')? $form->error($model,'peyeeName') : "Ovo polje je obavezno."?></small>

            <?php echo $form->labelEx($model,'peyeeContactInfo'); ?>
            <?php echo $form->textArea($model,'peyeeContactInfo',array('rows'=>6, 'cols'=>50, 'required'=>'required')); ?>
            <small class="error"><?php echo $form->error($model,'peyeeContactInfo')? $form->error($model,'peyeeContactInfo') : "Ovo polje je obavezno." ?></small>
        </div>
        <div class="large-4 columns">
            <?php echo $form->labelEx($model,'payType'); ?>
            <?php echo $form->listBox($model,'payType',array('0' => 'Gotovina', '1' => 'Žiralno'), array('size' => '0')); ?>
            <?php echo $form->error($model,'payType'); ?>

            <?php echo $form->labelEx($model,'deliveryPlace'); ?>
            <?php echo $form->listBox($model,'deliveryPlace',array('1' => 'Štamparija', '2' => 'Knjižara', '3' => 'Na adresu'), array('size' => '0')); ?>
            <?php echo $form->error($model,'payType'); ?>
        </div>
    </div>

    <fieldset>
        <legend>Proizvodi</legend>
        <?php if($orders): ?>
            <?php foreach($orders as $order): ?>
                <div class="clearfix oneOrder">
                    <div class="large-9 columns">
                        <label>Naziv</label>
                        <input type="text" name="Order[title][]" value="<?php echo $order->title; ?>"/>
                    </div>
                    <div class="large-1 columns">
                        <label>Količina</label>
                        <input type="text" name="Order[amount][]" value="<?php echo $order->amount; ?>"/>
                    </div>
                    <div class="large-1 columns">
                        <label>Mjera</label>
                        <input type="text" name="Order[measurementUnit][]" value="<?php echo $order->measurementUnit; ?>"/>
                    </div>
                    <div class="large-1 columns">
                        <label>Cijena</label>
                        <input type="text" name="Order[price][]" value="<?php echo $order->price; ?>"/>
                    </div>
                    <div class="large-12 columns">
                        <label>Opis</label>
                        <textarea name="Order[description][]"><?php echo $order->description; ?></textarea>
                    </div>
                    <input type="hidden" name="Order[id][]" value="<?php echo $order->orderId; ?>"/>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="clearfix addOrder large-12 columns">
            <a href="#" data-reveal-id="productsModal" class="button small">Dodaj postojeći proizvod</a>
            <input type="button" value="Upiši novi proizvod" class="addOO button small secondary"/>
        </div>

    </fieldset>

    <div class="clearfix">
      <div class="large-4 large-push-8 columns">
          <?php echo $form->labelEx($model,'price'); ?>
          <?php echo $form->textField($model,'price',array('pattern'=>'integer')); ?>
          <?php echo $form->error($model,'price'); ?>
      </div>
  </div>

  <div class="clearfix">
    <div class="large-12 columns">
        <?php echo $form->labelEx($model,'note'); ?>
        <?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'note'); ?>
    </div>
</div>

<div data-alert="" style="display:none" class="empty-proizvod alert-box alert hide">
    Nije moguće kreirati otpremnicu bez unosa barem jednog proizvoda.
    <a href="#" class="close">&times;</a>
</div> 

<div class="row buttons text-center">
    <?php 
    echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj otpremnicu' : 'Sačuvaj otpremnicu', array(
        'class' => 'button small',
        'id' => 'otpremnica-submit-button',
        'data-otpremnica-ok' => '0'
        )); 
        ?>	
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->