<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisitedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kunjungan';
$this->params['breadcrumbs'][] = $this->title;

if(!empty($_GET['v'])){
    $d = $dataProviderToday;
    $f = $searchModelToday;
}else{
    $d = $dataProvider;
    $f = $searchModel; 
}
?>
<div class="container">

    <div class="row">
        <div class="col-md-6 text-left">
            <h3>
            <?= Html::encode($this->title) ?> 
            <span class="glyphicon glyphicon glyphicon-menu-right"></span>
            <small class="text-muted">daftar</small>
            </h3>
        </div>
        <div class="col-md-6 text-right">
            <p>
            <br>
            <?= Html::a('Hari ini', ['index', 'v' => 'today'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Semua', ['index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    <div>

    <?= GridView::widget([
        'dataProvider' => $d,
        'filterModel' => $f,
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
            'visit_code',
            'destination',
            'dt_visit',
            // 'long_visit',
            // 'additional_info:ntext',
            //'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'summary'=>'',
    ]); ?>
</div>
