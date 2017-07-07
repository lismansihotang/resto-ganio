<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PgKaryawan */

$this->title = 'Create Pg Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Pg Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-karyawan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
