<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Host';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <p>
        <?= Html::button('<span class="glyphicon glyphicon-plus"></span> Tambah Host', 
        ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']
        )?>
    </p>

    <?php
    Modal::begin([
        'header' => '<h4>Tambah Host</h4>',
        'id' => 'modal',
        'size' => 'modal-sm',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>

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
