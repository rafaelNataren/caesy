<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_acciones_preventivas".
 *
 * @property int $id_acciones_prev
 * @property int $id_empresa
 * @property int $id_elemento
 * @property int $elemento_padre
 * @property string $accion_preventiva
 * @property string $accion_correctiva
 * @property string $date_inicio
 * @property string $date_fin
 * @property string $objetivo
 * @property string $observacion
 * @property int $porcentaje
 * @property string $cumple
 * @property string $ejercicio
 *
 * @property CatCatalogo $elementoPadre
 * @property CatCatalogo $elemento
 * @property Empresa $empresa
 */
class AccionesPreventivas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_acciones_preventivas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_elemento', 'elemento_padre', 'porcentaje'], 'integer'],
            [['date_inicio', 'date_fin','id_acciones_prev'], 'safe'],
            [['accion_preventiva', 'accion_correctiva', 'objetivo', 'observacion'], 'string', 'max' => 200],
            [['cumple'], 'string', 'max' => 100],
            [['ejercicio'], 'string', 'max' => 20],
            [['elemento_padre'], 'exist', 'skipOnError' => true, 'targetClass' => CatCatalogo::className(), 'targetAttribute' => ['elemento_padre' => 'ID_ELEMENTO']],
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
            'id_acciones_prev' => 'Id Acciones Prev',
            'id_empresa' => 'Id Empresa',
            'id_elemento' => 'Id Elemento',
            'elemento_padre' => 'Elemento Padre',
            'accion_preventiva' => 'Accion Preventiva',
            'accion_correctiva' => 'Accion Correctiva',
            'date_inicio' => 'Inicio',
            'date_fin' =>'TERMINO',
            'objetivo' => 'Objetivo',
            'observacion' => 'Observacion',
            'porcentaje' => 'Porcentaje',
            'cumple' => 'Cumple',
            'ejercicio' => 'Periocidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElementoPadre()
    {
        return $this->hasOne(CatCatalogo::className(), ['ID_ELEMENTO' => 'elemento_padre']);
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
