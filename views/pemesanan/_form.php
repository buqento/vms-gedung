<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Karyawan;
use app\models\DclRoombook;
use app\models\DclLongVisit;
use app\models\Visited;
use app\models\DclBuilding;
use app\models\DclFloor;
use app\models\DclRoom;
use app\models\SummaryVisit;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;
$detail = Visited::findOne($_GET['id']);
?>

<div class="pemesanan-form">

    <div class="col-md-6">
    <h3>Tambah Data</h3>
    <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-6">

            <?php

            echo $form->field($model, 'visit_code')->textInput(['value' => $detail->visit_code, 'readonly' => true]);

            $karyawan_id = Karyawan::find()
                    ->select(['nama'])
                    ->where(['tenant_id' => Yii::$app->user->identity->tenant_id])
                    ->indexBy('id')
                    ->column();
                echo $form->field($model, 'karyawan_id')->widget(Select2::classname(), [
                    'data' => $karyawan_id,
                ]);

                echo $form->field($model, 'tujuan_pertemuan')->textInput();

                echo $form->field($model, 'building_id')
                    ->dropDownList(DclBuilding::getBuildings(),[
                        'prompt' => 'Pilih Lokasi Gedung',
                        'id' => 'building-id'
                ]);

                echo $form->field($model, 'floor_id')->widget(DepDrop::classname(), [
                    'options'=>['id' => 'floor-id', 'prompt' => 'Pilih Lokasi Lantai'],
                    'pluginOptions'=>[
                        'depends'=>['building-id'],
                        'placeholder'=>'Pilih Lokasi Lantai',
                        'url'=>Url::to(['/pemesanan/floor'])
                    ]
                ]);

            ?>

        </div>
        <div class="col-md-6">

            <?php



                echo $form->field($model, 'room_id')->widget(DepDrop::classname(), [
                    'options'=>[
                        'id' => 'room-id', 
                        'prompt' => 'Pilih Lokasi Ruangan'
                    ],
                    'pluginOptions'=>[
                        'depends'=>['floor-id'],
                        'placeholder'=>'Pilih Lokasi Ruangan',
                        'url'=>Url::to(['/pemesanan/room'])
                    ]
                ]);

                echo $form->field($model, 'tanggal_kedatangan')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Pilih Tanggal Pertemuan ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose' => true,
                    ]
                ]); 

                echo $form->field($model, 'jam_pemesanan')->widget(DepDrop::classname(), [
                    'options'=>[
                        'prompt' => 'Pilih Jam Pertemuan',
                        'id' => 'jam-pemesanan'
                    ],
                    'pluginOptions'=>[
                        'depends'=>['room-id'],
                        'placeholder'=>'Pilih Jam Pertemuan',
                        'url'=>Url::to(['/pemesanan/book']),
                        'loadingText'=>'Loading...',
                    ],

                ]);

                echo $form->field($model, 'long_visit_id')->widget(DepDrop::classname(), [
                    'options'=>[
                        'prompt' => 'Pilih Durasi Pertemuan',
                        'id' => 'long-visit'
                    ],
                    'pluginOptions'=>[
                        'depends'=>['jam-pemesanan', 'room-id'],
                        'placeholder'=>'Pilih Durasi Pertemuan',
                        'url'=>Url::to(['/pemesanan/longvisit']),
                        'loadingText'=>'Loading...',
                    ],

                ]);

            ?>
        </div>

        <div class="col-md-12">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
    </div>

    <div class="col-md-6">
    <h3>Permohonan Kunjungan</h3>
    <?php

    echo DetailView::widget([
        'model' => $detail,
        'attributes' => [
            'guest_name',
            // [
            //     'attribute' => 'type_id',
            //     'value' => function($data) {
            //         return $data->type->title;
            //     }
            // ],
            // 'id_number',
            // 'phone_number',
            // 'email:email',
            //'photo',
            //'address',
            'dt_visit',
            'long_visit',
            'host',
            'additional_info:ntext',
            //'created',          
        ]
    ]);
    $qrCode = (new QrCode($detail->visit_code))->setSize(150)->setMargin(5)->useForegroundColor(0, 0, 0);
    echo '<img src="'.$qrCode->writeDataUri().'" alt="..." class="img-thumbnail">';

    ?>

    </div>

</div>
