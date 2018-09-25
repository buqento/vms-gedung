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
<img class="img-thumbnail" src="../../../yiibase/web/user/photo/'.$model->photo.'">
</div>
<div class="col-md-8">
'.
DetailView::widget([
    'model' => $model,
    'attributes' => [
        // 'id',
        'guest_name',
        'id_type',
        'id_number',
        'gender',
        'phone_number',
        'email:email',
		// [
		// 	'attribute'=>'photo',
		// 	'value'=>'../../../yiibase/web/user/photo/'.$model->photo, // WEB ACCESSABLE PATH + FILENAME 
		// 	'format' => ['image',['width'=>'100','height'=>'100']],
		// ],
        // 'photo',
        'address',
        'visit_code',
        'destination',
        'dt_visit:datetime',
        'long_visit',
        'additional_info:ntext',
        'created:datetime',
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
            'checkin',
            'checkout',
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
            'label' => 'Detail Pengunjung',
            'content' => $detail,
            'active' => true
        ],
        [
            'label' => 'Log Pengunjung',
            'content' => $log,
            // 'headerOptions' => ['style'=>'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ],
        
    ],
]);
?>




</div>
