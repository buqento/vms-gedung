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

    public function actionIndex()
    {
        $searchModel = new DcldestinationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

// Smart City
// Software Engineering
// Human Resource & GA
// Mahapatih
// Solution
// Advertising Agency
// Creative
// Finance
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
            $model->upload();
            $model->picture = $this->generateBase64($model->picture);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function generateBase64($image)
    {
        $path = 'images/' . $image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        unlink(Yii::$app->basePath . '/web/' . $path);
        return $base64;
    }

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
            $model->upload();
            $model->picture = $this->generateBase64($model->picture);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
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
        if (($model = Dcldestination::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
