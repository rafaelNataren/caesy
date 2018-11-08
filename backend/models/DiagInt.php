<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_diag_int".
 *
 * @property int $id_diag_int
 * @property int $id_empresa
 * @property string $peligro
 * @property string $riesgo
 * @property string $concentracion
 * @property string $probabilidad
 * @property string $concecuencias
 * @property string $evaluacion_riesgos
 * @property string $norma
 * @property string $causa
 * @property string $fecha_evento
 *
 * @property Empresa $empresa
 */
class DiagInt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_diag_int';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa'], 'integer'],
            [['fecha_evento'], 'safe'],
            [['peligro', 'riesgo', 'concentracion', 'probabilidad', 'concecuencias', 'evaluacion_riesgos', 'norma', 'causa'], 'string', 'max' => 45],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_diag_int' => 'Id Diag Int',
            'id_empresa' => 'Id Empresa',
            'peligro' => 'Peligro',
            'riesgo' => 'Riesgo',
            'concentracion' => 'Concentracion',
            'probabilidad' => 'Probabilidad',
            'concecuencias' => 'Concecuencias',
            'evaluacion_riesgos' => 'Evaluacion Riesgos',
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
