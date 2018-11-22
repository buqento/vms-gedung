<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Visited */

$this->title = 'Detail Janji Bertemu';
// $this->params['breadcrumbs'][] = ['label' => 'Kunjungan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-view">
<?php 
$detail = 
'
<div class="col-md-4">
<img class="img-thumbnail" src="'.$model->photo.'">
</div>
<div class="col-md-8">
<p>'.Html::a('<span class="glyphicon glyphicon-plus"></span> Pesan Ruangan', ['pemesanan/create', 'id' => $model->id], ['class' => 'btn-sm btn-success']).'</p>'.
DetailView::widget([
    'model' => $model,
    'attributes' => [
        // 'id',
        'visit_code',
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
        'email',
        'address',
        'dt_visit',
        'long_visit',
        'host',
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
