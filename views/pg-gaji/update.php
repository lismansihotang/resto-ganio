<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PgGaji */

$this->title = 'Update Pg Gaji: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pg Gajis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pg-gaji-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
