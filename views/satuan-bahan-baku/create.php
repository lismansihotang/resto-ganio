<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SatuanBahanBaku */

$this->title = 'Create Satuan Bahan Baku';
$this->params['breadcrumbs'][] = ['label' => 'Satuan Bahan Baku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-bahan-baku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
