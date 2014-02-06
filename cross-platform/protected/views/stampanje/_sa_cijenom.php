<?php
/**
 * View for one delivery.
 *
 * @author Aleksandar Panic
 *
 * @var $this StampanjeController Controller of this view.
 * @var $model Deliveries Model
 * @var $totalPrice float
 **/
$totalPrice = 0;
?>

<div class="table-container margins">
    <table class="">
        <tr>
            <th class="redni-broj">#</th>
            <th class="ot-opis">Opis</th>
            <th class="">Količina</th>
            <th class="">Cijena</th>
            <th class="">PDV</th>
            <th class="">Iznos</th>
        </tr>

        <?php
        $i = 1;
        foreach ($model->order as $order): ?>
            <tr>
                <td class="text-center">
                    <?php echo $i++ . ". "; ?>
                </td>
                <td>
                    <?php echo $order->title; ?>
                </td>
                <td class="text-right">
                    <?php echo $order->amount != "" ? $order->amount . " " . $order->measurementUnit : ""; ?>
                </td>
                <td class="text-right">
                    <?php echo $order->price > 0 ? $order->price . " KM" : ""; ?>
                </td>
                <td class="text-right">
                    17%
                </td>
                <td class="text-right">
                    <?php
                    $total = ($order->price + ((17 / 100) * $order->price)) * $order->amount;
                    echo $total > 0 ? $total . " KM" : "";
                    ?>
                </td>
            </tr>


            <?php
            $totalPrice += $order->price;
        endforeach;
        ?>
    </table>
</div>

<div class="table-container-small float-right">
    <table class="">
        <tr>
            <th class="width-70">Ukupna vrijednost bez PDV-a:</th>
            <td class="text-right"><?php echo $totalPrice * $order->amount . " KM"; ?></td>
        </tr>

        <tr>
            <th class="">PDV 17%:</th>
            <td class="text-right"><?php echo ((17 / 100) * $totalPrice) * $order->amount . " KM"; ?></td>
        </tr>

        <tr>
            <th class="">Prodajna vrijednost sa PDV-om:</th>
            <td class="text-right"><?php echo (((17 / 100) * $totalPrice) + $totalPrice) * $order->amount . " KM"; ?></td>
        </tr>

    </table>
</div>
