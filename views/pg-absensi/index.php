<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PgAbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pg Absensis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pg Absensi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_karyawan',
            'tgl',
            'jam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
