<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resep */

$this->title = 'Create Resep';
$this->params['breadcrumbs'][] = ['label' => 'Resep', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
