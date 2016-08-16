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

    public $authUrl = 'http://app-account.dev/oauth2/authorize';

    public $tokenUrl = 'http://app-account.dev/oauth2/token';

    public $apiBaseUrl = 'http://app-api.dev/v1/';

    protected function initUserAttributes()
    {
        return $this->api('users/2', 'GET');
    }
}


 ?>
