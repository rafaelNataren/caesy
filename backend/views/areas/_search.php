<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AreasSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="areas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_areas') ?>

    <?php echo $form->field($model, 'nombre_area') ?>

    <?php echo $form->field($model, 'observaciones') ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
