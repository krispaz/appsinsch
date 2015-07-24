<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ninio".
 *
 * @property integer $id_nin
 * @property string $ci_nin
 * @property string $nom_nin
 * @property string $ape_nin
 * @property integer $edad_meses
 * @property boolean $gestante
 */
class Ninio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ninio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci_nin'], 'number',"message"=>"Debe ingresar ci valida"],
            [['nom_nin', 'ape_nin', 'edad_meses', 'gestante'], 'required',"message"=>"Campo obligatorio"],
            [['edad_meses'], 'integer'],
            [['gestante'], 'boolean'],
            [['nom_nin', 'ape_nin'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nin' => Yii::t('app', 'Id Nin'),
            'ci_nin' => Yii::t('app', 'Cédula Niño'),
            'nom_nin' => Yii::t('app', 'Nombre Niño'),
            'ape_nin' => Yii::t('app', 'Apellido Niño'),
            'edad_meses' => Yii::t('app', 'Edad en Meses'),
            'gestante' => Yii::t('app', ' Marque SI es Gestante'),
        ];
    }
}
