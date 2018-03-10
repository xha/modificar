<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\Models\Pregunta */

$this->title = 'Crear Pregunta';
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
