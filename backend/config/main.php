<?php
//use kartik\mpdf\Pdf;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'setting',
    ],
    'modules' => require __DIR__ . '/modules.php',
    'homeUrl' => '/office',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/office',
        ],
        'user' => [
//            'identityClass' => 'common\models\User',
            'identityClass' => 'anda\user\models\User',
            'loginUrl' => ['/user/auth/login'],
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        
        // 'sentry' => [
        //     //'enabled' => false,
        //     'class' => 'mito\sentry\SentryComponent',
        //     'dsn' => 'https://6d51c95395184944818654b3facd932c:9c72c92517e54d39b422dd50dbb98376@sentry.io/138338', // private DSN
        //     //'environment' => YII_CONFIG_ENVIRONMENT, // if not set, the default is `development`
        //     'jsNotifier' => true, // to collect JS errors
        //     'clientOptions' => [ // raven-js config parameter
        //         'whitelistUrls' => [ // collect JS errors from these urls
        //             'http://hrm-firdows.c9users.io',
        //             'https://hrm-firdows.c9users.io',
        //         ],
        //     ],
        // ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
            
            // 'targets' => [
            //     [
            //         'class' => 'mito\sentry\SentryTarget',
            //         'levels' => ['error', 'warning'],
            //         'except' => [
            //             'yii\web\HttpException:404',
            //         ],
            //     ]
            // ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
        'date' => [
            'class' => 'andahrm\setting\components\Date'
        ],
        'formatter'=>[
            'class'=>'andahrm\datepicker\components\ThaiYearFormatter',
        ],
        // 'pdf' => [
        //     'class' => Pdf::classname(),
        //     'format' => Pdf::FORMAT_A4,
        //     'orientation' => Pdf::ORIENT_PORTRAIT,
        //     'destination' => Pdf::DEST_BROWSER,
        //     // refer settings section for all configuration options
        // ]
    ],#components
    
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                'site/*',
                'rbac/*',
                'some-controller/some-action',
                'user/auth/logout',
                'profile/*',
                // The actions listed here will be allowed to everyone including guests.
                // So, 'admin/*' should not appear here in the production, of course.
                // But in the earlier stages of your development, you may probably want to
                // add a lot of actions here until you finally completed setting up rbac,
                // otherwise you may not even take a first step.
            ]
        ],
    'params' => $params,
];
