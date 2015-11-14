<?php

use frontend\models\Pages;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;

$pageModel = Pages::find()->where(['status'=> 1 ])->all();

?>
<div class="header-logo">
    <div class="header-logo-td">
        <div class="bg-r-td"></div>
        <div class="bg-r-td-center"></div>
        <div class="bg-r-td"></div>
    </div>
</div>

<nav class="navbar navbar-default header-top-menu" role="navigation">
    <a href="/site/index" class="a-href-logo"></a>
    <div class="container">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php if($url == 'site/index')echo"active"; ?>"><a href="/site/index">Главная</a></li>
                    <li class="<?php if($url == 'site/news' || $url == 'site/news-detail')echo"active"; ?>" ><a href="/site/news">Новости</a></li>
                    <li class="<?php if($url == 'site/review')echo"active"; ?>"><a href="/site/review">Отзывы</a></li>
                    <li class="<?php if($url == 'site/catalog')echo"active"; ?>"><a href="/site/catalog">Каталог</a></li>
                    <li class="<?php if($url == 'site/galary')echo"active"; ?>"><a href="/site/galary">Галерея</a></li>
<!--                    <li class="--><?php //if($url == 'site/about')echo"active"; ?><!--"><a href="/site/about">Обо мне</a></li>-->

                    <?php if($pageModel): ?>
                    <?php foreach($pageModel as $page): ?>
                            <li class="<?php if($url == 'site/page')echo"active"; ?>"><a href="<?= '/site/show?id='.$page->id ?>"><?= $page->name ?></a></li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if(!Yii::$app->user->isGuest){ ?>       <li class="<?php if($url == 'site/news')echo"active"; ?>"><a href="/admin/index">Админка</a></li> <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>
