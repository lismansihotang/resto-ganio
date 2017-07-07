<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Barang;
use app\models\BahanBaku;
use app\models\SatuanBahanBaku;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Resep */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resep-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'id_makanan')->widget(
        Select2::className(),
        [
            'data' => ArrayHelper::map(Barang::find()->all(), 'id', 'nm_barang'),
            'options' => ['placeholder' => 'Pilih Makanan...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    echo $form->field($model, 'id_bahan_baku')->widget(
        Select2::className(),
        [
            'data' => ArrayHelper::map(BahanBaku::find()->all(), 'id', 'nm_bahan'),
            'options' => ['placeholder' => 'Pilih Bahan Baku Makanan...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    echo $form->field($model, 'qty')->textInput();
    echo $form->field($model, 'id_satuan')->widget(
        Select2::className(),
        [
            'data' => ArrayHelper::map(SatuanBahanBaku::find()->all(), 'id', 'nm_satuan'),
            'options' => ['placeholder' => 'Pilih Satuan...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
