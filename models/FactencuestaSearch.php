<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Factencuesta;

/**
 * FactencuestaSearch represents the model behind the search form about `app\models\Factencuesta`.
 */
class FactencuestaSearch extends Factencuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_enc', 'id_tecn', 'id_comu', 'id_nin', 'id_ali', 'id_nut', 'id_sal', 'id_ate', 'id_des', 'id_cui', 'id_viv', 'id_sal_com', 'num_tom'], 'integer'],
            [['fec_enc', 'dir_cas', 'fec_ini_tom', 'fec_fin_tom'], 'safe'],
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
        $query = Factencuesta::find();

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
            'id_enc' => $this->id_enc,
            'id_tecn' => $this->id_tecn,
            'id_comu' => $this->id_comu,
            'id_nin' => $this->id_nin,
            'id_ali' => $this->id_ali,
            'id_nut' => $this->id_nut,
            'id_sal' => $this->id_sal,
            'id_ate' => $this->id_ate,
            'id_des' => $this->id_des,
            'id_cui' => $this->id_cui,
            'id_viv' => $this->id_viv,
            'id_sal_com' => $this->id_sal_com,
            'num_tom' => $this->num_tom,
            'fec_enc' => $this->fec_enc,
            'fec_ini_tom' => $this->fec_ini_tom,
            'fec_fin_tom' => $this->fec_fin_tom,
        ]);

        $query->andFilterWhere(['like', 'dir_cas', $this->dir_cas]);

        return $dataProvider;
    }
}
