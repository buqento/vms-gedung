<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dclroom */

$this->title = 'Tambah Ruangan';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="dclroom-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
