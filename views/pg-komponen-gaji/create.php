<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PgKomponenGaji */

$this->title = 'Create Pg Komponen Gaji';
$this->params['breadcrumbs'][] = ['label' => 'Pg Komponen Gajis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pg-komponen-gaji-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
