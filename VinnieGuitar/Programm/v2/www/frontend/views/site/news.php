<?php
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<!-- Хлебные крошки -->
<div class="h1-top">
    <h1>Новости</h1>
</div>
<div class="container-main">
    <div class="static-pg">
        <div class="news-sp">

            <?php if($model): ?>
<?php foreach($model as $news){ ?>

            <div class="news-tbl" onclick="window.location.href='/site/news-detail?id= <?= $news->id ?> ?>'" style="cursor: pointer">
                <div class="left-bl">
                    <div class="bg-news-left"></div>
                    <div class="date-bl">
                        <div class="date-bl-d"><?= date("d",$news->created_at); ?></div>
                        <hr/>
                        <div class="date-bl-m-y"><?= Yii::$app->formatter->asDate($news->created_at, 'MMMM'); ?><br><?= date("Y",$news->created_at); ?></div>
                    </div>
                </div>
                <div class="right-bl">
                    <div class="name-bl"><?= Html::encode($news->header); ?></div>
                    <div class="img-bl" style="background-image: url('<?= '/upload/upload_news/'.$news->image; ?>')">
                    </div>
                    <div class="title-bl">
                        <?= HtmlPurifier::process(StringHelper::truncate(strip_tags($news->content),215)); ?>
                    </div>
                    <div class="next-bl">
                        <a href="/site/news-detail?id=<?= $news->id ?>" >Подробнее</a>
                    </div>
                </div>
            </div>

<?php } ?>
<?php endif ?>


            </div>
        </div>
    </div>
