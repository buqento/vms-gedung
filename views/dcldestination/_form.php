<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Dclbuilding;
use app\models\Dclfloor;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use kartik\file\FileInput;
use kartik\time\TimePicker;
?>

<div class="dcldestination-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_hour')->widget(TimePicker::classname(), []) ?>

    <?= $form->field($model, 'close_hour')->widget(TimePicker::classname(), []) ?>

    <?php 
        $building = Dclbuilding::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();

        echo $form->field($model, 'build_name')->widget(Select2::classname(), [
            'data' => $building,
            'language' => 'en',
        ]);
    ?>

    <?php 
        $floor = Dclfloor::find()
            ->select(['floor'])
            ->indexBy('id')
            ->column();

        echo $form->field($model, 'floor')->widget(Select2::classname(), [
            'data' => $floor,
            'language' => 'en',
        ]);
    ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile')->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ])
    ?>

    <?= $form->field($model, 'address')->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
