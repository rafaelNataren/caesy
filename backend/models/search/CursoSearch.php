<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Curso;

/**
 * CursoSearch represents the model behind the search form about `backend\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso', 'id_empresa', 'duracion_hrs'], 'integer'],
            [['nombre', 'fecha_inicio', 'fecha_fin', 'area_tematica'], 'safe'],
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
        $query = Curso::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_curso' => $this->id_curso,
            'id_empresa' => $this->id_empresa,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'duracion_hrs' => $this->duracion_hrs,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'area_tematica', $this->area_tematica]);

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
        $query = Curso::findBySql('select * from tbl_curso where id_empresa='.$id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id_curso' => $this->id_curso,
            'id_empresa' => $this->id_empresa,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'duracion_hrs' => $this->duracion_hrs,
        ]);
        
        $query->andFilterWhere(['like', 'nombre', $this->nombre])
        ->andFilterWhere(['like', 'area_tematica', $this->area_tematica]);
        
        return $dataProvider;
    }
}
