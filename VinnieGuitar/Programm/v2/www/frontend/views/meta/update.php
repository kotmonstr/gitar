<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Meta */

$this->title = 'Редактировать Мета тег: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Metas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i> Мета теги</h2>

            <div class="box-icon">

                <a href="<?= Url::toRoute('/meta/index') ?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
<div class="meta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
