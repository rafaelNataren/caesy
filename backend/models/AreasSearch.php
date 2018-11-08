<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Areas;

/**
 * AreasSearch represents the model behind the search form about `backend\models\Areas`.
 */
class AreasSearch extends Areas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_areas', 'id_empresa'], 'integer'],
            [['nombre_area', 'observaciones'], 'safe'],
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
        $query = Areas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_areas' => $this->id_areas,
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'nombre_area', $this->nombre_area])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
    
    /**
     * Creates data provider  instance with searchbyEmpresa query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCompany($params,$id)
    {
        $query = Areas::findBySql('select * from tbl_areas where id_empresa='.$id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id_areas' => $this->id_areas,
            'id_empresa' => $this->id_empresa,
        ]);
        
        $query->andFilterWhere(['like', 'nombre_area', $this->nombre_area])
        ->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        
        return $dataProvider;
    }
}
