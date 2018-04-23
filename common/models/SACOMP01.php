<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "SACOMP_01".
 *
 * @property string $CodSucu
 * @property string $TipoCom
 * @property string $NumeroD
 * @property string $CodProv
 * @property string $Codigo
 * @property string $FechaI_P
 * @property string $FechaC_P
 * @property int $Actividad
 * @property int $ModoContrata
 * @property int $Lugar_Ejecucion
 * @property int $ModoCom
 * @property string $RIF_P_01
 * @property string $Emp_Part_01
 * @property int $TipoEmp01
 * @property int $CRS
 * @property string $RIF_P_02
 * @property string $Emp_Part_02
 * @property int $TipoEmp02
 * @property string $RIF_P_03
 * @property string $Emp_Part_03
 * @property int $TipoEmp03
 * @property int $Estado
 * @property int $Estatus_Emp
 * @property string $Verif_01
 */
class SACOMP01 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SACOMP_01';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CodSucu', 'TipoCom', 'NumeroD', 'CodProv', 'ModoContrata', 'Lugar_Ejecucion', 'ModoCom'], 'required'],
            [['CodSucu', 'TipoCom', 'NumeroD', 'CodProv', 'Codigo', 'RIF_P_01', 'Emp_Part_01', 'RIF_P_02', 'Emp_Part_02', 'RIF_P_03', 'Emp_Part_03', 'Verif_01'], 'string'],
            [['FechaI_P', 'FechaC_P'], 'safe'],
            [['Actividad', 'ModoContrata', 'Lugar_Ejecucion', 'ModoCom', 'TipoEmp01', 'CRS', 'TipoEmp02', 'TipoEmp03', 'Estado', 'Estatus_Emp'], 'integer'],
            [['CodProv', 'CodSucu', 'NumeroD', 'TipoCom'], 'unique', 'targetAttribute' => ['CodProv', 'CodSucu', 'NumeroD', 'TipoCom']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CodSucu' => 'Cod Sucu',
            'TipoCom' => 'Tipo Com',
            'NumeroD' => 'Numero D',
            'CodProv' => 'Cod Prov',
            'Codigo' => 'Codigo',
            'FechaI_P' => 'Fecha I  P',
            'FechaC_P' => 'Fecha C  P',
            'Actividad' => 'Actividad',
            'ModoContrata' => 'Modo Contrata',
            'Lugar_Ejecucion' => 'Lugar  Ejecucion',
            'ModoCom' => 'Modo Com',
            'RIF_P_01' => 'Rif  P 01',
            'Emp_Part_01' => 'Emp  Part 01',
            'TipoEmp01' => 'Tipo Emp01',
            'CRS' => 'Crs',
            'RIF_P_02' => 'Rif  P 02',
            'Emp_Part_02' => 'Emp  Part 02',
            'TipoEmp02' => 'Tipo Emp02',
            'RIF_P_03' => 'Rif  P 03',
            'Emp_Part_03' => 'Emp  Part 03',
            'TipoEmp03' => 'Tipo Emp03',
            'Estado' => 'Estado',
            'Estatus_Emp' => 'Estatus  Emp',
            'Verif_01' => 'Verif 01',
        ];
    }
}
