<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this ProizvodiController Kontroler proizvoda.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */
?>

<h1>Proizvodi</h1>

<?php $this->widget('zii.widgets.grid.CGridView',
    array(
         'id'=>'work-accounts-grid',
         'dataProvider'=> $dataProvider,
         'emptyText' => 'Trenutno nema dostupnih proizvoda.',
         'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} prozivod(a).',
         'columns' =>
             array(
                 array(
                     'value' => 'CHtml::checkBox("workAccountId[]",null,array("value"=>$data->woId,"id"=>"cid_".$data->woId))',
                     'type' => 'raw',
                 ),
                 array(
                     'header' => 'R. broj',
                     'value'  => '$row + 1',
                 ),
                 array(
                     'name' => 'workAccountSerial',
                     'value' => 'CHtml::link("$data->workAccountSerial", array("proizvodi/otvori", "id" => $data->woId))',
                     'type' => 'raw',
                 ),
                 'name',
                 'payeeName',
                 array(
                     'name' => 'creationDate',
                     'value'  => 'date(\'d.m.Y\', $data->creationDate)',
                 ),
                 array(
                     'name' => 'deadlineDate',
                     'value'  => 'date(\'d.m.Y\', $data->deadlineDate)',
                 ),
                 array(
                     'name' => 'invalid',
                     'value' => '($data->invalid == 0) ? "Ne" : "Da"',
                 ),
                 array(
                     'name' => 'reconciled',
                     'value' => '($data->reconciled == 0) ? "Ne" : "Da"',
                 ),

                 array(
                     'class'=>'CButtonColumn',
                 ),
             ),
    ));
?>