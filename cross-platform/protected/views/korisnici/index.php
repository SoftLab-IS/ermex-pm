<?php
/**
 * View za prikaz svih korisnika.
 *
 * @author Aleksandar Panic
 *
 * @var $this RadniNalozicontroller Kontroler radnih naloga.
 * @var $dataProvider CActiveDataProvider Data Provider za korisnike.
 */
?>

<h1>Korisnici</h1>

<h3><?php echo CHtml::link('Novi korisnik', array('korisnici/create')); ?></h3>

<?php $this->widget('zii.widgets.grid.CGridView', 
array(
	'id' => 'users-grid',
    'emptyText' => 'Trenutno nema dostupnih korisnika.',
    'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} korisnik(a).',
	'dataProvider' => $dataProvider,
	'columns'=>
	array(
		array(
			'header' => '#',
			'value'  => '$row + 1',
		),
		array(
			'name' => 'realName',
			'value' => 'CHtml::link($data->realName . " " . $data->realSurname . (Yii::app()->session["id"] == $data->usId ? " (trenutni korisnik sistema)" : ""), array("korisnici/view", "id" => $data->usId))',
			'type' => 'raw'
		),
		array(
			'name' => 'registerDate',
			'value' => 'date("d.m.Y \u H:i:s", $data->registerDate)',
		),
		array(
			'name' => 'privilegeLevel',
			'value' => '($data->privilegeLevel == 0) ? "Nema pristup" : (($data->privilegeLevel == 1) ? "Radnik" : (($data->privilegeLevel == 2) ? "Racunovođa" : (($data->privilegeLevel == 3) ? "Administrator" : "Nepoznato")))'
		),
		array(
			'class'=>'CButtonColumn',
			'deleteConfirmation' => 'Jeste li sigurni da želite obrisati ovog korisnika?',
			'afterDelete'=>'function(link, success, data){ if(success) alert("Uspješno ste obrisali korisnika."); }',
		),
	),
)); 

?>
