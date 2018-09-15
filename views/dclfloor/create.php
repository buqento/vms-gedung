<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dclfloor */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Lantai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dclfloor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
