<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiagnosticoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diagnosticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Diagnostico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_diag',
            'id_empresa',
            'peligro',
            'riesgo',
            'concentracion',
            // 'probabilidad',
            // 'concecuencias',
            // 'evaluacion_riesgo',
            // 'norma',
            // 'causa',
            // 'fecha_evento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
