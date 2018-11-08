<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivas */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="acciones-preventivas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_empresa')->textInput() ?>

    <?php echo $form->field($model, 'id_elemento')->textInput() ?>

    <?php echo $form->field($model, 'elemento_padre')->textInput() ?>

    <?php echo $form->field($model, 'accion_preventiva')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'accion_correctiva')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date_inicio')->textInput() ?>

    <?php echo $form->field($model, 'date_fin')->textInput() ?>

    <?php echo $form->field($model, 'objetivo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'porcentaje')->textInput() ?>

    <?php echo $form->field($model, 'cumple')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'ejercicio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
