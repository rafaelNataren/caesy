<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_cenapret".
 *
 * @property int $idl_cenapret
 * @property int $id_empresa
 * @property string $imagen_url
 * @property string $base_url
 * @property string $path
 * @property string $descripcion
 * @property int $fenomeno
 *
 * @property Empresa $empresa
 */
class Cenapret extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_cenapret';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idl_cenapret'], 'required'],
            [['idl_cenapret', 'id_empresa', 'fenomeno'], 'integer'],
            [['imagen_url', 'base_url', 'path'], 'string', 'max' => 300],
            [['descripcion'], 'string', 'max' => 45],
            [['idl_cenapret'], 'unique'],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idl_cenapret' => 'Idl Cenapret',
            'id_empresa' => 'Id Empresa',
            'imagen_url' => 'Imagen Url',
            'base_url' => 'Base Url',
            'path' => 'Path',
            'descripcion' => 'Descripcion',
            'fenomeno' => 'Fenomeno',
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
