<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resep';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Resep', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id_makanan', 'value' => 'makanan.nm_barang', 'label' => 'Makanan'],
            ['attribute' => 'id_bahan_baku', 'value' => 'bahanBaku.nm_bahan', 'label' => 'Bahan Baku'],
            'qty',
            ['attribute' => 'id_satuan', 'value' => 'satuan.nm_satuan', 'label' => 'Satuan'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
