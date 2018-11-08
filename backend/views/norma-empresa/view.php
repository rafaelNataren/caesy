<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\NormaEmpresa */

$this->title = $model->id_norma_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Norma Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="norma-empresa-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id_norma_empresa], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id_norma_empresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_empresa',
            'id_elemento',
            'id_norma_empresa',
        ],
    ]) ?>

</div>
