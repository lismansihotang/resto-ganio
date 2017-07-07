<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PenjualanDetail */
$request = Yii::$app->request;
$idJual = $request->get('id-jual');
$this->title = '#' . $idJual;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-detail-create">
    <h2><?php echo Html::encode($this->title . ' / ' . $nmPelanggan . ' >> ' . $nmPemesan . ' / ' . $noTelpPemesan) ?></h2>
    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'subtotal' => $subtotal,
            'idJual' => $idJual,
            'recordBarang' => $recordBarang,
            'nmPelanggan' => $nmPelanggan,
        ]
    );
    echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'barang.nm_barang',
                'jml',
                'harga:decimal',
                'subtotal:decimal',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{deleteCustom}',
                    'buttons' => ['deleteCustom' => function ($url, $model) {
                        $url = Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/delete', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => 'delete']);
                    }]
                ],
            ],
        ]
    ); ?>
</div>
