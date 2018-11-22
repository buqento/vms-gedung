<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Janji Bertemu';
// $this->params['breadcrumbs'][] = $this->title;

if(!empty($_GET['v'])){
    $d = $dataProviderToday;
    $f = $searchModelToday;
}else{
    $d = $dataProvider;
    $f = $searchModel; 
}
?>

<p>
<?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Hari ini', ['index', 'v' => 'today'], ['class' => 'btn-sm btn-info']) ?>&nbsp;
<?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Semua', ['index'], ['class' => 'btn-sm btn-info']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $d,
    // 'filterModel' => $f,
    'summary'=>false,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        // 'id',
        'dt_visit',
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
        'host',
        'additional_info:ntext',
        [
            'attribute' => 'status',
            'value' => 
                function($data)
                    {
                        switch ($data->status) {
                            case 1:
                                $vStatus = 'Disetujui';
                                break;
                            case 2:
                                $vStatus = 'Ditolak';
                                break;
                            
                            default:
                                $vStatus = 'Pending';
                                break;
                        }
                        return $vStatus;
                    }
        ], 

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
                        'id'=> $key,
                    ];
                    return $url;
                }
            }
        ]

    ],
]); ?>