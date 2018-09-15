<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Daftar Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?php echo $this->title; ?></h3>
<div class="userapp-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'guest_name',
            'id_number',
            'phone_number',
            'email:email',
            //'photo',
            //'username',
            //'password',
            //'authKey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>