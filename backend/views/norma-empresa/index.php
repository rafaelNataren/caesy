<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NormaEmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Norma Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="norma-empresa-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Norma Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empresa',
            'id_elemento',
            'id_norma_empresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
