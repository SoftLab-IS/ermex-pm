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

<?php
$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'work-accounts-form',
    ));
?>

<header class="clearfix">
    <h2 class="large-5 columns">Radni Nalozi</h2>

    <div class="button-bar large-7 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::submitButton('Proslijedi dalje', array('name' => 'zavrsiOdabrane', 'class' => 'button secondary small')); ?></li>
                <li><?php echo CHtml::submitButton('Storniraj odabrane', array('name' => 'stornirajOdabrane', 'class' => 'button secondary small')); ?></li>
                <li><?php echo CHtml::submitButton('Zaključi odabrane', array('name' => 'zakljuciOdabrane', 'class' => 'button secondary small')); ?></li>
                <li><?php echo CHtml::link('Odštampaj odabrane', array('#'), array('class' => 'button secondary small')); ?>
            </ul>
            <ul class="button-group">
                <li><?php echo CHtml::link('Dodaj radni nalog', array('radniNalozi/create'), array('class' => 'button small')); ?>
            </ul>
        </div>
    </div>
</header>

<?php $this->widget('zii.widgets.grid.CGridView',
    array(
       'id'=>'work-accounts-grid',
       'dataProvider'=> $dataProvider,
       'emptyText' => 'Trenutno nema dostupnih radnih naloga.',
       'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} radnih naloga.',
       'columns' =>
       array(
         array(
           'value' => 'CHtml::checkBox("workAccountId[]",null,array("value"=>$data->woId,"id"=>"cid_".$data->woId))',
           'type' => 'raw',
         ),
         array(
            'header' => '#',
            'value'  => '$row + 1',
         ),
         array(
             'name' => 'workAccountSerial',
             'value' => 'CHtml::link("$data->workAccountSerial", array("radniNalozi/view", "id" => $data->woId))',
             'type' => 'raw',
         ),
         'payeeName',
         array(
             'name' => 'deadlineDate',
             'value'  => 'date(\'d.m.Y\', $data->deadlineDate)',
         ),
         array(
            'name' => 'currentUser',
            'value'  => ''
         ),
         array(
             'class'=>'CButtonColumn',
             'template' => '{update}{delete}'
         ),
       ),
    ));
?>

<?php $this->endWidget(); ?>