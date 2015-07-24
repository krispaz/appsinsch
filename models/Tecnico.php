<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tecnico".
 *
 * @property integer $id_tecn
 * @property integer $id_cant
 * @property string $ci_tecn
 * @property string $nom_tecn
 * @property string $ape_tecn
 * @property string $obs_tecn
 * @property integer $num_viv_asig
 * @property string $nombre_corto
 *
 * @property Canton $idCant
 */
class Tecnico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tecnico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cant', 'num_viv_asig'], 'integer'],
            [['ci_tecn', 'nom_tecn', 'ape_tecn', 'obs_tecn', 'nombre_corto'], 'required'],
            [['ci_tecn'], 'number'],
            [['nombre_corto'], 'string'],
            [['nom_tecn', 'ape_tecn'], 'string', 'max' => 50],
            [['obs_tecn'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tecn' => Yii::t('app', 'Id Tecn'),
            'id_cant' => Yii::t('app', 'Id Cantón'),
            'ci_tecn' => Yii::t('app', 'C.I. Técnico'),
            'nom_tecn' => Yii::t('app', 'Nombre Técnico'),
            'ape_tecn' => Yii::t('app', 'Apellido Técnico'),
            'obs_tecn' => Yii::t('app', 'Observacion Técnico'),
            'num_viv_asig' => Yii::t('app', 'Num. Viviendas Asignadas'),
            'nombre_corto' => Yii::t('app', 'Nombre Corto'),
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
