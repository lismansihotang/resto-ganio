<?php
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Laporan Summary Pendapatan';
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
            <?php
            echo Html::submitButton(
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
            <thead>
            <tr>
                <th>No</th>
                <th>Tgl</th>
                <th>Kas</th>
                <th>Penjualan</th>
                <th>Pengeluaran</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($model) > 0) {
                $i = 1;
                $total = 0;
                foreach ($model as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['tgl']; ?></td>
                        <td class="text-right"><?php echo number_format($row['kas']); ?></td>
                        <td class="text-right"><?php echo number_format($row['total_penjualan']); ?></td>
                        <td class="text-right"><?php echo number_format($row['total_petty_cash']); ?></td>
                        <td class="text-right">
                            <?php
                            $subtotal = (int)$row['kas'] + ((int)$row['total_penjualan'] - (int)$row['total_petty_cash']);
                            echo number_format($subtotal);
                            $total = $subtotal;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td class="text-right"><h2><?php echo number_format($total); ?></h2></td>
                    </tr>
                    <tr>
                        <td colspan="5">Closing Kas</td>
                        <td class="text-right"><h3><?php echo number_format($row['closing_kas']); ?></h3></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
$url = Url::to(['data-penjualan/print-summary']);
$js = <<<JS

$('#cetak-laporan').click(function(){
    var tglAwal= $("#tgl_awal").val();
    var tglAkhir= $("#tgl_awal-2").val();
    window.location.href='$url&tgl_awal='+tglAwal+'&tgl_akhir='+tglAkhir;
    return false;
});
JS;
$this->registerJs($js);