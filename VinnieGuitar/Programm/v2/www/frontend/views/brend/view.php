<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Brend */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>
            <div class="box-icon">
                <a href="<?= Url::toRoute('/brend/index') ?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
<div class="brend-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
