<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Visit;



$this->title = 'Daftar Kunjungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?php echo $this->title; ?></h3>

<div class="site-index">

    <div class="body-content">

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'guest_name',
        // 'id_number',
        // 'phone_number',
        // 'email',
        // 'photo',
        'visit_code',
        // 'company_name',
        'dt_visit:datetime',
        'long_visit',
        // 'additional_info' => 'Additional Info',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

    </div>
</div>
