<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ResumenRiesgo;

/**
 * ResumenRiesgoSearch represents the model behind the search form about `backend\models\ResumenRiesgo`.
 */
class ResumenRiesgoSearch extends ResumenRiesgo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_resumen_riesgo', 'id_empresa', 'fenomeno'], 'integer'],
            [['descripcion', 'Evento'], 'safe'],
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
        $query = ResumenRiesgo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_resumen_riesgo' => $this->id_resumen_riesgo,
            'id_empresa' => $this->id_empresa,
            'fenomeno' => $this->fenomeno,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'Evento', $this->Evento]);

        return $dataProvider;
    }
    public function searchByeCompany($params)
    {
        $query = ResumenRiesgo::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id_resumen_riesgo' => $this->id_resumen_riesgo,
            'id_empresa' => $this->id_empresa,
            'fenomeno' => $this->fenomeno,
        ]);
        
        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
        ->andFilterWhere(['like', 'Evento', $this->Evento]);
        
        return $dataProvider;
    }
}
