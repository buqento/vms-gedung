<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Visit */

$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'user_id',
            'code',
            'dt_start',
            'dt_end',
            'additional_info:ntext',
        ],
    ]) ?>

</div>
