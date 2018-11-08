<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CatCatalogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Catalogos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-catalogo-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Cat Catalogo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ELEMENTO',
            'CLAVE',
            'ELEMENTO_PADRE',
            'NOMBRE',
            'DESCRIPCION',
            // 'ORDEN',
            // 'CATEGORIA',
            // 'ACTIVO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
