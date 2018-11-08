<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cenapret */

$this->title = $model->idl_cenapret;
$this->params['breadcrumbs'][] = ['label' => 'Cenaprets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cenapret-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->idl_cenapret], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->idl_cenapret], [
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
            'idl_cenapret',
            'id_empresa',
            'imagen_url:url',
            'base_url:url',
            'path',
            'descripcion',
            'fenomeno',
        ],
    ]) ?>

</div>
