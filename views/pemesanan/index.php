<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Informasi Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'tanggal_kedatangan',
                'value' => function($data){
                    return $data->tanggal_kedatangan.' / '. $data->roombook->jam;
                }
            ],
            [
                'attribute' => 'room_id',
                'value' => function($data) {
                    return $data->room->title;
                }
            ],
            [
                'attribute' => 'karyawan_id',
                'value' => function($data) {
                    return $data->karyawan->nama;
                }
            ],
            'tujuan_pertemuan',
            [
                'attribute' => 'long_visit_id',
                'value' => function($data) {
                    return $data->longvisit->title;
                }
            ],

            // [
            //     'attribute' => 'visit_code',
            //     'value' => function($data) {
            //         return $data->pengunjung->guest_name;
            //     }
            // ],
            //'building_id',
            //'floor_id',
            //'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
