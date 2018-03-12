<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\jui\Tabs;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;
use kartik\tabs\TabsX;
use frontend\models\Vendedor;
use frontend\models\Ubicacion;

$this->registerJsFile('@web/general.js');
//$this->registerJsFile('@web/js/venta.js');
$this->registerCssFile('@web/css/general.css');
//$id_usuario = Yii::$app->user->identity->id_usuario;
$id_usuario = 1;
date_default_timezone_set("America/Caracas");
$fecha= time();
$fecha=date('d-m-Y',$fecha);

    $contenido1='<table class="tablas inicial_em1">
                <tr>
                    <td>
                        Fila<br />
                        <input id="d_fila" maxlength="5" class="texto texto-xc" onkeypress="return entero(event);" />
                    </td>
                    <td>
                        Tipo de Item<br />
                        <select class="texto texto-ec" id="tipo_item" disabled="true">
                            <option value="1">Servicio</option>
                            <option value="0">Producto</option>
                        </select>
                    </td>
                    <td>
                        Cod. de Item *<br />
                        <input id="d_codigo" maxlength="10" class="texto texto-ec izq" onblur="carga_servicios(this.value)" />
                    </td>
                    <td colspan="3">
                        Descripci&oacute;n *<br />
                        <input id="d_nombre" maxlength="120" class="texto texto-largo" readonly />
                    </td> 
                    <td valign="button" rowspan="2">
                        <button type="button" class="btn btn-primary" id="d_agregar" onclick="valida_detalle()">Actualizar</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cantidad *<br />
                        <input id="d_cantidad" maxlength="10" class="texto texto-xc" 
                         onkeypress="return entero(event);" onkeyup="valida_cantidad(this.id)" onblur="calcula_subtotal()" />
                    </td>
                    <td>
                        Precio *<br />
                        <input id="d_precio" maxlength="20" class="texto texto-corto" 
                         onkeypress="return entero(event);" onkeyup="valida_cantidad(this.id)" onblur="calcula_subtotal()" />
                    </td>
                    <td>
                        Descuento<br />
                        <input id="d_descuento" maxlength="10" class="texto texto-ec" placeholder="%" 
                         onkeypress="return entero(event);" onblur="calcula_subtotal()" />
                    </td>
                    <td>
                        IVA<br />
                        <select class="texto texto-xc" id="d_iva" onchange="calcula_subtotal()"></select>
                    </td>
                    <td>
                        Impuesto<br />
                        <input id="d_impuesto" readonly maxlength="20" class="texto texto-ec" />
                    </td>
                    <td>
                        Total Item<br />
                        <input id="d_total" readonly maxlength="20" class="texto texto-ec" />
                    </td>
                </tr>
            </table>
            <table class="tablas inicial00" id="listado_detalle">
                <tr>
                    <th>Nro</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Tax</th>
                    <th>Descuento</th>
                    <th>Total</th>
                    <th>Serv</th>
                    <th>Imp</th>
                    <th>Opt</th>
                </tr>
            </table>';

    $contenido2 = '<table class="tablas">
                <tr>
                    <td align="right">Nota 1</td>
                    <td><input id="venta-notas1" name="Presupuesto[Notas1]" maxlength="60" class="texto texto-el" /></td>
                </tr> 
                <tr>
                    <td align="right">Nota 2</td>
                    <td><input id="venta-notas2" name="Presupuesto[Notas2]" maxlength="60" class="texto texto-el" /></td>
                </tr> 
                <tr>
                    <td align="right">Nota 3</td>
                    <td><input id="venta-notas3" name="Presupuesto[Notas3]" maxlength="60" class="texto texto-el" /></td>
                </tr> 
                <tr>
                    <td align="right">Nota 4</td>
                    <td><input id="venta-notas4" name="Presupuesto[Notas4]" maxlength="60" class="texto texto-el" /></td>
                </tr> 
                <tr>
                    <td align="right">Nota 5</td>
                    <td><input id="venta-notas5" name="Presupuesto[Notas5]" maxlength="60" class="texto texto-el" /></td>
                </tr> 
            </table>';
?>

