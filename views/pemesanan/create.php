<?php

use yii\helpers\Html;

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Pesan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
