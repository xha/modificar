<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Venta */

if ($model->TipoFac=='A') {
    $txt = 'Actualizar Factura: ' . $model->NumeroD;
} else {
    $txt = 'Actualizar Presupuesto: ' . $model->NumeroD;
}
$this->title = $txt;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodSucu, 'url' => ['view', 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoFac' => $model->TipoFac]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="venta-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
