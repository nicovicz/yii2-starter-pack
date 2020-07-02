<?php
$params = require __DIR__ . '/params.php';
$alias = require __DIR__ . '/alias.php';
$db = require __DIR__ . '/db.php';
$log = require __DIR__ . '/log.php';
$container = require __DIR__ . '/container.php';
$modules = require __DIR__ . '/modules.php';
$email = require __DIR__ . '/email.php';

$config = [
    'id' => 'basic',
    'name' => 'App Name',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => $alias,
    'language'=>'id',
    'timeZone'=>'Asia/Jakarta',
    'as access' => [
        'class' => '\hscstudio\mimin\components\AccessControl',
        'allowActions' => [
           '*'
       ],
    ],
    'container'=>[
        'definitions'=>$container
    ],
    'modules'=>[
        'utilitas'=>[
            'class'=>'app\modules\utilitas\Module'
        ]
    ],
    'components' => [
        'formatter' => [
            'dateFormat' => 'php:d F Y',
            'datetimeFormat' => 'php:d F Y H:i',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'IDR',
       ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'YKe_BbAB8jsoZ9laV25JzLiB9XFRl3KB',
        ],
        'session'=>[
            'class'=>'yii\web\DbSession'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'authTimeout' =>  ini_get('session.gc_maxlifetime'),
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mailer,
        'log' => $log,
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ]
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
