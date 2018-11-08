<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <?php echo $form->field($model, 'nombre_empresa') ?>

    <?php echo $form->field($model, 'direccion') ?>

    <?php echo $form->field($model, 'correo_electronico') ?>

    <?php echo $form->field($model, 'lgog') ?>

    <?php // echo $form->field($model, 'rfc') ?>

    <?php // echo $form->field($model, 'registro_patronal') ?>

    <?php // echo $form->field($model, 'apoderado_legal') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
