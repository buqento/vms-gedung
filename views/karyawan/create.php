<?php

use yii\helpers\Html;

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Host', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
