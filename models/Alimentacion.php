<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alimentacion".
 *
 * @property integer $id_ali
 * @property boolean $_____recibio_lactancia_materna_
 * @property boolean $_____recibio_supl__hierro__chis
 * @property boolean $_____si_es_gestante__recibio_su
 * @property boolean $_____estuvo_al_dia_con_suplemen
 * @property boolean $_____no_recibio_algun_alimento_
 * @property boolean $_____recibio_3_o_mas_comidas_es
 * @property string $pro_ali
 *
 * @property Factencuesta[] $factencuestas
 */
class Alimentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alimentacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_____recibio_lactancia_materna_', '_____recibio_supl__hierro__chis', '_____si_es_gestante__recibio_su', '_____estuvo_al_dia_con_suplemen', '_____no_recibio_algun_alimento_', '_____recibio_3_o_mas_comidas_es'], 'required',"message"=>"Campo obligatorio"],
            [['_____recibio_lactancia_materna_', '_____recibio_supl__hierro__chis', '_____si_es_gestante__recibio_su', '_____estuvo_al_dia_con_suplemen', '_____no_recibio_algun_alimento_', '_____recibio_3_o_mas_comidas_es'], 'boolean'],
            [['pro_ali'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ali' => Yii::t('app', 'Id Ali'),
            '_____recibio_lactancia_materna_' => Yii::t('app', 'Recibió lactancia materna'),
            '_____recibio_supl__hierro__chis' => Yii::t('app', 'Recibió supl. Hierro, Chispaz'),
            '_____si_es_gestante__recibio_su' => Yii::t('app', 'SI es gestante, recibió supl. Ac. Fólico'),
            '_____estuvo_al_dia_con_suplemen' => Yii::t('app', 'Estuvo al dia con suplemento VA'),
            '_____no_recibio_algun_alimento_' => Yii::t('app', 'Recibió algún alimento distinto de leche materna'),
            '_____recibio_3_o_mas_comidas_es' => Yii::t('app', 'Recibió 3 o mas comidas espesas'),
            'pro_ali' => Yii::t('app', 'Pro Ali'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_ali' => 'id_ali']);
    }
}
