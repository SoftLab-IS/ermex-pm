<?php
/* @var $this MaterijaliController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Materials',
);

$this->menu=array(
	array('label'=>'Create Materials', 'url'=>array('create')),
	array('label'=>'Manage Materials', 'url'=>array('admin')),
);
?>

<header class="clearfix">
    <h2 class="large-5 columns">Materijal</h2>

    <div class="button-bar large-7 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::link('Dodaj stavku', array('materijal/create'), array('class' => 'button small')); ?>
            </ul>
        </div>
    </div>
</header>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
