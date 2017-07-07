<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BahanBakuStock */

$this->title = 'Create Bahan Baku Stock';
$this->params['breadcrumbs'][] = ['label' => 'Bahan Baku Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-baku-stock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
