<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hanhnguyen',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp-mail.outlook.com',
                'username' => 'nthanh.fit@hotmail.com',
                'password' => 'Emm@W@ts0n',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
    //'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'modules' => [
        'social' => [
            // the module class
            'class' => 'kartik\social\Module',
            // the global settings for the disqus widget
            'disqus' => [
                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
            ],
            // the global settings for the facebook plugins widget
            'facebook' => [
                'appId' => '547299838811682',
                'secret' => 'cdf04533bf5e4f917ab618c544e032d9',
            ],
            // the global settings for the google plugins widget
            'google' => [
                'clientId' => 'GOOGLE_API_CLIENT_ID',
                'pageId' => 'GOOGLE_PLUS_PAGE_ID',
                'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
            ],
            // the global settings for the google analytic plugin widget
            'googleAnalytics' => [
                'id' => 'TRACKING_ID',
                'domain' => 'TRACKING_DOMAIN',
            ],
            // the global settings for the twitter plugin widget
            'twitter' => [
                'screenName' => 'TWITTER_SCREEN_NAME'
            ],
        ],
        'gii' => [
            'class' => 'yii\gii\Module', //adding gii module
            'allowedIPs' => ['127.0.0.1', '::1']  //allowing ip's 
        ],
    // your other modules
    ],
        //auth client collection
//    'authClientCollection' => [
//        'class' => 'yii\authclient\Collection',
//        'clients' => [
//            'facebook' => [
//                'class' => 'yii\authclient\clients\Facebook' ,
//                'clientId' => '547299838811682' ,
//                'clientSecret' => 'cdf04533bf5e4f917ab618c544e032d9' ,
//                ],
//            'github' => [
//                'class' => 'yii\authclient\clients\GitHub' ,
//                'clientId' => 'your client id' ,
//                'clientSecret' => 'your client secret' ,
//                ],
//            'twitter' => [
//                'class' => 'yii\authclient\clients\Twitter' ,
//                'consumerKey' => 'your consumer key' ,
//                'consumerSecret' => 'your consumer secret' ,
//                ],
//            'google' => [
//                'class' => 'yii\authclient\clients\GoogleOAuth' ,
//                'clientId' => 'your client id' ,
//                'clientSecret' => 'your client secret' ,
//                ],
//            'linkedin' => [
//                'class' => 'yii\authclient\clients\LinkedIn' ,
//                'clientId' => 'your client id' ,
//                'clientSecret' => 'your client secret' ,
//                ],
//        ],
//    ],
];

if (YII_ENV_DEV)
{
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
