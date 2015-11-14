<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Social */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="social-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'vkontakte')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'google')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'odnoklasniky')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'mailru')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'yandeks')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Редактировать'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
