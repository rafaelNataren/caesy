<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ResumenRiesgoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resumen Riesgos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumen-riesgo-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Resumen Riesgo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_resumen_riesgo',
            'id_empresa',
            'fenomeno',
            'descripcion',
            'Evento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
