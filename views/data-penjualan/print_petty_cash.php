<?php
use yii\helpers\Url;

?>
<h1 style="margin-top: -15px!important;">Bebek Ganio</h1>

<h3 style="margin-top: -20px;">cabang LotteMart</h3>
<h5 style="margin-top: -10px;">Jl. Gatot Subroto Pilar Cikarang Bekasi</h5>
<h5 style="margin-top: -20px;">Telp: 021-28512029</h5>
<h2>Petty Cash</h2>
<h4>Periode: <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></h4>
<table>
    <tbody>
    <?php
    $total = 0;
    $i = 1;
    if (count($model) > 0) {
        foreach ($model as $row) {
            ?>
            <tr>
                <td style="border-bottom: dotted 1px #ccc;"><?php echo $i; ?></td>
                <td style="border-bottom: dotted 1px #ccc;"><?php echo $row['tgl']; ?></td>
                <td style="border-bottom: dotted 1px #ccc; text-align: right;"><?php echo number_format($row['nominal']); ?></td>
                <td>
                    <?php
                    $text = '';
                    $arrKet = explode(' ', $row['keterangan']);
                    if (count($arrKet) > 0) {
                        if (array_key_exists(0, $arrKet) === true) {
                            $text = $arrKet[0];
                        }
                        if (array_key_exists(1, $arrKet) === true) {
                            $text .= ' ' . $arrKet[1];
                        }
                        if (array_key_exists(2, $arrKet) === true) {
                            $text .= ' ' . $arrKet[2];
                        }

                        if (array_key_exists(3, $arrKet) === true) {
                            $text .= '...';
                        }
                    }
                    echo $text;
                    ?>
                </td>
            </tr>
            <?php
            $i++;
            $total += $row['nominal'];
        }
    }
    ?>
    <tr>
        <td colspan="3"></td>
        <td><h2><?php echo number_format($total); ?></h2></td>
    </tr>
    </tbody>
</table>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('data-penjualan/petty-cash'); ?>';
</script>