<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
$this->title = $model->visit_code;
$this->params['breadcrumbs'][] = ['label' => 'Pesan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <div>
    <h3>Info Pertemuan</h3>
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'tanggal_kedatangan',
                [
                    'attribute' => 'karyawan_id',
                    'value' => function($data) {
                        return $data->karyawan->nama;
                    }
                ],
                'tujuan_pertemuan',
                // 'tanggal_kedatangan',
                [
                    'attribute' => 'long_visit_id',
                    'value' => function($data) {
                        return $data->longvisit->title;
                    }
                ],
                [
                    'attribute' => 'Lokasi Pertemuan',
                    'value' => function($data) {
                        return $data->building->name .' / '.$data->lantai->floor.' / '.$data->room->title;
                    }
                ],
                // 'created',
            ],
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= DetailView::widget([
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
                [
                    'attribute' => 'Email',
                    'value' => function($data) {
                        return $data->pengunjung->email;
                    }
                ],
            ],
        ]) ?>
    </div>
    </div>
    
    <div>
    <div class="col-md-6">
    <h3>Info penggunaan ruangan</h3>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'jam',
                'visit_code',
                'room_id',
            ]
        ]); ?>
    </div>
    </div>

</div>
