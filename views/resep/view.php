<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resep */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Resep', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-view">

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

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'makanan.nm_barang',
            'bahanBaku.nm_bahan',
            'qty',
            'satuan.nm_satuan',
        ],
    ]); ?>

</div>
