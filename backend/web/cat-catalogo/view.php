<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CatCatalogo */

$this->title = $model->ID_ELEMENTO;
$this->params['breadcrumbs'][] = ['label' => 'Cat Catalogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-catalogo-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->ID_ELEMENTO], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->ID_ELEMENTO], [
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
            'ID_ELEMENTO',
            'CLAVE',
            'ELEMENTO_PADRE',
            'NOMBRE',
            'DESCRIPCION',
            'ORDEN',
            'CATEGORIA',
            'ACTIVO',
        ],
    ]) ?>

</div>
