<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\Models\Venta */

if (isset($_GET['titulo'])==1) {
    $titulo = $_GET['titulo'];
    $tipofac = $_GET['TipoFac'];
} else {
    $titulo = 'Presupuesto';
    $tipofac = 'F';
}

$this->title = $titulo;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'TipoFac' => $tipofac,
        'titulo' => $titulo,
        'msg' => $msg
    ]) ?>

</div>
