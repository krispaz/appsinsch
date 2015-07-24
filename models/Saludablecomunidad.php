<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saludablecomunidad".
 *
 * @property integer $id_sal_com
 * @property boolean $sub1_sal_com
 * @property boolean $_____madre_c_seg_salud_iess_cam
 * @property boolean $_____nino_con_numero_de_identif
 * @property boolean $______tiene_c_i___
 * @property boolean $______tiene_educacion_primaria_
 * @property boolean $_____no__tiene_mas_de_3_dependi
 * @property boolean $______recibe_el_bdh__
 * @property boolean $______recibe_incentivo_desnutri
 * @property boolean $______participo_en_algun_proyec
 * @property boolean $______recibio_estimulacion_temp
 * @property boolean $______recibio_visita_domiciliar
 * @property boolean $______hay_educacion_temprana__c
 * @property boolean $______hay_produccion_de_algun_a
 * @property boolean $_____atendio_ult_enf__en_1trd_2
 * @property string $pro_sal_com
 *
 * @property Factencuesta[] $factencuestas
 */
class Saludablecomunidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'saludablecomunidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub1_sal_com', '_____madre_c_seg_salud_iess_cam', '_____nino_con_numero_de_identif', '______tiene_c_i___', '______tiene_educacion_primaria_', '_____no__tiene_mas_de_3_dependi', '______recibe_el_bdh__', '______recibe_incentivo_desnutri', '______participo_en_algun_proyec', '______recibio_estimulacion_temp', '______recibio_visita_domiciliar', '______hay_educacion_temprana__c', '______hay_produccion_de_algun_a', '_____atendio_ult_enf__en_1trd_2'], 'required',"message"=>"Campo obligatorio"],
            [['sub1_sal_com', '_____madre_c_seg_salud_iess_cam', '_____nino_con_numero_de_identif', '______tiene_c_i___', '______tiene_educacion_primaria_', '_____no__tiene_mas_de_3_dependi', '______recibe_el_bdh__', '______recibe_incentivo_desnutri', '______participo_en_algun_proyec', '______recibio_estimulacion_temp', '______recibio_visita_domiciliar', '______hay_educacion_temprana__c', '______hay_produccion_de_algun_a', '_____atendio_ult_enf__en_1trd_2'], 'boolean'],
            [['pro_sal_com'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sal_com' => Yii::t('app', 'Id Comunidad Saludable'),
            'sub1_sal_com' => Yii::t('app', 'Niño c/seg.salud(IESS,Campes.,Gen.l,Ot.)'),
            '_____madre_c_seg_salud_iess_cam' => Yii::t('app', 'Madre c/seg.salud(IESS,Campes.,Gen.,Ot.)'),
            '_____nino_con_numero_de_identif' => Yii::t('app', 'Niño con número de identificación (C.I.)'),
            '______tiene_c_i___' => Yii::t('app', 'Tiene C.I.'),
            '______tiene_educacion_primaria_' => Yii::t('app', '.Tiene educación primaria completa'),
            '_____no__tiene_mas_de_3_dependi' => Yii::t('app', '.Tiene mas de 3 dependientes'),
            '______recibe_el_bdh__' => Yii::t('app', 'Recibe el B.D.H'),
            '______recibe_incentivo_desnutri' => Yii::t('app', '.Recibe Incentivo Desnutrición Cero (IDC)'),
            '______participo_en_algun_proyec' => Yii::t('app', '.Participó en algún proyecto productivo'),
            '______recibio_estimulacion_temp' => Yii::t('app', 'Recibió estimulación temprana'),
            '______recibio_visita_domiciliar' => Yii::t('app', 'Recibió visita domiciliaria por U.O'),
            '______hay_educacion_temprana__c' => Yii::t('app', 'Hay Educacion Temprana (CIBV, CNH) '),
            '______hay_produccion_de_algun_a' => Yii::t('app', '.Hay producción de algún alimento'),
            '_____atendio_ult_enf__en_1trd_2' => Yii::t('app', 'Atendió últ.enf. en 1Trd,2 Pub,3 Prv, 4 Otr.'),
            'pro_sal_com' => Yii::t('app', 'Pro Sal Com'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_sal_com' => 'id_sal_com']);
    }
}
