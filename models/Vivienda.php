<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vivienda".
 *
 * @property integer $id_viv
 * @property boolean $_____agua_apta_para_consumo_hum
 * @property boolean $_____usa_alcant_pzo_sep_letr_ad
 * @property boolean $_____cocina_mejorada__r__o_en_c
 * @property boolean $_____no_animales_de_consumo_sue
 * @property boolean $_____no_animales_domesticos_sue
 * @property boolean $_____no_piso_de_tierra__
 * @property boolean $_____no_mat_prec__adobe_paja_ca
 * @property boolean $_____no_viven_mas_de_3_personas
 * @property boolean $_____no_higiene_buena_alrededor
 * @property string $pro_viv
 *
 * @property Factencuesta[] $factencuestas
 */
class Vivienda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vivienda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_____agua_apta_para_consumo_hum', '_____usa_alcant_pzo_sep_letr_ad', '_____cocina_mejorada__r__o_en_c', '_____no_animales_de_consumo_sue', '_____no_animales_domesticos_sue', '_____no_piso_de_tierra__', '_____no_mat_prec__adobe_paja_ca', '_____no_viven_mas_de_3_personas', '_____no_higiene_buena_alrededor'], 'required',"message"=>"Campo obligatorio"],
            [['_____agua_apta_para_consumo_hum', '_____usa_alcant_pzo_sep_letr_ad', '_____cocina_mejorada__r__o_en_c', '_____no_animales_de_consumo_sue', '_____no_animales_domesticos_sue', '_____no_piso_de_tierra__', '_____no_mat_prec__adobe_paja_ca', '_____no_viven_mas_de_3_personas', '_____no_higiene_buena_alrededor'], 'boolean'],
            [['pro_viv'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_viv' => Yii::t('app', 'Id Viv'),
            '_____agua_apta_para_consumo_hum' => Yii::t('app', 'Agua apta para consumo humano'),
            '_____usa_alcant_pzo_sep_letr_ad' => Yii::t('app', 'Usa alcant/pzo.sép/letr.adec.'),
            '_____cocina_mejorada__r__o_en_c' => Yii::t('app', 'Cocina mejorada (R) o en cuarto separado'),
            '_____no_animales_de_consumo_sue' => Yii::t('app', 'Animales de consumo sueltos dentro de casa'),
            '_____no_animales_domesticos_sue' => Yii::t('app', 'Animales domésticos sueltos dentro de casa'),
            '_____no_piso_de_tierra__' => Yii::t('app', 'Piso de tierra'),
            '_____no_mat_prec__adobe_paja_ca' => Yii::t('app', 'mat.prec.(adobe,paja,carrizo,cancagua,zn,mix)'),
            '_____no_viven_mas_de_3_personas' => Yii::t('app', 'Viven mas de 3 personas'),
            '_____no_higiene_buena_alrededor' => Yii::t('app', 'Higiene buena alrededor'),
            'pro_viv' => Yii::t('app', 'Pro Viv'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_viv' => 'id_viv']);
    }
}
