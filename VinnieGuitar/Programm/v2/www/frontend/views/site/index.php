<?php
use frontend\assets\AppFrontend;
use frontend\models\Pages;
use frontend\models\Message;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

$_model = new Message();

$this->registerJsFile('/js/owl-carousel/owl.carousel.js', ['depends' => AppFrontend::className()]);
$this->registerJsFile('/js/owl-carousel/init.js', ['depends' => AppFrontend::className()]);
$this->registerCssFile('/js/owl-carousel/owl.carousel.css');
$this->registerCssFile('/js/owl-carousel/owl.theme.css');

$i=0;
$ii = 0;
?>
<div class="container">
    <div class="main-name-block">
        <h1>VinnieGuitars</h1>

        <h3><b>Авторские</b><span>гитары</span></h3>
    </div>
    <div class="clearfix"></div>
    <div class="main-text-block">
        <b>Доброго времени суток!</b>

        <p>Меня зовут Макс Винник, aka Vinnie. Я гитарный мастер и владелец компании Mediator group. Одно из направлений работы
            компании - это изготовление гитар и гитарного оборудования. Принимаю заказы на изготовление практически любых
            электрогитар и бас-гитар.</p>
        <a href="<?= Pages::getUrlAbouteMe(); ?>">Подробнее</a>
    </div>
    <div class="clearfix"></div>
    <div class="catalog-main main-page">
        <ul class="submenu">
            <li>
                <a href="/site/catalog"
                   onclick=""><?= $modelCategiry['0']['name'] ?></a>
            </li>
            <li class="<?php if (isset($cat) && $cat == 2) echo "active"; ?>">
                <a href="/site/catalog?cat=2"
                   onclick=""><?= $modelCategiry['1']['name'] ?></a>
            </li>
            <li class="<?php if (isset($cat) && $cat == 3) echo "active"; ?>">
                <a href="/site/catalog?cat=3"
                   onclick=""><?= $modelCategiry['2']['name'] ?></a>
            </li>
        </ul>
        <a class="custom <?php if (isset($cat) && $cat == 4) echo "active"; ?>"
           href="/site/catalog?cat=4"
           onclick=""><?= $modelCategiry['3']['name'] ?></a>

        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>


    <div class="guitar-main-page-block">

        <?php if ($modelItems): ?>
            <?php foreach ($modelItems as $item): ?>
                <?php $i++; ?>
                <?php if ($i % 2 != 0) { ?>
                    <a href="/site/catalog-detail?item=<?= $item->id ?>" class="guitar-main-page-item">
                        <div class="image-side">
                            <div class="arrow-img"></div>
                            <img src='/upload/items_images_main/<?= $item->main_image ?>' alt="guitar">
                            <div class="cut-border"></div>
                        </div>
                        <div class="description-side">
                            <h4><?= StringHelper::truncate($item->name, 25) ?></h4>

                            <p><?= StringHelper::truncate($item->add, 100) ?></p>
                        </div>
                    </a>

                <?php } else { ?>

                    <a href="/site/catalog-detail?item=<?= $item->id ?>" class="guitar-main-page-item reverse">
                        <div class="description-side">
                            <h4><?= StringHelper::truncate($item->name, 25) ?></h4>
                            <p><?= StringHelper::truncate($item->add, 100) ?></p>
                        </div>
                        <div class="image-side">
                            <div class="arrow-img"></div>
                            <img src='/upload/items_images_main/<?= $item->main_image ?>' alt="guitar">
                            <div class="cut-border"></div>
                        </div>
                    </a>
                <?php } ?>

            <?php endforeach; ?>
        <?php endif; ?>



        <div class="yellow-line-main">
            <div class="inner arrow_box">
                <div class="arrow-before"></div>
                <div class="arrow-next"></div>
            </div>
        </div>
    </div>
</div>

