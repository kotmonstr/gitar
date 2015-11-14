<?php

use yii\helpers\Url;

//$this->registerJsFile('/js/custom/menu.js');
$controller= Yii::$app->controller->id;
$action= Yii::$app->controller->action->id;
$curr_url = $controller.'/'.$action;
//vd($curr_url);
?>

<div class="ch-container">
    <div class="row">

        <?php if(!Yii::$app->user->isGuest){ ?>

        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>

                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Меню</li>
                        <li class="<?php if($curr_url === 'admin/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/admin/index'); ?>"><i class="glyphicon glyphicon-home"></i><span>&nbsp;Главная</span></a></li>
                        <li class="<?php if($curr_url === 'news/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/news/index'); ?>"><i class="glyphicon glyphicon-info-sign"></i><span>&nbsp;Новости</span></a></li>
                        <li class="<?php if($curr_url === 'page/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/page/index'); ?>"><i class="glyphicon glyphicon-file"></i><span>&nbsp;Мои страницы</span></a></li>
                        <li class="<?php if($curr_url === 'brend/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/brend/index'); ?>"><i class="glyphicon glyphicon-star"></i><span>&nbsp;Производители</span></a></li>
                        <li class="<?php if($curr_url === 'category/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/category/index'); ?>"><i class="glyphicon glyphicon-th"></i><span>&nbsp;Категории</span></a></li>
                        <li class="<?php if($curr_url === 'items/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/items/index'); ?>"><i class="glyphicon glyphicon-shopping-cart"></i><span>&nbsp;Товары</span></a></li>
                        <li class="<?php if($curr_url === 'review/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/review/index'); ?>"><i class="glyphicon glyphicon-comment"></i><span>&nbsp;Отзывы</span></a></li>
                        <li class="<?php if($curr_url === 'message/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/message/index'); ?>"><i class="glyphicon glyphicon-user"></i><span>&nbsp;Сообщения</span></a></li>
                        <li class="<?php if($curr_url === 'order/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/order/index'); ?>"><i class="glyphicon glyphicon-phone-alt"></i><span>&nbsp;Заказы</span></a></li>
<!--                        <li class="--><?php //if($curr_url === 'social/index'){echo "active";}?><!--" ><a class="ajax-link" href="--><?//= Url::toRoute('/social/index'); ?><!--"><i class="glyphicon glyphicon-user"></i><span>&nbsp;Социальные сети</span></a></li>-->
                        <li class="<?php if($curr_url === 'email/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/email/index'); ?>"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp;Мой Email</span></a></li>
                        <li  class="<?php if($controller == 'meta/index'){echo "active";}?>"><a class="ajax-link" href="<?= Url::toRoute('/meta/index'); ?>"><span class="glyphicon glyphicon-wrench"></span><span>&nbsp;SEO</span></a></li>
                        <li><a  data-toggle="modal" data-target="#myModal" class="ajax-link" href="#"><span class="glyphicon glyphicon-refresh"></span><span>&nbsp;Удалить кеш</span></a></li>
                    </ul>

                </div>
            </div>
        </div>

        <?php } ?>
        <!--/span-->
        <!-- left menu ends -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <!-- Modal -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #D7E4F3;">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Очистка кеша</h4>
                    </div>
                    <div class="modal-body" style="min-height:100px">
                        <center>
                            <h3>Вы уверены что хотите очистить кеш?</h3>
                        </center>
                    </div>
                    <div class="modal-footer" style="background-color: #D7E4F3;">
                        <a class="btn btn-danger " href="<?= Url::toRoute(['/cash/clear']) ?>" style="color:white" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-fire" style="color:red"></span> Очистить кеш</a>
                        <a class="btn btn-default" type="button" class="btn btn-default" data-dismiss="modal">Отмена</a>

                    </div>
                </div>
            </div>
        </div>

        <style>
            .navbar {
                background-image: -webkit-linear-gradient(#647E8C, #003F62 60%, #091318);
                background-image: -o-linear-gradient(#54b4eb, #2fa4e7 60%, #1d9ce5);
                background-image: linear-gradient(#472A6B, #386076 60%, #020F17);
                background-repeat: no-repeat;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff54b4eb', endColorstr='#ff1d9ce5', GradientType=0);
                border-bottom: 1px solid #FFFFFF;
                filter: none;
                -webkit-box-shadow: 0 1px 10px rgba(0,0,0,0.1);
                box-shadow: 0 1px 10px rgba(0,0,0,0.1);
            }
            .navbar-default {
                background-color: #324049;
                border-color: #1E5574;
            }
            .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
                color: #ffffff;
                background-color: #0070B0;
        </style>