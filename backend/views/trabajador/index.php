<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trabajadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Trabajador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_trabajador',
            'nombre',
            'edad',
            'curp',
            'ocupacion',
            // 'sexo',
            // 'correo',
            // 'direccion',
            // 'id_empresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
