<?php
use yii\grid\GridView;
use app\models\Pelanggan;

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
    <h1>Bebek Ganio</h1>
    <h4>Telp: 021-28512029</h4>
    <h4>#<?php echo $model->id . '/' . $model->tgl . '/' . $nm_pelanggan; ?></h4>

    <div class="pull-right">
        <?php
        echo str_repeat('-', 55);
        echo '</br>';
        if (count($modelDetail) > 0) {
            foreach ($modelDetail as $row) {
                if (array_key_exists($row->id_barang, $modelBarang) === true) {
                    $nmBarang = $modelBarang[$row->id_barang];
                    $lengthCount = 43 - (integer)strlen(trim($nmBarang));
                    if ($lengthCount > 25 && $lengthCount < 36) {
                        $lengthCount = $lengthCount - 3;
                    } elseif ($lengthCount < 25) {
                        $lengthCount = $lengthCount - 12;
                    }
                    echo $row->jml . ' ' . str_repeat('&nbsp;', 2) . $nmBarang . str_repeat(
                            '&nbsp;',
                            $lengthCount
                        ) . number_format($row->subtotal) . '</br>';
                }
            }
        }
        echo '<br/>';
        echo str_repeat('&nbsp;', 44) . 'Subtotal&nbsp;&nbsp;: ' . number_format($model->subtotal);
        echo '<br/>';
        if ((integer)($model->disc) <= 0) {
            echo str_repeat('&nbsp;', 44) . 'Discount : ' . str_repeat('&nbsp;', 8) . number_format(($model->disc / 100) * $model->subtotal);
        } else {
            echo str_repeat('&nbsp;', 44) . 'Discount : ' . number_format(($model->disc / 100) * $model->subtotal);
        }
        ?>
        <h2>
            <?php
            echo str_repeat('-', 38) . '</br>';
            echo number_format(round($model->total)); ?>
        </h2>
        <?php
        echo str_repeat('-', 55) . '</br>';
        echo str_repeat('&nbsp;', 50) . 'Cash : ' . number_format($model->pembayaran);
        echo '</br>';
        echo '#' . Yii::$app->terbilang->rupiah(round($model->total)) . ' Rupiah#'; ?>
    </div>
    <p>Terima Kasih atas kunjungan anda</p>
    <?php
    if ((int)$model->total > 50000) {
        //echo '<p>Selamat anda mendapatkan 1 Kupon untuk transaksi selanjutnya</p>';
    }
    ?>
</div>

<script>
    window.print();
</script>