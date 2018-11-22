<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dclroom */

$this->title = 'Detail Ruangan';
// $this->params['breadcrumbs'][] = ['label' => 'Ruangan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="dclroom-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            [
                'attribute' => 'floor_id',
                'value' => function($data){
                    return $data->floor->name;
                }
            ],
        ],
    ]) ?>

</div>
