<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comunidad".
 *
 * @property integer $id_comu
 * @property integer $id_cant
 * @property string $nom_comu
 * @property string $des_comu
 * @property integer $num_vivi
 *
 * @property Canton $idCant
 */
class Comunidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comunidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comu', 'nom_comu', 'des_comu'], 'required'],
            [['id_comu', 'id_cant', 'num_vivi'], 'integer'],
            [['nom_comu'], 'string', 'max' => 50],
            [['des_comu'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comu' => Yii::t('app', 'Id Comu'),
            'id_cant' => Yii::t('app', 'Id Cant'),
            'nom_comu' => Yii::t('app', 'Nom Comu'),
            'des_comu' => Yii::t('app', 'Des Comu'),
            'num_vivi' => Yii::t('app', 'Num Vivi'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCant()
    {
        return $this->hasOne(Canton::className(), ['id_cant' => 'id_cant']);
    }
}
