<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'brend_id') ?>

    <?= $form->field($model, 'strings') ?>

    <?= $form->field($model, 'anker') ?>

    <?php // echo $form->field($model, 'form') ?>

    <?php // echo $form->field($model, 'bridj') ?>

    <?php // echo $form->field($model, 'material') ?>

    <?php // echo $form->field($model, 'pie') ?>

    <?php // echo $form->field($model, 'lad') ?>

    <?php // echo $form->field($model, 'inlay') ?>

    <?php // echo $form->field($model, 'shema') ?>

    <?php // echo $form->field($model, 'q_volume') ?>

    <?php // echo $form->field($model, 'q_tone') ?>

    <?php // echo $form->field($model, 'add') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
