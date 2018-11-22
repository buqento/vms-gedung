<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
$this->title = 'Detail Penggunaan Ruangan';
// $this->params['breadcrumbs'][] = ['label' => 'Penggunaan Ruangan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <div class="col-md-6">

        <?= 
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                [
                    'attribute' => 'Nama Pengunjung',
                    'value' => function($data) {
                        return $data->pengunjung->guest_name;
                    }
                ],
                [
                    'attribute' => 'Nomor Identitas',
                    'value' => function($data) {
                        return $data->pengunjung->id_number;
                    }
                ],
                [
                    'attribute' => 'Jenis Kelamin',
                    'value' => function($data) {
                        return $data->pengunjung->gender;
                    }
                ],
                [
                    'attribute' => 'Nomor Telepon',
                    'value' => function($data) {
                        return $data->pengunjung->phone_number;
                    }
                ],
            ],
        ]) 
        ?>

        <?= 
        GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'dtbook',
                'name',
                [
                    'attribute' => 'room_id',
                    'value' => function($data) {
                        return $data->room->name;
                    }
                ],
            ]
        ]); 
        ?>

            <?php // DetailView::widget([
                // 'model' => $model,
                // 'attributes' => [
                //     // 'id',
                    // 'visit_code',
                    // 'tanggal_kedatangan',
                    // [
                    //     'attribute' => 'karyawan_id',
                    //     'value' => function($data) {
                    //         return $data->karyawan->nama;
                    //     }
                    // ],
                    // 'tujuan_pertemuan',
                    // 'tanggal_kedatangan',
                    // [
                    //     'attribute' => 'long_visit_id',
                    //     'value' => function($data) {
                    //         return $data->longvisit->title;
                    //     }
                    // ],
                    // 'room_id',
                    // [
                    //     'attribute' => 'Lokasi Pertemuan',
                    //     'value' => function($data) {
                    //         return $data->room->name;
                    //     }
                    // ],
                    // 'created',
            //   ],
        // ]) ?>

    </div>

    <div class="col-md-6">

    <h4>Log Kunjungan</h4>
    <?=
    GridView::widget([
        'dataProvider' => $dataLog,
        'summary'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'visit_code',
            'gate',
            'time_pass',
            'status'
        ],
    ]); 
    ?>
    </div>

</div>