<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "SAPROD".
 *
 * @property string $CodProd
 * @property string $Descrip
 * @property int $CodInst
 * @property int $Activo
 * @property string $Descrip2
 * @property string $Descrip3
 * @property string $Refere
 * @property string $Marca
 * @property string $Unidad
 * @property string $UndEmpaq
 * @property string $CantEmpaq
 * @property string $Precio1
 * @property string $Precio2
 * @property string $PrecioU2
 * @property string $Precio3
 * @property string $PrecioU3
 * @property string $PrecioU
 * @property string $CostAct
 * @property string $CostPro
 * @property string $CostAnt
 * @property string $Existen
 * @property string $ExUnidad
 * @property string $Compro
 * @property string $Pedido
 * @property string $Minimo
 * @property string $Maximo
 * @property string $Tara
 * @property int $DEsComp
 * @property int $DEsComi
 * @property int $DEsSeri
 * @property int $EsReten
 * @property int $DEsLote
 * @property int $DEsVence
 * @property int $EsImport
 * @property int $EsExento
 * @property int $EsEnser
 * @property int $EsOferta
 * @property int $EsPesa
 * @property int $EsEmpaque
 * @property int $ExDecimal
 * @property int $DiasEntr
 * @property string $FechaUV
 * @property string $FechaUC
 * @property int $DiasTole
 * @property string $Peso
 * @property string $Volumen
 * @property string $UndVol
 * @property string $concentracion
 * @property string $cantidad_farmacia
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SAPROD';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CodProd'], 'required'],
            [['CodProd', 'Descrip', 'Descrip2', 'Descrip3', 'Refere', 'Marca', 'Unidad', 'UndEmpaq', 'UndVol', 'concentracion'], 'string'],
            [['CodInst', 'Activo', 'DEsComp', 'DEsComi', 'DEsSeri', 'EsReten', 'DEsLote', 'DEsVence', 'EsImport', 'EsExento', 'EsEnser', 'EsOferta', 'EsPesa', 'EsEmpaque', 'ExDecimal', 'DiasEntr', 'DiasTole'], 'integer'],
            [['CantEmpaq', 'Precio1', 'Precio2', 'PrecioU2', 'Precio3', 'PrecioU3', 'PrecioU', 'CostAct', 'CostPro', 'CostAnt', 'Existen', 'ExUnidad', 'Compro', 'Pedido', 'Minimo', 'Maximo', 'Tara', 'Peso', 'Volumen', 'cantidad_farmacia'], 'number'],
            [['FechaUV', 'FechaUC'], 'safe'],
            [['CodProd'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CodProd' => 'Cod Prod',
            'Descrip' => 'Descrip',
            'CodInst' => 'Cod Inst',
            'Activo' => 'Activo',
            'Descrip2' => 'Descrip2',
            'Descrip3' => 'Descrip3',
            'Refere' => 'Refere',
            'Marca' => 'Marca',
            'Unidad' => 'Unidad',
            'UndEmpaq' => 'Und Empaq',
            'CantEmpaq' => 'Cant Empaq',
            'Precio1' => 'Precio1',
            'Precio2' => 'Precio2',
            'PrecioU2' => 'Precio U2',
            'Precio3' => 'Precio3',
            'PrecioU3' => 'Precio U3',
            'PrecioU' => 'Precio U',
            'CostAct' => 'Cost Act',
            'CostPro' => 'Cost Pro',
            'CostAnt' => 'Cost Ant',
            'Existen' => 'Existen',
            'ExUnidad' => 'Ex Unidad',
            'Compro' => 'Compro',
            'Pedido' => 'Pedido',
            'Minimo' => 'Minimo',
            'Maximo' => 'Maximo',
            'Tara' => 'Tara',
            'DEsComp' => 'Des Comp',
            'DEsComi' => 'Des Comi',
            'DEsSeri' => 'Des Seri',
            'EsReten' => 'Es Reten',
            'DEsLote' => 'Des Lote',
            'DEsVence' => 'Des Vence',
            'EsImport' => 'Es Import',
            'EsExento' => 'Es Exento',
            'EsEnser' => 'Es Enser',
            'EsOferta' => 'Es Oferta',
            'EsPesa' => 'Es Pesa',
            'EsEmpaque' => 'Es Empaque',
            'ExDecimal' => 'Ex Decimal',
            'DiasEntr' => 'Dias Entr',
            'FechaUV' => 'Fecha Uv',
            'FechaUC' => 'Fecha Uc',
            'DiasTole' => 'Dias Tole',
            'Peso' => 'Peso',
            'Volumen' => 'Volumen',
            'UndVol' => 'Und Vol',
            'concentracion' => 'Concentracion',
            'cantidad_farmacia' => 'Cantidad Farmacia',
        ];
    }
}
