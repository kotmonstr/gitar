<?php
use yii\helpers\StringHelper;
$i=0;
?>

<div class="guitar-main-page-block">
    <?php if($modelItems): ?>
        <?php foreach($modelItems as $item): ?>
            <?php
            $image = $item->main_image ? '/upload/items_images_main/'.$item->main_image : '/image/default.jpg';

            ?>

            <?php $i++; ?>
            <?php if($i % 2 == 0){ ?>

                <a href="/site/catalog-detail?item=<?= $item->id ?>" class="guitar-main-page-item">
                    <div class="image-side">
                        <div class="arrow-img"></div>
                        <img src='<?= $image ?>' alt="guitar">
                        <div class="cut-border"></div>
                    </div>
                    <div class="description-side">
                        <h4><?= StringHelper::truncate($item->name,25 ) ?></h4>
                        <p><?= StringHelper::truncate($item->add,100 ) ?></p>
                    </div>
                </a>

            <?php }else{ ?>

                <a href="/site/catalog-detail?item=<?= $item->id ?>" class="guitar-main-page-item reverse">
                    <div class="description-side">
                        <h4><?= StringHelper::truncate($item->name,25 ) ?></h4>
                        <p><?= StringHelper::truncate($item->add,100 ) ?></p>
                    </div>
                    <div class="image-side">
                        <div class="arrow-img"></div>
                        <img src='<?= $image ?>' alt="guitar">
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