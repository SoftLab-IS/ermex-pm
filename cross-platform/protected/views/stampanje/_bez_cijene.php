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

?>

<div class="table-container-medium margins">
    <table class="">
        <tr>
            <th class="redni-broj">#</th>
            <th class="ot-opis">Opis</th>
            <th class="">Količina</th>
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
            </tr>
            <?php endforeach; ?>
    </table>
</div>
