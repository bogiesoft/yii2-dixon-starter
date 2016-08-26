<?php
namespace common\components;

use yii\authclient\OAuth2;

class YiiSso extends OAuth2
{
    public $authUrl    = 'https://accounts.sathit.me/oauth2/authorize';

    public $tokenUrl   = 'https://accounts.sathit.me/oauth2/token';

    public $apiBaseUrl = 'https://api.sathit.me/v1/';

   /**
    * @inheritdoc
    */
    protected function defaultName()
    {
        return 'yiisso';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return 'Yii2 Single Sing On (SSO)';
    }

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 800,
            'popupHeight' => 500,
        ];
    }

    public function initUserAttributes()
    {
        $accessToken = $this->getAccessToken()->getToken();
        $attributes =  $this->api($this->apiBaseUrl.'users/me', 'GET', [], ['Authorization'=>"Bearer $accessToken"]);
        return  $attributes;
    }

    public function applyAccessTokenToRequest($request, $accessToken)
    {
        $data = $request->getData();
        $data['access_token'] = $accessToken->getToken();
        $request->setData($data);
    }
}
 ?>
