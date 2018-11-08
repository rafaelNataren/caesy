<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiagnosticoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="diagnostico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_diag') ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <?php echo $form->field($model, 'peligro') ?>

    <?php echo $form->field($model, 'riesgo') ?>

    <?php echo $form->field($model, 'concentracion') ?>

    <?php // echo $form->field($model, 'probabilidad') ?>

    <?php // echo $form->field($model, 'concecuencias') ?>

    <?php // echo $form->field($model, 'evaluacion_riesgo') ?>

    <?php // echo $form->field($model, 'norma') ?>

    <?php // echo $form->field($model, 'causa') ?>

    <?php // echo $form->field($model, 'fecha_evento') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
