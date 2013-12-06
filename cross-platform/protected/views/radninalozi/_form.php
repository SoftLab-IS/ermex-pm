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
)); ?>

	<p class="note">Polja označena sa <span class="required">*</span> su obavezna.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="clearfix">
        <div class="large-8 columns">
            <?php echo $form->labelEx($model,'payeeName'); ?>
            <?php echo $form->textField($model,'payeeName',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'payeeName'); ?>

            <?php echo $form->labelEx($model,'payeeContactInfo'); ?>
            <?php echo $form->textArea($model,'payeeContactInfo',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'payeeContactInfo'); ?>
        </div>
        <div class="large-4 columns">
            <?php echo $form->labelEx($model,'deadlineDate');
                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'WorkAccounts[deadlineDate]',
                    'id'=>'WorkAccounts_deadlineDate',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
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
                    ),
                ));
            echo $form->error($model,'deadlineDate'); ?>


            <?php echo $form->labelEx($model,'additional'); ?>
            <?php echo $form->textArea($model,'additional',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'additional'); ?>
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
                <label>Kolicina</label>
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

        <div class="clearfix addOrder">
            <input type="button" value="Dodaj" class="addO"/>
        </div>

	</fieldset>

    <fieldset>
        <legend>Materijal</legend>

        <div>
            Ovde ce biti lista materijala
        </div>
    </fieldset>

    <div class="clearfix">
        <div class="large-4 columns">
            <?php echo $form->labelEx($model,'usersList'); ?>

            <div class="user-select">
                <select name="user[]">
                    <?php foreach($radnici as $radnik): ?>
                        <option value="<?php echo $radnik->usId; ?>"><?php echo $radnik->realName.' '.$radnik->realSurname; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="clearfix add-worker">
                <input type="button" value="Dodaj" class="btn-add-worker"/>
            </div>

            <?php echo $form->error($model,'usersList'); ?>
            <?php echo $form->hiddenField($model, 'userList', array('value' => '1', 'name' => 'userList')); ?>
        </div>

        <div class="large-8 columns">
            <?php echo $form->labelEx($model,'note'); ?>
            <?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'note'); ?>
        </div>
    </div>

    <div class="clearfix buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj' : 'Sačuvaj'); ?>
	</div>

	
	
<?php $this->endWidget(); ?>

</section><!-- form -->