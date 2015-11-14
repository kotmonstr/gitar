<?php
use yii\helpers\Html;
?>


<div class="h1-top">
        <h1>Галерея</h1>
    </div>
    <div class="container-main">
        <div class="static-pg">
            <div class="gallery-tbl">
        <?php        echo newerton\fancybox\FancyBox::widget([
                'target' => '[rel=fancybox]',
                'helpers' => true,
                'mouse' => true,
                'config' => [
                'maxWidth' => '90%',
                'maxHeight' => '90%',
                'playSpeed' => 2000,
                'padding' => 2,
                'fitToView' => true,
                'width' => '70%',
                'height' => '70%',
                'autoSize' => true,
                'closeClick' => false,
                'openEffect' => 'elastic',
                'closeEffect' => 'elastic',
                'prevEffect' => 'elastic',
                'nextEffect' => 'elastic',
                'closeBtn' => true,
                'openOpacity' => true,
                'helpers' => [
                'title' => ['type' => 'float'],
                'buttons' => [],
                'thumbs' => ['width' => 68, 'height' => 50],
                'overlay' => [
                'css' => [
                'background' => 'rgba(0, 0, 0, 0.8)'
                ]
                ]
                ],
                ]
                ]); ?>

<?php if($modelPhoto): ?>
<?php foreach($modelPhoto as $photo ){ ?>
        <?php $title = isset($photo->items->name) ? $photo->items->name : ''; ?>

                <div class="img-bl">
            <div class="bg-zoom"></div>
            <?php    echo Html::a(Html::img('/upload/items_images_crop/'.$photo->name,['title'=> $title ]), '/upload/items_images/'.$photo->name, ['rel' => 'fancybox','caption'=> $title,'title'=> $title]); ?>
            </div>
                <?php } ?>
                <?php endif ?>

            </div>
        </div>
    </div>


