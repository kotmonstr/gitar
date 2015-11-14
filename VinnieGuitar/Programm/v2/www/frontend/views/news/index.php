<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>
            <div class="box-icon">
                <a href="<?= Url::toRoute('/news/index') ?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'header',
            [
                'attribute' => 'header',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return Html::a( $dataProvider->header,'/news/update?id='.$dataProvider->id,['title'=>'Редактировать']);
                }
            ],
            //'content:ntext',
            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return $dataProvider->image ?  Html::img('/upload/upload_news/'.$dataProvider->image,['width'=>'100','height'=>'100']) : Html::img('/upload/default.jpg',['width'=>'150','height'=>'100']);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'html',
                'value' => function ($dataProvider) {
                    return date("d.m.Y H:i:s",$dataProvider->created_at);
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
