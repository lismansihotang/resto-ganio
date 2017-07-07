<?php
use app\models\Pelanggan;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
$this->title = $model->id;
$modelPelanggan = new Pelanggan();
$record = $modelPelanggan->findOne(['id' => $model->id_pelanggan]);
$nm_pelanggan = '';
if ($record !== null) {
    $nm_pelanggan = $record['nm_pelanggan'];
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
            $total = 0;
            if (count($modelDetail) > 0) {
                foreach ($modelDetail as $row) {
                    if (array_key_exists($row->id_barang, $modelBarang) === true) {
                        $nmBarang = $modelBarang[$row->id_barang];
                        echo '<tr>';
                        echo '<td>' . $nmBarang . '</td>';
                        echo '<td>' . $row->jml . ' @' . number_format($row->harga) . '</td>';
                        echo '<td style="text-align: right;">' . number_format($row->subtotal) . '</td>';
                        echo '</tr>';
                        $total += (int)$row->subtotal;
                    }
                }
            }
            ?>
            <tr>
                <td colspan="3"><?php echo str_repeat('-', 61); ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;"><h1><?php echo number_format(round($total)); ?></h1>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute(['penjualan-detail/create','id-jual'=>$model->id]); ?>';
</script>