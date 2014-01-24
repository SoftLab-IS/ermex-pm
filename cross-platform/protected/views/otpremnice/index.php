<?php
/**
 * View za prikaz liste otpremnica
 *
 * @author Ilija Tesic
 *
 */
?>

<?php
if($userLevel > 1)
{
    $this->renderPartial('_search',
        array(
            'model' => $model,
            'users' => $users,
        ));
}
?>


<?php
$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'delivery-form',
    ));
?>

<header class="clearfix">
    <h2 class="large-4 columns">Otpremnice</h2>

    <div class="button-bar large-8 columns context-options">
        <div>
            <ul class="button-group">
                <li><?php echo CHtml::submitButton('Storniraj', array('name' => 'stornirajOdabrane', 'class' => 'button secondary small', 'title' => 'Storniraj izabrane otpremnice')); ?></li>
                <li><?php echo CHtml::submitButton('Zaključi', array('name' => 'zakljuciOdabrane', 'class' => 'button secondary small', 'title' => 'Zaključi izabrane otpremnice')); ?></li>
                <?php if($userLevel > 1): ?>
                    <li><?php echo CHtml::submitButton('Arhiviraj', array('name' => 'arhivirajOdabrane', 'class' => 'button secondary small', 'title' => 'Arhiviraj izabrane otpremnice')); ?></li>
                    <li><?php echo CHtml::link('Prikaz arhive', array('archived'), array('class' => 'button secondary small', 'title' => 'Prikaži arhivu otpremnica')); ?></li>
                <?php endif; ?>
            </ul>
            <ul class="button-group">
                <li><?php echo CHtml::link('Nova otpremnica', array('otpremnice/create'), array('class' => 'button small', 'title' => 'Napravi novu otpremnicu')); ?>
            </ul>
        </div>
    </div>
</header>

<?php $this->widget('zii.widgets.grid.CGridView',
    array(
        'id'=>'delivery-grid',
        'dataProvider'=> $model->search(),
        'emptyText' => 'Trenutno nema dostupnih otpremnica.',
        'summaryText' => 'Prikazano {page} od {pages} dostupnih stranica. Ukupno {count} otpremnica.',
       'rowCssClassExpression' => '
        (($row % 2) ? $this->rowCssClass[1] : $this->rowCssClass[0]) .
        (($data->reconciled == 1) ? " reconciled-item" : "") .
        (($data->invalid == 1) ? " invalid-item" : "")
       ',
        'columns' =>
            array(
                array(
                    'value' => 'CHtml::checkBox("deliveryId[]",null,array("value"=>$data->deId,"id"=>"cid_".$data->deId))',
                    'type' => 'raw',
                ),
                array(
                    'header' => '#',
                    'value' => '$row + 1',
                ),
                array(
                    'name' => 'deliverySerial',
                    'value' => 'CHtml::link("$data->deliverySerial", array("otpremnice/view", "id" => $data->deId))',
                    'type' => 'raw',
                ),
                array(
                    'name'=>'peyeeName',
                    'value'=>'$data->peyeeName',
                ),
                array(
                    'name' => 'payType',
                    'value' => '($data->payType == 0) ? "Gotovina" : "Žiralno"',
                ),
                array(
                    'name'=>'deliveryDate',
                    'value'=>'date("d.m.Y.", $data->deliveryDate)',
                ),
                array(
                    'name'=>'authorId',
                    'value'=>'$data->getFullName()',
                ),
                array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}',
                    'deleteConfirmation' => 'Jeste li sigurni da želite stornirati ovu stavku?',
                    'afterDelete'=>'function(link, success, data){ if(success) alert("Uspješno ste stornirali ovu stavku."); }',
                ),
            ),
    ));
?>

<?php $this->endWidget(); ?>
