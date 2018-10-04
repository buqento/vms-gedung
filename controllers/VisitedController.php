<?php

namespace app\controllers;

use Yii;
use app\models\Visited;
use app\models\VisitedSearch;
use app\models\VisitedSearchToday;
use app\models\UserLog;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Sort;
use yii\data\ActiveDataProvider;
/**
 * VisitedController implements the CRUD actions for Visited model.
 */
class VisitedController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Visited models.
     * @return mixed
     */
    public function actionIndex()
    {            
        $searchModel = new VisitedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModelToday = new VisitedSearchToday();
        $dataProviderToday = $searchModelToday->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'searchModelToday' => $searchModelToday,
            'dataProvider' => $dataProvider,
            'dataProviderToday' => $dataProviderToday,
        ]);
    }

    public function actionView($id)
    {

        $query = UserLog::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Visited();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Visited::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
