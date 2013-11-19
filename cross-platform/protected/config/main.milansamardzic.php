<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
return array(
    // application components
    'components' =>
    array(
        
        'user' =>
        array(
            // enable cookie-based authentication
            'allowAutoLogin' =>true,
        ),
        
        'urlManager' => 
        array(
           'urlFormat' => 'path',
           'urlSuffix' => '.html',
           'showScriptName' => false,
           'caseSensitive' => false,
           'rules' => 
           array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        
        /*ime,user,pass*/

        'db' =>
        array(
            'connectionString' => 'mysql:host=localhost;dbname=ermex-pm',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'icefire007',
            'charset' => 'utf8',
        ),
        
        'errorHandler' => 
        array(
            'errorAction' => 'site/error',
        ),

        'log' =>
        array(
            'class' => 'CLogRouter',
            'routes' =>
        array(
            array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    ),
                ),
            ),
        ),

        // Yii::app()->params['paramName']
        'params' =>
        array(
            'adminEmail' => 'softlabistocnosarajevo@gmail.com',
        ),
);