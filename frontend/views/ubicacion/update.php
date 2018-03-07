<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Ubicacion */

$this->title = 'Update Ubicacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodUbic, 'url' => ['view', 'id' => $model->CodUbic]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ubicacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
