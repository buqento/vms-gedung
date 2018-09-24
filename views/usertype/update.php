<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usertype */

$this->title = 'Ubah Tipe Pengguna: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="usertype-update">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
