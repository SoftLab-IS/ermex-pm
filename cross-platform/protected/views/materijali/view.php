<?php
/* @var $this MaterijaliController */
/* @var $model Materials */

?>

<header>
    <h2>Materijal</h2>
</header>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'maId',
		'name',
		'description',
		'amount',
		'enterDate',
		'dimensionUnit',
	),
)); ?>
