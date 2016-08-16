<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => false,
      'showScriptName' => false,
      'rules' => [
          'oauth2/authorize' => 'oauth2/authorize/authorize',
          'POST oauth2/<action:\w+>' => 'oauth2/rest/<action>',
          [
              'class' => 'yii\rest\UrlRule',
              'controller' => [
                  'v1/user',
                  'v1/todo'
              ],
              'extraPatterns' => [
                'GET search' => 'search',
              ]
          ]
      ],
];
 ?>
