<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel account\modules\app\models\OauthClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Oauth Clients');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="oauth-clients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Oauth Clients'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
<div class="table-responsive">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute'=>'display_name',
              'format'=>'raw',
              'value'=>function($model){
                return Html::a($model->display_name,Url::to(['/app/oauth-clients/view','id'=>$model->client_id]),['data'=>['pjax'=>'0']]);
              }
            ],
            'redirect_uri',
            'updated_at:dateTime',
            // 'grant_types',
            // 'scope',
            // 'user_id',
            [
            'class' => 'yii\grid\ActionColumn',
            'options'=>['style'=>'width:120px;'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group">  {update} {delete} </div>'
         ],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?></div>
