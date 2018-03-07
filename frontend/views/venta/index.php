<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\Models\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CodSucu',
            'TipoFac',
            'NumeroD',
            'NroUnico',
            'NroCtrol',
            //'CodEsta',
            //'CodUsua',
            //'EsCorrel',
            //'CodConv',
            //'Signo',
            //'FechaT',
            //'OTipo',
            //'ONumero',
            //'NumeroC',
            //'NumeroT',
            //'NumeroR',
            //'TipoTraE',
            //'AutSRI',
            //'NroEstable',
            //'PtoEmision',
            //'NumeroF',
            //'NumeroNCF',
            //'NumeroP',
            //'NumeroE',
            //'NumeroZ',
            //'Moneda',
            //'Factor',
            //'MontoMEx',
            //'CodClie',
            //'CodVend',
            //'CodUbic',
            //'Descrip',
            //'Direc1',
            //'Direc2',
            //'Direc3',
            //'ZipCode',
            //'Telef',
            //'ID3',
            //'Monto',
            //'MtoTax',
            //'Fletes',
            //'TGravable',
            //'TGravable0',
            //'TExento',
            //'CostoPrd',
            //'CostoSrv',
            //'DesctoP',
            //'RetenIVA',
            //'FechaR',
            //'FechaI',
            //'FechaE',
            //'FechaV',
            //'MtoTotal',
            //'Contado',
            //'Credito',
            //'CancelI',
            //'CancelA',
            //'CancelE',
            //'CancelC',
            //'CancelT',
            //'CancelG',
            //'CancelP',
            //'Cambio',
            //'MtoExtra',
            //'ValorPtos',
            //'Descto1',
            //'PctAnual',
            //'MtoInt1',
            //'Descto2',
            //'PctManejo',
            //'MtoInt2',
            //'SaldoAct',
            //'MtoPagos',
            //'MtoNCredito',
            //'MtoNDebito',
            //'MtoFinanc',
            //'DetalChq',
            //'TotalPrd',
            //'TotalSrv',
            //'OrdenC',
            //'CodOper',
            //'NGiros',
            //'NMeses',
            //'MtoComiVta',
            //'MtoComiCob',
            //'MtoComiVtaD',
            //'MtoComiCobD',
            //'Notas1',
            //'Notas2',
            //'Notas3',
            //'Notas4',
            //'Notas5',
            //'Notas6',
            //'Notas7',
            //'Notas8',
            //'Notas9',
            //'Notas10',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
