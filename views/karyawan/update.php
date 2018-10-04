<?php

use yii\helpers\Html;

$this->title = 'Ubah Data #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Host', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="karyawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
