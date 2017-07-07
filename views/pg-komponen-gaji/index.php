<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PgKomponenGajiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pg Komponen Gajis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-komponen-gaji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pg Komponen Gaji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'deskripsi',
            'tipe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
