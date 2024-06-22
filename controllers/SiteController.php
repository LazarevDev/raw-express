<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\CalcForm;
use app\models\RawTypes;
use app\models\Tonnages;
use app\models\Months;
use app\models\Prices;
use app\models\History;
use app\models\RegistrationForm;

use yii\rbac\DbManager;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    // 'logout' => ['post'],
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

    public function actionSuccess(){
        if (Yii::$app->request->isPost) {
            $user = User::findOne(Yii::$app->user->id);
            $user->success = 0;
            $user->save();

            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionSignup(){    
        $model = new RegistrationForm();
   
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            // перенаправляем пользователя на страницу успешной регистрации
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', compact('model'));
    }
   
    public function actionLogin(){
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect(['../profile']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionCalculate(){
        $model = new Prices();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && Yii::$app->request->isPjax){
            $calculation = Prices::find()
                ->select(['price'])
                ->where(['month_id' => $model->month_id])
                ->andWhere(['raw_type_id' => $model->raw_type_id])
                ->andWhere(['tonnage_id' => $model->tonnage_id])
                ->one();
            
            $calculationHistory = new History();
            $calculationHistory->user_id = Yii::$app->user->id;
            $calculationHistory->month_id = $model->month_id;
            $calculationHistory->raw_type_id = $model->raw_type_id;
            $calculationHistory->tonnage_id = $model->tonnage_id;
            $calculationHistory->price = $calculation->price;
            $calculationHistory->save();
            
            return $this->render('calculate', compact('model', 'calculation'));
        }
        return $this->render('calculate', compact('model'));
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }


}
