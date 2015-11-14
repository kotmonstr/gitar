<?php

namespace frontend\controllers;

use frontend\models\Items;
use frontend\models\ItemsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use frontend\models\Photo;
use yii\base;
/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller
{
    public $layout = "adminka";

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
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
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
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Items();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $files = Yii::$app->request->post('Items')['files'];
            // если есть картинки
            if ($files) {
                $result = explode(",", $files);
                //vd($result);
                foreach($result as $key => $photo){
                    $_model = new Photo;
                    $_model->name = $photo;
                    $_model->items_id = $model->id;
                    //$_model->validate();
                    //vd($_model->getErrors());
                    $_model->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $files = Yii::$app->request->post('Items')['files'];
            // если есть картинки
            if ($files) {
                $result = explode(",", $files);
                //vd($result);
                foreach($result as $key => $photo){
                    $_model = new Photo;
                    $_model->name = $photo;
                    $_model->items_id = $model->id;
                    $_model->validate();
                    //vd($_model->getErrors());
                    $_model->save();
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Items model.
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
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // загрузка фотографий
    public function actionUploadImages()
    {
        $i = 0;
        $time = time();
        $Result = '';

        $model = new Items();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'file');
            //создать папку
            if ($model->file && $model->file != '') {
                $uploaddir = Yii::getAlias('@frontend') . '/web/upload/items_images';
                FileHelper::createDirectory($uploaddir);
                //$model->validate();
                //vd($model->getErrors());
                if ($model->file) {
                    foreach ($model->file as $file) {
                        $i++;
                        if($file->type == 'image/jpeg') {
                            if($file->saveAs($uploaddir . '/' . $time . $i . '.' . $file->extension)){

                                $originalPath = $uploaddir . '/' . $time . $i . '.' . $file->extension;
                                $thumbPath = Yii::getAlias('@frontend') . '/web/upload/items_images_crop' . '/' . $time . $i . '.' . $file->extension;
                                $this->img_resize($originalPath,$thumbPath,300,300);

                                // кроп узкие картинки
                                $thumbPath = Yii::getAlias('@frontend') . '/web/upload/items_images_crop_long' . '/' . $time . $i . '.' . $file->extension;
                                $this->img_resize($originalPath,$thumbPath,490,150);


                            }
                            $Result .= $i < count($model->file) ? $time . $i . '.' . $file->extension . ',' : $time . $i . '.' . $file->extension;



                        }
                    }
                }
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $Result;
            }
        }
    }

     // загрузка главной фотографии
    public function actionUploadImageMain()
    {
        $i = 0;
        $time = time();
        $Result = [];

        $model = new Items();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            //создать папку
            if ($model->file && $model->file != '') {
                $uploaddir = Yii::getAlias('@frontend') . '/web/upload/items_images_main';
                FileHelper::createDirectory($uploaddir);
                //$model->validate();
                //vd($model->getErrors());
                if ($model->file) {
                        if($model->file->type == 'image/jpeg') {
                            if($model->file->saveAs($uploaddir . '/' . $time .  '.' . $model->file->extension)){
                            $Result['name'] = $time . '.' . $model->file->extension;


                              $originalPath = $uploaddir . '/' . $time  . '.' . $model->file->extension;
//                                $thumbPath = Yii::getAlias('@frontend') . '/web/upload/main_crop_big' . '/' . $time . '.' . $model->file->extension;
//                                $this->img_resize($originalPath,$thumbPath,490,150);

                                // кроп узкие картинки
                                $thumbPath = Yii::getAlias('@frontend') . '/web/upload/main_crop_small' . '/' . $time . '.' . $model->file->extension;
                                $this->img_resize($originalPath,$thumbPath,300,300);

                            }
                    }
                }
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $Result;
            }
        }
    }

    // Удаление картинок
    public function actionDeleteImage(){
        $id = Yii::$app->request->post('id');
        $model = Photo::findOne($id);
        $model->delete();

        // найти картику и удалить
        $uploaddir = Yii::getAlias('@frontend') . '/web/upload/items_images/';
        $filename = $uploaddir . $model->name;
        if ( !(@unlink($filename)) ) die('Error Delete File.');

    }
       // Удаление главной картинки
    public function actionDeleteImageMain(){
        $id = Yii::$app->request->post('id');
        //vd($id);
        $model = Items::find()->where(['id'=> $id])->one();
        //vd($model);
        $Name = $model->main_image;
        //vd($Name);
        $model->main_image = '';
        $model->updateAttributes(['main_image']);

        // найти картику и удалить
        $uploaddir = Yii::getAlias('@frontend') . '/web/upload/items_images_main/';
        $filename = $uploaddir . $Name;
        if ( !(@unlink($filename)) ) die('Error Delete File.');

    }


    /***********************************************************************************
    Функция img_resize()
    Параметры:
    $src             - имя исходного файла
    $dest            - имя генерируемого файла
    $width, $height  - ширина и высота генерируемого изображения, в пикселях
     ***********************************************************************************/
    function img_resize($src, $dest, $width, $height)
    {

        //print_r($src);
        //exit();

        $new_left = 0;
        $new_top = 0;
        $rgb=0xFFFFFF;
        $quality=100;
        if (!file_exists($src)) return false;

        $size = getimagesize($src);  // получение размера изображения

        if ($size === false) return false;

        $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
        $icfunc = "imagecreatefrom" . $format;
        if (!function_exists($icfunc)) return false;
        if($size[0]>$width && $size[1]>$height){
            if($size[0] <= $size[1]){
                $x_crop_size = $width / $size[0];
            }else{
                $x_crop_size = $height / $size[1];
            }
        }else{
            $x_crop_size = 1;
            if($size[0] < $width){
                $new_left    = floor(($width - $size[0]) / 2);
            }
            if($size[1] < $height) {
                $new_top = floor(($height - $size[1]) / 2);
            }
        }
        $new_width = $size[0] * $x_crop_size;
        $new_height = $size[1] * $x_crop_size;


        $isrc = $icfunc($src);
        $idest = imagecreatetruecolor($width, $height);

        imagefill($idest, 0, 0, $rgb);
        imagecopyresized($idest, $isrc, $new_left, $new_top, 0, 0,
            $new_width, $new_height, $size[0], $size[1]);

        imagejpeg($idest, $dest, $quality);

        imagedestroy($isrc);
        imagedestroy($idest);

        return true;

    }
    public function actionGetItemsByCatId(){
        $id = Yii::$app->request->post('id');
        $modelItems = Items::getItemsByCatId($id);
        //vd($model);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('_get-items-by-cat-id',['modelItems'=> $modelItems]);
    }
}
