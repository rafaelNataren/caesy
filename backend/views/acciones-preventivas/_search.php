<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivasSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="acciones-preventivas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_acciones_prev') ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <?php echo $form->field($model, 'id_elemento') ?>

    <?php echo $form->field($model, 'elemento_padre') ?>

    <?php echo $form->field($model, 'accion_preventiva') ?>

    <?php // echo $form->field($model, 'accion_correctiva') ?>

    <?php // echo $form->field($model, 'date_inicio') ?>

    <?php // echo $form->field($model, 'date_fin') ?>

    <?php // echo $form->field($model, 'objetivo') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'porcentaje') ?>

    <?php // echo $form->field($model, 'cumple') ?>

    <?php // echo $form->field($model, 'ejercicio') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
