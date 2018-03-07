<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Iva */

$this->title = $model->CodTaxs;
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CodTaxs], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CodTaxs], [
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
            'CodTaxs',
            'Descrip',
            'MtoTax',
            'Activo',
            'EsFijo',
            'EsReten',
            'CodOper',
            'EsPorct',
            'EsCosto',
            'TipoIVA',
            'EsLibroI',
            'EsPartic',
            'EsTaxVenta',
            'EsTaxCompra',
            'MontoMin',
            'MontoMax',
            'Sustraendo',
        ],
    ]) ?>

</div>
