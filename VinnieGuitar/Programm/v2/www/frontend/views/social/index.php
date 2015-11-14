<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->registerJsFile('/js/custom/remove-trash.js');


$this->title = Yii::t('app', 'Социальные сети');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i> Социальные сети</h2>

            <div class="box-icon">

                <a href="<?= Url::toRoute('/social/index') ?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
<div class="social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    
        'columns' => [
          
            'facebook',
            'vkontakte',
            'twitter',
            'google',
            'odnoklasniky',
            'mailru',
            'yandeks',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
</div>
</div>
