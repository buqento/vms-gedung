<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DclDestination;
use app\models\ViewVisit;
use app\models\UserApp;
use app\models\Visited;
use yii\data\ActiveDataProvider;

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
        $tenant = DclDestination::find()->count();
        $user = UserApp::find()->count();
        $visited = Visited::find()->count();

        $a = Visited::find()
            ->where(['destination' => 'Smart City'])
            ->count();
        $b = Visited::find()
            ->where(['destination' => 'Software Engineering'])
            ->count();
        $c = Visited::find()
            ->where(['destination' => 'Human Resource & GA'])
            ->count();
        $d = Visited::find()
            ->where(['destination' => 'Mahapatih'])
            ->count();
        $e = Visited::find()
            ->where(['destination' => 'Solution'])
            ->count();
        $f = Visited::find()
            ->where(['destination' => 'Advertising Agency'])
            ->count();

        return $this->render('index', [
            'tenant' => $tenant,
            'user' => $user,
            'visited' => $visited,

            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'f' => $f
        ]);
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
    public function actionVisit()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ViewVisit::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => ['defaultOrder' => ['created' => SORT_DESC]]
        ]);

        return $this->render('visit',[
            'dataProvider' => $dataProvider,
        ]);
    }
}