<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desnutricion".
 *
 * @property integer $id_des
 * @property string $sub1_des
 * @property string $avance_total__
 *
 * @property Factencuesta[] $factencuestas
 */
class Desnutricion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desnutricion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub1_des'], 'required'],
            [['sub1_des', 'avance_total__'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_des' => Yii::t('app', 'Id Des'),
            'sub1_des' => Yii::t('app', 'Sub1 Des'),
            'avance_total__' => Yii::t('app', 'Avance Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactencuestas()
    {
        return $this->hasMany(Factencuesta::className(), ['id_des' => 'id_des']);
    }
}
