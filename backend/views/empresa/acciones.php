<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Trabajador;
use yii\bootstrap\ActiveForm;
use backend\models\Areas;
use backend\models\CatCatalogo;
use backend\models\Diagnostico;
use PHPUnit\Framework\Constraint\Count;
use backend\models\Curso;
use kartik\datecontrol\DateControl;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones Preventivas ';
$this->params['breadcrumbs'][] = $this->title;

$peligros=ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>12,'ACTIVO'=>1,'ELEMENTO_PADRE'=>null]), 'ID_ELEMENTO', 'NOMBRE');

$riesgo=ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>12,'ACTIVO'=>1,'ELEMENTO_PADRE'=>null ]), 'ID_ELEMENTO', 'NOMBRE');

$norma=ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>11,'ACTIVO'=>1, 'ELEMENTO_PADRE'=>NULL]), 'ID_ELEMENTO', 'CLAVE');
$itemsProbabilidad= [1=>'BAJA',2=>'MEDIA',3=>'ALTA'];
$itemsConsecuencia= [1=>'Ligeramente Dañino',2=>'Dañino',3=>'Extremadamente Dañino'];
$itemsEvaluacion=[];

?>
	<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		    <div class="col-md-12">
               <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Información</h3>

              <div class="box-tools pull-right">
              <?php echo Html::a('<i class="fa fa-print"></i>', ['imprimir-info', 'id_empresa' => $model->id_empresa], ['class' => 'btn','target'=>'_blank']) ?>
              <?php echo Html::a('<i class="fa fa-pencil"></i>', ['update', 'id_empresa' => $model->id_empresa], ['class' => 'btn']) ?>
              
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-md-3">
            <dl>
              
               <dd><img class="img-thumbnail" style="width:350px; height:250px;" src="<?= isset ($model->path)? $model->base_url.'/' . $model->path : '/img/clipboard.png'?>" alt="" /></dd>
                
              
              </dl>
              </div>
              <div class="col-md-3">
				
              <dl>
                <dt>Nombre de la empresa </dt>
               <dd><?=$model->nombre_empresa;?></dd>
                
                <dt>Direccion</dt>
                <dd><?=$model->direccion;?></dd>
               
               <dt>Correo</dt>
               <dd><?=$model->correo_electronico;?></dd>
              </dl>
             </div> 
              <div class="col-md-3">
            
              <dl>
               <dt>Registro Patronal</dt>
               <dd><?= $model->registro_patronal;?></dd>
                <dt>Registro Federal del Contribuyente</dt>
                 <dd><?=$model->rfc;?></dd>
              
               
              </dl>
             </div> 
              
       
            </div>
            <div class="box-footer">
            	
            	<?php echo Html::a('Regresar', ['view', 'id' => $model->id_empresa], ['class' => 'btn btn-primary']) ?>
            
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
                       
                        
              <div>       
     <!-- /.cursos todos -->
  <h4 class="page-header" id="anchor_cursos"> </h4>
	  <div class="col-md-12">
	   
               <div class="box box-success with-border">
            <div class="box-header with-border">
           
            <i class="glyphicon glyphicon-ok-sign"></i>
              <h3 class="box-title">Acciones Preventivas</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             	    <?php     
             	    
             	    
             	    $gridCursoColumns = [   ['class' => 'yii\grid\SerialColumn'],
             	     
             	        //'id',
             	     
             	        //'id_curso',
             	        
             	       [ 'attribute'=>'id_elemento',
             	           'content'=>function ($data){
             	               
             	           return $data->elemento->CLAVE;
             	           },
             	           'header'=>'Clave de la norma'
             	       ],
             	       
             	       [ 'attribute'=>'id_elemento',
             	           'content'=>function ($data){
             	           
             	           return $data->elemento->NOMBRE;
             	           },
             	           'header'=>'Nombre de la norma'
             	        ],
             	        
             	        
             	       // 'nombre',
             	       // 'fecha_inicio',
             	        //'fecha_fin',
             	        // 'area_tematica',
             	        // 'duracion_hrs',
             	                    
             	     
             	              
             	                        
             	       
             	                ['class' => 'yii\grid\ActionColumn',
             	                    'template' => '{view}{delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
             	                    'buttons' => [
             	                   
             	                        'view' => function ($url, $model, $key) {
             	                        //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
             	                
             	                $request = Yii::$app->request;
             	                
             	                $id = $request->get('id');
             	                
             	                return Html::a('<i class="fa fa-pencil"></i>', ['acciones-preventivas/create', 'id'=>$model->id_elemento,'id_empresa'=>$id,]
             	                    );
             	                        },
             	                    
             	                    'delete' => function ($url, $model, $id) {//Boton borrar
             	                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente desea borrar esta Norma?
                                        ¡Los datos no son recuperables!.
                                        ','method' => 'post',]]);
             	                    },
             	                    ],
             	                    'urlCreator' => function ($action, $model, $key, $index) {
             	                        	                    
             	                    $request = Yii::$app->request;
             	                    
             	                    $id = $request->get('id');
             	                    if ($action === 'delete') {
             	                        return Yii::$app->urlManager->createUrl(['/norma-empresa/delete', 'id' => $key,'id_empresa'=>$id]); // Aqui es donde se crean las urls con las acciones personalizadas
             	                        
             	                    }
             	                    
             	                    
             	                    }
             	                    ],
             	                
             	                
             	              
             	                
             	                      ];
             	    
             	    
                 echo GridView::widget([
                     'dataProvider' => $dataProvider,
                     'filterModel' => $searchModel,
             	        'columns' => $gridCursoColumns,
                     'resizableColumns'=>true,
                     
             	        
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default' , 'data-toggle'=>'modal' , 'title'=>'Nuevo diagnostico', 'class'=>'btn btn-success', ]) . ' '.
             	                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
             	            ],
             	            '{export}',
             	            '{toggleData}'
             	        ],
             	        'pjax' => true,
             	        'bordered' => true,
             	        'striped' => true,
             	        'condensed' => true,
             	        'responsive' => true,
             	        'hover' => true,
             	        'floatHeader' => true,
             	        'floatHeaderOptions' => ['scrollingTop' => false],
             	        'panel' => [
             	            'type' => GridView::TYPE_PRIMARY
             	           
             	        ],
             	    ]);
             	    
             	    
             	   ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>       	
                 
	</div>
                  
                  
                  
 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
           
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleccionar Norma requerida</h4>
              </div>
              <div class="modal-body">
                
                 <?php echo GridView::widget([
        'dataProvider' => $dataProviderCatalogo,
        'filterModel' => $searchModelCatalogo,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'CLAVE',
            'NOMBRE',
            'DESCRIPCION',
            // 'ORDEN',
            // 'CATEGORIA',
            // 'ACTIVO',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{select}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
                'buttons' => [
                    'select' => function ($url, $data, $id) { // Boton actualizar
                    
                    $request = Yii::$app->request;
                    
                    $id = $request->get('id');
                    
                    return Html::a('<span class="fa fa-check-circle  fa-2x"></span>', ['acciones-agregar','id'=>$data->ID_ELEMENTO,'id_empresa'=>$id], [
                        'title' => 'Seleccionar',
                        'class' => 'btn btn-primary',
                        'data-loading-text' => "Loading...",
                        'id' => 'accion' . $data->ID_ELEMENTO,
                        'name' => 'selectAccion',
                        'value' => $data->ID_ELEMENTO,]);
                    }
                    ]
                    ]
        ],
    ]); ?>

				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
       </div>
       </div>
