<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcltype */

$this->title = 'Ubah Tipe Identitas: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="dcltype-update">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
