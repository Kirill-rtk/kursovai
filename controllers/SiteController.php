<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\LookLectureForm;
use app\models\zapForm;
use app\models\lookForm;
use app\models\Country;
use yii\web\UploadedFile;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
//aaaaaaa
    public function actionZap()
    {
         $model = new ZapForm(); 
        if (\Yii::$app->request->post()  ){
         
        $id->id;         
        $model->prepod_name = Yii::$app->request->post('zapForm')['prepod_name'];
        $model->lecture = Yii::$app->request->post('zapForm')['lecture'];
        $model->file = Yii::$app->request->post('zapForm')['file'];
        $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image) {
      $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload/manufacturers/';
      $model->setAttribute('image', 'myFileName.' . $model->image->getExtension());
    }
        
        
        $model->save(false);
    }
        return $this->render('zap.php',['model'=>$model]);
      
    }


    public function actionLook()
    {
        $model  = ZapForm::find()->all();
       return $this->render('look.php',['model'=>$model]);
    }

    public function actionLect($id)
    {
        $model  = ZapForm::findOne(['id' => $id]);

       return $this->render('lect.php',['model'=>$model]);
    }
}
