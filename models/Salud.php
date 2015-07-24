<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salud".
 *
 * @property integer $id_sal
 * @property boolean $_____no_tuvo_fiebre__
 * @property boolean $_____no_si_es_gestante__molesti
 * @property boolean $_____no_si_es_gestante__dolor_d
 * @property boolean $_____no_si_es_gestante__sangrad
 * @property boolean $_____no_tuvo_diarrea__
 * @property boolean $_____no_tuvo_tos_dol_garg_gripe
 * @property boolean $_____no_tuvo_vomito__
 * @property string $pro_sal
 *
 * @property Factencuesta[] $factencuestas
 */
class Salud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_____no_tuvo_fiebre__', '_____no_si_es_gestante__molesti', '_____no_si_es_gestante__dolor_d', '_____no_si_es_gestante__sangrad', '_____no_tuvo_diarrea__', '_____no_tuvo_tos_dol_garg_gripe', '_____no_tuvo_vomito__'], 'required',"message"=>"Campo obligatorio"],
            [['_____no_tuvo_fiebre__', '_____no_si_es_gestante__molesti', '_____no_si_es_gestante__dolor_d', '_____no_si_es_gestante__sangrad', '_____no_tuvo_diarrea__', '_____no_tuvo_tos_dol_garg_gripe', '_____no_tuvo_vomito__'], 'boolean'],
            [['pro_sal'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sal' => Yii::t('app', 'Id Sal'),
            '_____no_tuvo_fiebre__' => Yii::t('app', 'Tuvo Fiebre'),
            '_____no_si_es_gestante__molesti' => Yii::t('app', 'SI es gestante, molestias urinarias'),
            '_____no_si_es_gestante__dolor_d' => Yii::t('app', 'SI es gestante, dolor de cabeza o mareos'),
            '_____no_si_es_gestante__sangrad' => Yii::t('app', 'SI es gestante, sangrado o hemorragia'),
            '_____no_tuvo_diarrea__' => Yii::t('app', ' Tuvo Diarrea'),
            '_____no_tuvo_tos_dol_garg_gripe' => Yii::t('app', 'Tuvo tos,dol.garg,gripe,dif.resp.'),
            '_____no_tuvo_vomito__' => Yii::t('app', ' Tuvo Vomito'),
            'pro_sal' => Yii::t('app', 'Pro Sal'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_sal' => 'id_sal']);
    }
}
