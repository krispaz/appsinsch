<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vivienda;

/**
 * ViviendaSearch represents the model behind the search form about `app\models\Vivienda`.
 */
class ViviendaSearch extends Vivienda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_viv'], 'integer'],
            [['_____agua_apta_para_consumo_hum', '_____usa_alcant_pzo_sep_letr_ad', '_____cocina_mejorada__r__o_en_c', '_____no_animales_de_consumo_sue', '_____no_animales_domesticos_sue', '_____no_piso_de_tierra__', '_____no_mat_prec__adobe_paja_ca', '_____no_viven_mas_de_3_personas', '_____no_higiene_buena_alrededor'], 'boolean'],
            [['pro_viv'], 'number'],
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
        $query = Vivienda::find();

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
            'id_viv' => $this->id_viv,
            '_____agua_apta_para_consumo_hum' => $this->_____agua_apta_para_consumo_hum,
            '_____usa_alcant_pzo_sep_letr_ad' => $this->_____usa_alcant_pzo_sep_letr_ad,
            '_____cocina_mejorada__r__o_en_c' => $this->_____cocina_mejorada__r__o_en_c,
            '_____no_animales_de_consumo_sue' => $this->_____no_animales_de_consumo_sue,
            '_____no_animales_domesticos_sue' => $this->_____no_animales_domesticos_sue,
            '_____no_piso_de_tierra__' => $this->_____no_piso_de_tierra__,
            '_____no_mat_prec__adobe_paja_ca' => $this->_____no_mat_prec__adobe_paja_ca,
            '_____no_viven_mas_de_3_personas' => $this->_____no_viven_mas_de_3_personas,
            '_____no_higiene_buena_alrededor' => $this->_____no_higiene_buena_alrededor,
            'pro_viv' => $this->pro_viv,
        ]);

        return $dataProvider;
    }
}
