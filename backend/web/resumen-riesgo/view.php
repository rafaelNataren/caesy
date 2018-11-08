<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ResumenRiesgo */

$this->title = $model->id_resumen_riesgo;
$this->params['breadcrumbs'][] = ['label' => 'Resumen Riesgos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumen-riesgo-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id_resumen_riesgo], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id_resumen_riesgo], [
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
            'id_resumen_riesgo',
            'id_empresa',
            'fenomeno',
            'descripcion',
            'Evento',
        ],
    ]) ?>

</div>
