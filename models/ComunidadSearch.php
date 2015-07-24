<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comunidad;

/**
 * ComunidadSearch represents the model behind the search form about `app\models\Comunidad`.
 */
class ComunidadSearch extends Comunidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comu', 'id_cant', 'num_vivi'], 'integer'],
            [['nom_comu', 'des_comu'], 'safe'],
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
        $query = Comunidad::find();

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
            'id_comu' => $this->id_comu,
            'id_cant' => $this->id_cant,
            'num_vivi' => $this->num_vivi,
        ]);

        $query->andFilterWhere(['like', 'nom_comu', $this->nom_comu])
            ->andFilterWhere(['like', 'des_comu', $this->des_comu]);

        return $dataProvider;
    }
}
