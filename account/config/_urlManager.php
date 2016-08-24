<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => false,
      'showScriptName' => false,
      'rules' => [
          'oauth2/authorize' => 'oauth2/authorize/authorize',
          'oauth2/<action:\w+>' => 'oauth2/rest/<action>',
      ],
];
 ?>
