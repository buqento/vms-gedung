<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userapp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userapp-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'guest_name',
            'id_number',
            'phone_number',
            'email:email',
            // 'photo',
            'username',
            // 'password',
            // 'authKey',
        ],
    ]) ?>

</div>
