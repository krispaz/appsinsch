<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atencion".
 *
 * @property integer $id_ate
 * @property string $______ultimo_control_pre_nat_se
 * @property boolean $______ha_tenido_algun_ex__lab__
 * @property boolean $______ha_tenido_al_menos_una_ec
 * @property boolean $_____tiene_sus_vacunas_al_dia_p
 * @property boolean $_____ha_tenido_su_ultimo_contro
 * @property boolean $_____recibio_consejeria_nutrici
 * @property boolean $_____nota_a_la_atencion_en_su_s
 * @property boolean $_____carne__1_ant_2_nue_3_hc_0_
 * @property string $pro_ate
 *
 * @property Factencuesta[] $factencuestas
 */
class Atencion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atencion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['______ultimo_control_pre_nat_se', '______ha_tenido_algun_ex__lab__', '______ha_tenido_al_menos_una_ec', '_____tiene_sus_vacunas_al_dia_p', '_____ha_tenido_su_ultimo_contro', '_____recibio_consejeria_nutrici', '_____nota_a_la_atencion_en_su_s', '_____carne__1_ant_2_nue_3_hc_0_'], 'required',"message"=>"Campo obligatorio"],
            [['______ultimo_control_pre_nat_se'], 'safe'],
            [['______ha_tenido_algun_ex__lab__', '______ha_tenido_al_menos_una_ec', '_____tiene_sus_vacunas_al_dia_p', '_____ha_tenido_su_ultimo_contro', '_____recibio_consejeria_nutrici', '_____nota_a_la_atencion_en_su_s', '_____carne__1_ant_2_nue_3_hc_0_'], 'boolean'],
            [['pro_ate'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ate' => Yii::t('app', 'Id Ate'),
            '______ultimo_control_pre_nat_se' => Yii::t('app', '.último control pre-nat según esquema'),
            '______ha_tenido_algun_ex__lab__' => Yii::t('app', '.ha tenido algún ex. lab. (Hb y Orina)'),
            '______ha_tenido_al_menos_una_ec' => Yii::t('app', '.ha tenido al menos una ecografía'),
            '_____tiene_sus_vacunas_al_dia_p' => Yii::t('app', 'Tiene sus vacunas al dia para su edad'),
            '_____ha_tenido_su_ultimo_contro' => Yii::t('app', 'Ha tenido su último control de niño según edad'),
            '_____recibio_consejeria_nutrici' => Yii::t('app', 'Recibió consejería nutricional último C.N.Sano'),
            '_____nota_a_la_atencion_en_su_s' => Yii::t('app', 'Nota a la atención en su serv. Salud'),
            '_____carne__1_ant_2_nue_3_hc_0_' => Yii::t('app', 'Carné (1 ant,2 nue,3 hc,0 nada)'),
            'pro_ate' => Yii::t('app', 'Pro Ate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_ate' => 'id_ate']);
    }
}
