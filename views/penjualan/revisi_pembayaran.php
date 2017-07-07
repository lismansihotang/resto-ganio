<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
$this->title = 'Revisi Pembayaran Penjualan: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjualan-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <h3>Total: Rp. <?php echo number_format($model->total); ?></h3>
    <?php echo $this->render(
        '_form_revisi_pembayaran',
        [
            'model' => $model,
        ]
    ); ?>

</div>
