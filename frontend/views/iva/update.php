<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Iva */

$this->title = 'Update Iva: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodTaxs, 'url' => ['view', 'id' => $model->CodTaxs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="iva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
