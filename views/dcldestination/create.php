<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dcldestination */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Gedung', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcldestination-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
