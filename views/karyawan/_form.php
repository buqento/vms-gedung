<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
