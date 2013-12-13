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

<section>

<header class="clearfix">
    <h2 class="large-4 columns">Korisnici</h2>

    <div class="button-bar large-8 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::link('Napravi novog korisnika', array('korisnici/create'), array('class' => 'button small')); ?>
            </ul>
        </div>
    </div>
</header>

<?php $this->widget('zii.widgets.grid.CGridView', 
array(
	'id' => 'users-grid',
    'emptyText' => 'Trenutno nema dostupnih korisnika.',
    'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} korisnik.',
	'dataProvider' => $dataProvider,
	'columns'=>
	array(
		array(
			'header' => '#',
			'value'  => '$row + 1',
		),
		array(
			'name' => 'realName',
			'value' => '((Yii::app()->session["id"] == $data->usId) ? " <strong>".$data->getFullName()."</strong>" : $data->getFullName())',
			'type' => 'raw'
		),

		array(
			'name' => 'privilegeLevel',
			'value' => '($data->privilegeLevel == 0) ? "Nema pristup" : (($data->privilegeLevel == 1) ? "Radnik" : (($data->privilegeLevel == 2) ? "Racunovođa" : (($data->privilegeLevel == 3) ? "Administrator" : "Nepoznato")))'
		),
		array(
			'class'=>'CButtonColumn',
            'template' => '{update}{delete}',
			'deleteConfirmation' => 'Jeste li sigurni da želite obrisati ovog korisnika?',
			'afterDelete'=>'function(link, success, data){ if(success) alert("Uspješno ste obrisali korisnika."); }',
		),
	),
)); 

?>

</section>
