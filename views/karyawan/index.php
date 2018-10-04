<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Host';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <p>
    <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'tenant_id',
            'nama',
            'email:email',
            'telepon',
            'jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