<div class="main-white-news-block">
    <div class="container main-last-news">
        <h3>Последние новости <img src='/img/dots.png'></h3>
        <!--Slider-->
        <div id="owl-demo" class="owl-carousel owl-theme">


            <?php $maxQ = count($modelNews); ?>
            <!--            --><?php //vd($modelNews); ?>

            <?php if (!empty($modelNews)) : ?>
                <?php for ($ii = 0; $ii <= $maxQ - 1; $ii++) { ?>

                    <?php if ($ii % 1 == 0) { ?>

                        <div class="item">
                            <div class="news-last-tbl">


                                <div class="news-last-td">
                                    <div class="info-bl">
                                        <div
                                            class="name-bl"><?= StringHelper::truncate(Html::encode($modelNews[$ii]['header']), 40); ?></div>
                                        <div
                                            class="title-bl"><?= StringHelper::truncate(strip_tags($modelNews[$ii]['content']), 296); ?>
                                        </div>
                                        <div class="date-bl">
                                            <a href="/site/news-detail?id=<?= $modelNews[$ii]['id'] ?>" class="details-bl">Подробнее</a>
                                            <span><?= date("d.m.Y", $modelNews[$ii]['created_at']) ?></span>
                                        </div>
                                    </div>
                                    <div class="img-bl">
                                        <div class="cut-border"></div>
                                        <img src='/upload/upload_news/<?= $modelNews[$ii]['image'] ?>' alt="guitar">
                                    </div>
                                </div>


                                <div class="news-last-td">
                                    <?php if (isset($modelNews[$ii + 1])) { ?>
                                        <div class="info-bl">
                                            <div
                                                class="name-bl"><?= StringHelper::truncate(Html::encode($modelNews[$ii + 1]['header']), 40); ?></div>
                                            <div
                                                class="title-bl"><?= StringHelper::truncate(strip_tags($modelNews[$ii + 1]['content']), 296); ?>
                                            </div>
                                            <div class="date-bl">
                                                <a href="/site/news-detail?id=<?= $modelNews[$ii + 1]['id'] ?>"
                                                   class="details-bl">Подробнее</a>
                                                <span><?= date("d.m.Y", $modelNews[$ii + 1]['created_at']) ?></span>
                                            </div>
                                        </div>
                                        <div class="img-bl">
                                            <div class="cut-border"></div>
                                            <img src='/upload/upload_news/<?= $modelNews[$ii + 1]['image'] ?>' alt="guitar">
                                        </div>
                                    <?php } ?>
                                </div>


                            </div>
                        </div>

                        <?php $ii++; ?>
                    <?php } ?>
                <?php } ?>
            <?php endif; ?>

        </div>


        <!--Slider END-->
    </div>
</div>
<div class="contact-block-main">
    <div class="top-bg">
        <div class="top-bg-td">
            <div class="bg-r-td"></div>
            <div class="bg-r-td-center"></div>
            <div class="bg-r-td"></div>
        </div>
    </div>
    <div class="contact-form">
        <div class="header-bl">
            <h4 class="modal-title">Связь со мной</h4>
        </div>
        <?php $form = ActiveForm::begin([
            'action' => '/message/create-from-user',
            'class' => 'form-bl'
        ]); ?>

        <div class="form-inline-bl">
            <div class="form-item">
                <?= $form->field($_model, 'name')->textInput(['placeholder' => 'Ваше имя'])->label('') ?>
            </div>
            <div class="form-item">
                <?= $form->field($_model, 'tel')->textInput(['placeholder' => 'Ваш номер телефона'])->label('') ?>
            </div>
        </div>
        <div class="form-item">
            <?= $form->field($_model, 'email')->textInput(['placeholder' => 'Email'])->label('') ?>
        </div>

        <div class="form-item textarea">
            <?= $form->field($_model, 'message')->textarea(['placeholder' => 'Ваше сообщение'])->label('') ?>
        </div>

        <?= $form->field($_model, 'captcha')->widget(Captcha::className())->label('',['id'=>'eeee']); ?>


        <div class="form-send">
            <button class="send-btn" type="submit">отправить</button>
        </div>
        <?= $form->field($_model, 'created_at')->hiddenInput(['value' => time()])->label('') ?>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="bottom-bg">
        <div class="bottom-bg-td">
            <div class="bg-r-td"></div>
            <div class="bg-r-td-center"></div>
            <div class="bg-r-td"></div>
        </div>
    </div>
</div>
