<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name'=>'Jobsfinder',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
    'gridview' =>  [
        'class' => \kartik\grid\Module::class,
        'bsVersion' => '4.x', // or '3.x'
    ],
    'admin' => [
        'class' => 'mdm\admin\Module',
      ]
    ],    'components' => [

        'request'=>[
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin'
        ],
       'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
                'class' => 'yii\web\AssetManager',
                'forceCopy' => true,
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
             'enableAutoLogin' => false,
              'authTimeout' => 3000,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        

        'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
       ],

        
    ],

    'params' => $params,
];