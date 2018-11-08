<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = 'Update Trabajador: ' . ' ' . $model->id_trabajador;
$this->params['breadcrumbs'][] = ['label' => 'Trabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_trabajador, 'url' => ['view', 'id' => $model->id_trabajador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trabajador-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
