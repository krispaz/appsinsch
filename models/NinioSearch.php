<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ninio;

/**
 * NinioSearch represents the model behind the search form about `app\models\Ninio`.
 */
class NinioSearch extends Ninio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nin', 'edad_meses'], 'integer'],
            [['ci_nin'], 'number'],
            [['nom_nin', 'ape_nin'], 'safe'],
            [['gestante'], 'boolean'],
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
        $query = Ninio::find();

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
            'id_nin' => $this->id_nin,
            'ci_nin' => $this->ci_nin,
            'edad_meses' => $this->edad_meses,
            'gestante' => $this->gestante,
        ]);

        $query->andFilterWhere(['like', 'nom_nin', $this->nom_nin])
            ->andFilterWhere(['like', 'ape_nin', $this->ape_nin]);

        return $dataProvider;
    }
}
