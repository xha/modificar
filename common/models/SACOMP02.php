<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "SACOMP_02".
 *
 * @property string $CodSucu
 * @property string $TipoCom
 * @property string $NumeroD
 * @property string $CodProv
 * @property int $Compra_Ubic
 * @property int $Cond_Compra
 * @property int $Moneda_Util
 * @property string $Factor_Cambio
 * @property string $Inicio
 * @property string $Finaliza
 * @property string $VAN
 * @property string $CondCompra
 * @property string $LugarCompra
 * @property string $Moneda
 * @property string $TasaCambio
 * @property string $LugarEntrega
 * @property int $TiempoEntrega
 * @property string $FormaEntrega
 * @property int $P_Anticipo
 * @property string $Anticipo
 * @property int $PorcAnticipo
 * @property string $MtoAnticipo
 * @property int $P_FF_Cumplim
 * @property string $FFielCumplim
 * @property int $PorcFielCumplim
 * @property string $MtoFCumplim
 * @property int $PorcIncumplim
 * @property int $P_RespSocial
 * @property string $RespSocial
 * @property int $PorcRespSocial
 * @property string $MtoRSocial
 * @property int $P_GLaboral
 * @property string $GLaboral
 * @property int $PorcGLaboral
 * @property string $MtoGLaboral
 * @property int $P_PoliRespCivil
 * @property string $PoliRespCivil
 * @property int $PorcRespCivil
 * @property string $MtoRespCivil
 * @property int $TipoDoc
 * @property string $Verif_03
 */
class SACOMP02 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SACOMP_02';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CodSucu', 'TipoCom', 'NumeroD', 'CodProv'], 'required'],
            [['CodSucu', 'TipoCom', 'NumeroD', 'CodProv', 'CondCompra', 'LugarCompra', 'Moneda', 'LugarEntrega', 'FormaEntrega', 'Anticipo', 'FFielCumplim', 'RespSocial', 'GLaboral', 'PoliRespCivil', 'Verif_03'], 'string'],
            [['Compra_Ubic', 'Cond_Compra', 'Moneda_Util', 'TiempoEntrega', 'P_Anticipo', 'PorcAnticipo', 'P_FF_Cumplim', 'PorcFielCumplim', 'PorcIncumplim', 'P_RespSocial', 'PorcRespSocial', 'P_GLaboral', 'PorcGLaboral', 'P_PoliRespCivil', 'PorcRespCivil', 'TipoDoc'], 'integer'],
            [['Factor_Cambio', 'VAN', 'TasaCambio', 'MtoAnticipo', 'MtoFCumplim', 'MtoRSocial', 'MtoGLaboral', 'MtoRespCivil'], 'number'],
            [['Inicio', 'Finaliza'], 'safe'],
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
            'Compra_Ubic' => 'Compra  Ubic',
            'Cond_Compra' => 'Cond  Compra',
            'Moneda_Util' => 'Moneda  Util',
            'Factor_Cambio' => 'Factor  Cambio',
            'Inicio' => 'Inicio',
            'Finaliza' => 'Finaliza',
            'VAN' => 'Van',
            'CondCompra' => 'Cond Compra',
            'LugarCompra' => 'Lugar Compra',
            'Moneda' => 'Moneda',
            'TasaCambio' => 'Tasa Cambio',
            'LugarEntrega' => 'Lugar Entrega',
            'TiempoEntrega' => 'Tiempo Entrega',
            'FormaEntrega' => 'Forma Entrega',
            'P_Anticipo' => 'P  Anticipo',
            'Anticipo' => 'Anticipo',
            'PorcAnticipo' => 'Porc Anticipo',
            'MtoAnticipo' => 'Mto Anticipo',
            'P_FF_Cumplim' => 'P  Ff  Cumplim',
            'FFielCumplim' => 'Ffiel Cumplim',
            'PorcFielCumplim' => 'Porc Fiel Cumplim',
            'MtoFCumplim' => 'Mto Fcumplim',
            'PorcIncumplim' => 'Porc Incumplim',
            'P_RespSocial' => 'P  Resp Social',
            'RespSocial' => 'Resp Social',
            'PorcRespSocial' => 'Porc Resp Social',
            'MtoRSocial' => 'Mto Rsocial',
            'P_GLaboral' => 'P  Glaboral',
            'GLaboral' => 'Glaboral',
            'PorcGLaboral' => 'Porc Glaboral',
            'MtoGLaboral' => 'Mto Glaboral',
            'P_PoliRespCivil' => 'P  Poli Resp Civil',
            'PoliRespCivil' => 'Poli Resp Civil',
            'PorcRespCivil' => 'Porc Resp Civil',
            'MtoRespCivil' => 'Mto Resp Civil',
            'TipoDoc' => 'Tipo Doc',
            'Verif_03' => 'Verif 03',
        ];
    }
}
