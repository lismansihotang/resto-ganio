<?php
use yii\helpers\Url;

?>
<h1 style="margin-top: -15px!important;">Bebek Ganio</h1>

<h3 style="margin-top: -20px;">cabang LotteMart</h3>
<h5 style="margin-top: -10px;">Jl. Gatot Subroto Pilar Cikarang Bekasi</h5>
<h5 style="margin-top: -20px;">Telp: 021-28512029</h5>
<h2>Laporan Summary</h2>
<h4>Periode: <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></h4>
<table>
    <tbody>
    <?php
    if (count($model) > 0) {
        $i = 1;
        $total = 0;
        foreach ($model as $row) {
            ?>
            <tr>
                <td colspan="3" style="border-bottom: 1px solid #ccc;"><?php echo $row['tgl']; ?></td>
                <td>
                    <?php
                    $subtotal = (int)$row['kas'] + ((int)$row['total_penjualan'] - (int)$row['total_petty_cash']);
                    $total = $subtotal;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Kas</td>
                <td>:</td>
                <td style="text-align: right;"><?php echo number_format($row['kas']); ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ccc;">Penjualan</td>
                <td style="border-bottom: 1px solid #ccc;">:</td>
                <td style="text-align: right; border-bottom: 1px solid #ccc;"><?php echo number_format($row['total_penjualan']); ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td style="text-align: right;"><?php echo number_format((int)$row['kas'] + (int)$row['total_penjualan']); ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ccc;">Petty Cash</td>
                <td style="border-bottom: 1px solid #ccc;">:</td>
                <td style="text-align: right; border-bottom: 1px solid #ccc;"><?php echo number_format($row['total_petty_cash']); ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><h3><?php echo number_format($total); ?></h3></td>
            </tr>
            <tr style="vertical-align: top;">
                <td colspan="2">Closing Kas</td>
                <td><h3><?php echo number_format($row['closing_kas']); ?></h3></td>
            </tr>
            <?php
            $i++;
        }
    }
    ?>

    </tbody>
</table>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('data-penjualan/summary'); ?>';
</script>