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