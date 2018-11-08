<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cenapret;

/**
 * CenapretSearch represents the model behind the search form about `backend\models\Cenapret`.
 */
class CenapretSearch extends Cenapret
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idl_cenapret', 'id_empresa', 'fenomeno'], 'integer'],
            [['imagen_url', 'base_url', 'path', 'descripcion'], 'safe'],
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
        $query = Cenapret::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idl_cenapret' => $this->idl_cenapret,
            'id_empresa' => $this->id_empresa,
            'fenomeno' => $this->fenomeno,
        ]);

        $query->andFilterWhere(['like', 'imagen_url', $this->imagen_url])
            ->andFilterWhere(['like', 'base_url', $this->base_url])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
