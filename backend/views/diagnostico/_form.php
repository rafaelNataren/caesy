<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Diagnostico */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_empresa')->textInput() ?>

    <?php echo $form->field($model, 'peligro')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'riesgo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'concentracion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'probabilidad')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'concecuencias')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'evaluacion_riesgo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'norma')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'causa')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fecha_evento')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
