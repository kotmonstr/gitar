<?php

use frontend\models\Items;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Photo;
/* @var $this yii\web\View */
/* @var $model frontend\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>
            <div class="box-icon">
                <a href="<?= Url::toRoute('/order/index') ?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            //'id',
            'name',
            'email:email',
            'tel',
            'message:ntext',
            //'created_at',
            [
                'attribute'=>'created_at',
                'value'=> date("d.m.Y H:i:s",$model->created_at),
                //'format' => ['image',['width'=>'150','height'=>'200']],
            ],
            [
                'attribute'=>'item_id',
                'value'=> $model->item->name,
                //'format' => ['image',['width'=>'150','height'=>'200']],
            ],
            //'item_id',
            [
                'attribute'=>'Фото',
                'value'=> Items::getNameByItemId($model->item_id),
                'format' => $model->item_id ? ['image',['width'=>'150','height'=>'150']] :  ['image',['width'=>'0','height'=>'0']],
            ],
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
