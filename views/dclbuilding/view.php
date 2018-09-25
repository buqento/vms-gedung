<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dclbuilding */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dclbuildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dclbuilding-view">

    <h1>#<?= Html::encode($model->id) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
        ],
    ]) ?>

</div>
