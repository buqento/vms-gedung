<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dclbuilding */

$this->title = 'Ubah Lokasi: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="dclbuilding-update">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
