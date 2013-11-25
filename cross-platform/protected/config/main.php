<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
return array(

    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Ermex PM',
    'preload' => array('log'),
	'defaultController' => 'radninalozi',


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

    // Yii::app()->params['paramName']
    'params' =>
        array(
            'adminEmail' => 'softlabistocnosarajevo@gmail.com',
        ),

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

            'db' =>
                array(
                    'connectionString' => 'mysql:host=localhost;dbname=ermex-pm',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'icefire007',
                    'charset' => 'utf8',
                    'tablePrefix' => 'epm_',
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

);