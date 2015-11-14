<?php

use frontend\models\Items;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


$this->title = 'Заказы';
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
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'email:email',
            'tel',
            //'message:ntext',
            // 'created_at',
            // 'item_id',
            [
                'attribute' => 'Товар',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return $dataProvider->item->name;
                }
            ],
            [
                'attribute' => 'фото товара',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return Items::isgetImage($dataProvider->item_id) ? Html::img(Items::getNameByItemId($dataProvider->item_id),['width'=>240,'height'=>75]) : Html::img('/image/default.jpg',['width'=>240,'height'=>75]);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
</div>
</div>

<script>
    $('.glyphicon-pencil').hide();

</script>
