<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nutricion;

/**
 * NutricionSearch represents the model behind the search form about `app\models\Nutricion`.
 */
class NutricionSearch extends Nutricion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nut', 'sub1_nut', 'talla__cm_____'], 'integer'],
            [['peso_en_kg_con_un_decimal______', 'pro_nut'], 'number'],
            [['_____no_tuvo_adelgazamiento__p_', '_____no_tuvo_sobrepeso__p_t___', '_____no_baja_ganancia_de_peso__', '_____no_baja_ganancia_de_talla_'], 'boolean'],
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
        $query = Nutricion::find();

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
            'id_nut' => $this->id_nut,
            'sub1_nut' => $this->sub1_nut,
            'peso_en_kg_con_un_decimal______' => $this->peso_en_kg_con_un_decimal______,
            'talla__cm_____' => $this->talla__cm_____,
            '_____no_tuvo_adelgazamiento__p_' => $this->_____no_tuvo_adelgazamiento__p_,
            '_____no_tuvo_sobrepeso__p_t___' => $this->_____no_tuvo_sobrepeso__p_t___,
            '_____no_baja_ganancia_de_peso__' => $this->_____no_baja_ganancia_de_peso__,
            '_____no_baja_ganancia_de_talla_' => $this->_____no_baja_ganancia_de_talla_,
            'pro_nut' => $this->pro_nut,
        ]);

        return $dataProvider;
    }
}
