<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Ermex PM',
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => 
    array(
        'application.models.*',
        'application.components.*',
    ),

    'modules' => 
    array(
        'gii' =>
        array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'ipFilters' => array('127.0.0.1','::1'),
        ),
    ),
);