<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NormaEmpresa;

/**
 * NormaEmpresaSearch represents the model behind the search form about `backend\models\NormaEmpresa`.
 */
class NormaEmpresaSearch extends NormaEmpresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_elemento', 'id_norma_empresa'], 'integer'],
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
        $query = NormaEmpresa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_empresa' => $this->id_empresa,
            'id_elemento' => $this->id_elemento,
            'id_norma_empresa' => $this->id_norma_empresa,
        ]);

        return $dataProvider;
    } 
    public function searchByCompany($params, $id)
    {
       // $query = NormaEmpresa::find();
        $query = NormaEmpresa::findBySql('select * from tbl_norma_empresa where id_empresa = '.$id);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($id) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id_empresa' => $this->id_empresa,
            'id_elemento' => $this->id_elemento,
            'id_norma_empresa' => $this->id_norma_empresa,
        ]);
        
        return $dataProvider;
    }
}
