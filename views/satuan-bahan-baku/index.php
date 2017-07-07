<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SatuanBahanBakuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Satuan Bahan Baku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-bahan-baku-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Satuan Bahan Baku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nm_satuan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
