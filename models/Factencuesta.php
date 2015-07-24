<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "factencuesta".
 *
 * @property integer $id_enc
 * @property integer $id_tecn
 * @property integer $id_comu
 * @property integer $id_nin
 * @property integer $id_ali
 * @property integer $id_nut
 * @property integer $id_sal
 * @property integer $id_ate
 * @property integer $id_des
 * @property integer $id_cui
 * @property integer $id_viv
 * @property integer $id_sal_com
 * @property integer $num_tom
 * @property string $fec_enc
 * @property string $dir_cas
 * @property string $fec_ini_tom
 * @property string $fec_fin_tom
 */
class Factencuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factencuesta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tecn', 'id_comu', 'id_nin', 'id_ali', 'id_nut', 'id_sal', 'id_ate', 'id_des', 'id_cui', 'id_viv', 'id_sal_com', 'num_tom'], 'integer'],
            [['num_tom', 'fec_enc', 'dir_cas'], 'required',"message"=>"Campo obligatorio"],
            [['fec_enc', 'fec_ini_tom', 'fec_fin_tom'], 'safe'],
            [['dir_cas'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_enc' => Yii::t('app', 'Id Encuesta'),
            'id_tecn' => Yii::t('app', 'Id Técnico'),
            'id_comu' => Yii::t('app', 'Id Comunidad'),
            'id_nin' => Yii::t('app', 'Id Niño'),
            'id_ali' => Yii::t('app', 'Id Alimentación'),
            'id_nut' => Yii::t('app', 'Id Nutrición'),
            'id_sal' => Yii::t('app', 'Id Salud'),
            'id_ate' => Yii::t('app', 'Id Atención'),
            'id_des' => Yii::t('app', 'Id Desnutrición'),
            'id_cui' => Yii::t('app', 'Id Cuidadores'),
            'id_viv' => Yii::t('app', 'Id Vivienda'),
            'id_sal_com' => Yii::t('app', 'Id Comunidad Saludable'),
            'num_tom' => Yii::t('app', 'Número de Toma'),
            'fec_enc' => Yii::t('app', 'Fecha Encuesta'),
            'dir_cas' => Yii::t('app', 'Dirección Casa'),
            'fec_ini_tom' => Yii::t('app', 'Fecha Inicio Toma'),
            'fec_fin_tom' => Yii::t('app', 'Fecha Fin Toma'),
        ];
    }
    
    
   /**
     * @return \yii\db\ActiveQuery
     */
    public function getComunidad()
    {
        return $this->hasOne(Comunidad::className(), ['id' => 1]);
    }
  
    
     public function getcomboComunidad() { 
        $models = Comunidad::find()->asArray()->all();
        return ArrayHelper::map($models, 'id_comu', 'nom_comu');
    }
 
    
  /*  public function getcomboComunidad() { 
         
        $comu = new Comunidad();
        $models = Comunidad::find()->where(['id_cant' => 2 ])->one();
//$models = Comunidad::findBySql($sql)->all();
        return ArrayHelper::map($models, 'id_comu', 'nom_comu');
    }
  */  
    
}


