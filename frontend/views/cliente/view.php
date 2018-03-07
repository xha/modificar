<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Cliente */

$this->title = $model->CodClie;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CodClie], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CodClie], [
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
            'CodClie',
            'Descrip',
            'ID3',
            'TipoID3',
            'TipoID',
            'Activo',
            'DescOrder',
            'Clase',
            'Represent',
            'Direc1',
            'Direc2',
            'Pais',
            'Estado',
            'Ciudad',
            'Municipio',
            'ZipCode',
            'Telef',
            'Movil',
            'Email:email',
            'Fax',
            'FechaE',
            'CodZona',
            'CodVend',
            'CodConv',
            'CodAlte',
            'TipoCli',
            'TipoPVP',
            'Observa',
            'EsMoneda',
            'EsCredito',
            'LimiteCred',
            'DiasCred',
            'EsToleran',
            'DiasTole',
            'IntMora',
            'Descto',
            'Saldo',
            'PagosA',
            'FechaUV',
            'MontoUV',
            'NumeroUV',
            'FechaUP',
            'MontoUP',
            'NumeroUP',
            'MontoMax',
            'MtoMaxCred',
            'PromPago',
            'RetenIVA',
            'SaldoPtos',
            'EsReten',
            'DescripExt',
        ],
    ]) ?>

</div>
