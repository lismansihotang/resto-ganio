<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PgGaji */

$this->title = 'Create Pg Gaji';
$this->params['breadcrumbs'][] = ['label' => 'Pg Gajis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-gaji-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
