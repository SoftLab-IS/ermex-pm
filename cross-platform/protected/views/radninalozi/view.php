<?php
/* @var $this RadniNaloziController */
/* @var $model WorkAccounts */
/* @autor Golub*/

?>

<section class="one-item-wrapper">
    <header>
        <h2>Radni nalog broj <?php echo $model->workAccountSerial; ?></h2>
    </header>
	
	<div class="clearfix">

		<div class="columns large-12" >
            <p>Nalog je napravio <strong><?php echo  $model->author->getFullName(); ?></strong> dana
                <strong><?php echo date('d.m.Y.', $model->creationDate) ?></strong></p>

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
                        <td><?php echo $i . ". " . $order->title; ?></td>
                        <td><?php echo $order->amount . " " . $order->measurementUnit; ?></td>
                        <td><?php echo $order->price; ?> KM</td>
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
                <td class="large-2">Potrošena količina</td>
                </thead>
                <?php
                $i = 1;
                foreach ($usedMaterials as $usedMaterial): ?>
                    <?php $material =  Materials::model()->findByPk($usedMaterial->materialId); ?>
                    <tr>
                        <td><?php echo $i . ". " . $material->name;  ?></td>
                        <td><?php echo $usedMaterial->amount . " " . $material->dimensionUnit; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
	
	<div class="clearfix panel">
		<h2>Napomena:</h2>
		<h2><?php echo $model->note ?> </h2>
	</div>
	
</section>