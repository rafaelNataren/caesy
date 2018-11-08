<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivas */

$this->title = 'Update Acciones Preventivas: ' . ' ' . $model->id_acciones_prev;
$this->params['breadcrumbs'][] = ['label' => 'Acciones Preventivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_acciones_prev, 'url' => ['view', 'id' => $model->id_acciones_prev]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acciones-preventivas-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
