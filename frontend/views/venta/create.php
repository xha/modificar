<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\Models\Venta */

$this->title = $_GET['titulo'];
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'TipoFac' => $_GET['TipoFac'],
        'titulo' => $_GET['titulo'],
    ]) ?>

</div>
