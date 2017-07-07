<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PgGaji */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pg Gajis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-gaji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <div class="btn-group">
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tgl',
            'tgl_awal',
            'tgl_akhir',
            'nominal',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
