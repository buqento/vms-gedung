<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dcllongvisit */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dcllongvisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcllongvisit-view">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
        ],
    ]) ?>

</div>
