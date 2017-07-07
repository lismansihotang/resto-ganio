<?php
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenjualanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-index">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php
    $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn'],
        'id',
        ['attribute' => 'id_pelanggan', 'value' => 'pelanggan.nm_pelanggan', 'label' => 'Pelanggan'],
        'tgl',
        ['attribute' => 'subtotal', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        ['attribute' => 'disc', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        ['attribute' => 'total', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        ['attribute' => 'pembayaran', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{btnEditPembayaran}{btnEditCustomer}{btnPrint}{btnEditDetail}{btnViewCustom}',
            'buttons' => [
                'btnEditPembayaran' => function ($url, $model) {
                    $urlEditPembayaran = Yii::$app->urlManager->createAbsoluteUrl(['penjualan/revisi-pembayaran', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-credit-card"></span>', $urlEditPembayaran, ['title' => 'Revisi Pembayaran']);

                },
                'btnEditCustomer' => function ($url, $model) {
                    $urlEditCustomer = Yii::$app->urlManager->createAbsoluteUrl(['penjualan/update', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-retweet margin-left-5"></span>', $urlEditCustomer, ['title' => 'Revisi Meja']);

                },
                'btnPrint' => function ($url, $model) {
                    $urlEditCustomer = Yii::$app->urlManager->createAbsoluteUrl(['penjualan/print', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-print margin-left-5"></span>', $urlEditCustomer, ['title' => 'Reprint Penjualan']);

                },
                'btnEditDetail' => function ($url, $model) {
                    $urlEditCustomer = Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/create', 'id-jual' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-shopping-cart margin-left-5"></span>', $urlEditCustomer, ['title' => 'Revisi Detail Penjualan']);

                },
                'btnViewCustom' => function ($url, $model) {
                    $urlEditCustomer = Yii::$app->urlManager->createAbsoluteUrl(['penjualan/view', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-eye-open margin-left-5"></span>', $urlEditCustomer, ['title' => 'Revisi Detail Penjualan']);

                },
            ],
        ]
    ];
    echo GridView::widget(
        [
            'id' => 'kv-gridview-penjualan',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
        ]
    ); ?>
</div>
