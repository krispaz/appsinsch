<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nutricion".
 *
 * @property integer $id_nut
 * @property integer $sub1_nut
 * @property string $peso_en_kg_con_un_decimal______
 * @property integer $talla__cm_____
 * @property boolean $_____no_tuvo_adelgazamiento__p_
 * @property boolean $_____no_tuvo_sobrepeso__p_t___
 * @property boolean $_____no_baja_ganancia_de_peso__
 * @property boolean $_____no_baja_ganancia_de_talla_
 * @property string $pro_nut
 *
 * @property Factencuesta[] $factencuestas
 */
class Nutricion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nutricion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub1_nut', 'peso_en_kg_con_un_decimal______', 'talla__cm_____', '_____no_tuvo_adelgazamiento__p_', '_____no_tuvo_sobrepeso__p_t___', '_____no_baja_ganancia_de_peso__', '_____no_baja_ganancia_de_talla_'], 'required',"message"=>"Campo obligatorio"],
            [['sub1_nut', 'talla__cm_____'], 'integer',"message"=>"Debe ser numero"],
            [['peso_en_kg_con_un_decimal______', 'pro_nut'], 'number'],
            [['_____no_tuvo_adelgazamiento__p_', '_____no_tuvo_sobrepeso__p_t___', '_____no_baja_ganancia_de_peso__', '_____no_baja_ganancia_de_talla_'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nut' => Yii::t('app', 'Id Nut'),
            'sub1_nut' => Yii::t('app', 'Edad cuando fué pesado, m'),
            'peso_en_kg_con_un_decimal______' => Yii::t('app', 'Peso en Kg con un decimal'),
            'talla__cm_____' => Yii::t('app', 'Talla (cm)'),
            '_____no_tuvo_adelgazamiento__p_' => Yii::t('app', 'Tuvo adelgazamiento (P/T)'),
            '_____no_tuvo_sobrepeso__p_t___' => Yii::t('app', 'Tuvo sobrepeso (P/T)'),
            '_____no_baja_ganancia_de_peso__' => Yii::t('app', 'Baja ganancia de peso'),
            '_____no_baja_ganancia_de_talla_' => Yii::t('app', 'Baja ganancia de talla'),
            'pro_nut' => Yii::t('app', 'Pro Nut'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_nut' => 'id_nut']);
    }
}
