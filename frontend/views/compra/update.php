<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Compra */

$this->title = 'Update Compra: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodProv, 'url' => ['view', 'CodProv' => $model->CodProv, 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoCom' => $model->TipoCom]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
