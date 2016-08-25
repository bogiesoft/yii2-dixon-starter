<?php

namespace account\modules\app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%oauth_clients}}".
 *
 * @property string $client_id
 * @property string $client_secret
 * @property string $redirect_uri
 * @property string $grant_types
 * @property string $scope
 * @property integer $user_id
 * @property string $display_name
 * @property string $contact_email
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OauthAccessTokens[] $oauthAccessTokens
 * @property OauthAuthorizationCodes[] $oauthAuthorizationCodes
 * @property OauthRefreshTokens[] $oauthRefreshTokens
 */
class OauthClients extends ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
            ],
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'client_id'
              ],
              'value' => function ($event) {
                  return $this->setClientId();
              },
            ],
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'client_secret'
              ],
              'value' => function ($event) {
                  return $this->setClientSecret();
              },
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%oauth_clients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['display_name','redirect_uri'], 'required'],
            [['user_id','created_at','updated_at'], 'integer'],
            [['client_id', 'client_secret'], 'string', 'max' => 32],
            [['redirect_uri'], 'string', 'max' => 1000],
            [['display_name','contact_email'], 'string', 'max' => 255],
            [['grant_types'], 'string', 'max' => 100],
            [['scope'], 'string', 'max' => 2000],
            [['redirect_uri'], 'url'],
            [['contact_email'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => Yii::t('app', 'App ID'),
            'display_name' => Yii::t('app', 'App Name'),
            'client_secret' => Yii::t('app', 'App Secret'),
            'redirect_uri' => Yii::t('app', 'Redirect Uri'),
            'grant_types' => Yii::t('app', 'Grant Types'),
            'scope' => Yii::t('app', 'Scope'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokens()
    {
        return $this->hasMany(OauthAccessTokens::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAuthorizationCodes()
    {
        return $this->hasMany(OauthAuthorizationCodes::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthRefreshTokens()
    {
        return $this->hasMany(OauthRefreshTokens::className(), ['client_id' => 'client_id']);
    }

    /**
     * @inheritdoc
     * @return OauthClientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OauthClientsQuery(get_called_class());
    }

    public function setClientId()
    {
        return  $this->client_id = time().mt_rand();
    }

    public function setClientSecret()
    {
        return $this->client_secret = Yii::$app->getSecurity()->generateRandomString();
    }
}
