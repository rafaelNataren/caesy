<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DiagInt;

/**
 * DiagIntSearch represents the model behind the search form about `backend\models\DiagInt`.
 */
class DiagIntSearch extends DiagInt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_diag_int', 'id_empresa'], 'integer'],
            [['peligro', 'riesgo', 'concentracion', 'probabilidad', 'concecuencias', 'evaluacion_riesgos', 'norma', 'causa', 'fecha_evento'], 'safe'],
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
        $query = DiagInt::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_diag_int' => $this->id_diag_int,
           // 'id_empresa' => $this->id_empresa,
           // 'fecha_evento' => $this->fecha_evento,
        ]);

        $query->andFilterWhere(['like', 'peligro', $this->peligro])
            ->andFilterWhere(['like', 'riesgo', $this->riesgo])
            ->andFilterWhere(['like', 'concentracion', $this->concentracion])
            ->andFilterWhere(['like', 'probabilidad', $this->probabilidad])
            ->andFilterWhere(['like', 'concecuencias', $this->concecuencias])
            ->andFilterWhere(['like', 'evaluacion_riesgos', $this->evaluacion_riesgos])
            ->andFilterWhere(['like', 'norma', $this->norma])
            ->andFilterWhere(['like', 'causa', $this->causa]);

        return $dataProvider;
    }
}
