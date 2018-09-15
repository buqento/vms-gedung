<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use Da\QrCode\QrCode;
/* @var $this yii\web\View */
/* @var $model app\models\Biodata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="biodata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jeniskelamin')->dropDownList(
        [ 1 => 'Laki-laki', 2 => 'Perempuan'],
        ['prompt' => 'Jenis Kelamin']
    ) ?>

    

    <?php 
    $code = sha1('123');
    $qrCode = (new QrCode($code))
        ->setSize(250)
        ->setMargin(5)
        ->useForegroundColor(51, 153, 255);
    // now we can display the qrcode in many ways
    // saving the result to a file:
    $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified
    // display directly to the browser 
    header('Content-Type: '.$qrCode->getContentType());
    // echo $qrCode->writeString();
    ?> 


    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
