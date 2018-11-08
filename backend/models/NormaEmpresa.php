<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_norma_empresa".
 *
 * @property int $id_empresa
 * @property int $id_elemento
 * @property int $id_norma_empresa
 *
 * @property CatCatalogo $elemento
 * @property Empresa $empresa
 */
class NormaEmpresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_norma_empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_elemento'], 'integer'],
            [['id_elemento'], 'exist', 'skipOnError' => true, 'targetClass' => CatCatalogo::className(), 'targetAttribute' => ['id_elemento' => 'ID_ELEMENTO']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'id_elemento' => 'Id Elemento',
            'id_norma_empresa' => 'Id Norma Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElemento()
    {
        return $this->hasOne(CatCatalogo::className(), ['ID_ELEMENTO' => 'id_elemento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }
}
