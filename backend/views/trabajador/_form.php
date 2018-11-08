<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="trabajador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'edad')->textInput() ?>

    <?php echo $form->field($model, 'curp')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

   <!--  <?php echo $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>-->

    <?php echo $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

  <!--   <?php echo $form->field($model, 'id_empresa')->textInput() ?> -->

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
