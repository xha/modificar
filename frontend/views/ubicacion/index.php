<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\Models\UbicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ubicacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ubicacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CodUbic',
            'Descrip',
            'Clase',
            'Activo',
            'Represent',
            //'Direc1',
            //'Direc2',
            //'ZipCode',
            //'Telef',
            //'Printer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
