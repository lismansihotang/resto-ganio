<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PgAbsensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pg-absensi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_karyawan')->textInput() ?>

    <?= $form->field($model, 'tgl')->textInput() ?>

    <?= $form->field($model, 'jam')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
