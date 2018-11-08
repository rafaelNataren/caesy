<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_emprea".
 *
 * @property int $id_empresa
 * @property string $nombre
 * @property string $patron
 * @property string $direccion
 */
class Emprea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_emprea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'nombre', 'patron', 'direccion'], 'required'],
            [['id_empresa'], 'integer'],
            [['nombre', 'patron', 'direccion'], 'string', 'max' => 200],
            [['id_empresa'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'nombre' => 'Nombre',
            'patron' => 'Patron',
            'direccion' => 'Direccion',
        ];
    }
}
