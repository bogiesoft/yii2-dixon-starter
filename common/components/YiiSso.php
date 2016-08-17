<?php
namespace common\components;

use yii\authclient\OAuth2;

class YiiSso extends OAuth2
{
    protected function defaultName()
    {
        return 'yiisso';
    }

    protected function defaultTitle()
    {
        return 'YiiSso';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 800,
            'popupHeight' => 500,
        ];
    }

    public $authUrl    = 'https://accounts.sathit.me/oauth2/authorize';

    public $tokenUrl   = 'https://accounts.sathit.me/oauth2/token';

    public $apiBaseUrl = 'https://api.sathit.me/v1/';

    protected function initUserAttributes()
    {
        return $this->api('users/1', 'GET');
    }
}


 ?>
