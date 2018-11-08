<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_trabajador".
 *
 * @property int $id_trabajador
 * @property string $nombre
 * @property int $edad
 * @property string $curp
 * @property string $ocupacion
 * @property string $sexo
 * @property string $correo
 * @property string $direccion
 * @property int $id_empresa
 *
 * @property Constacia[] $constacias
 * @property Empresa $empresa
 */
class Trabajador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_trabajador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edad', 'id_empresa'], 'integer'],
            [['nombre', 'curp', 'ocupacion', 'sexo', 'correo', 'direccion'], 'string', 'max' => 45],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_trabajador' => 'Id Trabajador',
            'nombre' => 'Nombre',
            'edad' => 'Edad',
            'curp' => 'Curp',
            'ocupacion' => 'Ocupacion',
            'sexo' => 'Sexo',
            'correo' => 'Correo',
            'direccion' => 'Direccion',
            'id_empresa' => 'Id Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstacias()
    {
        return $this->hasMany(Constacia::className(), ['id_trabajador' => 'id_trabajador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }
}
