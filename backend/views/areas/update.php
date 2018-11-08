<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Areas */

$this->title = 'Update Areas: ' . ' ' . $model->id_areas;
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_areas, 'url' => ['view', 'id' => $model->id_areas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="areas-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
