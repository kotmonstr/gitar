<?php

use frontend\assets\AppAdmin;
use frontend\models\Brend;
use frontend\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Photo;

/* @var $this yii\web\View */
/* @var $model frontend\models\Items */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('/adminka/js/custom/ulpoad-image-items.js',['depends'=>AppAdmin::className()]);
$this->registerJsFile('/adminka/js/custom/ulpoad-image-items-main.js',['depends'=>AppAdmin::className()]);

?>
<div class="box col-md-10">
    <div class="box-inner" style="padding:15px">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i><?= $this->title ?></h2>

            <div class="box-icon">
                <a href="<?= Url::toRoute('/items/index') ?>" class="btn btn-close btn-round btn-default"><i
                        class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="items-form">

                    <?php $form = ActiveForm::begin([
                        'options' => [
                            'enctype' => 'multipart/form-data'
                        ]

                    ]); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'cat_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), ['prompt' => '-- Выберите--'])->label('Категирия.  <a href="/category/create"> Создать</a>') ?>

                    <?= $form->field($model, 'brend_id')->dropDownList(ArrayHelper::map(Brend::find()->all(), 'id', 'name'), ['prompt' => '-- Выберите--'])->label('Производиетель звукоснимателя.  <a href="/brend/create"> Создать</a>') ?>

                    <?= $form->field($model, 'strings')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'anker')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'form')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'bridj')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'material')->textInput() ?>

                    <?= $form->field($model, 'pie')->checkbox() ?>

                    <?= $form->field($model, 'lad')->textInput() ?>

                    <?= $form->field($model, 'inlay')->checkbox() ?>

                    <?= $form->field($model, 'shema')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'q_volume')->textInput() ?>

                    <?= $form->field($model, 'q_tone')->textInput() ?>

                    <?= $form->field($model, 'add')->textarea(['maxlength' => true]) ?>

                    <?= $form->field($model, 'price')->textInput() ?>

                    <?= $form->field($model, 'files')->hiddenInput()->label('') ?>

                    <?= $form->field($model, 'main_image')->hiddenInput()->label('') ?>

                    <div class="form-group">
                        <?= Html::Button('Выберите основную фотографию (490х150) - 1 шт',['class'=>'btn btn-primary', 'onclick' => '$(".send-main-file").click()']) ?>
                    </div>

                    <div class="form-group photos-main">
                        <?php
                        if($model->main_image){
                            echo "<img id='img-".$model->id."' onclick='delImageMain(".$model->id.")' class='del-on-hover' src='/upload/items_images_main/" .$model->main_image. "' alt='' width='490px' height='150px' title='Кликнуть для удаления'>";
                        }
                        ?>

                    </div>

                    <div class="form-group">
                        <?= Html::Button('Выберите дополнительные фотографии (300x300) - макс 5 шт',['class'=>'btn btn-success', 'onclick' => '$(".send-file").click()']) ?>
                    </div>


                    <div class="form-group photos">
                        <?php if($model->id){ ?>
                        <?php
                        $_modelPhotos = Photo::getPhotos($model->id);
                        if($_modelPhotos){
                            foreach($_modelPhotos as $photo){
                               echo "<img id='img-".$photo->id."' onclick='delImage(".$photo->id.")' class='del-on-hover' src='/upload/items_images/" .$photo->name. "' alt='' width='100px' height='100px' title='Кликнуть для удаления'>";
                            }
                        }
                        ?>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-info']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none">
<?php
// Add images
$form = ActiveForm::begin([
    'action' => ['/items/multy-upload'],
    'options' => ['enctype' => 'multipart/form-data',
    'id'=>'send-image'
    ],
  ]);
?>
<?= $form->field($model, 'file[]')->fileInput(['class' => 'send-file','multiple'=>'multiple'])->label('') ?>
<?php ActiveForm::end(); ?>







<?php
    // Main image
    $form = ActiveForm::begin([
    'action' => ['/items/main-upload'],
    'options' => ['enctype' => 'multipart/form-data',
    'id'=>'send-image-main'
    ],
    ]);
    ?>
<?= $form->field($model, 'file')->fileInput(['class' => 'send-main-file','multiple'=>'multiple'])->label('') ?>
    <?php ActiveForm::end();?>



</div>
</div>


