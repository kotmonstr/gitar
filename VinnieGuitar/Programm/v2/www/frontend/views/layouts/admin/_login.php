<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <title><?= Html::encode($this->title) ?></title>

        <?php
        $this->registerMetaTag(['charset' => Yii::$app->charset]); 
        // css
        $this->registerCssFile('/css/ui-jqwery/jquery-ui.css');
        $this->registerCssFile('/bootstrap3/css/bootstrap.min.css');
        $this->registerCssFile('/adminka/css/bootstrap-cerulean.min.css');
        $this->registerCssFile('/adminka/css/charisma-app.css');
        //$this->registerCssFile('/adminka/bower_components/fullcalendar/dist/fullcalendar.css');
        //$this->registerCssFile('/adminka/bower_components/fullcalendar/dist/fullcalendar.print.css');
        //$this->registerCssFile('/adminka/bower_components/chosen/chosen.min.css');
        //$this->registerCssFile('/adminka/bower_components/colorbox/example3/colorbox.css');
        $this->registerCssFile('/adminka/bower_components/responsive-tables/responsive-tables.css');
       // $this->registerCssFile('/adminka/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css');
        $this->registerCssFile('/adminka/css/jquery.noty.css');
        $this->registerCssFile('/adminka/css/noty_theme_default.css');
        $this->registerCssFile('/adminka/css/elfinder.min.css');
        $this->registerCssFile('/adminka/css/elfinder.theme.css');
        $this->registerCssFile('/adminka/css/jquery.iphone.toggle.css');
        $this->registerCssFile('/adminka/css/uploadify.css');
        //$this->registerCssFile('/adminka/css/animate.min.css'); 

        $pos = View::POS_HEAD;
        $this->registerJsFile('/js/jquery.js', [ 'position' => $pos]);
        $this->registerJsFile('/js/jquery-ui.js', ['position' => $pos]);
        $this->registerJsFile('/bootstrap3/js/bootstrap.min.js', ['position' => $pos]);  
        //$this->registerJsFile('/adminka/js/jquery.cookie.js', ['position' => $pos]);
        //$this->registerJsFile('/adminka/bower_components/moment/min/moment.min.js',  ['position' => $pos]);
        //$this->registerJsFile('/adminka/bower_components/fullcalendar/dist/fullcalendar.min.js',  ['position' => $pos]);
        //$this->registerJsFile('/adminka/js/jquery.dataTables.min.js',  ['position' => $pos]);
        //$this->registerJsFile('/adminka/bower_components/chosen/chosen.jquery.min.js',  ['position' => $pos]);
        //$this->registerJsFile('/adminka/bower_components/colorbox/jquery.colorbox-min.js', ['position' => $pos]);
        $this->registerJsFile('/adminka/bower_components/responsive-tables/responsive-tables.js',  ['position' => $pos]);
        //$this->registerJsFile('/adminka/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js',  ['position' => $pos]);
        $this->registerJsFile('/adminka/js/jquery.raty.min.js',  ['position' => $pos]);
        $this->registerJsFile('/adminka/js/jquery.iphone.toggle.js',  ['position' => $pos]);
        $this->registerJsFile('/adminka/js/jquery.autogrow-textarea.js',  ['position' => $pos]);
        //$this->registerJsFile('/adminka/js/jquery.history.js',  ['position' => $pos]);
        $this->registerJsFile('/adminka/js/charisma.js',  ['position' => $pos]);     
        ?>

        <?php $this->head() ?>
    </head>
    <body>
        <div class="center960">  
                <?php $this->beginBody() ?>        
                <?= $content ?>
                <?php $this->endBody() ?>        
                <?php $this->endPage() ?> 
        </div>
    </body>
</html>