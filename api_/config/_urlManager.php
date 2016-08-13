<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => true,
      'showScriptName' => false,
      'rules' => [
          'POST oauth2/<action:\w+>' => 'oauth2/rest/<action>',
          [
              'class' => 'yii\rest\UrlRule',
              'controller' => [
                  'v1/user'
                ],
                'extraPatterns' => [
                  'GET search' => 'search',
                ]
          ]
      ],
];
 ?>
