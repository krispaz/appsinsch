<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alimentacion;

/**
 * AlimentacionSearch represents the model behind the search form about `app\models\Alimentacion`.
 */
class AlimentacionSearch extends Alimentacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ali'], 'integer'],
            [['_____recibio_lactancia_materna_', '_____recibio_supl__hierro__chis', '_____si_es_gestante__recibio_su', '_____estuvo_al_dia_con_suplemen', '_____no_recibio_algun_alimento_', '_____recibio_3_o_mas_comidas_es'], 'boolean'],
            [['pro_ali'], 'number'],
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
        $query = Alimentacion::find();

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
            'id_ali' => $this->id_ali,
            '_____recibio_lactancia_materna_' => $this->_____recibio_lactancia_materna_,
            '_____recibio_supl__hierro__chis' => $this->_____recibio_supl__hierro__chis,
            '_____si_es_gestante__recibio_su' => $this->_____si_es_gestante__recibio_su,
            '_____estuvo_al_dia_con_suplemen' => $this->_____estuvo_al_dia_con_suplemen,
            '_____no_recibio_algun_alimento_' => $this->_____no_recibio_algun_alimento_,
            '_____recibio_3_o_mas_comidas_es' => $this->_____recibio_3_o_mas_comidas_es,
            'pro_ali' => $this->pro_ali,
        ]);

        return $dataProvider;
    }
}
