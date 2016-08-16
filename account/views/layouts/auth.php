<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
 ?>

<?php $this->beginContent('@account/views/layouts/_base.php'); ?>

<div class="wrap">

    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?=$this->render('_footer')?>

<?php $this->endContent(); ?>
