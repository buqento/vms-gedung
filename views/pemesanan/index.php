<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Penggunaan Ruangan';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'visit_code',
            [
                'attribute' => 'tanggal_kedatangan',
                'value' => function($data){
                    return $data->tanggal_kedatangan;
                }
            ],
            [
                'attribute' => 'jam_pemesanan',
                'value' => function($data){
                    return $data->roombook->name;
                }
            ],
            [
                'attribute' => 'long_visit_id',
                'value' => function($data) {
                    return $data->long_visit_id . ' Jam';
                }
            ],
            [
                'attribute' => 'room_id',
                'value' => function($data) {
                    return $data->room->name;
                }
            ],
            [
                'attribute' => 'karyawan_id',
                'value' => function($data) {
                    return $data->karyawan->nama;
                }
            ],
            'tujuan_pertemuan',


            // [
            //     'attribute' => 'visit_code',
            //     'value' => function($data) {
            //         return $data->pengunjung->guest_name;
            //     }
            // ],
            // 'building_id',
            // 'floor_id',
            //'created',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {approve}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [
                                    'title' => Yii::t('app', 'Detail'),
                        ]);
                    },                    
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = [
                            'pemesanan/view/', 
                            'id' => $key,
                        ];
                        return $url;
                    }

                }
            ]

        ],
    ]); ?>
</div>
