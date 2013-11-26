<?php
/**
 * View za prikaz jednog radnog naloga
 *
 * @author Aleksndar Panic
 *
 * @var $this ProizvodiController Kontroler proizvoda.
 * @var $model WorkAccounts Model proizvoda
 */

?>
<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
                                                    'data'=>$model,
                                                    'attributes'=>array(
                                                        'woId',
                                                        'workAccountSerial',
                                                        'name',
                                                        'description',
                                                        'payeeName',
                                                        'payeeContactPerson',
                                                        'payeeContactInfo',
                                                        'creationDate',
                                                        'deadlineDate',
                                                        'amount',
                                                        'price',
                                                        'note',
                                                        'additional',
                                                        'invalid',
                                                        'reconciled',
                                                        'payeeId',
                                                        'authorId',
                                                        'reconciledId',
                                                    ),
                                               )); ?>