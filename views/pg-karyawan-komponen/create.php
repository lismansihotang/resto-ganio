<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PgKaryawanKomponen */

$this->title = 'Create Pg Karyawan Komponen';
$this->params['breadcrumbs'][] = ['label' => 'Pg Karyawan Komponens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-karyawan-komponen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
