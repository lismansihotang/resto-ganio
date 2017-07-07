<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Laporan Stock Bahan Makanan';
$this->params['breadcrumbs'][] = $this->title;
$tglAwal = '';
$tglAkhir = '';
$post = Yii::$app->request->post();
if (count($post) > 0) {
    $tglAwal = $post['tgl_awal'];
    $tglAkhir = $post['tgl_akhir'];
}
?>
    <div class="barang-index">
        <h1><?php echo Html::encode($this->title) ?></h1>
        <?php
        $form = ActiveForm::begin();
        echo '<label class="control-label">Periode Laporan</label>';
        echo DatePicker::widget(
            [
                'name' => 'tgl_awal',
                'name2' => 'tgl_akhir',
                'attribute' => 'tgl_awal',
                'attribute2' => 'tgl_akhir',
                'value' => $tglAwal,
                'value2' => $tglAkhir,
                'id' => 'tgl_awal',
                'options' => ['placeholder' => 'Tgl. Awal'],
                'options2' => ['placeholder' => 'Tgl. Akhir'],
                'type' => DatePicker::TYPE_RANGE,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]
        );
        ?>
        <div class="form-group">
            <?php echo Html::submitButton(
                'Check Laporan',
                ['class' => 'btn btn-primary margin-top-5']
            );
            echo Html::button(
                'Cetak Laporan',
                ['class' => 'btn btn-success margin-top-5 margin-left-5', 'id' => 'cetak-laporan']
            );
            ?>
        </div>
        <?php
        ActiveForm::end();
        ?>

        <table class="table table-responsive table-striped table-hover table-bordered">
            <tbody>
            <?php
            $jml = 0;
            $total = 0;
            if (count($model) > 0) {
                foreach ($model as $key => $data) {
                    ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                    </tr>
                    <?php
                    $subtotal = 0;
                    if (count($data) > 0) {
                        $subtotal += (int)$data['harga'] * (int)$data['jml'];
                        $jml += (int)$data['jml'];
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td></td>
                            <td class="text-right"><?php echo number_format($data['harga']); ?></td>
                            <td class="text-right"><?php echo number_format($data['jml']); ?></td>
                            <td class="text-right"><?php echo number_format($subtotal); ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
            <tr>
                <td colspan="2"></td>
                <td class="text-right"><h2><?php echo number_format($jml); ?></h2></td>
                <td class="text-right"><h2><?php echo number_format($total); ?></h2></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
$url = Url::to(['data-penjualan/print-stock-titipan']);
$js = <<<JS

$('#cetak-laporan').click(function(){
    var tglAwal= $("#tgl_awal").val();
    var tglAkhir= $("#tgl_awal-2").val();
    window.location.href='$url&tgl_awal='+tglAwal+'&tgl_akhir='+tglAkhir;
    return false;
});
JS;
$this->registerJs($js);