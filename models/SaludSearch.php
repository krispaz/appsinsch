<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salud;

/**
 * SaludSearch represents the model behind the search form about `app\models\Salud`.
 */
class SaludSearch extends Salud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sal'], 'integer'],
            [['_____no_tuvo_fiebre__', '_____no_si_es_gestante__molesti', '_____no_si_es_gestante__dolor_d', '_____no_si_es_gestante__sangrad', '_____no_tuvo_diarrea__', '_____no_tuvo_tos_dol_garg_gripe', '_____no_tuvo_vomito__'], 'boolean'],
            [['pro_sal'], 'number'],
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
        $query = Salud::find();

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
            'id_sal' => $this->id_sal,
            '_____no_tuvo_fiebre__' => $this->_____no_tuvo_fiebre__,
            '_____no_si_es_gestante__molesti' => $this->_____no_si_es_gestante__molesti,
            '_____no_si_es_gestante__dolor_d' => $this->_____no_si_es_gestante__dolor_d,
            '_____no_si_es_gestante__sangrad' => $this->_____no_si_es_gestante__sangrad,
            '_____no_tuvo_diarrea__' => $this->_____no_tuvo_diarrea__,
            '_____no_tuvo_tos_dol_garg_gripe' => $this->_____no_tuvo_tos_dol_garg_gripe,
            '_____no_tuvo_vomito__' => $this->_____no_tuvo_vomito__,
            'pro_sal' => $this->pro_sal,
        ]);

        return $dataProvider;
    }
}
