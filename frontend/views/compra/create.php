<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\Models\Compra */

$this->title = 'Crear Orden de C/S';
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
