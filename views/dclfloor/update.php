<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dclfloor */

$this->title = 'Update Dclfloor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dclfloors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dclfloor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
