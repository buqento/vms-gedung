<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dcldestination */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Tenant', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcldestination-view">
    <h1>#<?= $this->title ?></h1>
    <div class="col-md-2">
        <img class="img-thumbnail" src="<?= $model->picture ?>">
    </div>
    <div class="col-md-10">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'company_name',
                'open_hour',
                'close_hour',
                'build_name',
                'floor',
                'phone',
                'email:email',
                'profile:ntext',
                // 'picture',
                'address:ntext',
            ],
        ]) ?>
    </div>

</div>
