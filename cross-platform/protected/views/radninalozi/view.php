<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

$this->breadcrumbs=array(
	'Work Accounts'=>array('index'),
);

$this->menu=array(
	array('label'=>'List WorkAccounts', 'url'=>array('index')),
	array('label'=>'Create WorkAccounts', 'url'=>array('create')),
	array('label'=>'Update WorkAccounts', 'url'=>array('update', 'id'=>$model->woId)),
	array('label'=>'Delete WorkAccounts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->woId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WorkAccounts', 'url'=>array('admin')),
);
?>
<section>
	<h2>Prikaz radnog naloga br. <?php echo $model->woId; ?></h2>
	
	<div class="clearfix panel">
		<p class="columns large-4"><?php echo $model->workAccountSerial ?></p>
		<div class="columns large-8" >
			<p><?php echo date('d.m.Y.', $model->creationDate)?></p>
			<p><?php echo  $model->author->realName . " " . $model->author->realSurname ?></p>
		</div>
	</div>
	
	<div class="clearfix panel">
		<div class="columns large-5">
			<h3 class="columns large-12"><?php echo $model->payeeName ?></h3>
			<h3 class="columns large-12"><?php echo $model->payeeContactInfo ?></h3>
		</div>
		<div class="columns large-3">
			<h3> <?php echo $model->additional ?> </h3>
		</div>
		<div class="columns large-4">
			<ol>
				<?php foreach ($usersList as $user) 
				{
					echo "<li>" . $user->realName . " " . $user->realSurname . "</li>";
				} ?> 
			</ol>
		</div>
	</div>	
	
	<div class="clearfix panel">
		<h2>Narudžbe: </h2>
		<div class="columns large-12">
			<ol>
				<?php foreach ($model->order as $order) 
				{
					echo "<li>" . $order->title . "</li>";	
				} ?>
			</ol>
		</div>
	</div>
	
	<div class="clearfix panel">
		<h2>Materijali: </h2>
		<div class="columns large-12">
			<ul>
				<?php foreach ($usedMaterials as $material) 
				{
					echo "<li>" . Materials::model()->findByPk($material->materialId)->name .", količina:  ". $material->amount . "</li>";	
				} ?>
				
			</ul>
		</div>
	</div>
	
	<div class="clearfix panel">
		<h2>Napomena:</h2>
		<h2><?php echo $model->note ?> </h2>
	</div>
	
</section>





<!--
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'woId',
		'workAccountSerial',
		'payeeName',
		'payeeContactInfo',
		array(
			'name' => 'creationDate',
			'value' => date('d.m.Y',$model->creationDate)//Yii :: app () -> format-> formatDate ($model->creationDate)	
		),
		array(
			'name' => 'deadlineDate',
			'value' => date('d.m.Y',$model->deadlineDate)	
		),
		'note',
		'additional',
		array(
			'name' => 'invalid',
			'value' => ($model->invalid == 0) ? 'Ne' : 'Da',
		),
		array(
			'name' => 'reconciled',	
			'value' => ($model->reconciled == 0) ? 'Ne' : 'Da',
		),
		array(
			'name' => 'authorId',
			'value' => $model->author->realName. ' ' .$model->author->realSurname, 
		),
		array(
			'name' => 'reconciledId',
			'value' => ($model->reconciled == 1) ? $model->reconciled0->realName. ' ' .$model->reconciled0->realSurname : 'Niko',

		),
	),
)); ?>
-->