<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detail Host';
// $this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'tenant_id',
            'nama',
            'email:email',
            'telepon',
            'jabatan',
        ],
    ]) ?>

</div>
