<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use frontend\models\Items;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>
            <div class="box-icon">
                <a href="<?= Url::toRoute('/items/index') ?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'name',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return Html::a($dataProvider->name,'/items/update?id='.$dataProvider->id,[ 'title' => 'Редактировать' ]);
                }
            ],
            [
                'attribute' => 'cat_id',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return $dataProvider->cat->name;
                }
            ],
            [
                'attribute' => 'brend_id',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return $dataProvider->brend->name;
                }
            ],
            [
                'attribute' => 'Основное фото',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return  Items::getMainPhoto($dataProvider->id,240,75);
                }
            ],
            //'srings',
            //'anker',
            // 'form',
            // 'bridj',
            // 'material',
            // 'pie',
            // 'lad',
            // 'inlay',
            // 'shema',
            // 'q_volume',
            // 'q_tone',
            // 'add',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
</div>
</div>
