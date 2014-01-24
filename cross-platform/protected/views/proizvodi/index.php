<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Ilija Tesic
 *
 * @var $this ProizvodiController Kontroler proizvoda.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */

$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'proizvodi-form',
        'action' => array( '/otpremnice/create' ),
    ));


?>

    <header class="clearfix">
        <h2 class="large-5 columns">Proizvodi</h2>

        <div class="button-bar large-7 columns context-options">
            <div>
                <ul class="button-group">
                    <li><?php echo CHtml::submitButton('Otpremi proizvode', array('name' => 'otpremiProizvode', 'class' => 'button secondary small', 'title' => 'Otpremi izabrane proizvode')); ?></li>
                </ul>
            </div>
        </div>
    </header>

<?php $this->widget('zii.widgets.grid.CGridView',
    array(
        'id' => 'order-grid',
        'dataProvider' => $model->search(),
        'emptyText' => 'Trenutno nema dostupnih proizvoda.',
        'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} prozivod(a).',
        'columns' =>
            array(
                array(
                    'value' => 'CHtml::checkBox("orderId[]",null,array("value"=>$data->orderId,"id"=>"cid_".$data->woId))',
                    'type' => 'raw',
                ),
                array(
                    'header' => '#',
                    'value' => '$row + 1',
                ),
                'title',
                array(
                    'name' => 'wo.payeeName',
                    'value' => '($data->woId) ? WorkAccounts::model()->findByPk($data->woId)->payeeName : ""',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'amount',
                    'value' => '$data->amount != "" ? $data->amount . " " . $data->measurementUnit : ""',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'price',
                    'value' => '$data->price > 0 ? $data->price . " KM" : ""'
                ),
                array(
                    'name' => 'wo.workAccountSerial',
                    'value' => '($data->woId) ? CHtml::link(WorkAccounts::model()->findByPk($data->woId)->workAccountSerial, array("radniNalozi/view", "id" => $data->woId)) : ""',
                    'type' => 'raw',
                ),

            ),
    ));
?>
<?php $this->endWidget(); ?>