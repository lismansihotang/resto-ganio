<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
$this->title = 'Create Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-create">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ); ?>
</div>