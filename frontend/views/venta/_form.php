<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Venta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CodSucu')->textInput() ?>

    <?= $form->field($model, 'TipoFac')->textInput() ?>

    <?= $form->field($model, 'NumeroD')->textInput(['maxlength' => 15, 'readonly' => !$model->isNewRecord]); ?>

    <?= $form->field($model, 'NroCtrol')->textInput() ?>

    <?= $form->field($model, 'CodEsta')->textInput() ?>

    <?= $form->field($model, 'CodUsua')->textInput() ?>

    <?= $form->field($model, 'EsCorrel')->textInput() ?>

    <?= $form->field($model, 'CodConv')->textInput() ?>

    <?= $form->field($model, 'Signo')->textInput() ?>

    <?= $form->field($model, 'FechaT')->textInput() ?>

    <?= $form->field($model, 'OTipo')->textInput() ?>

    <?= $form->field($model, 'ONumero')->textInput() ?>

    <?= $form->field($model, 'NumeroC')->textInput() ?>

    <?= $form->field($model, 'NumeroT')->textInput() ?>

    <?= $form->field($model, 'NumeroR')->textInput() ?>

    <?= $form->field($model, 'TipoTraE')->textInput() ?>

    <?= $form->field($model, 'AutSRI')->textInput() ?>

    <?= $form->field($model, 'NroEstable')->textInput() ?>

    <?= $form->field($model, 'PtoEmision')->textInput() ?>

    <?= $form->field($model, 'NumeroF')->textInput() ?>

    <?= $form->field($model, 'NumeroNCF')->textInput() ?>

    <?= $form->field($model, 'NumeroP')->textInput() ?>

    <?= $form->field($model, 'NumeroE')->textInput() ?>

    <?= $form->field($model, 'NumeroZ')->textInput() ?>

    <?= $form->field($model, 'Moneda')->textInput() ?>

    <?= $form->field($model, 'Factor')->textInput() ?>

    <?= $form->field($model, 'MontoMEx')->textInput() ?>

    <?= $form->field($model, 'CodClie')->textInput() ?>

    <?= $form->field($model, 'CodVend')->textInput() ?>

    <?= $form->field($model, 'CodUbic')->textInput() ?>

    <?= $form->field($model, 'Descrip')->textInput() ?>

    <?= $form->field($model, 'Direc1')->textInput() ?>

    <?= $form->field($model, 'Direc2')->textInput() ?>

    <?= $form->field($model, 'Direc3')->textInput() ?>

    <?= $form->field($model, 'ZipCode')->textInput() ?>

    <?= $form->field($model, 'Telef')->textInput() ?>

    <?= $form->field($model, 'ID3')->textInput() ?>

    <?= $form->field($model, 'Monto')->textInput() ?>

    <?= $form->field($model, 'MtoTax')->textInput() ?>

    <?= $form->field($model, 'Fletes')->textInput() ?>

    <?= $form->field($model, 'TGravable')->textInput() ?>

    <?= $form->field($model, 'TGravable0')->textInput() ?>

    <?= $form->field($model, 'TExento')->textInput() ?>

    <?= $form->field($model, 'CostoPrd')->textInput() ?>

    <?= $form->field($model, 'CostoSrv')->textInput() ?>

    <?= $form->field($model, 'DesctoP')->textInput() ?>

    <?= $form->field($model, 'RetenIVA')->textInput() ?>

    <?= $form->field($model, 'FechaR')->textInput() ?>

    <?= $form->field($model, 'FechaI')->textInput() ?>

    <?= $form->field($model, 'FechaE')->textInput() ?>

    <?= $form->field($model, 'FechaV')->textInput() ?>

    <?= $form->field($model, 'MtoTotal')->textInput() ?>

    <?= $form->field($model, 'Contado')->textInput() ?>

    <?= $form->field($model, 'Credito')->textInput() ?>

    <?= $form->field($model, 'CancelI')->textInput() ?>

    <?= $form->field($model, 'CancelA')->textInput() ?>

    <?= $form->field($model, 'CancelE')->textInput() ?>

    <?= $form->field($model, 'CancelC')->textInput() ?>

    <?= $form->field($model, 'CancelT')->textInput() ?>

    <?= $form->field($model, 'CancelG')->textInput() ?>

    <?= $form->field($model, 'CancelP')->textInput() ?>

    <?= $form->field($model, 'Cambio')->textInput() ?>

    <?= $form->field($model, 'MtoExtra')->textInput() ?>

    <?= $form->field($model, 'ValorPtos')->textInput() ?>

    <?= $form->field($model, 'Descto1')->textInput() ?>

    <?= $form->field($model, 'PctAnual')->textInput() ?>

    <?= $form->field($model, 'MtoInt1')->textInput() ?>

    <?= $form->field($model, 'Descto2')->textInput() ?>

    <?= $form->field($model, 'PctManejo')->textInput() ?>

    <?= $form->field($model, 'MtoInt2')->textInput() ?>

    <?= $form->field($model, 'SaldoAct')->textInput() ?>

    <?= $form->field($model, 'MtoPagos')->textInput() ?>

    <?= $form->field($model, 'MtoNCredito')->textInput() ?>

    <?= $form->field($model, 'MtoNDebito')->textInput() ?>

    <?= $form->field($model, 'MtoFinanc')->textInput() ?>

    <?= $form->field($model, 'DetalChq')->textInput() ?>

    <?= $form->field($model, 'TotalPrd')->textInput() ?>

    <?= $form->field($model, 'TotalSrv')->textInput() ?>

    <?= $form->field($model, 'OrdenC')->textInput() ?>

    <?= $form->field($model, 'CodOper')->textInput() ?>

    <?= $form->field($model, 'NGiros')->textInput() ?>

    <?= $form->field($model, 'NMeses')->textInput() ?>

    <?= $form->field($model, 'MtoComiVta')->textInput() ?>

    <?= $form->field($model, 'MtoComiCob')->textInput() ?>

    <?= $form->field($model, 'MtoComiVtaD')->textInput() ?>

    <?= $form->field($model, 'MtoComiCobD')->textInput() ?>

    <?= $form->field($model, 'Notas1')->textInput() ?>

    <?= $form->field($model, 'Notas2')->textInput() ?>

    <?= $form->field($model, 'Notas3')->textInput() ?>

    <?= $form->field($model, 'Notas4')->textInput() ?>

    <?= $form->field($model, 'Notas5')->textInput() ?>

    <?= $form->field($model, 'Notas6')->textInput() ?>

    <?= $form->field($model, 'Notas7')->textInput() ?>

    <?= $form->field($model, 'Notas8')->textInput() ?>

    <?= $form->field($model, 'Notas9')->textInput() ?>

    <?= $form->field($model, 'Notas10')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
