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
use app\models\Karyawan;
use app\models\ViewVisit;
use app\models\UserApp;
use app\models\Visited;
use app\models\SummaryVisit;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{

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

    public function actionIndex()
    {

        $karyawan = Karyawan::find()
            ->where(['tenant_id' => Yii::$app->user->identity->tenant_id])
            ->count();
        $visited = Visited::find()
            // ->where(['status' => Visited::STATUS_ACTIVE]);
            ->where([
                'destination_id' => Yii::$app->user->identity->tenant_id,
                'status' => 0
                ])
            ->count();

        //view table
        $query = SummaryVisit::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //view graphic
        $rows = 0;
        $query = "
        SELECT 
            visited.destination_id, 
            dcl_destination.company_name, 
            COUNT(visited.id) AS jumlah FROM visited
        INNER JOIN dcl_destination 
        ON visited.destination_id = dcl_destination.id
        GROUP BY visited.destination_id
        ORDER BY dcl_destination.company_name
        ";
        $model = Yii::$app->db->createCommand($query);
        $lines = $model->queryAll();
        $label = array();
        $data = array();
        foreach ($lines as $line) {
            $label[] = $line['company_name'];
            $data[] = $line['jumlah'];
            $rows += 1;
        }
        $label = array_slice($label, 0, 20);
        $data = array_slice($data, 0, 20);

        return $this->render('index', [
            'karyawan' => $karyawan,
            'visited' => $visited,
            'dataProvider' => $dataProvider,
            'label' => $label,
            'data' => $data
        ]);
    }

    public function getTenant()
    {
        return $this->hasOne(DclDestination::className(), ['id' => 'destination_id']);
    }

    public function getDestination($id)
    {
        $destination = Yii::$app->db->createCommand('SELECT company_name FROM dcl_destination WHERE id=$id')->queryAll();
        // $destination = DclDestination::find()->where(['id' => $id])->one();
        return $destination;
    }


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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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
