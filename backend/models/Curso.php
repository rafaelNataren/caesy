<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_curso".
 *
 * @property int $id_curso
 * @property int $id_empresa
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $area_tematica
 * @property int $duracion_hrs
 *
 * @property Constacia[] $constacias
 * @property Empresa $empresa
 * @property TrabajadorCurso[] $trabajadorCursos
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'duracion_hrs'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
            [['area_tematica'], 'string', 'max' => 45],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'id_empresa' => 'Id Empresa',
            'nombre' => 'Nombre',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'area_tematica' => 'Area Tematica',
            'duracion_hrs' => 'Duracion Hrs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstacias()
    {
        return $this->hasMany(Constacia::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadorCursos()
    {
        return $this->hasMany(TrabajadorCurso::className(), ['id_curso' => 'id_curso']);
    }
}
