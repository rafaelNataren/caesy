<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cenapret */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cenapret-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'idl_cenapret')->textInput() ?>

    <?php echo $form->field($model, 'id_empresa')->textInput() ?>

    <?php echo $form->field($model, 'imagen_url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'base_url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fenomeno')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
