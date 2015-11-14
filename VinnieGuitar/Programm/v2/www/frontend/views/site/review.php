


<!-- Хлебные крошки -->
<div class="h1-top">
    <h1>Отзывы</h1>
</div>
<div class="container">

    <div class="feedback-content-block">
        <button class="btn btn-primary btn-lg add" type="button" data-toggle="modal" data-target="#myModal">оставить отзыв</button>

<?php if(isset($modelReview)): ?>
<?php foreach($modelReview as $review): ?>

        <div class="feedback-item">
            <h4><?= $review->name ?><span><?= date("d.m.Y",$review->created_at) ?></span></h4>
            <div class="text">
                <div class="arrow"></div>
                <p><?= $review->message ?></p>
            </div>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>

    </div>


</div>

