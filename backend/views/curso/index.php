<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_curso',
            'id_empresa',
            'nombre',
            'fecha_inicio',
            'fecha_fin',
            // 'area_tematica',
            // 'duracion_hrs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
