<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CenapretSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cenapret-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'idl_cenapret') ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <?php echo $form->field($model, 'imagen_url') ?>

    <?php echo $form->field($model, 'base_url') ?>

    <?php echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'fenomeno') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
