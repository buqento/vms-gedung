<?php

namespace app\controllers;

use Yii;
use app\models\DclDestination;
use app\models\DcldestinationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * DcldestinationController implements the CRUD actions for Dcldestination model.
 */
class DcldestinationController extends Controller
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
     * Lists all Dcldestination models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DcldestinationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dcldestination model.
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
     * Creates a new Dcldestination model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DclDestination();

        $post = Yii::$app->request->post('DclDestination');
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
     * Updates an existing Dcldestination model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post('DclDestination');
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
     * Deletes an existing Dcldestination model.
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
     * Finds the Dcldestination model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dcldestination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dcldestination::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
