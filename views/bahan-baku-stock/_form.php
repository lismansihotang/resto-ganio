<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use app\models\BahanBaku;

/* @var $this yii\web\View */
/* @var $model app\models\BahanBakuStock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahan-baku-stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bahan_baku')->widget(
        Select2::className(),
        [
            'data'          => ArrayHelper::map(BahanBaku::find()->all(), 'id', 'nm_bahan'),
            'options'       => ['placeholder' => 'Pilih Bahan baku...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    ) ?>

    <?= $form->field($model, 'tgl')->widget(
        DatePicker::className(),
        [
            'options' => ['placeholder' => 'Pilih Tanggal', 'value' => date('Y-m-d')],
            'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
        ]
    ) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'jenis')->dropDownList(['Masuk' => 'Masuk', 'Sisa' => 'Sisa', '-' => '-',], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
