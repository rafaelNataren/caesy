<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivas */

$this->title = $model->id_acciones_prev;
$this->params['breadcrumbs'][] = ['label' => 'Acciones Preventivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acciones-preventivas-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id_acciones_prev], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id_acciones_prev], [
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
            'id_acciones_prev',
            'id_empresa',
            'id_elemento',
            'elemento_padre',
            'accion_preventiva',
            'accion_correctiva',
            'date_inicio',
            'date_fin',
            'objetivo',
            'observacion',
            'porcentaje',
            'cumple',
            'ejercicio',
        ],
    ]) ?>

</div>
