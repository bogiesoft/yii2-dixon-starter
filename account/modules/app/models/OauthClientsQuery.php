<?php

namespace account\modules\app\models;

use Yii;

/**
 * This is the ActiveQuery class for [[OauthClients]].
 *
 * @see OauthClients
 */
class OauthClientsQuery extends \yii\db\ActiveQuery
{
    public function byUserID()
    {
        return $this->andWhere(['user_id'=>Yii::$app->user->id]);
    }

    /**
     * @inheritdoc
     * @return OauthClients[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OauthClients|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }


}
