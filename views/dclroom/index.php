<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Ruangan';

?>
<div class="dclroom-index">

    <p>
    <?= Html::button('Tambah Data', ['value' => Url::to(['create']), 
    'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
    Modal::begin([
        'header' => '<h4>Tambah Ruangan</h4>',
        'id' => 'modal',
        'size' => 'modal-sm',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute' => 'floor_id',
                'value' => function($data){
                    return $data->floor->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
