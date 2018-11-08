<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_trabajador_curso".
 *
 * @property int $id_trabajador
 * @property int $id_curso
 * @property int $activo
 * @property int $fecha_alta
 *
 * @property Curso $curso
 * @property Trabajador $trabajador
 */
class TrabajadorCurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_trabajador_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trabajador', 'id_curso', 'activo', 'fecha_alta'], 'required'],
            [['id_trabajador', 'id_curso', 'activo', 'fecha_alta'], 'integer'],
            [['id_trabajador'], 'unique'],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id_curso']],
            [['id_trabajador'], 'exist', 'skipOnError' => true, 'targetClass' => Trabajador::className(), 'targetAttribute' => ['id_trabajador' => 'id_trabajador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_trabajador' => 'Id Trabajador',
            'id_curso' => 'Id Curso',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajador()
    {
        return $this->hasOne(Trabajador::className(), ['id_trabajador' => 'id_trabajador']);
    }
}
