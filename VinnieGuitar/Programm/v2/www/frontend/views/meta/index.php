<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мета теги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i> Мета теги</h2>
            <div class="box-icon">
                <a href="<?= Url::toRoute('/meta/index') ?>" class="btn btn-close btn-round btn-default"><i
                        class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="meta-index">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <p>
                <?= Html::a('Создать раздел', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'url',
                    [
                        'label' => 'Название страницы',
                        'format' => 'html',
                        'value' => function ($data) {
                            return StringHelper::truncate($data->title, 20);
                        }
                    ],
                    [
                        'label' => 'Описание  страницы',
                        'format' => 'html',
                        'value' => function ($data) {
                            return StringHelper::truncate($data->description, 20);
                        }
                    ],
                    [
                        'label' => 'Ключевые слова(через запятую)',
                        'format' => 'html',
                        'value' => function ($data) {
                            return StringHelper::truncate($data->keywords, 20);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
