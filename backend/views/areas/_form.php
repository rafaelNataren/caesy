<?php
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\TabularInput;
use yii\helpers\Html;
use unclead\multipleinput\examples\models\Item;
use unclead\multipleinput\TabularColumn;
use backend\models\Areas;
/* @var $this \yii\web\View */
/* @var $models Item[] */
?>
<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_empresa')->textInput() ?>

    <?php echo $form->field($model, 'nombre_area')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'observaciones')->textArea() ?>

  

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>