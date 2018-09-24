<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DclfloorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lantai';
$this->params['breadcrumbs'][] = $this->title;
?>


    <div>
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
            'floor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

