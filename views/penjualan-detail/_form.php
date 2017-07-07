<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use app\models\Kategori;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $model app\models\PenjualanDetail */
/* @var $form yii\widgets\ActiveForm */
$arrKategori = ArrayHelper::map(Kategori::find()->all(), 'id', 'desc');
Modal::begin(
    [
        'header' => '<h3>Pembayaran</h3>',
        'id' => 'modal',
        'size' => 'modal-md'
    ]
);
echo '<div id="modalContent"></div>';
Modal::end();

?>
    <div class="pull-right margin-bottom-lg">
        <?php
        echo Html::a(
            '<span class="glyphicon glyphicon-home"> </span> List Penjualan',
            [
                'penjualan/index'
            ],
            ['class' => 'btn btn-sm btn-default']
        );
        echo Html::a(
            '<span class="glyphicon glyphicon-pencil"> </span> Create Penjualan',
            [
                'penjualan/create'
            ],
            ['class' => 'btn btn-sm btn-success margin-left-5 margin-right-5']
        );
        echo ButtonDropdown::widget([
            'label' => '<span class="glyphicon glyphicon-print"> </span> Cetak ',
            'encodeLabel' => false,
            'options' => ['class' => 'btn btn-sm btn-warning'],
            'dropdown' => [
                'items' => [
                    ['label' => 'Nota', 'url' => ['penjualan/print-nota', 'id' => $idJual]],
                    ['label' => 'Nota Paket', 'url' => ['penjualan/print-nota-paket', 'id' => $idJual]],
                    ['label' => 'Kwitansi Sementara', 'url' => ['penjualan/print-temp', 'id' => $idJual]],
                ]
            ]
        ]);
        echo Html::a(
            '<span class="glyphicon glyphicon-user"> </span> Info Pemesan',
            [
                'penjualan/update-pemesan', 'id' => $idJual
            ],
            ['class' => 'btn btn-sm btn-info margin-left-5']
        );
        echo Html::a(
            '<span class="glyphicon glyphicon-trash"> </span> Ubah Meja',
            [
                'penjualan/update', 'id' => $idJual
            ],
            ['class' => 'btn btn-sm btn-info margin-left-5']
        );
        echo Html::a(
            '<span class="glyphicon glyphicon-trash"> </span> Delete',
            [
                'penjualan/delete', 'id' => $idJual
            ],
            ['class' => 'btn btn-sm btn-danger margin-left-15', 'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ]]
        );
        echo Html::button(
            '<span class="glyphicon glyphicon-shopping-cart"> </span> Pembayaran',
            [
                'value' => Yii::$app->urlManager->createAbsoluteUrl(['penjualan/payment', 'id' => $idJual]),
                'class' => 'btn btn-sm btn-primary margin-left-25',
                'id' => 'modalButton'
            ]
        );


        ?>
    </div>
    <div class="penjualan-detail-form">
        <h1><?php
            echo number_format($subtotal);
            ?>
        </h1>

        <div class="row margin-bottom-15 text-right">
            <div class="col-md-12">
                <?php
                if (count($recordBarang) > 0) {
                    foreach ($recordBarang as $row) {
                        echo '<button id="' . $row->id . '" class="btn-add"><h4>' . $row->nm_barang . '</h4><h3>' . number_format(
                                $row->harga_jual
                            ) . '</h3></button>';
                    }
                }
                ?>
            </div>
        </div>
        <?php
        $form = ActiveForm::begin(['id' => 'frm-penjualan']);
        foreach ($arrKategori as $key => $value) {
            ?>
            <button class="btn-kategori btn btn-app btn-primary margin-bottom-5"
                    alt="<?php
                    echo Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/create', 'id-jual' => $idJual, 'id-kategori' => $key]);
                    ?>">
                <h3><?php echo $value; ?></h3>
            </button>

            <?php
        }
        ?>
        <?php ActiveForm::end(); ?>
    </div>
<?php
$js = <<<JS
$('.btn-kategori').on('click',function(){
        window.location = $(this).attr('alt');
        return false;
        //window.location = url+idKategori;
});

$('.btn-add').on('click',function() {
    var qtyItem = prompt('Isi Jumlah Pembelian Barang','1');
        if(qtyItem !== null){
            $.ajax({
           url: '?r=penjualan-detail/item-price',
           dataType:'json',
           data: {id: $(this).attr('id'),jual:$idJual, qty: qtyItem},
           success: function(data) {
               if(data.redirect===false){
                    alert(data.msg);
               }
               window.location.reload(data.redirect);
                },
               error: function(){
                alert('Error!!! Some function not run');
                }
            });
            $('#frm-penjualan').submit(function(){
                return false;
            });
            $(this).val('');
            e.preventDefault();
        }
});

$('#frm-penjualan').submit(function(){
    alert('test');
    return false;
});

/*$('#id-barang').val('');
$('#id-barang').focus();
$('#id-barang').keypress(function(e){
    var key = e.which || e.ctrlKey;
    if(key === 13){
        $.ajax({
           url: '?r=penjualan-detail/item-price',
           dataType:'json',
           data: {id: $(this).val(),jual:$idJual},
           success: function(data) {
               if(data.redirect===false){
                    alert(data.msg);
               }
               window.location.reload(data.redirect);
           },
           error: function(){
            alert('Error!!! Some function not run');
            }
        });
        $('#frm-penjualan').submit(function(){
            return false;
        });
        $(this).val('');
        e.preventDefault();
    }

});*/
JS;
$this->registerJs($js);

