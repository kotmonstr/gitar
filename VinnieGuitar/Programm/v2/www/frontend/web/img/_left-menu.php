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
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">
                    </div>
                   <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 10 ){ ?>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li class="<?php if($curr_url === 'admin/index'){echo "active";}?>" ><a class="ajax-link" href="<?= Url::toRoute('/admin/index'); ?>"><i class="glyphicon glyphicon-home"></i><span>&nbsp;Главная</span></a></li>
                        <li  class="<?php if($curr_url == 'admin/index-page' || $curr_url == 'create-page' || $curr_url == 'view-page'){echo "active";}?>"><a class="ajax-link" href="<?= Url::toRoute('/admin/index-page'); ?>"><span class="glyphicon glyphicon-list-alt"></span><span>&nbsp;Страницы</span></a></li>
                        <li  class="<?php if($controller == 'games'){echo "active";}?>"><a class="ajax-link" href="<?= Url::toRoute('/games/index'); ?>"><span class="glyphicon glyphicon-picture"></span><span>&nbsp;Игры</span></a></li>
                        <li  class="<?php if($controller  == 'profile'){echo "active";}?>"><a class="ajax-link" href="<?= Url::toRoute('/profile/index'); ?>"><span class="glyphicon glyphicon-user"></span><span>&nbsp;Игроки</span></a></li>

                        <li  class="<?php if($controller == 'finance'){echo "active";}?>"><a class="ajax-link" href="<?= Url::toRoute('/finance/index'); ?>"><span class="glyphicon glyphicon-usd"></span><span>&nbsp;Финансы</span></a></li>
                        <li  class="<?php if($controller == 'setup'){echo "active";}?>"><a class="ajax-link" href="<?= Url::toRoute('/setup/index'); ?>"><span class="glyphicon glyphicon-wrench"></span><span>&nbsp;Настройки</span></a></li>

                        <li><a data-toggle="modal" data-target="#myModal" class="ajax-link" href="#"><span class="glyphicon glyphicon-refresh"></span><span>&nbsp;Удалить кеш</span></a></li>
                    </ul>
                   <?php } ?>
                </div>
            </div>
        </div>
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
        <div class="modal fade" id="myModalCoordinat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="border-radius: 15px">
            <div class="modal-dialog"style="border-radius: 15px!important" >
                <div class="modal-content" style="border-radius: 15px!important">
                    <div class="modal-header" style="background-color: #D7E4F3;" >
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Обновить координаты</h4>
                    </div>
                    <div class="modal-body" style="min-height:100px">
                        <center>
                            <h3 class="text-warning-reload">Вы уверены что хотите Обновить координаты?</h3>
                            <h5>Это может занять несколько минут</h5>
                        </center>
                    </div>
                    <div class="modal-footer" style="background-color: #D7E4F3;">
                        <a class="btn btn-danger go" href="<?= Url::toRoute(['/coordinat/reload']) ?>" style="color:white" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cloud-upload" style="color:red"></span> ОБновить</a>
                        <a class="btn btn-default" type="button" class="btn btn-default" data-dismiss="modal">Отмена</a>
                        <div class="progress" style="margin-top: 15px;border-radius: 10px 10px;display:none">
                            <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                <span class="sr-only">100% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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