<?php

namespace frontend\controllers;

use frontend\models\Email;
use frontend\models\Order;
use frontend\models\OrderSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    public $layout = '/adminka';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //       vd($dataProvider);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubmit()
    {
        $model = new Order;
        $model->scenario = 'submit';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            //ToDo отправка сообщения по почте
            $model_Email = Email::find()->where(['id' => 1])->one();
            $currEmail = $model_Email->email;

            if ($model->save()) {
                Yii::$app->mailer->compose(['html' => 'order'], ['model' => $model])
                    ->setFrom($model->email)
                    ->setTo($currEmail)
                    ->setSubject('CОБЩЕНИЕ VinnieGuitar - Новый заказ')
                    ->setTextBody('<b>HTML content</b>')
                    ->send();

                Yii::$app->getSession()->setFlash('success','Ваш заказ принят!');
                return $this->redirect(\Yii::$app->request->getReferrer());
            } else {
                Yii::$app->getSession()->setFlash('error','Ошибка . Ваш заказ не принят!');
                // либо страница отображается первый раз, либо есть ошибка в данных
                return $this->redirect(\Yii::$app->request->getReferrer());
            }
        }
    }
}