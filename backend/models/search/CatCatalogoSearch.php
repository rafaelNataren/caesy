<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CatCatalogo;

/**
 * CatCatalogoSearch represents the model behind the search form about `backend\models\CatCatalogo`.
 */
class CatCatalogoSearch extends CatCatalogo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ELEMENTO', 'ELEMENTO_PADRE', 'ORDEN', 'CATEGORIA', 'ACTIVO'], 'integer'],
            [['CLAVE', 'NOMBRE', 'DESCRIPCION'], 'safe'],
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
        $query = CatCatalogo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID_ELEMENTO' => $this->ID_ELEMENTO,
            'ELEMENTO_PADRE' => $this->ELEMENTO_PADRE,
            'ORDEN' => $this->ORDEN,
            'CATEGORIA' => $this->CATEGORIA,
            'ACTIVO' => $this->ACTIVO,
        ]);

        $query->andFilterWhere(['like', 'CLAVE', $this->CLAVE])
            ->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION]);

        return $dataProvider;
    }
}
