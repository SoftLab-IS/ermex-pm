<?php 
/**
 * Main print layout
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
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css">

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php echo $content; ?>
</body>
</html>