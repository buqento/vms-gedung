<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Visited */

$this->title = 'Create Visited';
$this->params['breadcrumbs'][] = ['label' => 'Visiteds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visited-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
