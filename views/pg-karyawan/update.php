<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PgKaryawan */

$this->title = 'Update Pg Karyawan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pg Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pg-karyawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
