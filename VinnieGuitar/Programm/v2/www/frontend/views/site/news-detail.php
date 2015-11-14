<?php

use yii\helpers\StringHelper;
?>
<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
<!-- Хлебные крошки -->
<div class="h1-top">
    <h1>Новости</h1>
</div>
<div class="container">

    <div class="news-inner-main">
        <h3><?= $model->header; ?></h3>
        <div class="date">
            <b><?= date("d",$model->created_at); ?></b>
            <hr>
            <span><?= Yii::$app->formatter->asDate($model->created_at, 'MMMM'); ?><br><?= date("Y",$model->created_at); ?></span>
        </div>
        <div class="image" style="background-image: url('<?= '/upload/upload_news/'.$model->image; ?>')"></div>
        <div class="clearfix"></div>
        <div class="text-side">
           <p><?= $model->content; ?></p>
        </div>
        <div class="social-block">
            <div class="share-bl">
                <div class="name-bl">Поделитесь с друзьями</div>
                <div style="display: none" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"></div>
                <ul class="scocials-list">
                    <li>
                        <a title="Vkontakte" href="javascript: void(0);" target="_blank">
                            <i class="icon-social vk" onclick="$('span.b-share-icon_vkontakte').click()"></i>
                        </a>
                    </li>
                    <li>
                        <a title="odnoklassniky" href="javascript: void(0);" target="_blank" >
                            <i class="icon-social od" onclick="$('span.b-share-icon_odnoklassniki').click()"></i>
                        </a>
                    </li>
                    <li>
                        <a title="facebook" href="javascript: void(0);" target="_blank">
                            <i class="icon-social fb" onclick="$('span.b-share-icon_facebook').click()"></i>
                        </a>
                    </li>
                    <li>
                        <a title="Google" href="javascript: void(0);" target="_blank">
                            <i class="icon-social gplus" onclick="$('span.b-share-icon_gplus').click()"></i>
                        </a>
                    </li>

                    <li>
                        <a title="Mail.ru" href="javascript: void(0);" target="_blank">
                            <i class="icon-social mail"  onclick="$('span.b-share-icon_moimir').click()"></i>
                        </a>
                    </li>
                    <li>
                        <a title="Twitter" href="javascript: void(0);" target="_blank">
                            <i class="icon-social tw" onclick="$('span.b-share-icon_twitter').click()"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="back-block">
                <a href="/site/news">Вернуться к новостям</a>
            </div>

        </div>
    </div>

</div>

