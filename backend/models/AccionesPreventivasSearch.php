<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AccionesPreventivas;

/**
 * AccionesPreventivasSearch represents the model behind the search form about `backend\models\AccionesPreventivas`.
 */
class AccionesPreventivasSearch extends AccionesPreventivas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_acciones_prev', 'id_empresa', 'id_elemento', 'elemento_padre', 'porcentaje'], 'integer'],
            [['accion_preventiva', 'accion_correctiva', 'date_inicio', 'date_fin', 'objetivo', 'observacion', 'cumple', 'ejercicio'], 'safe'],
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
        $query = AccionesPreventivas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_acciones_prev' => $this->id_acciones_prev,
            'id_empresa' => $this->id_empresa,
            'id_elemento' => $this->id_elemento,
            'elemento_padre' => $this->elemento_padre,
            'date_inicio' => $this->date_inicio,
            'date_fin' => $this->date_fin,
            'porcentaje' => $this->porcentaje,
        ]);

        $query->andFilterWhere(['like', 'accion_preventiva', $this->accion_preventiva])
            ->andFilterWhere(['like', 'accion_correctiva', $this->accion_correctiva])
            ->andFilterWhere(['like', 'objetivo', $this->objetivo])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'cumple', $this->cumple])
            ->andFilterWhere(['like', 'ejercicio', $this->ejercicio]);

        return $dataProvider;
    }
}
