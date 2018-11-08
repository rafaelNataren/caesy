<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Trabajador;

/**
 * TrabajadorSearch represents the model behind the search form about `backend\models\Trabajador`.
 */
class TrabajadorSearch extends Trabajador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trabajador', 'edad', 'id_empresa'], 'integer'],
            [['nombre', 'curp', 'ocupacion', 'sexo', 'correo', 'direccion'], 'safe'],
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
        $query = Trabajador::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_trabajador' => $this->id_trabajador,
            'edad' => $this->edad,
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'curp', $this->curp])
            ->andFilterWhere(['like', 'ocupacion', $this->ocupacion])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
    
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCompany($params,$id)
    {
        $query = Trabajador::findBySql('select * from tbl_trabajador where id_empresa = '.$id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id_trabajador' => $this->id_trabajador,
            'edad' => $this->edad,
            //'id_empresa' =>$id,
        ]);
        
        $query->andFilterWhere(['like', 'nombre', $this->nombre])
        ->andFilterWhere(['like', 'curp', $this->curp])
        ->andFilterWhere(['like', 'ocupacion', $this->ocupacion])
        ->andFilterWhere(['like', 'sexo', $this->sexo])
        ->andFilterWhere(['like', 'correo', $this->correo])
        ->andFilterWhere(['like', 'direccion', $this->direccion]);
        
        return $dataProvider;
    }
}
