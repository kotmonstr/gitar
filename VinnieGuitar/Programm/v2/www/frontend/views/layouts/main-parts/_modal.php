<?php
use frontend\models\Review;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use frontend\models\Order;
$_model = new Review();
$orderModel = new Order();
?>


<?php $form = ActiveForm::begin([
    'action'=>'/review/create-from-user',
   // 'method'=>'POST',

]); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog feedback">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Оставить отзыв о мастере</h4>
            </div>
            <div class="modal-body feedback">
                <div class="form-item">
                    <?= $form->field($_model, 'name')->textInput(['placeholder'=> 'Ф.И.О.'])->label('') ?>
                </div>
                <div class="form-item textarea">
                    <?= $form->field($_model, 'message')->textarea(['placeholder'=> 'Ваше сообщение'])->label('') ?>
                </div>
                <div class="form-item textarea">
                    <?= $form->field($_model, 'captcha')->widget(Captcha::className())->label(''); ?>
                </div>
            </div>
            <?= $form->field($_model, 'created_at')->hiddenInput(['value'=>time()])->label('') ?>
            <div class="modal-footer">
<!--                <button type="submit" class="btn btn-primary send">оставить отзыв</button>-->
                <?= Html::submitButton('оставить отзыв', ['class' => 'btn btn-primary send']) ?>
                <button type="button" class="btn btn-default discuss" data-dismiss="modal">отмена</button>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>




<?php $form = ActiveForm::begin([
    'action'=>'/order/submit',
]); ?>
<?= $form->field($orderModel, 'item_id')->hiddenInput()->label('') ?>
<!-- Modal -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog feedback">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Отправить заявку </h4>
            </div>
            <div class="modal-body feedback order-form">

                <div class="form-item ">
                    <?= $form->field($orderModel, 'name')->textInput(['placeholder'=> 'Ф.И.О.'])->label('') ?>
                </div>
                <div class="form-item">
                    <?= $form->field($orderModel, 'email')->textInput(['placeholder'=> 'Email'])->label('') ?>
                </div>
                <div class="form-item">
                    <?= $form->field($orderModel, 'tel')->textInput(['placeholder'=> 'Телефон'])->label('') ?>
                </div>
                <div class="form-item textarea">
                    <?= $form->field($orderModel, 'message')->textarea(['placeholder'=> 'Сопроводительное птсьмо','class'=>'textarea-order'])->label('') ?>
                </div>
                <div class="form-item textarea">
                    <?= $form->field($orderModel, 'captcha')->widget(Captcha::className())->label(''); ?>
                </div>
            </div>
            <?= $form->field($orderModel, 'created_at')->hiddenInput(['value'=>time()])->label('') ?>
            <div class="modal-footer">
<!--                <button type="submit" class="btn btn-primary send">оставить отзыв</button>-->
                <?= Html::submitButton('отправить', ['class' => 'btn btn-primary send']) ?>
                <button type="button" class="btn btn-default discuss" data-dismiss="modal">отмена</button>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<style>
    #review-captcha-image {
        width: 136px;
        margin-top: 70px;
        margin-left: 25px;
    }
    #review-captcha {
        margin-top: 70px;
        float: left;
        width: 310px;
    }
    .modal-body.feedback .form-item.textarea {
        height: 142px!important;
    }
    .textarea-order{
        wheight:128px;
    }
    #order-captcha-image{
        width: 136px;
        margin-top: 70px;
        margin-left: 25px;
    }
    #order-captcha{
        margin-top: 70px;
        float: left;
        width: 310px;
      }
    .order-form .form-item textarea{
        height: 152px!important;
    }
</style>



