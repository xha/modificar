<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Venta */

$this->title = $model->CodSucu;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoFac' => $model->TipoFac], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoFac' => $model->TipoFac], [
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
            'CodSucu',
            'TipoFac',
            'NumeroD',
            'NroUnico',
            'NroCtrol',
            'CodEsta',
            'CodUsua',
            'EsCorrel',
            'CodConv',
            'Signo',
            'FechaT',
            'OTipo',
            'ONumero',
            'NumeroC',
            'NumeroT',
            'NumeroR',
            'TipoTraE',
            'AutSRI',
            'NroEstable',
            'PtoEmision',
            'NumeroF',
            'NumeroNCF',
            'NumeroP',
            'NumeroE',
            'NumeroZ',
            'Moneda',
            'Factor',
            'MontoMEx',
            'CodClie',
            'CodVend',
            'CodUbic',
            'Descrip',
            'Direc1',
            'Direc2',
            'Direc3',
            'ZipCode',
            'Telef',
            'ID3',
            'Monto',
            'MtoTax',
            'Fletes',
            'TGravable',
            'TGravable0',
            'TExento',
            'CostoPrd',
            'CostoSrv',
            'DesctoP',
            'RetenIVA',
            'FechaR',
            'FechaI',
            'FechaE',
            'FechaV',
            'MtoTotal',
            'Contado',
            'Credito',
            'CancelI',
            'CancelA',
            'CancelE',
            'CancelC',
            'CancelT',
            'CancelG',
            'CancelP',
            'Cambio',
            'MtoExtra',
            'ValorPtos',
            'Descto1',
            'PctAnual',
            'MtoInt1',
            'Descto2',
            'PctManejo',
            'MtoInt2',
            'SaldoAct',
            'MtoPagos',
            'MtoNCredito',
            'MtoNDebito',
            'MtoFinanc',
            'DetalChq',
            'TotalPrd',
            'TotalSrv',
            'OrdenC',
            'CodOper',
            'NGiros',
            'NMeses',
            'MtoComiVta',
            'MtoComiCob',
            'MtoComiVtaD',
            'MtoComiCobD',
            'Notas1',
            'Notas2',
            'Notas3',
            'Notas4',
            'Notas5',
            'Notas6',
            'Notas7',
            'Notas8',
            'Notas9',
            'Notas10',
        ],
    ]) ?>

</div>
