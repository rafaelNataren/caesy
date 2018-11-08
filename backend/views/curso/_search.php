<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CursoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id_curso') ?>

    <?php echo $form->field($model, 'id_empresa') ?>

    <?php echo $form->field($model, 'nombre') ?>

    <?php echo $form->field($model, 'fecha_inicio') ?>

    <?php echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'area_tematica') ?>

    <?php // echo $form->field($model, 'duracion_hrs') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
