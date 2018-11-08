<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AccionesPreventivasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones Preventivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acciones-preventivas-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Acciones Preventivas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_acciones_prev',
            'id_empresa',
            'id_elemento',
            'elemento_padre',
            'accion_preventiva',
            // 'accion_correctiva',
            // 'date_inicio',
            // 'date_fin',
            // 'objetivo',
            // 'observacion',
            // 'porcentaje',
            // 'cumple',
            // 'ejercicio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
