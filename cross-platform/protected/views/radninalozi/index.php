<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */
/* @autor Golub*/

$this->menu=array(
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<header class="clearfix">
    <h2 class="large-5 columns">Radni Nalozi</h2>

    <div class="button-bar large-7 columns context-options">
        <ul class="button-group">
            <li><a class="button secondary small" href="#">Proslijedi dalje</a></li>
            <li><a class="button secondary small" href="#">Storniraj nalog</a></li>
            <li><a class="button secondary small" href="#">Zaključi nalog</a></li>
            <li><a class="button secondary small" href="#">Odštampaj nalog</a></li>
        </ul>
        <ul class="button-group">
            <li><a class="button small" href="#">Dodaj radni nalog</a></li>
        </ul>
    </div>
</header>


<?php
$form = $this->beginWidget('CActiveForm',
    array(
      'id' => 'work-accounts-form',
    ));
?>

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
            'header' => 'R. broj',
            'value'  => '$row + 1',
         ),
         array(
             'name' => 'workAccountSerial',
             'value' => 'CHtml::link("$data->workAccountSerial", array("radniNalozi/view", "id" => $data->woId))',
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
            'header' => 'Sledeći Radnik',
            'value'  => '$data->workers[0]->user->realName . " " . $data->workers[0]->user->realSurname'
         ),

         array(
            'header' => 'Završeno?',
            'value'  => '($data->workers[0]->done == 1) ? "Da" : "Ne"',
         ),

         array(
           'class'=>'CButtonColumn',
         ),
       ),
    ));
?>

<div class="row buttons">
    <?php echo CHtml::submitButton('Zaključi odabrane', array('name' => 'zakljuciOdabrane')); ?>
    <?php echo CHtml::submitButton('Storniraj odabrane', array('name' => 'stornirajOdabrane')); ?>
    <?php echo CHtml::submitButton('Završi odabrane', array('name' => 'zavrsiOdabrane')); ?>
</div>

<?php $this->endWidget(); ?>