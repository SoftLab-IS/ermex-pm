<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Ilija Tesic
 *
 * @var $this ProizvodiController Kontroler proizvoda.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */
?>

    <header class="clearfix">
        <h2 class="large-5 columns">Proizvodi</h2>

        <div class="button-bar large-7 columns context-options">
            <div>
                <ul class="button-group">
                    <li><a class="button small" href="#">Otpremi proizvode</a></li>
                </ul>
            </div>
        </div>
    </header>

<?php $this->widget('zii.widgets.grid.CGridView',
    array(
        'id' => 'order-grid',
        'dataProvider' => $dataProvider,
        'emptyText' => 'Trenutno nema dostupnih proizvoda.',
        'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} prozivod(a).',
        'columns' =>
            array(
                array(
                    'value' => 'CHtml::checkBox("orderId[]",null,array("value"=>$data->woId,"id"=>"cid_".$data->woId))',
                    'type' => 'raw',
                ),
                array(
                    'header' => '#',
                    'value' => '$row + 1',
                ),
                array(
                    'name' => 'wo.workAccountSerial',
//                    'value'=>'$data->wo->workAccountSerial',

                    'value' => 'CHtml::link(WorkAccounts::model()->findByPk($data->woId)->workAccountSerial, array("radniNalozi/view", "id" => $data->woId))',
                    'type' => 'raw',
                ),
                'title',
                'description',
                'price',
                'amount',
                'measurementUnit',
            ),
    ));
?>