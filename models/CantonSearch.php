<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Canton;

/**
 * CantonSearch represents the model behind the search form about `app\models\Canton`.
 */
class CantonSearch extends Canton
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cant', 'id_prov'], 'integer'],
            [['nom_cant', 'desc_cant'], 'safe'],
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
        $query = Canton::find();

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
            'id_cant' => $this->id_cant,
            'id_prov' => $this->id_prov,
        ]);

        $query->andFilterWhere(['like', 'nom_cant', $this->nom_cant])
            ->andFilterWhere(['like', 'desc_cant', $this->desc_cant]);

        return $dataProvider;
    }
}
