<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuidadores;

/**
 * CuidadoresSearch represents the model behind the search form about `app\models\Cuidadores`.
 */
class CuidadoresSearch extends Cuidadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cui'], 'integer'],
            [['_____padre_estuvo_con_nino_ayer', '_____madre_dio_de_comer_al_nino', '______fue_su_madre_o_padre__', '______fue_mayor_de_edad__18____', '______lee_y_escribe_castellano_', '______asistio_a_sesion_demostra', '______recibio_capacitacion_en_e', '______recibio_consejeria_en_pla', '______conoce_lo_que_es_educacio'], 'boolean'],
            [['pro_cui'], 'number'],
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
        $query = Cuidadores::find();

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
            'id_cui' => $this->id_cui,
            '_____padre_estuvo_con_nino_ayer' => $this->_____padre_estuvo_con_nino_ayer,
            '_____madre_dio_de_comer_al_nino' => $this->_____madre_dio_de_comer_al_nino,
            '______fue_su_madre_o_padre__' => $this->______fue_su_madre_o_padre__,
            '______fue_mayor_de_edad__18____' => $this->______fue_mayor_de_edad__18____,
            '______lee_y_escribe_castellano_' => $this->______lee_y_escribe_castellano_,
            '______asistio_a_sesion_demostra' => $this->______asistio_a_sesion_demostra,
            '______recibio_capacitacion_en_e' => $this->______recibio_capacitacion_en_e,
            '______recibio_consejeria_en_pla' => $this->______recibio_consejeria_en_pla,
            '______conoce_lo_que_es_educacio' => $this->______conoce_lo_que_es_educacio,
            'pro_cui' => $this->pro_cui,
        ]);

        return $dataProvider;
    }
}
