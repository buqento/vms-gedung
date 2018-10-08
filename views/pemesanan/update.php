<?php

use yii\helpers\Html;

$this->title = 'Ubah Data #' . $model->visit_code;
$this->params['breadcrumbs'][] = ['label' => 'Penggunaan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="pemesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
