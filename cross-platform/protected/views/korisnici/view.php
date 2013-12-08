<?php
/**
 * View za prikaz jednog korisnika.
 *
 * @author Aleksandar Panic
 *
 * @var $this KorisniciController Kontroler radnih naloga.
 * @var $model Users Model jednog korisnika.
 */
?>

<h1>Korisnik: <?php echo $model->realName . " " . $model->realSurname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', 
array(
	'data'=>$model,
	'attributes'=>
	array(
		'username',
		array(
			'name' => 'Puno ime',
			'value' => $model->realName . ' ' . $model->realSurname,
		),
		array(
			'name' => 'registerDate',
			'value' => date("d.m.Y \u H:i:s", $model->registerDate)
		),
	),
)); 
?>

<?php echo CHtml::link('Izmjeni Korisnika', array('korisnici/update', 'id' => $model->usId)); ?> | 
<?php echo CHtml::link('Svi korisnici', array('korisnici/index')); ?>