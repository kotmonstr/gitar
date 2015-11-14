<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\FileHelper;


class CashController extends Controller {

   public $layout = 'adminka';

    public function actionClear() {
      
        defined('DS') or define('DS', DIRECTORY_SEPARATOR);
        defined('ROOT_DIR') or define('ROOT_DIR', dirname(dirname(__DIR__)));
        //Yii::setAlias('runtime',  . DS . 'runtime');
        //vd(Yii::getAlias('@runtime'));
        
        $assetsDir = Yii::getAlias('@runtime');
        //vd($assetsDir);
        $dirs = glob($assetsDir . DS . '*', GLOB_ONLYDIR);
        //vd($dirs);
        if (is_array($dirs)) {
            foreach ($dirs as $dir) {
                FileHelper::removeDirectory($dir);
            }
        }
       Yii::$app->session->setFlash('success', 'Кеш успешно удален!');   
       return $this->redirect('/admin/index');
    }

}
