<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcllongvisit */

$this->title = 'Update Dcllongvisit: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dcllongvisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dcllongvisit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
