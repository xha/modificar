<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "SASERV".
 *
 * @property string $CodServ
 * @property int $CodInst
 * @property string $Descrip
 * @property string $Descrip2
 * @property string $Descrip3
 * @property string $Clase
 * @property int $Activo
 * @property string $Unidad
 * @property string $Precio1
 * @property string $PrecioI1
 * @property string $Precio2
 * @property string $PrecioI2
 * @property string $Precio3
 * @property string $PrecioI3
 * @property string $Costo
 * @property int $EsExento
 * @property int $EsReten
 * @property int $EsPorCost
 * @property int $UsaServ
 * @property string $Comision
 * @property int $EsPorComi
 * @property string $FechaUV
 * @property string $FechaUC
 * @property int $EsImport
 * @property int $EsVenta
 * @property int $EsCompra
 */
class Servicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SASERV';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CodServ'], 'required'],
            [['CodServ', 'Descrip', 'Descrip2', 'Descrip3', 'Clase', 'Unidad'], 'string'],
            [['CodInst', 'Activo', 'EsExento', 'EsReten', 'EsPorCost', 'UsaServ', 'EsPorComi', 'EsImport', 'EsVenta', 'EsCompra'], 'integer'],
            [['Precio1', 'PrecioI1', 'Precio2', 'PrecioI2', 'Precio3', 'PrecioI3', 'Costo', 'Comision'], 'number'],
            [['FechaUV', 'FechaUC'], 'safe'],
            [['CodServ'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CodServ' => 'Cod Serv',
            'CodInst' => 'Cod Inst',
            'Descrip' => 'Descrip',
            'Descrip2' => 'Descrip2',
            'Descrip3' => 'Descrip3',
            'Clase' => 'Clase',
            'Activo' => 'Activo',
            'Unidad' => 'Unidad',
            'Precio1' => 'Precio1',
            'PrecioI1' => 'Precio I1',
            'Precio2' => 'Precio2',
            'PrecioI2' => 'Precio I2',
            'Precio3' => 'Precio3',
            'PrecioI3' => 'Precio I3',
            'Costo' => 'Costo',
            'EsExento' => 'Es Exento',
            'EsReten' => 'Es Reten',
            'EsPorCost' => 'Es Por Cost',
            'UsaServ' => 'Usa Serv',
            'Comision' => 'Comision',
            'EsPorComi' => 'Es Por Comi',
            'FechaUV' => 'Fecha Uv',
            'FechaUC' => 'Fecha Uc',
            'EsImport' => 'Es Import',
            'EsVenta' => 'Es Venta',
            'EsCompra' => 'Es Compra',
        ];
    }

    /**
     * @inheritdoc
     * @return ServicioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicioQuery(get_called_class());
    }
}
