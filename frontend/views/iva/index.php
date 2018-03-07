<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\Models\IvaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CodTaxs',
            'Descrip',
            'MtoTax',
            'Activo',
            'EsFijo',
            //'EsReten',
            //'CodOper',
            //'EsPorct',
            //'EsCosto',
            //'TipoIVA',
            //'EsLibroI',
            //'EsPartic',
            //'EsTaxVenta',
            //'EsTaxCompra',
            //'MontoMin',
            //'MontoMax',
            //'Sustraendo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
