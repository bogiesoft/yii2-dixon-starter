<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => true,
      'showScriptName' => false,
      'rules' => [
          [
              'class' => 'yii\rest\UrlRule',
              'controller' => ['v1/user'],
              'extraPatterns' => [
                'GET me' => 'me'
              ]
          ],
          [
              'class' => 'yii\rest\UrlRule',
              'controller' => [
                  'v1/user',
                  'v1/todo'
              ],
              'extraPatterns' => [
                'GET search' => 'search'
              ]
          ]
      ],
];
 ?>
