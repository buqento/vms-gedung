<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DclfloorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lantai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dclfloor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'floor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
