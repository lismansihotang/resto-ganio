<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Closing */

$this->title = 'Create Closing';
$this->params['breadcrumbs'][] = ['label' => 'Closings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="closing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
