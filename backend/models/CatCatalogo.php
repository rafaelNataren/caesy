<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_cat_catalogo".
 *
 * @property int $ID_ELEMENTO
 * @property string $CLAVE
 * @property int $ELEMENTO_PADRE
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property int $ORDEN
 * @property int $CATEGORIA
 * @property int $ACTIVO
 *
 * @property AccionesPreventivas[] $accionesPreventivas
 * @property AccionesPreventivas[] $accionesPreventivas0
 * @property CatCatalogo $eLEMENTOPADRE
 * @property CatCatalogo[] $catCatalogos
 */
class CatCatalogo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cat_catalogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ELEMENTO_PADRE', 'ORDEN', 'CATEGORIA', 'ACTIVO'], 'integer'],
            [['CLAVE'], 'string', 'max' => 100],
            [['NOMBRE'], 'string', 'max' => 600],
            [['DESCRIPCION'], 'string', 'max' => 2048],
            [['ELEMENTO_PADRE'], 'exist', 'skipOnError' => true, 'targetClass' => CatCatalogo::className(), 'targetAttribute' => ['ELEMENTO_PADRE' => 'ID_ELEMENTO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ELEMENTO' => 'Id  Elemento',
            'CLAVE' => 'Clave',
            'ELEMENTO_PADRE' => 'Elemento  Padre',
            'NOMBRE' => 'Nombre',
            'DESCRIPCION' => 'Descripcion',
            'ORDEN' => 'Orden',
            'CATEGORIA' => 'Categoria',
            'ACTIVO' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionesPreventivas()
    {
        return $this->hasMany(AccionesPreventivas::className(), ['id_elemento' => 'ELEMENTO_PADRE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionesPreventivas0()
    {
        return $this->hasMany(AccionesPreventivas::className(), ['id_elemento' => 'ID_ELEMENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getELEMENTOPADRE()
    {
        return $this->hasOne(CatCatalogo::className(), ['ID_ELEMENTO' => 'ELEMENTO_PADRE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatCatalogos()
    {
        return $this->hasMany(CatCatalogo::className(), ['ELEMENTO_PADRE' => 'ID_ELEMENTO']);
    }
}
