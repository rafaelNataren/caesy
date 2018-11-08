<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ResumenRiesgo */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="resumen-riesgo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_empresa')->textInput() ?>

    <?php echo $form->field($model, 'fenomeno')->textInput() ?>

    <?php echo $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'Evento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
