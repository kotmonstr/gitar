<?php
use frontend\assets\AppAdmin;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\web\View;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAdmin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">



    <title><?= Html::encode($this->title) ?></title>

    <?php
    $this->registerMetaTag(['charset' => Yii::$app->charset]);
    // css
   // $this->registerCssFile('/css/ui-jqwery/jquery-ui.css');
    $this->registerCssFile('/adminka/css/bootstrap-cerulean.min.css');
    $this->registerCssFile('/adminka/css/charisma-app.css');
    $this->registerCssFile('/adminka/css/custom.css');


    $pos = View::POS_HEAD;
    $this->registerJsFile('/js/jquery2.js',['position' => $pos,'depends'=>AppAdmin::className()]);
    $this->registerJsFile('/bootstrap3/js/bootstrap.js',['position' => $pos,'depends'=>AppAdmin::className()]);
    ?>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>
</head>
<body>
<div class="center960">
    <?= $this->render('//layouts/admin/_top-menu') ?>
    <?php $this->beginBody() ?>
    <?= $this->render('//layouts/admin/_left-menu') ?>
    <?= $content ?>


    <?php if(Yii::$app->session->hasFlash('success')):?>
        <div class="info">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php $this->endBody() ?>
    <?php $this->endPage() ?>
</div>
</body>
</html>