<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$mainConfig=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
<<<<<<< HEAD:cross-platform/index.php
=======

$envConfig=include dirname(__FILE__).'/protected/config/main.arekx.php';
$config=CMap::mergeArray($mainConfig, $envConfig);

Yii::createWebApplication($config)->run();
>>>>>>> 2ce2f5904979ed86b5e4db6af71e00a3c44e1529:cross-platform/index.arekx.php
