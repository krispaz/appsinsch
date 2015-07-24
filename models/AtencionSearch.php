<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atencion;

/**
 * AtencionSearch represents the model behind the search form about `app\models\Atencion`.
 */
class AtencionSearch extends Atencion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ate'], 'integer'],
            [['______ultimo_control_pre_nat_se'], 'safe'],
            [['______ha_tenido_algun_ex__lab__', '______ha_tenido_al_menos_una_ec', '_____tiene_sus_vacunas_al_dia_p', '_____ha_tenido_su_ultimo_contro', '_____recibio_consejeria_nutrici', '_____nota_a_la_atencion_en_su_s', '_____carne__1_ant_2_nue_3_hc_0_'], 'boolean'],
            [['pro_ate'], 'number'],
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
        $query = Atencion::find();

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
            'id_ate' => $this->id_ate,
            '______ultimo_control_pre_nat_se' => $this->______ultimo_control_pre_nat_se,
            '______ha_tenido_algun_ex__lab__' => $this->______ha_tenido_algun_ex__lab__,
            '______ha_tenido_al_menos_una_ec' => $this->______ha_tenido_al_menos_una_ec,
            '_____tiene_sus_vacunas_al_dia_p' => $this->_____tiene_sus_vacunas_al_dia_p,
            '_____ha_tenido_su_ultimo_contro' => $this->_____ha_tenido_su_ultimo_contro,
            '_____recibio_consejeria_nutrici' => $this->_____recibio_consejeria_nutrici,
            '_____nota_a_la_atencion_en_su_s' => $this->_____nota_a_la_atencion_en_su_s,
            '_____carne__1_ant_2_nue_3_hc_0_' => $this->_____carne__1_ant_2_nue_3_hc_0_,
            'pro_ate' => $this->pro_ate,
        ]);

        return $dataProvider;
    }
}
