<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dclroom */

$this->title = 'Ubah Ruangan';
$this->params['breadcrumbs'][] = ['label' => 'Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dclroom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
