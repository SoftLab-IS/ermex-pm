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

<?php $this->widget('zii.widgets.grid.CGridView', array(
                                                       'id'=>'work-accounts-grid',
                                                       'dataProvider'=> $dataProvider,
                                                       'columns'=>array(
                                                           'woId' =>
                                                           array(
                                                               'header' => 'R. broj',
                                                               'value'  => '$row + 1',
                                                           ),
                                                           'workAccountSerial',
                                                           'name',
                                                           'payeeName',
                                                           'creationDate',
                                                           'deadlineDate',
                                                           'invalid',
                                                           'reconciled',

                                                           array(
                                                               'class'=>'CButtonColumn',
                                                           ),
                                                       ),
                                                  )); ?>
