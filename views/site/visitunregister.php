<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;

$this->title = 'Pengunjung Tidak terdaftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?php echo $this->title; ?></h3>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pengunjung</th>
      <th scope="col">Kode Kunjungan</th>
      <th scope="col">Tanggal/Jam Kunjungan</th>
      <th scope="col">Lama Kunjungan</th>
      <th scope="col">Informasi Kunjungan</th>
    </tr>
  </thead>
  <tbody>
    <?php $num = 1 ?>
    <?php foreach ($visitor as $visit): ?>
    <tr>
        <th scope="row"><?= $num++ ?></th>
        <td><?= Html::encode("$visit->guest_name") ?></td>
        <td><?= Html::encode("$visit->code") ?></td>
        <td><?= Html::encode("$visit->dt_visit") ?></td>
        <td><?= Html::encode("$visit->long_visit") ?></td>
        <td><?= Html::encode("$visit->additional_info") ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>