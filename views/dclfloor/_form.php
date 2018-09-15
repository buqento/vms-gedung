<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dclfloor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dclfloor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
