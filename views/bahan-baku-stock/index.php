<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BahanBakuStockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bahan Baku Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-baku-stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bahan Baku Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id_bahan_baku', 'value' => 'bahanBaku.nm_bahan', 'label' => 'Bahan Baku'],
            'tgl',
            'stock',
            'jenis',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
