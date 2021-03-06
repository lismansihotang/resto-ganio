<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Kategori;
use app\models\SatuanKecil;
use app\models\SatuanBesar;
use app\models\Lokasi;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'nm_barang')->textInput(['maxlength' => true]);
    echo $form->field($model, 'ket_barang')->textarea(['rows' => 6]);
    echo $form->field($model, 'harga_jual')->textInput(['maxlength' => true]);
    echo $form->field($model, 'id_kategori')->widget(
        Select2::className(),
        [
            'data'          => ArrayHelper::map(Kategori::find()->all(), 'id', 'desc'),
            'options'       => ['placeholder' => 'Pilih Kategori Barang'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php
    $js = <<<JS
$('#barang-margin_jual').on('change',function(){
    var marginJual = 0;
    var hargaBeli = parseFloat($('#barang-harga_beli').val());
    if($(this).val() !== ''){
    marginJual = (parseInt($(this).val())/100)*hargaBeli;
    }
    $('#barang-harga_jual').val(hargaBeli+marginJual);
});
JS;
    $this->registerJs($js);
    ActiveForm::end(); ?>

</div>
