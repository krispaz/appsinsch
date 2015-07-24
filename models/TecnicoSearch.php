<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tecnico;

/**
 * TecnicoSearch represents the model behind the search form about `app\models\Tecnico`.
 */
class TecnicoSearch extends Tecnico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tecn', 'id_cant', 'num_viv_asig'], 'integer'],
            [['ci_tecn'], 'number'],
            [['nom_tecn', 'ape_tecn', 'obs_tecn', 'nombre_corto'], 'safe'],
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
        $query = Tecnico::find();

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
            'id_tecn' => $this->id_tecn,
            'id_cant' => $this->id_cant,
            'ci_tecn' => $this->ci_tecn,
            'num_viv_asig' => $this->num_viv_asig,
        ]);

        $query->andFilterWhere(['like', 'nom_tecn', $this->nom_tecn])
            ->andFilterWhere(['like', 'ape_tecn', $this->ape_tecn])
            ->andFilterWhere(['like', 'obs_tecn', $this->obs_tecn])
            ->andFilterWhere(['like', 'nombre_corto', $this->nombre_corto]);

        return $dataProvider;
    }
}
