<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Servicio */

$this->title = $model->CodServ;
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CodServ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CodServ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CodServ',
            'CodInst',
            'Descrip',
            'Descrip2',
            'Descrip3',
            'Clase',
            'Activo',
            'Unidad',
            'Precio1',
            'PrecioI1',
            'Precio2',
            'PrecioI2',
            'Precio3',
            'PrecioI3',
            'Costo',
            'EsExento',
            'EsReten',
            'EsPorCost',
            'UsaServ',
            'Comision',
            'EsPorComi',
            'FechaUV',
            'FechaUC',
            'EsImport',
            'EsVenta',
            'EsCompra',
        ],
    ]) ?>

</div>
