<?php
namespace frontend\controllers;

use common\models\LoginForm;
use frontend\models\Category;
use frontend\models\ContactForm;
use frontend\models\Items;
use frontend\models\News;
use frontend\models\Pages;
use frontend\models\PasswordResetRequestForm;
use frontend\models\Photo;
use frontend\models\ResetPasswordForm;
use frontend\models\Review;
use frontend\models\SignupForm;
use frontend\models\Social;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                // 'fontFile' => 'font/cour.ttf',
                'backColor' => 0xffffff, //цвет фона капчи
                'testLimit' => 0, //сколько раз капча не меняется
                'transparent' => false,
                //'foreColor'=>0xE16020, //цвет символов
                // задаем какой величины будет генерируемый код
                'maxLength' => 5,
                'minLength' => 3,
                'width' => 100,
                'height' => 60,
                'offset' => 2,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'out_of_modal';
        $modelNews = News::getlastNews(8);
        $modelItems = Items::getItemsByCatId(1);
        $modelCategiry = Category::find()->limit(4)->asArray()->all();
        return $this->render('index', [
            'modelCategiry' => $modelCategiry,
            'modelItems'=> $modelItems,
            'modelNews'=> $modelNews
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

//    public function actionSetup()
//    {
//        return $this->redirect('/admin/index');
//        return $this->render('about');
//    }

    public function actionNews()
    {
        $model = News::find()->orderBy('created_at DESC')->all();
        return $this->render('news', ['model' => $model]);
    }

    public function actionNewsDetail($id)
    {
        $modelSocial = Social::findOne(1);
        $model = News::findOne($id);
        return $this->render('news-detail', ['model' => $model, 'modelSocial' => $modelSocial]);
    }

    public function actionReview()
    {

        $modelReview = Review::find()->orderBy('created_at DESC')->all();;
        $model = new Review();
        return $this->render('review', ['model' => $model, 'modelReview' => $modelReview]);
    }

    public function actionCatalog()
    {
        $cat = Yii::$app->request->get('cat') ? Yii::$app->request->get('cat') : '1';
        $ItemsModel = Items::find()->where(['cat_id' => $cat])->all();
        $modelCategiry = Category::find()->limit(4)->asArray()->all();
        //vd($modelCategiry);
        return $this->render('catalog', ['modelCategiry' => $modelCategiry, 'cat' => $cat, 'ItemsModel' => $ItemsModel]);
    }

    public function actionCatalogDetail()
    {
        $modelSocial = Social::findOne(1);
        $modelCategiry = Category::find()->limit(4)->asArray()->all();
        $item_id = Yii::$app->request->get('item');
        $itemsModel = Items::findOne($item_id);
        $cat = $itemsModel->cat_id;
        $photosModel = Photo::getPhotos($item_id, 5);
        return $this->render('catalog-detail',
            [
                'itemsModel' => $itemsModel,
                'modelCategiry' => $modelCategiry,
                'cat' => $cat,
                'photosModel' => $photosModel,
                'modelSocial' => $modelSocial
            ]);
    }

    public function actionGalary()
    {
        //$modelPhoto = Photo::find()->all();
        $modelPhoto = Items::find()->where('main_image <> 0')->all();
        return $this->render('galary2', ['modelPhoto' => $modelPhoto]);
    }

    public function actionLogin()
    {
        $this->layout = '/login';
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/admin/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin/index');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin/index');
    }

    public function actionContact()
    {
        return $this->redirect('/admin/index');
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    public function actionSignup()
    {
        return $this->redirect('/admin/index');
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        return $this->redirect('/admin/index');
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    // Кропнутые фотки
    function getImage($imageId)
    {
        $imageName = Photo::find()->where(['items_id' => $imageId])->one();
        return $imageName ? '/upload/items_images_crop/' . $imageName->name : '/image/default.jpg';
    }

    // Кропнутые  длинные фотки
    function getImageCropLong($imageId)
    {
        $imageName = Photo::find()->where(['items_id' => $imageId])->one();
        return $imageName ? '/upload/items_images_crop_long/' . $imageName->name : '/image/default.jpg';
    }

    // Оригинальные фотки
    function getImageOriginal($imageId)
    {
        $imageName = Photo::find()->where(['items_id' => $imageId])->one();
        return $imageName ? '/upload/items_images/' . $imageName->name : '/image/default.jpg';
    }

    // Оригинальные фотки
    function getImageMain($imageId)
    {
        $imageName = Items::findOne($imageId);
        return $imageName->main_image ? '/upload/items_images_main/' . $imageName->main_image : '/image/default.jpg';
    }


    /**
     * Страница с ошибкой
     */
    public function actionError()
    {
        //vd(1);
        $this->layout = 'error';
        $errorHandler = Yii::$app->errorHandler->exception;

        $error = [];
        $error['code'] = $errorHandler->getCode() ? $errorHandler->getCode() : 404;
        $error['message'] = $errorHandler->getMessage();

        //vd($error);
        if ($error['code'] == 403) {
            echo $this->renderPartial('error403', ['error' => $error]);
        } elseif ($error['code'] == 404) {
            return $this->render('error404', ['error' => $error]);
        } else {
            return $this->render('error', ['error' => $error]);
        }
    }

    // редерит дополнительные страницы
    public function actionShow()
    {
        $id = Yii::$app->request->get('id');
        $model = Pages::findOne($id);

        return $this->render('blank', ['model' => $model]);
    }

}
