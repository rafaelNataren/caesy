<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    
    
    <div class="col-md-3 col-sm-12 col-xs-12">
		<h2>Logotipo de la empresa</h2>
	<?php
            
            echo $form->field($model, 'imagen_url')->widget(\trntv\filekit\widget\Upload::classname(), [
                'url' => [
                    'avatar-upload'
                ],
                'maxNumberOfFiles' => 1
            ])->label(false)?>


	
	</div>
 <div class="col-md-9">
<h2>Información dela empresa</h2>
    <div class="col-md-12">
		<div class="col-md-4">
				<small> Nombre de la empresa</small>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'nombre_empresa', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-globe"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'NOMBRE',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
    	 </div>
     </div>
     </div>
     	</div>

 <div class="col-md-9">
    <br>

    <?php echo $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>



    <?php echo $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'registro_patronal')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'apoderado_legal')->textInput(['maxlength' => true]) ?>
 	 <?php echo $form->field($model, 'resp_salud')->textInput(['maxlength' => true]) ?>
 	 <?php echo $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
