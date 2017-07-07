<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PettyCash */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Petty Cashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petty-cash-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    <div class="btn-group">
        <?php
        echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-info']);
        echo Html::a('Create', ['create'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
    </div>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tgl',
            'nominal:decimal',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
