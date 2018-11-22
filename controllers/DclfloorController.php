<?php

namespace app\controllers;

use Yii;
use app\models\Dclfloor;
use app\models\DclDestination;
use app\models\DclfloorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DclfloorController implements the CRUD actions for Dclfloor model.
 */
class DclfloorController extends Controller
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
     * Lists all Dclfloor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DclfloorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dclfloor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dclfloor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$model = new Dclfloor();


        $data = [ 
                    ''['name' => 'nama 1', 'building_id' => 'gedung 1'],
                    ['name' => 'nama 2', 'building_id' => 'gedung 2']
                ];

        // $data = [
        //             '_csrf' => getcs
        //             'DclFloor'=>[
        //                 'name' => 'Nama X',
        //                 'building_id' => 'Gedung' 
        //             ]
        //         ];

        foreach ($data as $value) {
            $model = new Dclfloor();
            foreach ( $value as $key => $v) {
                $model->$key = $v;
            }
            if ($model->validate()){
                $model->save();
            }
            
        }
        // $model = new Dclfloor();
        // $model->load($data);
        // $model->save();



        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
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
        if (($model = Dclfloor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
