<?php

use yii\helpers\Url;
?>

<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= Url::toRoute('/admin/index'); ?>">
            <i title="Slotovod" class="icon-logo-admin"/>icon </i>
            <div class="logo"></div>
        </a>

        <ul class="collapse navbar-collapse nav navbar-nav top-menu pull-right">
            <li >
                <?= \yii\helpers\Html::beginForm(['/site/logout']) ?>
                <input type="submit" name="Logout" class="btn btn-default out" title="Logout" value="Выход" style="margin-top: 5px;">
                <?= \yii\helpers\Html::endForm() ?>
            </li>
        </ul>
          <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="<?= Url::toRoute('/site/index'); ?>"><i class="glyphicon glyphicon-globe"></i> Перейти на сайт</a></li>

        </ul>
        <?php if (isset(Yii::$app->user->getIdentity()->username)) { ?>
            <ul class="nav navbar-nav top-menu pull-right" style="margin-top: 10px;">
                <li><span style="color:white;font-size:16px;"><i class="glyphicon glyphicon-user"></i> <?= "Вы вошли как :<strong>" . Yii::$app->user->getIdentity()->username . '</strong>' ?></span></li>

            </ul>
        <?php } ?>
    </div>
</div>
<!-- topbar ends -->
<style>
    .icon-logo-admin{
        background-image: url("/css/style/main/img/logo.png");
        background-position: -45px -20px;
        background-repeat: no-repeat;
        display: inline-block;
        width: 283px;
        height: 51px;
        font-size: 0;
    }
    .navbar-brand i {
        float: left;
        height: 53px;
        width: 291px;
        margin-top: -16px;
        margin-left: -9px;
    }
    .navbar-nav {
        float: left;
        margin: 0px 0px 0px 100px;
    }
</style>