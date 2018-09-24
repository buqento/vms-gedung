<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Daftar Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>


        <div>
            <div class="col-md-6 text-left">
                <h3>
                <?= Html::encode($this->title) ?> 
                <span class="glyphicon glyphicon glyphicon-menu-right"></span>
                <small class="text-muted">Daftar</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <p>
                <br>
                <?= Html::a('Tambah', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
        <div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => false,
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

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
