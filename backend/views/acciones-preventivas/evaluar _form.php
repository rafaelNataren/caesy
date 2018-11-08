<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivas */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="row">

<div class="col-md-12">

    <?php $form = ActiveForm::begin(); ?>
 
    <?php echo $form->errorSummary($model); ?>
    
    
    <table class="table table-condensed" >

	 <tbody>
	 
	 <?php 
	 
	 foreach($catCatalogo as $categoria) :
	 ?>
	 
	 <tr colspan="12"><h1><?= $categoria->nombre;?></h1></tr>
	 
	  <?php 
	 
	 foreach($categoria as $elemento) :
	 $i=0;
	 ?>
	<tr>
	
	
		<td><?php echo $form->field($model[$i], 'id_empresa')->textInput()->label(false) ?>                                      </td>
        <td>
        	<?php echo $form->field($model[$i], 'id_elemento')->hiddenInput(['value'=>$elemento->ID_ELEMENTO]) ?>  
        	<?php echo $elemento->NOMBRE; ?>  
        </td>
        <td><?php echo $form->field($model[$i], 'accion_preventiva')->textInput(['maxlength' => true])->label(false) ?>          </td>
        <td><?php echo $form->field($model[$i], 'accion_correctiva')->textInput(['maxlength' => true])->label(false) ?>          </td>
        <td><?php echo $form->field($model[$i], 'date_inicio')->textInput()->label(false) ?>                                     </td>
        <td><?php echo $form->field($model[$i], 'date_fin')->textInput()->label(false) ?>                                        </td>
        <td><?php echo $form->field($model[$i], 'objetivo')->textInput(['maxlength' => true])->label(false) ?>                   </td>
        <td><?php echo $form->field($model[$i], 'observacion')->textInput(['maxlength' => true])->label(false) ?>                </td>
        <td><?php echo $form->field($model[$i], 'porcentaje')->textInput()->label(false) ?>                                      </td>
        <td><?php echo $form->field($model[$i], 'cumple')->textInput(['maxlength' => true])->label(false) ?>                     </td>
        <td><?php echo $form->field($model[$i++], 'ejercicio')->textInput(['maxlength' => true])->label(false) ?>                  </td>
          
    
    </tr>
    
    <?php endforeach;?>
    
    <?php endforeach;?>
    
     </tbody>
    
    </table>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>

</div>
