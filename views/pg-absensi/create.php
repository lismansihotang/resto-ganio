<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PgAbsensi */

$this->title = 'Create Pg Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Pg Absensis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-absensi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
