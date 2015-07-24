<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Saludablecomunidad;

/**
 * SaludablecomunidadSearch represents the model behind the search form about `app\models\Saludablecomunidad`.
 */
class SaludablecomunidadSearch extends Saludablecomunidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sal_com'], 'integer'],
            [['sub1_sal_com', '_____madre_c_seg_salud_iess_cam', '_____nino_con_numero_de_identif', '______tiene_c_i___', '______tiene_educacion_primaria_', '_____no__tiene_mas_de_3_dependi', '______recibe_el_bdh__', '______recibe_incentivo_desnutri', '______participo_en_algun_proyec', '______recibio_estimulacion_temp', '______recibio_visita_domiciliar', '______hay_educacion_temprana__c', '______hay_produccion_de_algun_a', '_____atendio_ult_enf__en_1trd_2'], 'boolean'],
            [['pro_sal_com'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Saludablecomunidad::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_sal_com' => $this->id_sal_com,
            'sub1_sal_com' => $this->sub1_sal_com,
            '_____madre_c_seg_salud_iess_cam' => $this->_____madre_c_seg_salud_iess_cam,
            '_____nino_con_numero_de_identif' => $this->_____nino_con_numero_de_identif,
            '______tiene_c_i___' => $this->______tiene_c_i___,
            '______tiene_educacion_primaria_' => $this->______tiene_educacion_primaria_,
            '_____no__tiene_mas_de_3_dependi' => $this->_____no__tiene_mas_de_3_dependi,
            '______recibe_el_bdh__' => $this->______recibe_el_bdh__,
            '______recibe_incentivo_desnutri' => $this->______recibe_incentivo_desnutri,
            '______participo_en_algun_proyec' => $this->______participo_en_algun_proyec,
            '______recibio_estimulacion_temp' => $this->______recibio_estimulacion_temp,
            '______recibio_visita_domiciliar' => $this->______recibio_visita_domiciliar,
            '______hay_educacion_temprana__c' => $this->______hay_educacion_temprana__c,
            '______hay_produccion_de_algun_a' => $this->______hay_produccion_de_algun_a,
            '_____atendio_ult_enf__en_1trd_2' => $this->_____atendio_ult_enf__en_1trd_2,
            'pro_sal_com' => $this->pro_sal_com,
        ]);

        return $dataProvider;
    }
}
