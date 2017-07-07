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
    <h1>#<?php echo $model->id . '/' . $model->tgl; ?></h1>

    <h1><?php echo $nm_pelanggan . ' / ' . strtoupper($model->nm_pemesan); ?></h1>

    <div class="pull-right">
        <table>
            <tbody>
            <?php
            if (count($modelDetail) > 0) {
                $i = 1;
                foreach ($modelDetail as $row) {
                    echo '<tr><td colspan="3">' . str_repeat('=', 10) . '</td></tr>';
                    if (array_key_exists($row->id_barang, $modelBarang) === true) {
                        $nmBarang = $modelBarang[$row->id_barang];
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $nmBarang . '</td>';
                        echo '<td style="text-align: right; font-size: 20px;">' . number_format($row->jml) . '</td>';
                        echo '</tr>';
                    }
                    echo '<tr><td colspan="3">' . str_repeat('-', 61) . '</td></tr>';
                    if (array_key_exists($row->id_barang, $modelBarangDesc) === true) {
                        $keterangan = explode('-', $modelBarangDesc[$row->id_barang]);
                        echo '<tr><td colspan="3">Rincian Paket</td></tr>';
                        for ($x = 1; $x < count($keterangan); $x++) {
                            echo '<tr>';
                            echo '<td colspan="2">- ' . $keterangan[$x] . '</td>';
                            echo '<td style="text-align: right; font-size: 16px;">' . number_format($row->jml) . '</td>';
                            echo '</tr>';
                        }

                    }
                    $i++;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute(['penjualan-detail/create','id-jual'=>$model->id]); ?>';
</script>