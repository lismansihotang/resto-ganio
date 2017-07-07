<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SatuanBahanBaku */

$this->title = 'Update Satuan Bahan Baku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Satuan Bahan Baku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satuan-bahan-baku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
