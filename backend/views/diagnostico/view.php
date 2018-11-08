<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Diagnostico */

$this->title = $model->id_diag;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id_diag], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id_diag], [
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
            'id_diag',
            'id_empresa',
            'peligro',
            'riesgo',
            'concentracion',
            'probabilidad',
            'concecuencias',
            'evaluacion_riesgo',
            'norma',
            'causa',
            'fecha_evento',
        ],
    ]) ?>

</div>
