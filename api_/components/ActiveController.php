<?php

namespace api\components;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController as BaseActiveController;
use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;



class ActiveController extends BaseActiveController
{

  public $serializer = [
     'class' => 'yii\rest\Serializer',
     'collectionEnvelope' => 'items',
  ];

  public function behaviors()
  {

       $oauth2server = [
            'authenticator' => [
                'class' => \filsh\yii2\oauth2server\filters\auth\CompositeAuth::className(),
                'authMethods' => [
                    ['class' => HttpBearerAuth::className()],
                    ['class' => QueryParamAuth::className(), 'tokenParam' => 'access-token'],
                ]
            ],
            'exceptionFilter' => [
                'class' => ErrorToExceptionFilter::className()
            ],
       ];

       $default = [
            'authenticator' => [
                'class' => \yii\filters\auth\CompositeAuth::className(),
                'authMethods' => [
                    //['class' => HttpBasicAuth::className()],
                    ['class' => HttpBearerAuth::className()],
                    ['class' => QueryParamAuth::className()],
                ]
            ],
      ];

       return ArrayHelper::merge(parent::behaviors(), Yii::$app->params['authenMode'] == 'oauth2server' ? $oauth2server : $default);
  }

}
