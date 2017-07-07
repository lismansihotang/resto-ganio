<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BahanBaku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahan-baku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_bahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
