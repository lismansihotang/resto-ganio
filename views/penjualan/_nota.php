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
                        echo '<td style="text-align: right; font-size: 20px;">' . number_format($row->jml) . '</td>';
                        echo '</tr>';
                    }
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