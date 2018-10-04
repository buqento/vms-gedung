<?php

namespace app\controllers;

use Yii;
use app\models\Pemesanan;
use app\models\DclFloor;
use app\models\DclRoom;
use app\models\Visited;
use app\models\DclRoombook;
use app\models\PemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class PemesananController extends Controller
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
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => DclRoombook::find()->where(['visit_code' => $model->visit_code]),
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Pemesanan();
        $detail = Visited::find()->where(['visit_code' => $_GET['vc']]);

        $model->tenant_id = Yii::$app->user->identity->tenant_id;
        $post = Yii::$app->request->post('Pemesanan');

        if(isset($_GET['dt'])){
            $model->tanggal_kedatangan = $_GET['dt'];
        }
        if(isset($_GET['vc'])){
            $model->visit_code = $_GET['vc'];
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->updateStatus($post['visit_code']);
            $this->updateRoomStatus($post['jam_pemesanan'], $post['room_id'], $post['visit_code'], $post['long_visit_id']);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'detail' => $detail
        ]);
    }

    public function updateStatus($visit_code)
    {
        Yii::$app->db->createCommand('UPDATE visited SET status=1 WHERE visit_code="'.$visit_code.'"')
            // ->update('visited', ['status' => 1])
            // ->where(['visit_code' => $visit_code])
            ->execute();
    }

    public function updateRoomStatus($jam, $room_id, $visit_code, $long_visit)
    {
        $sampai = $long_visit + $jam;
        for($i = $jam; $i < $sampai; $i++)
        {
            $query = 'UPDATE dcl_room_book SET status=1, visit_code="'.$visit_code.'" WHERE id="'.$i.'" AND room_id="'.$room_id.'"';
            Yii::$app->db->createCommand($query)->execute();
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->tenant_id = Yii::$app->user->identity->tenant_id;

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
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findDetail($visit_code)
    {
        if (($detail = Pemesanan::find()->where(['visit_code' => $visit_code])->all()) !== null) {
            return $detail;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFloor() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $floor_id = $parents[0];
                $out = DclFloor::getFloorList($floor_id); 
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

    public function actionRoom() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $room_id = $parents[0];
                $out = DclRoom::getRoomList($room_id); 
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
            // if (!empty($parents)) {
            //     $cat_id = (!empty($parents[0])) ? $parents[0] : null;
            //     $subcat_id = (!empty($parents[1])) ? $parents[1] : null;
            //     if($cat_id !== null && $subcat_id !== null){
            //         $out = DclRoom::getRoomList($cat_id); 
            //         return json_encode(['output'=>$out, 'selected'=>'']);
            //     }
            // }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

    public function actionBook() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $roombook_id = $parents[0];
                $out = DclRoombook::getRoombookList($roombook_id); 
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }
}