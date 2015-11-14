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
            <i title="Vinnie Guitar" class="icon-logo-admin"/>icon </i>
            <div class="logo"></div>
        </a>
<?php if(!yii::$app->user->isGuest){ ?>
        <ul class="collapse navbar-collapse nav navbar-nav top-menu pull-right">
            <li >
                <?= \yii\helpers\Html::beginForm(['/site/logout']) ?>
                <input type="submit" name="Logout" class="btn btn-default out" title="Logout" value="Выход" style="margin-top: 5px;">
                <?= \yii\helpers\Html::endForm() ?>
            </li>
        </ul>
        <?php } ?>
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
        background-image: url("/img/logo.png");
        background-position: 0px 0px;
        background-repeat: no-repeat;
        display: inline-block;
        width: 125px;
        height: 51px;
        font-size: 0;
        zoom: 40%;
    }
    .navbar-brand i {
        float: left;
        height: 117px;
        width: 291px;
        margin-top: -34px;
        margin-left: 20px;
    }
    .navbar-nav {
        float: left;
        margin: 0px 0px 0px 100px;
    }
    .navbar-default .navbar-nav > li > a {
        color: #ccc!important;
    }
    .navbar-default .navbar-nav > li > a:hover {
        color: #FFF!important;
    }
</style>