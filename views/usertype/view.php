<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usertype */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertype-view">

    <h1>#<?= Html::encode($model->id) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
        ],
    ]) ?>

</div>
