<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model account\modules\app\models\OauthClientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oauth-clients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'client_secret') ?>

    <?= $form->field($model, 'redirect_uri') ?>

    <?= $form->field($model, 'grant_types') ?>

    <?= $form->field($model, 'scope') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
