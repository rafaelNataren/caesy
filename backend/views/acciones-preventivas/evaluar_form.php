<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\AccionesPreventivas;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivas */
/* @var $form yii\bootstrap\ActiveForm */
$itemsPreventiva= [1=>'Mejorar',2=>'conservar',3=>'Otro'];
$itemsCumple= [1=>'Si',2=>'No'];
$itemsPorsentaje= [
    1=>'0 %',2=>'10 %',
    3=>'20 %',4=>'30 %',
    5=>'40 %',6=>'50 %',
    7=>'60 %',8=>'70 %',
    9=>'80 %',10=>'90 %',
    11=>'100 %'
];
?>

<div class="row">

<div class="col-md-12">

                    

   <?php $form = ActiveForm::begin(); ?> 
   
    	
           <?php 
            	 
          $globalIndex = 0; 
          foreach($catCatalogo as $categoria) :
          
          	 ?>
          	 
          	 <div class="box box-success with-border">
            <div class="box-header with-border">
           
            <i class="fa fa-dollar"></i>
              <h3 class="box-title"><?= $categoria->CLAVE;?></h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        	  <?php    
        	  $i=0;
        	  foreach($categoria->catCatalogos as $index=>$elemento) :
            	
            	
        	  if( ! ($model = AccionesPreventivas::findOne(['id_empresa'=>$modelEmpresa->id_empresa,'id_elemento'=>$elemento->ID_ELEMENTO]) ) )
                 	   $model = new AccionesPreventivas();
        	 
                  	
        	 ?>
			
			<div class="row">
		        <div class="col-md-12">
                	<?php echo $form->field($model, "[$globalIndex]id_elemento")->hiddenInput(['value'=>$elemento->ID_ELEMENTO])->label(false) ?>  
                	
                	<?php if ($model->id_acciones_prev):?>
                	<?php echo $form->field($model, "[$globalIndex]id_acciones_prev")->hiddenInput(['value'=>$model->id_acciones_prev])->label(false) ?>  
               		<?php endif;?>
                	<p class="text text-primary"><?php  echo ++$i . ' - ' . $elemento->NOMBRE; ?></p>   
                </div>
            
                <div class="col-md-1"><?php echo $form->field($model, "[$globalIndex]accion_preventiva")->dropDownList($itemsPreventiva,  ['prompt'=>'-- Seleccione  --','id'=>'cat-id'])->label('A. Prev.');?> </div>
                <div class="col-md-1"><?php echo $form->field($model, "[$globalIndex]accion_correctiva")->textInput()->label('A. Correc.') ?>          </div>
                <div class="col-md-1"><?php echo $form->field($model, "[$globalIndex]date_inicio")->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                       		]);?></div>
                <div class="col-md-1"><?php echo $form->field($model, "[$globalIndex]date_fin")->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                       		]);?></div>
                <div class="col-md-2"><?php echo $form->field($model, "[$globalIndex]objetivo")->textarea()?>                   </div>
                <div class="col-md-2"><?php echo $form->field($model, "[$globalIndex]observacion")->textarea() ?>                </div>
                <div class="col-md-1"><?php echo $form->field($model, "[$globalIndex]porcentaje")->dropDownList($itemsPorsentaje,  ['prompt'=>'-- Seleccione  --','id'=>'cat-id']);?>                           </div>
                <div class="col-md-1"><?php echo $form->field($model, "[$globalIndex]cumple")->dropDownList($itemsCumple,  ['prompt'=>'-- Seleccione  --','id'=>'cat-id']);?>                     </div>
                <div class="col-md-2"><?php echo $form->field($model, "[$globalIndex]ejercicio")->textInput(); $globalIndex++; ?>                  </div>
       			</div>
    
    <?php endforeach;?>
    
    		</div>
    		</div>
    <?php endforeach;?>
          <!-- /.box -->
  

    <div class="form-group">
        <?php echo Html::submitButton( 'Guardar', ['class'=> 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>

</div>
