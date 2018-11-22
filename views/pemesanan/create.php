<?php

use yii\helpers\Html;

$this->title = 'Pemesanan Ruangan';
// $this->params['breadcrumbs'][] = ['label' => 'Penggunaan Ruangan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-create">


    <div class="col-md-12">
        <?= $this->render('_form', [
            'model' => $model
        ]) ?>
    </div>

</div>
