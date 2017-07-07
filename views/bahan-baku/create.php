<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BahanBaku */

$this->title = 'Create Bahan Baku';
$this->params['breadcrumbs'][] = ['label' => 'Bahan Baku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-baku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
