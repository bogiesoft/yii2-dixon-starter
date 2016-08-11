<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $password_reset_at
 * @property integer $confirmed_email_at
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property UserProfile $userProfile
 * @property UserToken[] $userTokens
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function fields(){
      return [
        'id',
        'username',
        'email',
        'created_at',
        'updated_at'
      ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'password_reset_at' => 'Password Reset At',
            'confirmed_email_at' => 'Confirmed Email At',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }



    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
