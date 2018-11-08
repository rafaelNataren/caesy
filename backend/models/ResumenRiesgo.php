<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_resumen_riesgo".
 *
 * @property int $id_resumen_riesgo
 * @property int $id_empresa
 * @property int $fenomeno
 * @property string $descripcion
 * @property string $Evento
 *
 * @property Empresa $empresa
 */
class ResumenRiesgo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_resumen_riesgo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'fenomeno'], 'integer'],
            [['fenomeno', 'descripcion', 'Evento'], 'required'],
            [['descripcion', 'Evento'], 'string', 'max' => 1000],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resumen_riesgo' => 'Id Resumen Riesgo',
            'id_empresa' => 'Id Empresa',
            'fenomeno' => 'Fenomeno',
            'descripcion' => 'Descripcion',
            'Evento' => 'Evento',
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
