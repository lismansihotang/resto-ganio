<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PgGajiDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pg Gaji Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-gaji-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pg Gaji Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_gaji',
            'id_karyawan',
            'id_komponen',
            'nominal',
            // 'jml',
            // 'subtotal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
