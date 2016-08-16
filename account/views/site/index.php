<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii 2 Single Sing On</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>
        <p><br>
        <?php if(Yii::$app->user->isGuest): ?>
              <p>
                <a style="min-width:180px;" class="btn  btn-primary" href="<?=Url::to(['site/login'])?>">Login</a>
                <a style="min-width:180px;" class="btn  btn-default" href="<?=Url::to(['site/login'])?>">Signup</a>
              </p>
         <?php else: ?>

             <?= Html::beginForm(['/site/logout'], 'post') ?>
             <?= Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-lg btn-primary'])
                ?>
             <?= Html::endForm()?>

        <?php endif; ?>
        </p>
    </div>

</div>
