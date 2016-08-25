<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model account\modules\app\models\OauthClients */

$this->title = $model->display_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oauth Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oauth-clients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->client_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->client_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h3>Application </h3>
    <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table'],
        'attributes' => [
            'display_name',
            [
              'attribute'=>'client_id',
              'format'=>'html',
              'value'=> "<code>$model->client_id</code>"
            ],
            [
              'attribute'=>'client_secret',
              'format'=>'raw',
              'value'=> "<details ><code>$model->client_secret</code></details>"
            ],
            'redirect_uri:url',
            'grant_types',
            'scope'
        ],
    ]) ?>

    <h3>OAuth 2.0 API</h3>
    <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table'],
        'attributes' => [
            [
              'label'  => 'Auth URL',
              'format' => 'url',
              'value'  => 'https://accounts.sathit.me/oauth2/authorize'
            ],
            [
              'label'  =>'Access Token URL',
              'format' => 'url',
              'value'  => 'https://accounts.sathit.me/oauth2/token'
            ],
            [
              'label'  =>'API URL',
              'format' => 'url',
              'value'  => 'https://api.sathit.me/v1/'
            ],
        ],
    ]) ?>

</div>
