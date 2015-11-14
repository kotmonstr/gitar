<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class AdminController extends Controller
{
    public $layout= '/adminka';

    public function actionIndex()
    {
        if(yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }
        //vd(1);
        return $this->render('index');
    }




}
