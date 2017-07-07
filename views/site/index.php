<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'e-Restaurant Bebek Ganio';
?>
<div class="site-index">
    <div class="jumbotron">

        <h1>Selamat Datang!</h1>

        <p class="lead">Aplikasi e-Restaurant berbasis Web.</p>
        <?php
        echo Html::img('@web/images/bebek-ganio.png', ['class' => 'img img-responsive img-thumbnail']);
        ?>
    </div>
    <div class="body-content">
    </div>
</div>
<style>
    .jumbotron img {
        width: 60%;
    }
</style>