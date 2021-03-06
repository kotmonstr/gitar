<?php

use frontend\assets\AppAdmin;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>

            <div class="box-icon">
                <a href="<?= Url::toRoute('/news/index') ?>" class="btn btn-close btn-round btn-default"><i
                        class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="news-form">

                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->widget(Widget::className(), [
                        'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 400,
                            'pastePlainText' => true,
                            'buttonSource' => true,
                            'focus' => true,
                            'imageUpload' => '/news/upload',
                            'imageManagerJson' => '/news/uploaded',
                            'plugins' => [
                                'clips',
                                'fullscreen',
                                'imagemanager',
                                //'filemanager'
                            ]
                        ]
                    ]) ?>


                    <?php if ($model->image) {
                        echo Html::img('/upload/upload_news/' . $model->image, ['style' => 'height: 120px;']);
                        ?>
                        <a href="<?= Url::to(['/upload/news/deleteimage', 'id' => $model->id]) ?>" class="btn btn-warning"
                           onclick="confirmDelete(event)">Удалить</a>
                    <?php
                    } else {
                        echo Html::img('/upload/default.jpg', ['style' => 'height: 120px;']);
                    }
                    ?>

                    <?= $form->field($model, 'file')->fileInput()->label('') ?>


                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Принять изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

<?php
//echo newerton\fancybox\FancyBox::widget([
//    'target' => 'a[rel=fancybox]',
//    'helpers' => true,
//    'mouse' => true,
//    'config' => [
//        'maxWidth' => '90%',
//        'maxHeight' => '90%',
//        'playSpeed' => 7000,
//        'padding' => 0,
//        'fitToView' => false,
//        'width' => '70%',
//        'height' => '70%',
//        'autoSize' => false,
//        'closeClick' => false,
//        'openEffect' => 'elastic',
//        'closeEffect' => 'elastic',
//        'prevEffect' => 'elastic',
//        'nextEffect' => 'elastic',
//        'closeBtn' => true,
//        'openOpacity' => true,
//        'helpers' => [
//            'title' => ['type' => 'float'],
//            'buttons' => [],
//            'thumbs' => ['width' => 68, 'height' => 50],
//            'overlay' => [
//                'css' => [
//                    'background' => 'rgba(0, 0, 0, 0.8)'
//                ]
//            ]
//        ],
//    ]
//]);
//
//                    echo Html::a(Html::img('/upload/imp/1.jpg'), '/upload/imp/1.jpg', ['rel' => 'fancybox']);
//                    echo Html::a(Html::img('/upload/imp/2.jpg'), '/upload/imp/2.jpg', ['rel' => 'fancybox']);
//?>
                </div>
            </div>
        </div>
    </div>
</div>




