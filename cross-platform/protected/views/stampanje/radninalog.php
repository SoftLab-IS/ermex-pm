<?php
/**
 * View for one work account.
 *
 * @author Ilija Tesic
 *
 * @var $this StampanjeController Controller of this view.
 * @var $model WorkAccounts Model
 **/
$this->pageTitle = "Radni Nalog #" . $model->workAccountSerial;
?>

<div class="paper">
    <div class="main-content radni-nalog">

        <div class="clearfix">
            <span class="text-container rn-serial"><strong>Radni nalog broj: </strong><?php echo $model->workAccountSerial; ?></span>

            <span class="print-menu">
                <a class="button small secondary" href="javascript:window.close();">Zatvori prikaz</a>
                <a class="button small" href="javascript:window.print();">Odštampaj</a>
            </span>
        </div>

        <div class="container clearfix margins">
            <div class="half-width float-left inner-container">
                <p class="text-container peyee">
                    <span class="payee-name"><?php echo $model->payeeName; ?></span>
                    <br/>
                    <span><?php echo $model->payeeContactInfo; ?></span>
                </p>
            </div>

            <div class="half-width float-right inner-container">

                <div class="user text-container">
                    <strong>Nalog napravio: </strong>
                    <span><?php echo $model->author->getFullName(); ?></span>
                </div>
                <div class="date text-container">
                    <strong>Datum kreiranja: </strong>
                    <span><?php echo date('d.m.Y.',$model->creationDate); ?></span>
                </div>
                <div class="attachment text-container">
                    <strong>U prilogu narudžbe dostavljeno:</strong>
                    <br/>
                    <span><?php echo $model->additional; ?></span>
                </div>

            </div>
        </div>

        <div class="container margins">
            <p class="text-container">
                <strong>Nalog upućen na: </strong>
                    <span>
                        <?php
                        $i = 0;
                        $len = count($workers);
                        foreach ($workers as $worker)
                        {
                            echo $worker->getFullName();
                            if ($i != $len - 1)
                            {
                                echo " > ";
                            }
                            $i++;
                        } ?>

                    </span>
            </p>
        </div>

        <div class="table-container margins">
            <table class="full-width">
                <tr>
                    <th class="redni-broj">#</th>
                    <th class="opis">Opis</th>
                    <th class="kolicina">Količina</th>
                    <th class="cijena">Cijena</th>
                </tr>
                <?php
                $i = 1;
                foreach($model->order as $order): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ . '.'; ?></td>
                        <td><?php echo $order->title; ?></td>
                        <td class="text-right"><?php echo $order->amount . " " . $order->measurementUnit; ?></td>
                        <td class="text-right"><?php echo ($order->price)? $order->price . " KM" : ""; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="bottom-part">
            <div class="table-container margins">
                <table class="full-width">
                    <tr>
                        <th class="redni-broj">#</th>
                        <th class="opis">Materijal</th>
                        <th class="kolicina">Količina</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($materials as $usedMaterial): ?>
                        <?php $material =  Materials::model()->findByPk($usedMaterial->materialId); ?>
                        <tr>
                            <td class="text-center"><?php echo $i++ . '.'; ?></td>
                            <td><?php echo $material->name; ?></td>
                            <td class="text-right"><?php echo $usedMaterial->amount . " " . $material->dimensionUnit; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="container margins">
                <p class="text-container">
                    <strong>Rok isporuke: </strong>
                        <span>
                            <?php echo date('d.m.Y.', $model->deadlineDate) ?> u
                            <?php echo date('H:i', $model->deadlineDate) ?> časova
                        </span>
                </p>
            </div>

            <div class="container">
                <p class="text-container note">
                    <strong>Napomena:</strong>
                    </br>
                        <span>
                            <?php echo $model->note; ?>
                        </span>
                </p>
            </div>
        </div>
    </div>
</div>