<div class="venta-form">

    <div class="form-group">
        <?= Html::submitButton("Actualizar Presupuesto",array('class'=>'btn btn-success','onclick'=>'js:enviar_data();')); ?>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <?php //Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <input type="hidden" id='i_items' name='i_items' />
    <?= $form->field($model, "id_usuario")->hiddenInput(['value'=> 1])->label(false); ?>
    <div class="inicial_em1">
        <table class="tabla-decorada" height="202">
            <tr>
                <td align="right"><b>Cliente</b></td>
                <td valign="top">
                    <?= $form->field($model, 'CodClie')->label(false)->widget(\yii\jui\AutoComplete::classname(), [
                            'clientOptions' => [
                                'source' => $data,
                                'minLength'=>'4', 
                            ],
                            'options' => ['class' => 'texto texto-ec','onblur'=>'js: split_clientes()'],

                        ]) 
                    ?>
                </td>
                <td>
                    <?= $form->field($model, 'Descrip')->TextInput(['class' => 'texto texto-largo', 'readonly' => true])->label(false); ?>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Vendedor</b></td>
                <td>
                    <?= Html::activeDropDownList($model, 'CodVend',
                      ArrayHelper::map(Vendedor::find()->where(['activo' => '1'])->OrderBy('Descrip')->all(), 'CodVend', 'Descrip'), ['class'=>'form-control','prompt'=>'Seleccione']) ?>
                </td>
                <td align="right" rowspan="3">
                    <img src="../../../img/saint.jpg" width="167" />
                </td>
            </tr>
            <tr>
                <td align="right"><b>Ubicación</b></td>
                <td>
                    <?= Html::activeDropDownList($model, 'CodUbic',
                      ArrayHelper::map(Ubicacion::find()->where(['activo' => '1'])->OrderBy('Descrip')->all(), 'CodUbic', 'Descrip'), ['class'=>'form-control','prompt'=>'Seleccione']) ?>
                </td>
            </tr>
            <tr>
                <td align="right"><br /><b>Fecha *</b></td>
                <td>
                    <?= $form->field($model, 'FechaE')->label(false)->widget(DatePicker::classname(), [
                            'language' => 'es',
                            'removeButton'=>false,
                            'options' => ['class' => 'texto texto-ec', 'readonly' => true, 'value' => $fecha],
                            'pluginOptions' => [
                                'endDate' => date('d-m-Y'),
                                'autoclose'=>true,
                                'format' => 'dd-mm-yyyy',
                            ]
                        ]);
                    ?>
                </td>
            </tr>
        </table>
        <table class="tabla-decorada" style="width:25em">
            <tr>
                <td align="right"><b>Documento</b></td>
                <td><?= $form->field($model, 'NumeroD')->TextInput(['class' => 'texto texto-corto', 'readonly' => true])->label(false); ?></td>
            </tr>
            <tr>
                <td align="right"><b>Descuento</b></td>
                <td><input id="descuento" readonly class="texto texto-corto" /></td>
            </tr>
            <tr>
                <td align="right"><b>Sub Total</b></td>
                <td><input readonly id="sub_total" class="texto texto-corto" /></td>
            </tr>
            <tr>
                <td align="right"><b>Impuestos</b></td>
                <td><input readonly id="impuesto" class="texto texto-corto" /></td>
            </tr>
            <tr>
                <td align="right"><b>Total</b></td>
                <td><input readonly id="total" class="texto texto-corto" /></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 100%">
    <?php 
        Modal::begin([
            "id" => "m_servicio",
            "header" => "<h3>Listado de Ites</h3>",
            "toggleButton" => ["label" => "Agregar Producto / Servicio", 'class' => 'btn btn-primary'],
        ]);

        echo "<input class='texto texto medio' id='m_producto' />
            <label class='btn btn-primary' onclick='buscar_items()'>Buscar</label>
            <br /><br />
            <div style='max-height: 600px; overflow-y: scroll; width: 100%' >
                <table id='resultado_producto' class='tablas inicial00' style='width: 98%'></table>
            </div>";

        Modal::end();
    ?>
    </div>
    <table>
        <tr>
            <td>
                <?php
                    echo TabsX::widget([
                        'position' => TabsX::POS_ABOVE,
                        'align' => TabsX::ALIGN_LEFT,
                        'items' => [
                            [
                                'label' => 'Items',
                                'content' => $contenido1,
                                'active' => true
                            ],
                            [
                                'label' => 'Comentarios',
                                'content' => $contenido2,
                                'headerOptions' => ['style'=>'font-weight:bold'],
                                'options' => ['id' => 'myveryownID'],
                            ],
                        ],
                    ]);
                ?>
            </td>
        </tr>
    </table>

    <?= $form->field($model, 'TipoFac')->hiddenInput(['value'=>'F'])->label(false); ?>
    <?= $form->field($model, 'CodSucu')->hiddenInput(['value'=>'00000'])->label(false); ?>
    <?= $form->field($model, 'TotalPrd')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'TotalSrv')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'CostoPrd')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'CostoSrv')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'Monto')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'MtoTax')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'MtoTotal')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'TGravable')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'TExento')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'DesctoP')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'CodUsua')->hiddenInput(['value'=>$id_usuario])->label(false); ?>
    <?= $form->field($model, 'Signo')->hiddenInput(['value'=>'1'])->label(false); ?>
    <?= $form->field($model, 'EsExPickup')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'Factor')->hiddenInput(['value'=>'1'])->label(false); ?>
    <?= $form->field($model, 'MontoMEx')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'Fletes')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'RetenIVA')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'Credito')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'Contado')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'EsCorrel')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'Municipio')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'TipoTraE')->hiddenInput(['value'=>'0'])->label(false); ?>
    <?= $form->field($model, 'TGravable0')->hiddenInput(['value'=>'0'])->label(false); ?>

    <?php ActiveForm::end(); ?>

</div>
