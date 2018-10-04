<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Visited */

$this->title = $model->visit_code;
$this->params['breadcrumbs'][] = ['label' => 'Kunjungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-view">

<?php 
$detail = 
'
<div class="col-md-4">
<img class="img-thumbnail" src="'.$model->photo.'">
</div>
<div class="col-md-8">
<h1>#'.$model->visit_code.'</h1>'.
DetailView::widget([
    'model' => $model,
    'attributes' => [
        // 'id',
        'guest_name',
        [
            'attribute' => 'type_id',
            'value' => function($data) {
                return $data->type->title;
            }
        ],
        'id_number',
        'gender',
        'phone_number',
        'email:email',
        'address',
        'dt_visit:datetime',
        'long_visit',
        'additional_info:ntext',
        // 'created',
    ],
])
."</div>";


$log = GridView::widget([
        'dataProvider' => $dataProvider,
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

<?php
echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'Detail Kunjungan',
            'content' => $detail,
            'active' => true
        ],
        [
            'label' => 'Log Kunjungan',
            'content' => $log,
            // 'headerOptions' => ['style'=>'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ],
        
    ],
]);
?>




</div>
