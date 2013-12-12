<?php
/* @var $this MaterijaliController */
/* @var $dataProvider CActiveDataProvider */
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'materials-grid',
    'dataProvider'=> $dataProvider,
    'emptyText' => 'Trenutno nema dostupnih materijala.',
    'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} materijala.',
    'columns' =>
        array(
            array(
                'header' => '#',
                'value'  => '$row + 1',
            ),
            array(
                'name' => 'name',
                'value' => '$data->name'
            ),
            array(
                'name' => 'amount',
                'value' => '$data->getAmountWithDimension()'
            ),
            array(
                'class'=>'CButtonColumn',
                'template' => '{update}{delete}',
                'deleteConfirmation' => 'Jeste li sigurni da želite stornirati ovu stavku?',
                'afterDelete'=>'function(link, success, data){ if(success) alert("Uspješno ste stornirali ovu stavku."); }',
            ),
        ),
)); ?>
