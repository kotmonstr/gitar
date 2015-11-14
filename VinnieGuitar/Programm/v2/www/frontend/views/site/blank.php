<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<!-- Хлебные крошки -->
<div class="h1-top">
    <h1><?= Html::encode($model->name) ?></h1>
</div>
<div class="container">
    <div class="news-inner-main">
        <p>
            <?php
            echo $model->content ? HtmlPurifier::process($model->content) : '';
            ?>
        </p>
    </div>
</div>
<style>
    h4,h5,h3,h2,h1{
        color:#ffffff;
    }
</style>
