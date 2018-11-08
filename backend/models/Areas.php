<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_areas".
 *
 * @property int $id_areas
 * @property string $nombre_area
 * @property string $observaciones
 * @property int $id_empresa
 *
 * @property Empresa $empresa
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa'], 'integer'],
            [['nombre_area'], 'string', 'max' => 45],
            [['observaciones'], 'string', 'max' => 300],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_areas' => 'Id Areas',
            'nombre_area' => 'Nombre Area',
            'observaciones' => 'Observaciones',
            'id_empresa' => 'Id Empresa',
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
