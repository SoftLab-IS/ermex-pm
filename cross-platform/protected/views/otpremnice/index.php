<?php
/* @var $this OtpremniceController */
/* @var $dataProvider CActiveDataProvider */
/* @autor Golub*/

$this->breadcrumbs=array(
    'Deliveries',
);

$this->menu=array(
    array('label'=>'Create Deliveries', 'url'=>array('create')),
    array('label'=>'Manage Deliveries', 'url'=>array('admin')),
);
?>

    <h1>Otpremnice</h1>

<?php
$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'delivery-form',
    ));
?>

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
    <div class="row buttons">
        <?php echo CHtml::submitButton('Zaključi odabrane', array('name' => 'zakljuciOdabrane')); ?>
        <?php echo CHtml::submitButton('Storniraj odabrane', array('name' => 'stornirajOdabrane')); ?>
    </div>
<?php $this->endWidget(); ?>