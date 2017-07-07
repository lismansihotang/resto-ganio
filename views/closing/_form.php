<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Closing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="closing-form">

    <?php $form = ActiveForm::begin(
        [
            'enableClientValidation' => false,
        ]
    );
    echo $form->field($model, 'tgl')->widget(
        DatePicker::className(),
        [
            'options' => ['placeholder' => 'Pilih Tanggal...', 'value' => date('Y-m-d')],
            'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
        ]
    );

    echo $form->field($model, 'nominal')->widget(MaskedInput::className(),
        [
            'clientOptions' => [
                'alias' => 'decimal',
                'groupSeparator' => ',',
                'autoGroup' => true,
                'removeMaskOnSubmit' => true,
            ]
        ]);

    echo $form->field($model, 'ket')->textarea(['rows' => 6]); ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
