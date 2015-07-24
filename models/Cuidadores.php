<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuidadores".
 *
 * @property integer $id_cui
 * @property boolean $_____padre_estuvo_con_nino_ayer
 * @property boolean $_____madre_dio_de_comer_al_nino
 * @property boolean $______fue_su_madre_o_padre__
 * @property boolean $______fue_mayor_de_edad__18____
 * @property boolean $______lee_y_escribe_castellano_
 * @property boolean $______asistio_a_sesion_demostra
 * @property boolean $______recibio_capacitacion_en_e
 * @property boolean $______recibio_consejeria_en_pla
 * @property boolean $______conoce_lo_que_es_educacio
 * @property string $pro_cui
 *
 * @property Factencuesta[] $factencuestas
 */
class Cuidadores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuidadores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_____padre_estuvo_con_nino_ayer', '_____madre_dio_de_comer_al_nino', '______fue_su_madre_o_padre__', '______fue_mayor_de_edad__18____', '______lee_y_escribe_castellano_', '______asistio_a_sesion_demostra', '______recibio_capacitacion_en_e', '______recibio_consejeria_en_pla', '______conoce_lo_que_es_educacio'], 'required',"message"=>"Campo obligatorio"],
            [['_____padre_estuvo_con_nino_ayer', '_____madre_dio_de_comer_al_nino', '______fue_su_madre_o_padre__', '______fue_mayor_de_edad__18____', '______lee_y_escribe_castellano_', '______asistio_a_sesion_demostra', '______recibio_capacitacion_en_e', '______recibio_consejeria_en_pla', '______conoce_lo_que_es_educacio'], 'boolean'],
            [['pro_cui'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cui' => Yii::t('app', 'Id Cui'),
            '_____padre_estuvo_con_nino_ayer' => Yii::t('app', 'Padre estuvo con el niño ayer'),
            '_____madre_dio_de_comer_al_nino' => Yii::t('app', 'Madre dió de comer al niño ayer'),
            '______fue_su_madre_o_padre__' => Yii::t('app', 'Fue su Madre o Padre'),
            '______fue_mayor_de_edad__18____' => Yii::t('app', 'Fue mayor de edad  (18+)'),
            '______lee_y_escribe_castellano_' => Yii::t('app', 'Lee y esribe castellano'),
            '______asistio_a_sesion_demostra' => Yii::t('app', 'Asistió a sesion demostrativa de alimentos'),
            '______recibio_capacitacion_en_e' => Yii::t('app', 'Recibió capacitación en estimulación temprana'),
            '______recibio_consejeria_en_pla' => Yii::t('app', 'Recibió consejería en planificación familiar'),
            '______conoce_lo_que_es_educacio' => Yii::t('app', 'Conoce lo que es Educación Inicial'),
            'pro_cui' => Yii::t('app', 'Pro Cui'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_cui' => 'id_cui']);
    }
}
