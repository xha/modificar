<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Compra */

if ($model->TipoCom=='L') {
    $txt = 'Actualizar Orden: ' . $model->NumeroD;
} else {
    $txt = 'Actualizar Compra: ' . $model->NumeroD;
}
$this->title = $txt;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodProv, 'url' => ['view', 'CodProv' => $model->CodProv, 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoCom' => $model->TipoCom]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="compra-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
