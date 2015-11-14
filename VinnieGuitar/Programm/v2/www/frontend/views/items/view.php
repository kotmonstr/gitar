<?php

use frontend\models\Items;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\models\Photo;

/* @var $this yii\web\View */
/* @var $model frontend\models\Items */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>

            <div class="box-icon">
                <a href="<?= Url::toRoute('/brend/index') ?>" class="btn btn-close btn-round btn-default"><i
                        class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="items-view">

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
                            //'id',
                            'name',
                            [
                                'attribute' => 'cat_id',
                                'format' => 'raw',
                                'value' => $model->cat->name
                            ],
                            [
                                'attribute' => 'brend_id',
                                'format' => 'raw',
                                'value' => $model->brend->name
                            ],
                            'strings',
                            'anker',
                            'form',
                            'bridj',
                            'material',
                            //'pie',
                            [
                                'attribute' => 'pie',
                                //'format' => 'html',
                                'value' =>   $model->pie ? 'Есть' : 'Нет',

                            ],
                            'lad',
                            //'inlay',
                            [
                                'attribute' => 'inlay',
                                //'format' => 'html',
                                'value' =>   $model->inlay ? 'Есть' : 'Нет',

                            ],
                            'shema',
                            'q_volume',
                            'q_tone',
                            'add',
                            'price',
                            [
                                'attribute' => 'Основное Фото',
                                'format' => 'html',
                                'value' =>   Items::getMainPhoto($model->id),

                            ],
                            [
                                'attribute' => 'Дополнительные фото',
                                'format' => 'html',
                                'value' =>   Photo::getPhotosHTML($model->id),

                            ],
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
