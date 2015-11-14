<?php
use yii\helpers\StringHelper;

$CatController = \Yii::$app->controller;
?>
<div class="h1-top">
    <h1>Каталог</h1>
</div>
<div class="container">
    <div class="catalog-main">
        <ul class="submenu">
            <li class="<?php if ($cat == 1) echo "active"; ?>">
                <a href="/site/catalog?cat=<?= $modelCategiry['0']['id'] ?>"><?= $modelCategiry['0']['name'] ?></a>
            </li>
            <li class="<?php if ($cat == 2) echo "active"; ?>">
                <a href="/site/catalog?cat=<?= $modelCategiry['1']['id'] ?>"><?= $modelCategiry['1']['name'] ?></a>
            </li>
            <li class="<?php if ($cat == 3) echo "active"; ?>">
                <a href="/site/catalog?cat=<?= $modelCategiry['2']['id'] ?>"><?= $modelCategiry['2']['name'] ?></a>
            </li>
        </ul>
        <a class="custom <?php if ($cat == 4) echo "active"; ?>"
           href="/site/catalog?cat=<?= $modelCategiry['3']['id'] ?>"><?= $modelCategiry['3']['name'] ?></a>

        <div class="clearfix"></div>

        <?php if ($ItemsModel) { ?>
            <?php foreach ($ItemsModel as $item): ?>

                <a href="/site/catalog-detail?item=<?= $item->id ?>" class="guitar-catalog-item">
                    <div class="image">
                        <div class="rect"></div>
                        <img src='<?= $CatController->getImageMain($item->id); ?>' alt="guitar">
                    </div>
                    <div class="description">
                        <h3><?= StringHelper::truncate($item->name, 50) ?></h3>

                        <p><?= StringHelper::truncate($item->add, 110) ?></p>
                    </div>
                    <div class="price">
                        <span>цена:</span>

                        <div>
                            <div class="rect-sm"></div><?= $item->price ?> р
                        </div>
                        <p>подробнее</p>
                    </div>
                </a>

                <hr>

            <?php endforeach; ?>
        <?php } ?>

    </div>
</div>