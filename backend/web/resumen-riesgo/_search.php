<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ResumenRiesgoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="resumen-riesgo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_resumen_riesgo') ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <?php echo $form->field($model, 'fenomeno') ?>

    <?php echo $form->field($model, 'descripcion') ?>

    <?php echo $form->field($model, 'Evento') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
