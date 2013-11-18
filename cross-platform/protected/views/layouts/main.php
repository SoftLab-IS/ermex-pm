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
            <p class="browsehappy">Koristite <strong>stari</strong> browser. Molimo <a href="http://browsehappy.com/">ažurirajte vaš browser</a> da poboljšate vaše iskustvo.</p>
        <![endif]-->
        
        <div class="row">
        	<div class="large-12 columns">
	        	<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
            <div id="mainmenu">
              <?php $this->widget('zii.widgets.CMenu', 
                array(
                'items'=>
                array(
                  array('label' => 'Home', 'url' => array('/site/index')),
                  array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                  array('label' => 'Contact', 'url' => array('/site/contact')),
                  array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                  array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => ! Yii::app()->user->isGuest)
                ),
              )); ?>
            </div>
            <div id="breadcrumbs">
                <?php if(isset($this->breadcrumbs)): ?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', 
                array(
                  'links' => $this->breadcrumbs,
                )); ?>
                <?php endif; ?>
            </div>
	        	
            <?php echo $content; ?>

        	</div>
        </div>

        <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> by Softlab.<br/>
            Sva prva pridržana.<br/>
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