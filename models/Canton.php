<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "canton".
 *
 * @property integer $id_cant
 * @property integer $id_prov
 * @property string $nom_cant
 * @property string $desc_cant
 *
 * @property Provincia $idProv
 * @property Comunidad[] $comunidads
 * @property Tecnico[] $tecnicos
 */
class Canton extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'canton';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cant', 'nom_cant'], 'required'],
            [['id_cant', 'id_prov'], 'integer'],
            [['nom_cant'], 'string', 'max' => 50],
            [['desc_cant'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cant' => Yii::t('app', 'Id Cant'),
            'id_prov' => Yii::t('app', 'Id Prov'),
            'nom_cant' => Yii::t('app', 'Nom Cant'),
            'desc_cant' => Yii::t('app', 'Desc Cant'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProv()
    {
        return $this->hasOne(Provincia::className(), ['id_prov' => 'id_prov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComunidads()
    {
        return $this->hasMany(Comunidad::className(), ['id_cant' => 'id_cant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTecnicos()
    {
        return $this->hasMany(Tecnico::className(), ['id_cant' => 'id_cant']);
    }
}
