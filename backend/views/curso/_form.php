<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_empresa')->textInput() ?>

    <?php echo $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fecha_inicio')->textInput() ?>

    <?php echo $form->field($model, 'fecha_fin')->textInput() ?>

    <?php echo $form->field($model, 'area_tematica')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'duracion_hrs')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
