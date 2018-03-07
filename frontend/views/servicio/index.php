<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\Models\ServicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CodServ',
            'CodInst',
            'Descrip',
            'Descrip2',
            'Descrip3',
            //'Clase',
            //'Activo',
            //'Unidad',
            //'Precio1',
            //'PrecioI1',
            //'Precio2',
            //'PrecioI2',
            //'Precio3',
            //'PrecioI3',
            //'Costo',
            //'EsExento',
            //'EsReten',
            //'EsPorCost',
            //'UsaServ',
            //'Comision',
            //'EsPorComi',
            //'FechaUV',
            //'FechaUC',
            //'EsImport',
            //'EsVenta',
            //'EsCompra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
