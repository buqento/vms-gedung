<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use app\models\Dclbuilding;
use app\models\Dclfloor;
use dosamigos\ckeditor\CKEditor;
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
    ?>
    <?= $form->field($model, 'build_name')->dropDownList($building) ?>

    <?php 
    $floor = Dclfloor::find()
        ->select(['floor'])
        ->indexBy('id')
        ->column();
    ?>
    <?= $form->field($model, 'floor')->dropDownList($floor) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile')->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'picture')->fileInput() ?>

    <?= $form->field($model, 'address')->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
