<?php
/**
 * View za prikaz liste otpremnica
 *
 * @author Ilija Tesic
 *
 */
?>

<?php
$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'delivery-form',
    ));
?>

<header class="clearfix">
    <h2 class="large-5 columns">Otpremnice</h2>

    <div class="button-bar large-7 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::submitButton('Storniraj odabrane', array('name' => 'stornirajOdabrane', 'class' => 'button secondary small')); ?></li>
                <li><?php echo CHtml::submitButton('Zaključi odabrane', array('name' => 'zakljuciOdabrane', 'class' => 'button secondary small')); ?></li>
                <li><?php echo CHtml::link('Odštampaj odabrane', array('#'), array('class' => 'button secondary small')); //TODO ?>
            </ul>
            <ul class="button-group">
                <li><?php echo CHtml::link('Napravi otpremnicu', array('otpremnice/create'), array('class' => 'button small')); ?>
            </ul>
        </div>
    </div>
</header>

<?php $this->widget('zii.widgets.grid.CGridView',
    array(
        'id'=>'delivery-grid',
        'dataProvider'=> $dataProvider,
        'emptyText' => 'Trenutno nema dostupnih otpremnica.',
        'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} otpremnica.',
       'rowCssClassExpression' => '
        (($row % 2) ? $this->rowCssClass[1] : $this->rowCssClass[0]) .
        (($data->reconciled == 1) ? " reconciled-item" : "") .
        (($data->invalid == 1) ? " invalid-item" : "")
       ',
        'columns' =>
            array(
                array(
                    'value' => 'CHtml::checkBox("deliveryId[]",null,array("value"=>$data->deId,"id"=>"cid_".$data->deId))',
                    'type' => 'raw',
                ),
                array(
                    'header' => '#',
                    'value' => '$row + 1',
                ),
                array(
                    'name' => 'deliverySerial',
                    'value' => 'CHtml::link("$data->deliverySerial", array("otpremnice/view", "id" => $data->deId))',
                    'type' => 'raw',
                ),
                array(
                    'name'=>'peyeeName',
                    'value'=>'$data->peyeeName',
                ),
                array(
                    'name' => 'payType',
                    'value' => '($data->payType == 0) ? "Gotovina" : "Virman"',
                ),
                array(
                    'name'=>'deliveryDate',
                    'value'=>'date("d.m.Y.", $data->deliveryDate)',
                ),
                array(
                    'name'=>'authorId',
                    'value'=>'$data->getFullName()',
                ),
                array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}{delete}',
                    'deleteConfirmation' => 'Jeste li sigurni da želite stornirati ovu stavku?',
                    'afterDelete'=>'function(link, success, data){ if(success) alert("Uspješno ste stornirali ovu stavku."); }',
                ),
            ),
    ));
?>

<?php $this->endWidget(); ?>
