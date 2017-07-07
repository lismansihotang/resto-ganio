<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Bahan Makanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index">
    <h1 style="margin-top: -15px!important;">Bebek Ganio</h1>

    <h3 style="margin-top: -20px;">cabang LotteMart</h3>
    <h5 style="margin-top: -10px;">Jl. Gatot Subroto Pilar Cikarang Bekasi</h5>
    <h5 style="margin-top: -20px;">Telp: 021-28512029</h5>

    <h3><?php echo Html::encode($this->title) ?></h3>
    <h4>Periode: <?php echo $tglAwal . ' s/d ' . $tglAkhir; ?></h4>
    <table>
        <tbody>
        <?php
        $jml = 0;
        $total = 0;
        if (count($model) > 0) {
            foreach ($model as $key => $data) {
                ?>
                <tr>
                    <td style="width: 100px;"><?php echo $key; ?></td>
                    <?php
                    $subtotal = 0;
                    if (count($data) > 0) {
                        $subtotal += (int)$data['harga'] * (int)$data['jml'];
                        $jml += (int)$data['jml'];
                        $total += $subtotal;
                        ?>
                        <td style="text-align: right;"><?php echo number_format($data['harga']); ?></td>
                        <td style="text-align: right;"><?php echo number_format($data['jml']); ?></td>
                        <td style="text-align: right;"><?php echo number_format($subtotal); ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
        }
        ?>
        <tr>
            <td colspan="2">Jml</td>
            <td style="text-align: right; font-size: 22px;">&nbsp;<?php echo number_format($jml); ?></td>
            <td style="text-align: right; font-size: 22px;">&nbsp;<?php echo number_format($total); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('data-penjualan/stock-bahan'); ?>';
</script>