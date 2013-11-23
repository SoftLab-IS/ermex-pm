<?php 
/**
 * Main application layout
 *
 * @author Aleksandar Panic
 *
 * @var $this Controller Controller passed to this view. 
 */

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo CHtml::encode($this->pageTitle); ?> | Ermex PM</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">Koristite <strong>stari</strong> pretraživač. Molimo <a href="http://browsehappy.com/">ažurirajte vaš browser</a> da poboljšate vaše iskustvo.</p>
        <![endif]-->


        <div class="main-wrapper clearfix">
        	<aside class="large-2 columns">
                <nav class="main-menu">
                  <?php $this->widget('zii.widgets.CMenu',
                    array(
                        'items'=>
                        array(
                            array('label' => 'Novi radni nalog', 'url' => array('/radniNalozi/novi')),
                            array('label' => 'Nova otpremnica', 'url' => array('/otpremnice/novi')),
                            array('label' => 'Radni nalozi', 'url' => array('/radniNalozi')),
                            array('label' => 'Otpremnice', 'url' => array('/otpremnice')),
                            array('label' => 'Proizvodi', 'url' => array('/proizvodi')),
                            array('label' => 'Materijal', 'url' => array('/materijal')),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => ! Yii::app()->user->isGuest)
                    ),
                  )); ?>
                </nav>
        	</aside>
            <section class="large-10 columns">
               <?php echo $content; ?>
            </section>


            <footer class="large-12 columns">
                Copyright &copy; <?php echo date('Y'); ?> by Softlab.<br/>
                Sva prva pridržana.<br/>
            </footer>

        </div>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-1.10.2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
		
		<script>
			$(document).foundation();
		</script>
    </body>
</html>