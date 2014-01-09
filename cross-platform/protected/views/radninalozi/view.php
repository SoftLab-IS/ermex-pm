<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

?>

<section class="one-item-wrapper">
    <header class="clearfix">
        <h2 class="large-4 columns">Radni nalog broj <?php echo $model->workAccountSerial; ?></h2>

        <div class="button-bar large-8 columns context-options">
            <div>
                <ul class="button-group">
                    <?php if($model->reconciled == 0 && $model->invalid == 0): ?>
                        <li><?php echo CHtml::link('Izmjeni radni nalog', array('radniNalozi/update/'.$model->woId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                    <?php if($model->invalid == 0): ?>
                        <li><?php echo CHtml::link('Storniraj radni nalog', array('radniNalozi/storn/'.$model->woId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                </ul>
                <ul class="button-group">
                    <?php if($model->reconciled == 0 && $model->invalid == 0): ?>
                        <li><?php echo CHtml::link('Zaključi radni nalog', array('radniNalozi/reconcile/'.$model->woId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                    <?php if($model->currentUser == Yii::app()->session['id']): ?>
                        <li><?php echo CHtml::link('Proslijedi dalje', array('radniNalozi/nextWorker/'.$model->woId), array('class' => 'button small')); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>

    <?php if($model->reconciled == 1): ?>
        <div data-alert class="alert-box">
            Ovaj radni nalog je zaključio <strong><?php echo $model->reconciled0->getFullName(); ?></strong>.
            Nije moguće vršiti izmjene na njemu!
        </div>
    <?php endif; ?>

    <?php if($model->invalid == 1): ?>
        <div data-alert class="alert-box warning">
            Ovaj radni nalog je storniran. Nije moguće vršiti izmjene na njemu!
        </div>
    <?php endif; ?>

	<div class="clearfix">

		<div class="columns large-12" >
            <p>Nalog je napravio <strong><?php echo  $model->author->getFullName(); ?></strong> dana
                <strong><?php echo date('d.m.Y.', $model->creationDate) ?></strong> u
                <strong><?php echo date('H:i', $model->creationDate) ?></strong> časova.
            </p>

		</div>
	</div>
	
	<div class="clearfix">
        <div class="large-6 columns">
            <fieldset>
                <legend>Informacije o naručiocu</legend>
                <h3><?php echo $model->payeeName ?></h3>
                <p><?php echo $model->payeeContactInfo ?></p>
            </fieldset>
        </div>

        <div class="large-3 columns">
            <fieldset>
                <legend>Uz nalog je priloženo</legend>
                <p> <?php echo $model->additional ?> </p>
            </fieldset>
        </div>

        <div class="large-3 columns">
            <fieldset>
                <legend>Lista radnika</legend>
                <ol>
                    <?php foreach ($usersList as $user)
                    {
                        if($user->usId == $model->currentUser)
                        {
                            echo "<li><strong>" . $user->getFullName() . "</strong></li>";
                        }
                        else
                        {
                            echo "<li>" . $user->getFullName() . "</li>";
                        }

                    } ?>
                </ol>
            </fieldset>
        </div>
	</div>	
	
	<div class="clearfix">
        <div class="large-12 columns">
            <table class="large-12 columns">
                <thead>
                    <td class="large-8">Naziv naručenog proizvoda</td>
                    <td class="large-2">Naručena količina</td>
                    <td class="large-2">Dogovorena cijena</td>
                </thead>
                <?php
                $i = 1;
                foreach ($model->order as $order): ?>
                    <tr>
                        <td class="order-title">
                            <p>
                                <?php echo $i++ . ". " . $order->title; ?>
                                <span><?php echo $order->description; ?></span>
                            </p>
                        </td>
                        <td><?php echo $order->amount != "" ? $order->amount . " " . $order->measurementUnit : ""; ?></td>
                        <td><?php echo $order->price > 0 ? $order->price . " KM" : ""; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
	</div>

    <div class="clearfix">
        <div class="large-12 columns">
            <table class="large-12 columns">
                <thead>
                <td class="large-10">Upotrebljeni materijal</td>
                <td class="large-2">Potrebna količina</td>
                </thead>
                <?php
                $i = 1;
                foreach ($usedMaterials as $usedMaterial): ?>
                    <?php $material =  Materials::model()->findByPk($usedMaterial->materialId); ?>
                    <tr>
                        <td><?php echo $i++ . ". " . $material->name;  ?></td>
                        <td><?php echo $usedMaterial->amount . " " . $material->dimensionUnit; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
	
	<div class="clearfix">
        <div class="large-8 columns">
            <fieldset>
                <legend>Napomena</legend>
                <?php echo $model->note; ?>
            </fieldset>
        </div>
        <div class="large-4 columns">
            <fieldset>
                <legend>Isporuka</legend>
                <p>Vrijeme: <strong><?php echo date('d.m.Y. H:i', $model->deadlineDate); ?></strong></p>
                <p>Mjesto: <strong><?php if($model->deliveryPlace == 1) echo  "Štamparija"; elseif($model->deliveryPlace == 2) echo "Knjižara"; else echo "Na adresu"; ?></strong></p>
            </fieldset>
        </div>
	</div>
	
</section>