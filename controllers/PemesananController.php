<?php

namespace app\controllers;

use Yii;
use app\models\Pemesanan;
use app\models\DclFloor;
use app\models\DclRoom;
use app\models\Visited;
use app\models\DclRoombook;
use app\models\DclHour;
use app\models\PemesananSearch;
use app\models\UserLog;
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

        $user = UserLog::find();
        $dataLog = new ActiveDataProvider([
            'query' => $user,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);


        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'dataLog' => $dataLog
        ]);
    }

    public function actionCreate()
    {
        $detail = Visited::findOne($_GET['id']);
        $model = new Pemesanan();
        $model->tenant_id = Yii::$app->user->identity->tenant_id;
        $post = Yii::$app->request->post('Pemesanan');
        $model->visit_code = $detail->visit_code;
        $dt_visit = strtotime($detail->dt_visit);
        $model->tanggal_kedatangan = date('Y-m-d', $dt_visit);
        $model->tujuan_pertemuan = $detail->additional_info;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->updateStatus($post['visit_code']);
            $this->updateRoomStatus($post['jam_pemesanan'], $post['room_id'], $post['visit_code'], $post['long_visit_id']);
            return $this->redirect(['view', 'id' => $model->id]);
            // Yii::$app->session->setFlash('success', "Berhasil memesan ruangan.");
        }

        return $this->render('create', [
            'model' => $model,
            'detail' => $detail
        ]);
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

    public function updateStatus($visit_code)
    {
        Yii::$app->db->createCommand('UPDATE visited SET status=1 WHERE visit_code="'.$visit_code.'"')
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
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

    public function actionBook() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $roombook_id = $parents[0];
                $tanggal = empty($parents[1]) ? null : $parents[1];
                $out = DclRoombook::getRoombookList($roombook_id, $tanggal); 
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

    public function actionLongvisit() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $jam_pertemuan = empty($parents[0]) ? null : $parents[0];
                $room_id = empty($parents[1]) ? null : $parents[1];
                $tanggal = empty($parents[2]) ? null : $parents[2];
                //Ketersediaan durasi jam kunjungan
                $availables = Yii::$app->db
                    ->createCommand('SELECT availjam("'.$jam_pertemuan.'", "'.$room_id.'", "'.$tanggal.'") AS avail')
                    ->queryScalar();
                // for($i = 0; $i <= $availables; $i++){
                // $out[$i] = $i;
                // }
                $out = DclHour::getAvailableList($availables);
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }
    
}
