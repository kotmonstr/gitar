<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Pages;
use frontend\models\PagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\imperavi\actions\GetAction;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\web\Response;
/**
 * PageController implements the CRUD actions for Pages model.
 */
class PageController extends Controller
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
    public function actions()
    {
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => '/frontend/web/upload/imp/', // URL адрес папки куда будут загружатся изображения.
                'path' => Yii::getAlias('@frontend') . '/web/upload/imp' // Или абсолютный путь к папке куда будут загружатся изображения.
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => '/frontend/web/upload/imp/', // URL адрес папки куда будут загружатся изображения.
                //'path' => '/web/upload/imp', // Или абсолютный путь к папке куда будут загружатся изображения.
                'type' => GetAction::TYPE_IMAGES,
            ]
        ];
    }

    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pages model.
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
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pages model.
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
     * Deletes an existing Pages model.
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
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // Вернет только что загруженное фото
    public function actionUpload()
    {
        $uploaddir = Yii::getAlias('@frontend') . '/web/upload/imp/';
        $file = md5(date('YmdHis')).'.'.pathinfo(@$_FILES['file']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file(@$_FILES['file']['tmp_name'], $uploaddir.$file)) {
            $array = array(
                'filelink' => '/upload/imp/'.$file
            );
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $array;
    }

    // Вернет уже загруженные файлы
    public function actionUploaded()
    {
        $uploaddir = Yii::getAlias('@frontend') . '/web/upload/imp/';
        $arr = scandir($uploaddir);
        $i=0;
        foreach($arr as $key =>  $val){
            $i++;
            if( $i > 2 ) {
                $array['filelink' . $i]['thumb'] = '/upload/imp/' . $val;
                $array['filelink' . $i]['image'] = '/upload/imp/' . $val;
                $array['filelink' . $i]['title'] = '/upload/imp/' . $val;
            }
        }
        $array = stripslashes(json_encode($array));
        echo $array;
    }
}
