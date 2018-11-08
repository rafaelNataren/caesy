<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `backend\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa'], 'integer'],
            [['nombre_empresa', 'direccion', 'correo_electronico', 'lgog', 'rfc', 'registro_patronal', 'apoderado_legal'], 'safe'],
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
        $query = Empresa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'nombre_empresa', $this->nombre_empresa])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'lgog', $this->lgog])
            ->andFilterWhere(['like', 'rfc', $this->rfc])
            ->andFilterWhere(['like', 'registro_patronal', $this->registro_patronal])
            ->andFilterWhere(['like', 'apoderado_legal', $this->apoderado_legal]);

        return $dataProvider;
    }
}
