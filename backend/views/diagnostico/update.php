<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Diagnostico */

$this->title = 'Update Diagnostico: ' . ' ' . $model->id_diag;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_diag, 'url' => ['view', 'id' => $model->id_diag]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnostico-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
