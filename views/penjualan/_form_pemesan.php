<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Ubah Info Pemesan';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="penjualan-form">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin();
    echo $form->field($model, 'nm_pemesan')->textInput();
    echo $form->field($model, 'no_telp_pemesan')->textInput();
    ?>
    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>