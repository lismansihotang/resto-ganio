<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PgGaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pg-gaji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl')->textInput() ?>

    <?= $form->field($model, 'tgl_awal')->textInput() ?>

    <?= $form->field($model, 'tgl_akhir')->textInput() ?>

    <?= $form->field($model, 'nominal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
