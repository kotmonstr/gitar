<?php
use frontend\assets\AppFrontend;
use yii\helpers\StringHelper;

$CatController = \Yii::$app->controller;
$this->registerJsFile('/js/custom.js', ['depends' => AppFrontend::className()]);
?>
<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>


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

        <div class="product-card-inner">
            <div class="desc-side">

                <div class="main-photo-bl">
<!--                    <img id="main-photo" src="--><?//= $CatController->getImageOriginal($itemsModel->id); ?><!--"/>-->
                    <img id="main-photo" src="<?= $itemsModel->main_image ? '/upload/main_crop_small/'.$itemsModel->main_image : '/image/default.jpg' ?>"/>
                </div>
                <div class="miniature-block">

                    <?php if ($photosModel) { ?>
                        <?php foreach ($photosModel as $photo): ?>

                            <div class="miniatute-item" style="float: left">
                                <img src="<?= '/upload/items_images_crop/' . $photo->name; ?>"/>
                            </div>

                        <?php endforeach; ?>
                    <?php } ?>


                </div>
                <div class="clearfix"></div>
                <fieldset>
                    <legend>описание</legend>
                    <p>
                        <?= StringHelper::truncate($itemsModel->add, 600); ?>
                    </p>

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
                </fieldset>
            </div>
            <div class="char-side">
                <h2><?= $itemsModel->name; ?></h2>
                <h4>характеристики</h4>
                <table>
                    <input type="hidden" id="item_id" value="<?= $itemsModel->id; ?>">
                    <?php if ($itemsModel->form): ?>
                        <tr>
                            <td>Тип / Форма</td>
                            <td><?= $itemsModel->form; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->strings): ?>
                        <tr>
                            <td>Количество струн</td>
                            <td><?= $itemsModel->strings; ?>шт.</td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->anker): ?>
                        <tr>
                            <td>Тип крепления грифа</td>
                            <td><?= $itemsModel->anker; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->material): ?>
                        <tr>
                            <td>Материал корпуса</td>
                            <td><?= $itemsModel->material; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->bridj): ?>
                        <tr>
                            <td>Тип бриджа</td>
                            <td><?= $itemsModel->bridj; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->pie || $itemsModel->pie == 0): ?>
                        <tr>
                            <td>Порожек с зажимом</td>
                            <td><?= $itemsModel->pie ? 'Есть' : 'Нет'; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->lad): ?>
                        <tr>
                            <td>Количество ладов</td>
                            <td><?= $itemsModel->lad; ?>шт.</td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->inlay || $itemsModel->inlay == 0): ?>
                        <tr>
                            <td>Инкрустация</td>
                            <td><?= $itemsModel->inlay ? 'Есть' : 'Нет'; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->shema): ?>
                        <tr>
                            <td>Схема звукоснимателей</td>
                            <td><?= $itemsModel->shema; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->brend->name): ?>
                        <tr>
                            <td>Производитель звукоснимателей</td>
                            <td><?= $itemsModel->brend->name; ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->q_volume): ?>
                        <tr>
                            <td>Регулятор громкости</td>
                            <td><?= $itemsModel->q_volume; ?>шт.</td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->q_tone): ?>
                        <tr>
                            <td>Регулятор тона</td>
                            <td><?= $itemsModel->q_tone; ?>шт.</td>
                        </tr>
                    <?php endif ?>
                    <?php if ($itemsModel->price): ?>
                        <tr>
                            <td>Цена</td>
                            <td><?= $itemsModel->price; ?>р</td>
                        </tr>
                    <?php endif ?>

                </table>
                <button data-target="#order" data-toggle="modal"
                        onclick="var id = $('#item_id').val();$('#order-item_id').val(id)">сделать предзаказ
                </button>
                <div class="clearfix"></div>
                <a class="back" href="/site/catalog?cat=<?= $cat ?>">вернуться к каталогу</a>
            </div>
        </div>

    </div>
</div>
