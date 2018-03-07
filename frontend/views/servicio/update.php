<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Servicio */

$this->title = 'Update Servicio: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodServ, 'url' => ['view', 'id' => $model->CodServ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
