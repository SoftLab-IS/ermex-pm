<?php
/**
 * View za prikaz radnih naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $dataProvider CActiveDataProvider Data Provider za radne naloge.
 */

$this->menu=array(
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>

<h1>Radni Nalozi</h1>

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
       'columns' =>
       array(
         array(
           'value'=>'CHtml::checkBox("workAccountId[]",null,array("value"=>$data->woId,"id"=>"cid_".$data->woId))',
           'type'=>'raw',
         ),
         array(
            'header' => 'R. broj',
            'value'  => '$row + 1',
         ),
         'workAccountSerial',
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

<div class="row buttons">
    <?php echo CHtml::submitButton('Zaključi odabrane', array('name' => 'zakljuciOdabrane')); ?>
    <?php echo CHtml::submitButton('Storniraj odabrane', array('name' => 'stornirajOdabrane')); ?>
</div>

<?php $this->endWidget(); ?>