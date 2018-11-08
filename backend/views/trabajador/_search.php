<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TrabajadorSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="trabajador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_trabajador') ?>

    <?php echo $form->field($model, 'nombre') ?>

    <?php echo $form->field($model, 'edad') ?>

    <?php echo $form->field($model, 'curp') ?>

    <?php echo $form->field($model, 'ocupacion') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'id_empresa') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
