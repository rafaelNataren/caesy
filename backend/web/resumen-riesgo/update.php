<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ResumenRiesgo */

$this->title = 'Update Resumen Riesgo: ' . ' ' . $model->id_resumen_riesgo;
$this->params['breadcrumbs'][] = ['label' => 'Resumen Riesgos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resumen_riesgo, 'url' => ['view', 'id' => $model->id_resumen_riesgo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resumen-riesgo-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
