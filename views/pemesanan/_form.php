<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Karyawan;
use app\models\DclRoombook;
use app\models\DclLongVisit;
use app\models\Visited;
use app\models\DclBuilding;
use app\models\DclFloor;
use app\models\DclRoom;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
?>

<div class="pemesanan-form">

    <div class="col-md-6">
    
    <?php $form = ActiveForm::begin(); ?>

        <?php 
            $visit_code = Visited::find()
                ->select(['visit_code'])
                ->where(['destination_id' => Yii::$app->user->identity->tenant_id])
                ->indexBy('visit_code')
                ->column();
            echo $form->field($model, 'visit_code')->widget(Select2::classname(), [
                'data' => $visit_code,
                'readonly' => true
            ]);

            $karyawan_id = Karyawan::find()
                ->select(['nama'])
                ->where(['tenant_id' => Yii::$app->user->identity->tenant_id])
                ->indexBy('id')
                ->column();
            echo $form->field($model, 'karyawan_id')->widget(Select2::classname(), [
                'data' => $karyawan_id,
            ]);

            echo $form->field($model, 'tanggal_kedatangan')->widget(DatePicker::classname(), [
                'value' => date('d-M-Y', strtotime('+2 days')),
                'options' => ['placeholder' => 'Pilih Tanggal Pertemuan ...'],
                'pluginOptions' => [
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                    'autoclose' => true,
                ]
            ]);

            echo $form->field($model, 'tujuan_pertemuan')->textarea(['rows' => 3]);
        ?>

    </div>

    <div class="col-md-6">

        <?php
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

            echo $form->field($model, 'room_id')->widget(DepDrop::classname(), [
                'options'=>['id' => 'room-id', 'prompt' => 'Pilih Lokasi Ruangan'],
                'pluginOptions'=>[
                    'depends'=>['floor-id'],
                    'placeholder'=>'Pilih Lokasi Ruangan',
                    'url'=>Url::to(['/pemesanan/room'])
                ]
            ]);

            echo $form->field($model, 'jam_pemesanan')->widget(DepDrop::classname(), [
                'options'=>['prompt' => 'Pilih Jam Pertemuan'],
                'pluginOptions'=>[
                    'depends'=>['room-id'],
                    'placeholder'=>'Pilih Jam Pertemuan',
                    'url'=>Url::to(['/pemesanan/book'])
                ]
            ]);

            $long_visit = DclLongVisit::find()->select(['title'])->indexBy('id')->column();
            echo $form->field($model, 'long_visit_id')->widget(Select2::classname(), [
                    'data' => $long_visit,
            ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
