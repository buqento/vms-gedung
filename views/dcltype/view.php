<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dcltype */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dcltypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcltype-view">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
        ],
    ]) ?>

</div>
