<?php

namespace frontend\controllers;

use frontend\models\Message;
use frontend\models\MessageSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use frontend\models\Email;

/**
 * ReviewController implements the CRUD actions for Review model.
 */
class MessageController extends Controller
{
    public $layout = "adminka";

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post','get'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Message();
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionCreateFromUser()
    {
        $model = new Message();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->scenario = 'accept';
            $model->save();

            //$model->validate();
            //vd($model->getErrors());
            // Todo отправка ел почты
            $model_Email = Email::find()->where(['id' => 1])->one();
            $currEmail = $model_Email->email;
            //vd($model->email);

            Yii::$app->mailer->compose(['html' => 'message'], ['model' => $model])
                ->setFrom($model->email)
                ->setTo($currEmail)
                ->setSubject('CОБЩЕНИЕ VinnieGuitar - Новое сообщение')
                ->setTextBody('<b>HTML content</b>')
                ->send();


            Yii::$app->getSession()->setFlash('success', 'Ваш сообщение принято!');
            return $this->redirect('/site/index');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Ошибка! Ваш сообщениене принято!');
            return $this->redirect('/site/index', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post())) {
            // $model->validate();
            // vd($model->getErrors());
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Review model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Review the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
