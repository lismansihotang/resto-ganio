<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PgGajiDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pg-gaji-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_gaji') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_komponen') ?>

    <?= $form->field($model, 'nominal') ?>

    <?php // echo $form->field($model, 'jml') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
