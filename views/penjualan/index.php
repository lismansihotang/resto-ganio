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

    <p>
        <?php echo Html::a('Create Penjualan', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php
    $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn'],
        ['attribute' => 'id_pelanggan', 'value' => 'pelanggan.nm_pelanggan', 'label' => 'Pelanggan'],
        'nm_pemesan',
        'no_telp_pemesan',
        'tgl',
        ['attribute' => 'subtotal', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        ['attribute' => 'disc', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        ['attribute' => 'total', 'format' => ['decimal', 2], 'hAlign' => 'right', 'width' => '110px'],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{viewCustom}',
            'buttons' => ['viewCustom' => function ($url, $model) {
                if ((int)$model->total <= 0) {
                    if ((int)$model->disc >= 100) {
                        $glIcon = 'glyphicon glyphicon-print';
                        $url = Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/view', 'id' => $model->id]);
                    } else {
                        $glIcon = 'glyphicon glyphicon-eye-open';
                        $url = Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/create', 'id-jual' => $model->id]);
                    }
                } else {
                    $glIcon = 'glyphicon glyphicon-print';
                    $url = Yii::$app->urlManager->createAbsoluteUrl(['penjualan/view', 'id' => $model->id]);
                }
                return Html::a('<span class="' . $glIcon . '"></span>', $url, ['title' => 'view']);

            }],
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
