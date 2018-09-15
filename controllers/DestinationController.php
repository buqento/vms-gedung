<?php

namespace app\controllers;

use Yii;
use app\models\Destination;
use app\models\DestinationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DestinationController implements the CRUD actions for Destination model.
 */
class DestinationController extends Controller
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
     * Lists all Destination models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DestinationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Destination model.
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
     * Creates a new Destination model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Destination();

        $post = Yii::$app->request->post('Destination');
        if (Yii::$app->request->isPost) {
            $model->company_name = $post['company_name'];
            $model->open_hour = $post['open_hour'];
            $model->close_hour = $post['close_hour'];
            $model->build_name = $post['build_name'];
            $model->floor = $post['floor'];
            $model->phone = $post['phone'];
            $model->email = $post['email'];
            $model->profile = $post['profile'];
            $model->address = $post['address'];
            $model->picture = UploadedFile::getInstance($model, 'picture');  
            if($model->save() && $model->upload()){
                return $this->redirect(['view', 'id' => $model->id]);             
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Destination model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        $post = Yii::$app->request->post('Destination');
        if (Yii::$app->request->isPost) {
            $model->company_name = $post['company_name'];
            $model->open_hour = $post['open_hour'];
            $model->close_hour = $post['close_hour'];
            $model->build_name = $post['build_name'];
            $model->floor = $post['floor'];
            $model->phone = $post['phone'];
            $model->email = $post['email'];
            $model->profile = $post['profile'];
            $model->address = $post['address'];
            $model->picture = UploadedFile::getInstance($model, 'picture');  
            if($model->save() && $model->upload()){
                return $this->redirect(['view', 'id' => $model->id]);             
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Destination model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Destination model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Destination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Destination::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
