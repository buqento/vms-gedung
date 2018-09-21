<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DcldestinationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tenant';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row">
        <div class="col-md-6 text-left">
            <h3>
            <?= Html::encode($this->title) ?> 
            <span class="glyphicon glyphicon glyphicon-menu-right"></span>
            <small class="text-muted">Daftar</small>
            </h3>
        </div>
        <div class="col-md-6 text-right">
            <p>
            <br>
            <?= Html::a('Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    <div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'company_name',
            'open_hour',
            'close_hour',
            // 'build_name',
            // 'floor',
            //'phone',
            //'email:email',
            //'profile:ntext',
            //'picture',
            //'address:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
