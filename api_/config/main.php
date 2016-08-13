  <?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
      'oauth2' => [
            'class' => 'filsh\yii2\oauth2server\Module',
            'tokenParamName' => 'access-token',
            'tokenAccessLifetime' => 3600 * 24,
            'storageMap' => [
                'user_credentials' => 'api\models\User',
            ],
            'grantTypes' => [
                'client_credentials' => [
        					'class' => 'OAuth2\GrantType\ClientCredentials',
        					'allow_public_clients' => false
        				],
                'user_credentials' => [
                    'class' => 'OAuth2\GrantType\UserCredentials',
                ],
                'refresh_token' => [
                    'class' => 'OAuth2\GrantType\RefreshToken',
                    'always_issue_new_refresh_token' => true
                ]
            ]
        ],
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'user' => [
            // un comment with use oauth2server
            //'identityClass' => 'api\models\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl'=> null
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning']
                ],
            ],
        ],
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'class' => 'yii\web\Response',
            // 'on beforeSend' => function ($event) {
            //     $response = $event->sender;
            //     if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
            //         $response->data = [
            //             'success' => $response->isSuccessful,
            //             'data' => $response->data,
            //         ];
            //         $response->statusCode = 200;
            //     }
            // },
        ]
    ],
    'params' => $params,
];
