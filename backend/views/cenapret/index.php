<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CenapretSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cenaprets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cenapret-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Cenapret', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idl_cenapret',
            'id_empresa',
            'imagen_url:url',
            'base_url:url',
            'path',
            // 'descripcion',
            // 'fenomeno',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
