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
        return 'Yii2 Single Sing On (SSO)';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 800,
            'popupHeight' => 500,
        ];
    }

    // public $authUrl    = 'https://accounts.sathit.me/oauth2/authorize';
    //
    // public $tokenUrl   = 'https://api.sathit.me/oauth2/token';
    //
    // public $apiBaseUrl = 'https://api.sathit.me/v1/';

    public $authUrl    = 'http://app-account.dev/oauth2/authorize';

    public $tokenUrl   = 'http://app-account.dev/oauth2/token';

    public $apiBaseUrl = 'http://app-api.dev/v1/';

    public function initUserAttributes()
    {
        $accessToken = $this->getAccessToken()->getToken();
        return $this->api($this->apiBaseUrl.'users/me', 'GET', [], ['Authorization'=>"Bearer $accessToken"]);
    }

    protected function defaultNormalizeUserAttributeMap()
    {
       return [
           'email' => 'Email',
           'username' => 'username'
       ];
    }
}
 ?>
