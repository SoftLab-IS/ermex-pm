<?php
/**
 * @author Ilija Tesic
 *
 * @var $this OtpremniceController
 * @var $model Deliveries
 *
 */
?>
<div id="productsModal" class="reveal-modal" data-reveal>
    <h2>Završeni proizvodi</h2>

    <?php $this->widget('zii.widgets.grid.CGridView',
        array(
            'id' => 'order-grid',
            'dataProvider' => $products->search(),
            'emptyText' => 'Trenutno nema dostupnih proizvoda.',
            'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} prozivod(a).',
            'columns' =>
                array(
                    array(
                        'value' => 'CHtml::checkBox("orderId[]",null,array("value"=> $data->orderId,"id"=>"cid_".$data->woId))',
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
                        'value' => '$data->amount != "" ? $data->amount ." ". $data->measurementUnit : ""',
                        'type' => 'raw',
                    ),
                    array(
                        'name' => 'price',
                        'value' => '$data->price > 0 ? $data->price." KM" : ""'
                    ),
                    array(
                        'name' => 'wo.workAccountSerial',
                        'value' => '($data->woId) ? CHtml::link(WorkAccounts::model()->findByPk($data->woId)->workAccountSerial, array("radniNalozi/view", "id" => $data->woId)) : ""',
                        'type' => 'raw',
                    ),

                ),
        ));
    ?>

    <div class="row buttons text-center">
        <?php 
            echo CHtml::button('Dodaj proizvode', array(
                                                    'class' => 'button small',
                                                    "id" => "proizvodiDodajPostojeci")); 
        ?>
    </div>

    <a class="close-reveal-modal" id="close-products-modal">&#215;</a>
</div>

