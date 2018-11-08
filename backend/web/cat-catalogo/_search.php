<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CatCatalogoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-catalogo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'ID_ELEMENTO') ?>

    <?php echo $form->field($model, 'CLAVE') ?>

    <?php echo $form->field($model, 'ELEMENTO_PADRE') ?>

    <?php echo $form->field($model, 'NOMBRE') ?>

    <?php echo $form->field($model, 'DESCRIPCION') ?>

    <?php // echo $form->field($model, 'ORDEN') ?>

    <?php // echo $form->field($model, 'CATEGORIA') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
