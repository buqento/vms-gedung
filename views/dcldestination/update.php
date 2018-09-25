<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcldestination */

$this->title = 'Ubah Tenant';
$this->params['breadcrumbs'][] = ['label' => 'Tenant', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="dcldestination-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
