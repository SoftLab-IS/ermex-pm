<?php
/**
 * View za prikaz materijala
 *
 * @author Aleksndar Panic
 *
 * @var $this MaterijaliController Kontroler materijala.
 * @var $dataProvider CActiveDataProvider Data Provider za materijale.
 */
?>

<header class="clearfix">
    <h2 class="large-5 columns">Materijal</h2>

    <div class="button-bar large-7 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::link('Dodaj stavku', array('materijali/create'), array('class' => 'button small')); ?>
            </ul>
        </div>
    </div>
</header>

<?php 
$this->widget('zii.widgets.grid.CGridView', 
array(
    'id'=>'materials-grid',
    'emptyText' => 'Trenutno nema dostupnih radnih naloga.',
    'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} stavke.',
    'dataProvider' => $dataProvider,
    'columns'=>array(
         array(
            'header' => '#',
            'value'  => '$row + 1',
         ),
        'name',
        'description',
        array(
            'name' => 'amount',
            'value' => '$data->amount . " " . $data->dimensionUnit',
        ),
    ),
)); 
?>
