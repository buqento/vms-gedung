<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dclfloor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dclfloors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dclfloor-view">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'floor',
        ],
    ]) ?>

</div>
