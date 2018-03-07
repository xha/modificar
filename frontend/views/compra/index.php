<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\Models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CodSucu',
            'TipoCom',
            'NumeroD',
            'CodProv',
            'NroUnico',
            //'NroCtrol',
            //'CodEsta',
            //'CodUsua',
            //'Signo',
            //'FechaT',
            //'OTipo',
            //'ONumero',
            //'NumeroP',
            //'NumeroE',
            //'NumeroC',
            //'NumeroN',
            //'NumeroR',
            //'TipoSus',
            //'TipoTraE',
            //'NroEstable',
            //'PtoEmision',
            //'AutSRI',
            //'FechaP',
            //'Moneda',
            //'Factor',
            //'MontoMEx',
            //'CodUbic',
            //'Descrip',
            //'Direc1',
            //'Direc2',
            //'ZipCode',
            //'Telef',
            //'ID3',
            //'Monto',
            //'OtrosC',
            //'MtoTax',
            //'Fletes',
            //'TGravable',
            //'TGravable0',
            //'TExento',
            //'DesctoP',
            //'RetenIVA',
            //'FechaI',
            //'FechaR',
            //'FechaE',
            //'FechaV',
            //'CancelI',
            //'CancelE',
            //'CancelT',
            //'CancelC',
            //'CancelA',
            //'CancelG',
            //'MtoTotal',
            //'Contado',
            //'Credito',
            //'SaldoAct',
            //'MtoPagos',
            //'MtoNCredito',
            //'MtoNDebito',
            //'Descto1',
            //'MtoInt1',
            //'Descto2',
            //'MtoInt2',
            //'MtoFinanc',
            //'DetalChq',
            //'TotalPrd',
            //'TotalSrv',
            //'OrdenC',
            //'CodOper',
            //'NGiros',
            //'NMeses',
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
