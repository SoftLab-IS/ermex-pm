<?php
/* @var $this OtpremniceController */
/* @var $model Deliveries */

?>

<section class="one-item-wrapper">
    <header class="clearfix">
        <h2 class="large-4 columns">Otpremnica broj <?php echo $model->deliverySerial; ?></h2>

        <div class="button-bar large-8 columns context-options">
            <div>
                <ul class="button-group">
                    <?php if($model->reconciled == 0 && $model->invalid == 0): ?>
                        <li><?php echo CHtml::link('Izmjeni otpremnicu', array('otpremnice/update/'.$model->deId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                    <?php if($model->invalid == 0): ?>
                        <li><?php echo CHtml::link('Storniraj otpremnicu', array('otpremnice/storn/'.$model->deId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                    <?php if($model->archived == 0 and $model->reconciled == 1): ?>
                        <li><?php echo CHtml::link('Arhiviraj otpremnicu', array('otpremnice/archive/'.$model->deId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                </ul>
                <ul class="button-group">
                    <?php if($model->reconciled == 0 && $model->invalid == 0): ?>
                        <li><?php echo CHtml::link('Zaključi otpremnicu', array('otpremnice/reconcile/'.$model->deId), array('class' => 'button small secondary')); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>

    <?php if($model->reconciled == 1): ?>
        <div data-alert class="alert-box">
            Ovu otpremnicu je zaključio <strong><?php echo $model->reconciled0->getFullName(); ?></strong>.
            Nije moguće vršiti izmjene na njoj!
        </div>
    <?php endif; ?>

    <?php if($model->invalid == 1): ?>
        <div data-alert class="alert-box warning">
            Ova otpremnica je stornirana. Nije moguće vršiti izmjene na njoj!
        </div>
    <?php endif; ?>

    <div class="clearfix">

        <div class="columns large-12" >
            <p>Otpremnicu je napravio <strong><?php echo  $model->author->getFullName(); ?></strong> dana
                <strong><?php echo date('d.m.Y.', $model->deliveryDate) ?></strong> u
                <strong><?php echo date('H:i', $model->deliveryDate) ?></strong> časova.
            </p>

        </div>
    </div>

    <div class="clearfix">
        <div class="large-8 columns">
            <fieldset>
                <legend>Informacije o naručiocu</legend>
                <h3><?php echo $model->peyeeName ?></h3>
                <p><?php echo $model->peyeeContactInfo ?></p>
            </fieldset>
        </div>
        <div class="large-4 columns">
            <fieldset>
                <p>Datum isporuke: <strong><?php echo date('d.m.Y.', $model->deliveryDate); ?></strong></p>
                <p>Način plaćanja: <strong><?php echo ($model->payType == 0) ? "Gotovina" : "Žiralno"; ?></strong></p>
            </fieldset>
        </div>
    </div>

    <div class="clearfix">
        <div class="large-12 columns">
            <table class="large-12 columns">
                <thead>
                <td class="large-8">Naziv proizvoda</td>
                <td class="large-2">Naručena količina</td>
                <td class="large-2">Dogovorena cijena</td>
                </thead>
                <?php
                $i = 1;
                foreach ($model->order as $order): ?>
                    <tr>
                        <td class="order-title">
                            <p>
                                <?php echo $i++ . ". " . $order->title; echo ($order->woId)? " (" . CHtml::link($order->wo->workAccountSerial, array('radniNalozi/view', 'id' => $order->wo->woId)) . ")" : ""; ?>
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
        <div class="large-8 columns">
            <fieldset>
                <legend>Napomena</legend>
                <?php echo $model->note; ?>
            </fieldset>
        </div>
        <div class="large-4 columns">
            <fieldset>
                <legend>Mjesto isporuke</legend>
                <?php if($model->deliveryPlace == 1) echo  "Štamparija"; elseif($model->deliveryPlace == 2) echo "Knjižara"; else echo "Na adresu"; ?>
            </fieldset>
        </div>
    </div>

</section>