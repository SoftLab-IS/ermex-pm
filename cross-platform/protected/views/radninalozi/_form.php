<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */
?>

<section class="form new-work-account">

    <?php $form=$this->beginWidget('CActiveForm', array(
       'id'=>'work-accounts-form',
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
            <?php echo $form->labelEx($model,'payeeName'); ?>
            <?php echo $form->textField($model,'payeeName',array('size'=>45,'maxlength'=>45,'required'=>'required')); ?>
         	<small class="error"><?php echo ($form->error($model,'payeeName'))? $form->error($model,'payeeName') : "Ovo polje je obavezno." ; ?></small>
            
        </div>
        <div class="large-2 columns">
            <?php echo $form->labelEx($model,'deadlineDate');
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'WorkAccounts[deadlineDate]',
                'id'=>'WorkAccounts_deadlineDate',
                    // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fade',
                    'dayNamesMin'=> array('Ned' ,'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'),
                    'dateFormat'=>"dd.mm.yy",
                    'firstDay'=>1,
                    'monthNames'=>array('Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'),
                    'monthNamesShort'=>array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'),
                    'changeMonth'=>true,
                    'changeYear'=>true
                    ),
                'htmlOptions'=>array(
                    'style'=>'height:2.3125rem;',
                    'required' =>'required',
                    ),
                ));
                 ?>
                <small class="error"><?php echo ($form->error($model,'deadlineDate'))? $form->error($model,'deadlineDate') : "Ovo polje je obavezno." ; ?></small>
        </div>
        <div class="large-2 columns">
            <label>Vrijeme isporuke *</label>
            <input type="text" id="deliveryTime" required="required" class="" name="deadlineTime"/>
            <small class="error">Ovo polje je obavezno.</small>
        </div>
        <div class="large-6 columns">
            <?php echo $form->labelEx($model,'payeeContactInfo'); ?>
            <?php echo $form->textArea($model,'payeeContactInfo',array('rows'=>6, 'cols'=>50,'required'=>'required')); ?>
            <small class="error"><?php echo $form->error($model,'payeeContactInfo')? $form->error($model,'payeeContactInfo') : "Ovo polje je obavezno." ?></small>
        </div>
        <div class="large-4 columns">
            <?php echo $form->labelEx($model,'additional'); ?>
            <?php echo $form->textArea($model,'additional',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'additional'); ?>
        </div>
        <div class="large-2 columns">
            <?php echo $form->labelEx($model,'deliveryPlace'); ?>
            <?php echo $form->listBox($model,'deliveryPlace',array('1' => 'Štamparija', '2' => 'Knjižara', '3' => 'Na adresu'), array('size' => '0')); ?>
            <?php echo $form->error($model,'payType'); ?>
        </div>
    </div>

        <fieldset>
            <legend>Narudžba</legend>

            <div class="clearfix oneOrder">
                <div class="large-9 columns">
                    <label>Naziv</label>
                    <input type="text" name="Order[][title]"/>
                </div>
                <div class="large-1 columns">
                    <label>Količina</label>
                    <input type="text" name="Order[][amount]"/>
                </div>
                <div class="large-1 columns">
                    <label>Mjera</label>
                    <input type="text" name="Order[][measurementUnit]"/>
                </div>
                <div class="large-1 columns">
                    <label>Cijena</label>
                    <input type="text" name="Order[][price]"/>
                </div>
                <div class="large-12 columns">
                    <label>Opis</label>
                    <textarea name="Order[][description]"></textarea>
                </div>
            </div>

            <div class="clearfix addOrder large-12 columns">
                <input type="button" value="Dodaj narudžbu" class="addO button small secondary"/>
            </div>

        </fieldset>

        <fieldset>
            <legend>Materijal</legend>

            <div class="material-select clearfix">
                <div class="materials clearfix">
                    <div class="large-10 columns">
                        <select name="Materials[][maId]">
                            <option></option>
                            <?php foreach($materials->findAll() as $material): ?>
                                <option value="<?php echo $material->maId; ?>"><?php echo $material->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="large-2 columns">
                        <input type="text"  name="Materials[][amount]"/>
                    </div>
                </div>
            </div>
            <div class="clearfix add-materials large-12 columns">
                <input type="button" value="Dodaj material" class="btn-add-material button small secondary"/>
            </div>
        </fieldset>

        <div class="clearfix">
            <div class="large-4 columns">
                <fieldset class="no-margin">
                    <script>
                        var workerIds = [
                            <?php
                                $max = count($radnici);
                                for ($i = 0; $i < $max; $i++)
                                    echo $radnici[$i]->usId . (($i < $max - 1) ? "," : "");
                            ?>
                        ];
                    </script>
                    <legend>Lista radnika</legend>
                    <div id="worker-list">
                        <div class="user-select">
                            <select name="user[]">
                                <?php foreach($radnici as $radnik): ?>
                                    <option value="<?php echo $radnik->usId; ?>"><?php echo $radnik->realName.' '.$radnik->realSurname; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix add-worker">
                        <input type="button" value="Dodaj radnika" class="btn-add-worker button small secondary"/>
                   </div>
                    <?php echo $form->error($model,'usersList'); ?>
                </fieldset>
            </div>

            <div class="large-8 columns">
                <?php echo $form->labelEx($model,'note'); ?>
                <?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
                <?php echo $form->error($model,'note'); ?>
            </div>
        </div>

        <div class="clearfix buttons text-center">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj radni nalog' : 'Sačuvaj radni nalog', array('class' => 'button small')); ?>
      </div>



      <?php $this->endWidget(); ?>

</section><!-- form -->