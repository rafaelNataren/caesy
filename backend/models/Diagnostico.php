<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_diagnostico".
 *
 * @property int $id_diag
 * @property int $id_empresa
 * @property string $peligro
 * @property string $riesgo
 * @property string $concentracion
 * @property string $probabilidad
 * @property string $concecuencias
 * @property string $evaluacion_riesgo
 * @property string $norma
 * @property string $causa
 * @property string $fecha_evento
 *
 * @property Empresa $empresa
 */
class Diagnostico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_diagnostico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'concentracion', 'probabilidad', 'concecuencias','evaluacion_riesgo', 'norma', 'causa', ], 'required'],
            [['id_empresa'], 'integer'],
            [['fecha_evento'], 'safe'],
            [['peligro', 'riesgo', 'concentracion', 'probabilidad', 'concecuencias', 'evaluacion_riesgo', 'norma', 'causa'], 'string', 'max' => 200],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_diag' => 'Id Diag',
            'id_empresa' => 'Id Empresa',
            'peligro' => 'Peligro',
            'riesgo' => 'Riesgo',
            'concentracion' => 'Concentracion',
            'probabilidad' => 'Probabilidad',
            'concecuencias' => 'Concecuencias',
            'evaluacion_riesgo' => 'Evaluacion Riesgo',
            'norma' => 'Norma',
            'causa' => 'Causa',
            'fecha_evento' => 'Fecha Evento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }
}
