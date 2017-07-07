<?php
use app\models\Pelanggan;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
$this->title = $model->id;
$modelPelanggan = new Pelanggan();
$record = $modelPelanggan->findOne(['id' => $model->id_pelanggan]);
$nm_pelanggan = '';
$nm_pemesan = '';
if ($record !== null) {
    $nm_pelanggan = $record['nm_pelanggan'];
    //$nm_pemesan = $record['nm_pemesan'];
}
?>
<div class="penjualan-view">
    <h1 style="margin-top: -15px!important;">Bebek Ganio</h1>

    <h3 style="margin-top: -20px;">cabang LotteMart</h3>
    <h4 style="margin-top: -10px;">Jl. Gatot Subroto Pilar Cikarang Bekasi</h4>
    <h4 style="margin-top: -20px;">Telp: 021-28512029</h4>

    <h3 style="margin-top: -15px;">#<?php echo $model->id . '/' . $model->tgl . '/' . strtoupper($nm_pelanggan); ?></h3>

    <h2 style="margin-top: -15px;">#<?php echo $model->nm_pemesan; ?></h2>

    <div class="pull-right">
        <table>
            <tbody>
            <tr>
                <td colspan="3"><?php echo str_repeat('=', 35); ?></td>
            </tr>
            <?php
            if (count($modelDetail) > 0) {
                foreach ($modelDetail as $row) {
                    if (array_key_exists($row->id_barang, $modelBarang) === true) {
                        $nmBarang = $modelBarang[$row->id_barang];
                        echo '<tr>';
                        echo '<td>' . $nmBarang . '</td>';
                        echo '<td>' . $row->jml . ' @' . number_format($row->harga) . '</td>';
                        echo '<td style="text-align: right;">' . number_format($row->subtotal) . '</td>';
                        echo '</tr>';
                    }
                }
            }
            ?>
            <tr>
                <td colspan="3"><?php echo str_repeat('-', 61); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Subtotal</td>
                <td style="text-align: right;"><?php echo number_format($model->subtotal); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Disc</td>
                <td style="text-align: right;"><?php
                    if (strlen($model->disc) <= 3) {
                        echo number_format(($model->disc / 100) * $model->subtotal);
                    } else {
                        echo number_format($model->disc);
                    }
                    ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo str_repeat('-', 61); ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;"><h1><?php echo number_format(round($model->total)); ?></h1>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <?php echo str_repeat('-', 24); ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Bayar</td>
                <td style="text-align: right;"><?php echo number_format($model->pembayaran); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Kembali</td>
                <td style="text-align: right;"><?php echo number_format($model->pembayaran - $model->total); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo '#' . Yii::$app->terbilang->rupiah(
                            round($model->total)
                        ) . ' Rupiah#'; ?></td>
            </tr>
            </tbody>
        </table>
        <?php
        /**echo str_repeat('-', 55);
         * echo '</br>';
         * if (count($modelDetail) > 0) {
         * foreach ($modelDetail as $row) {
         * if (array_key_exists($row->id_barang, $modelBarang) === true) {
         * $nmBarang = $modelBarang[$row->id_barang];
         * $lengthCount = 47 - (integer)strlen(trim($nmBarang));
         * if ($lengthCount > 25 && $lengthCount < 36) {
         * $lengthCount = $lengthCount - 3;
         * } elseif ($lengthCount < 25) {
         * $lengthCount = $lengthCount - 12;
         * }
         * echo $row->jml . ' ' . str_repeat('&nbsp;', 2) . $nmBarang . str_repeat(
         * '&nbsp;',
         * $lengthCount
         * ) . number_format($row->subtotal) . '</br>';
         * }
         * }
         * }
         * echo '<br/>';
         * echo str_repeat('&nbsp;', 44) . 'Subtotal&nbsp;&nbsp;: ' . number_format($model->subtotal);
         * echo '<br/>';
         * if ((integer)($model->disc) <= 0) {
         * echo str_repeat('&nbsp;', 44) . 'Discount : ' . str_repeat('&nbsp;', 8) . number_format($model->disc);
         * } else {
         * echo str_repeat('&nbsp;', 44) . 'Discount : ' . number_format($model->disc);
         * }
         * ?>
         * <h2>
         * <?php
         * echo str_repeat('-', 38) . '</br>';
         * echo number_format(round($model->total)); ?>
         * </h2>
         * <?php
         * echo str_repeat('-', 55) . '</br>';
         * echo str_repeat('&nbsp;', 55) . 'Cash : ' . number_format($model->pembayaran);
         * echo '<br/>';
         * echo str_repeat('&nbsp;', 50) . 'Kembali : ' . number_format($model->pembayaran - $model->total);
         * echo '</br></br>';
         * echo '#' . Yii::$app->terbilang->rupiah(round($model->total)) . ' Rupiah#'; */ ?>
    </div>
    <p>Terima Kasih atas kunjungan anda</p>
</div>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('penjualan/index'); ?>';
</script>