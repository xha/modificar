<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_usuario',
            'usuario',
            'correo',
            'cedula',
            //'clave',
            'nombre',
            'apellido',
            // 'sexo',
            // 'respuesta_seguridad',
            // 'fecha_registro',
            // 'telefono',
            'activo:boolean',
            // 'id_rol',
            // 'id_pregunta',
            // 'id_cliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
