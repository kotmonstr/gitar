<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppFrontend;
use frontend\widgets\Alert;
use yii\web\View;
use frontend\models\Meta;
AppFrontend::register($this);
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;
$meta = Meta::getPageMeta($url);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $meta ? Html::encode($meta->title) : 'VinnieGuitar' ?></title>
    <meta name="description" content="<?= $meta ? Html::encode($meta->description ): 'VinnieGuitar-описание' ?>">
    <meta name="keywords" content="<?= $meta ? Html::encode($meta->keywords ) : 'VinnieGuitar-ключевые слова' ?>">

<?php
    $pos = View::POS_HEAD;
    $this->registerJsFile('/bootstrap3/js/bootstrap.js',['position' => $pos,'depends'=>AppFrontend::className()]);
    $this->registerJsFile('/js/flash.js',['position' => $pos,'depends'=>AppFrontend::className()]);
    $this->registerJsFile('/js/main-page.js',['position' => $pos,'depends'=>AppFrontend::className()]);
?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>


<?php if(Yii::$app->session->hasFlash('success')): ?>
<?= $this->render('/layouts/main-parts/_system'); ?>
<?php endif; ?>

    <?php $this->beginBody() ?>
    <div class="wraper <?php if($url =='site/index'){echo"main-page";} ?>">

        <?= $this->render('/layouts/main-parts/_header'); ?>
        <div class="main-container">
            <?= $this->render('/layouts/main-parts/_modal'); ?>

        <?= $content ?>

        </div>
    </div>

<?= $this->render('/layouts/main-parts/_footer'); ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
