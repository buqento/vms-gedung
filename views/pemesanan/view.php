<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
$this->title = $model->visit_code;
$this->params['breadcrumbs'][] = ['label' => 'Penggunaan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <div class="col-md-6">
    <h3>Informasi pertemuan</h3>
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
                // [
                //     'attribute' => 'long_visit_id',
                //     'value' => function($data) {
                //         return $data->longvisit->title;
                //     }
                // ],
                [
                    'attribute' => 'Lokasi Pertemuan',
                    'value' => function($data) {
                        return $data->building->name .' / '.$data->lantai->name.' / '.$data->room->name;
                    }
                ],
                // 'created',
            ],
        ]) ?>
        </div>
<div class="col-md-6">

    <h3>Informasi pengunjung</h3>

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
            ],
        ]) ?>
</div>
<div class="col-md-6">
    <h3>Informasi jam penggunaan ruangan</h3>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'visit_code',
                // 'room_id',
            ]
        ]); ?>
</div>

</div>
