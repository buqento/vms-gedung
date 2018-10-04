<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Janji Bertemu';
$this->params['breadcrumbs'][] = $this->title;

if(!empty($_GET['v'])){
    $d = $dataProviderToday;
    $f = $searchModelToday;
}else{
    $d = $dataProvider;
    $f = $searchModel; 
}
?>

    <div>
        <div class="col-md-6 text-left">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-6 text-right">
            <p>
            <br>
            <?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Data Hari Ini', ['index', 'v' => 'today'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Semua Data', ['index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    <div>

    <?= GridView::widget([
        'dataProvider' => $d,
        'filterModel' => $f,
        'summary'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'guest_name',
            // 'id_type',
            // 'id_number',
            // 'phone_number',
            //'email:email',
            //'photo',
            //'address',
            // 'visit_code',
            // [
            //     'attribute' => 'destination_id',
            //     'value' => function($data) {
            //         return $data->tenant->company_name;
            //     }
            // ],
            'dt_visit',
            'long_visit',
            'additional_info:ntext',
            //'created',          
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {approve}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [
                                    'title' => Yii::t('app', 'Detail'),
                        ]);
                    },

                    'approve' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, [
                                    'title' => Yii::t('app', 'Pesan Ruangan'),
                        ]);
                    }
                    
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = [
                            'visited/view/', 
                            'id' => $key,
                        ];
                        return $url;
                    }

                    if ($action === 'approve') {
                        $url = [
                            'pemesanan/create/', 
                            'dt' => $model->dt_visit,
                            'vc' => $model->visit_code,
                        ];
                        return $url;
                    }
                }
            ]

        ],
    ]); ?>
