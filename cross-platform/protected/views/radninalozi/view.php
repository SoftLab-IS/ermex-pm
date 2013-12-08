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
	<div class="clearfix">
		<p><?php $model->workAccountSerial ?></p>
		<div style="float:right;">
			<p><?php echo date('d.m.Y.',$model->creationDate) ?></p>
			<p><?php echo $model->author->realName ?></p>
		</div>
	</div>
	<div class="clearfix">
		<div class="columns large-7">
			<h3 class="columns large-12"><?php echo $model->payeeName ?></h3>
			<h3 class="columns large-12"><?php echo $model->payeeContactInfo ?></h3>
		</div>
		<div class="columns large-5">
			<p class="columns large-12"> 
				<?php foreach ($usersList as $user) 
				{
					echo $user->realName . " " . $user->realSurname . "<br/>";
				} ?> 
			</p>
		</div>
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