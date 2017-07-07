<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PettyCash */

$this->title = 'Create Petty Cash';
$this->params['breadcrumbs'][] = ['label' => 'Petty Cashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petty-cash-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
