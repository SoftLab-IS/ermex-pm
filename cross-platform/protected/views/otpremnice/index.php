<?php
/* @var $this OtpremniceController */
/* @var $dataProvider CActiveDataProvider */
/* @autor Golub*/

$this->menu=array(
    array('label'=>'Create Deliveries', 'url'=>array('create')),
    array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
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
        'columns' =>
            array(
                array(
                    'value' => 'CHtml::checkBox("deliveryId[]",null,array("value"=>$data->deId,"id"=>"cid_".$data->deId))',
                    'type' => 'raw',
                ),
                array(
                    'header' => '',
                    'value' => '$row + 1',
                ),
                array(
                    'name'=>'deliveryDate',
                    'value'=>'date("d.m.Y.", $data->deliveryDate)',
                ),
                'price',
                'note',
                array(
                    'name' => 'payType',
                    'value' => '($data->payType == 0) ? "Gotovina" : "Virman"',
                ),
                array(
                    'name' => 'reconciled',
                    'value' => '($data->reconciled == 0) ? "Ne" : "Da"',
                ),
                array(
                    'name' => 'invalid',
                    'value' => '($data->invalid == 0) ? "Ne" : "Da"',
                ),
                array(
                    'name'=>'authorId',
                    'value'=>'$data->author->realName. " " .$data->author->realSurname',
                ),
                array(
                    'name'=>'workAccountId',
                    'value'=>'$data->workAccount->workAccountSerial',
                ),
            ),
    ));
?>

<?php $this->endWidget(); ?>