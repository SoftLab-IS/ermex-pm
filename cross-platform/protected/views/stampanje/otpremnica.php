<?php
/**
 * View for one delivery.
 *
 * @author Aleksandar Panic
 *
 * @var $this StampanjeController Controller of this view.
 * @var $model Deliveries Model
 * @var $totalPrice float
 * @var $saCijenom integer
**/ 
$this->pageTitle = "Otpremnica #" . $model->deliverySerial;
?>

<div class="paper">
    <div class="main-content otpremnica">

        <div class="clearfix">
            <span class="print-menu">
                <?php if($saCijenom == 0)
                {
                    echo CHtml::link('Sa cijenom', array('stampanje/otpremnica/'.$model->deId.'?cijena=1'), array('class' => 'button small secondary'));
                }
                else
                {
                    echo CHtml::link('Bez cijene', array('stampanje/otpremnica/'.$model->deId.'?cijena=0'), array('class' => 'button small secondary'));
                }
                ?>

                <a class="button small secondary" href="javascript:window.close();">Zatvori prikaz</a>
                <a class="button small" href="javascript:window.print();">Odštampaj dokument</a>
            </span>
        </div>

        <div class="header-space">
        </div>

        <div class="container clearfix margins">
            <div class="half-width float-left inner-container">
                <p class="text-container">
                    <span class="payee-name"><?php echo $model->peyeeName; ?></span>
                    <br/>
                    <span><?php echo $model->peyeeContactInfo; ?></span>
                </p>
            </div>

            <div class="half-width float-right inner-container">

                <div class="serial text-container">
                    <strong>Otpremnica broj:</strong>
                    <span><?php echo $model->deliverySerial; ?></span>
                </div>
                <div class="date text-container">
                    <strong>Datum kreiranja:</strong>
                    <span><?php echo date('d.m.Y.', $model->deliveryDate); ?>
                </div>
                <div class="user text-container">
                    <strong>Autor:</strong>
                    <span><?php echo $model->author->getFullName(); ?></span>
                </div>
                <div class="pay-type text-container">
                    <strong>Način plaćanja:</strong>
                    <span><?php echo ($model->payType == 0) ? "Gotovina" : "Žiralno"; ?></span>
                </div>
            </div>
        </div>

        <?php
        if ($saCijenom)
        {
            $this->renderPartial('_sa_cijenom', array('model' => $model));
        }
        else
        {
            $this->renderPartial('_bez_cijene', array('model' => $model));
        }
        ?>

        <div class="bottom-part">
            <div class="container">
                <p class="text-container note">
                    <strong>Napomena:</strong>
                    </br>
                    <span>
                        <?php echo $model->note; ?>
                    </span>
                </p>
            </div>

            <div class="margins">
                <table class="bottom-container full-width">
                    <tr>
                        <td>
                            <div class="small-container">
                                <strong>Datum:</strong>
                                <div class="small-block">
                                        <span><?php echo date('d.m.Y.'); ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="small-container">
                                <strong>Otpremio:</strong>
                                <div class="small-block">
                                    <span><?php echo Yii::app()->session['fullname']; ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="small-container">
                                <strong>Preuzeo:</strong>
                                <div class="small-block">

                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>