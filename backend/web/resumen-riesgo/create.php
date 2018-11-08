<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ResumenRiesgo */

$this->title = 'Create Resumen Riesgo';
$this->params['breadcrumbs'][] = ['label' => 'Resumen Riesgos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumen-riesgo-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
