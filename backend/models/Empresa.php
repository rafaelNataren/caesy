<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_empresa".
 *
 * @property int $id_empresa
 * @property string $nombre_empresa
 * @property string $direccion
 * @property string $correo_electronico
 * @property string $lgog
 * @property string $rfc
 * @property string $registro_patronal
 * @property string $apoderado_legal
 * @property string $imagen_url
 * @property string $base_url
 * @property string $path
 * @property string $resp_salud
 * @property string $descripcion
 *
 * @property AccionesPreventivas[] $accionesPreventivas
 * @property Areas[] $areas
 * @property Cenapret[] $cenaprets
 * @property Curso[] $cursos
 * @property DiagInt[] $diagInts
 * @property Diagnostico[] $diagnosticos
 * @property NormaEmpresa[] $normaEmpresas
 * @property ResumenRiesgo[] $resumenRiesgos
 * @property Trabajador[] $trabajadors
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resp_salud', 'descripcion'], 'required'],
            [['nombre_empresa', 'apoderado_legal'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 200],
            [['correo_electronico'], 'string', 'max' => 50],
            [['lgog', 'rfc', 'registro_patronal'], 'string', 'max' => 45],
            [['imagen_url', 'base_url', 'path'], 'string', 'max' => 300],
            [['resp_salud'], 'string', 'max' => 250],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'nombre_empresa' => 'Nombre Empresa',
            'direccion' => 'Direccion',
            'correo_electronico' => 'Correo Electronico',
            'lgog' => 'Lgog',
            'rfc' => 'Rfc',
            'registro_patronal' => 'Registro Patronal',
            'apoderado_legal' => 'Apoderado Legal',
            'imagen_url' => 'Imagen Url',
            'base_url' => 'Base Url',
            'path' => 'Path',
            'resp_salud' => 'Resp Salud',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionesPreventivas()
    {
        return $this->hasMany(AccionesPreventivas::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Areas::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCenaprets()
    {
        return $this->hasMany(Cenapret::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagInts()
    {
        return $this->hasMany(DiagInt::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosticos()
    {
        return $this->hasMany(Diagnostico::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNormaEmpresas()
    {
        return $this->hasMany(NormaEmpresa::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumenRiesgos()
    {
        return $this->hasMany(ResumenRiesgo::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadors()
    {
        return $this->hasMany(Trabajador::className(), ['id_empresa' => 'id_empresa']);
    }
}
