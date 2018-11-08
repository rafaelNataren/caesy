<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Trabajador;
use yii\bootstrap\ActiveForm;
use backend\models\Areas;
use backend\models\ResumenRiesgo;
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

$this->title = 'Empresa';
$this->params['breadcrumbs'][] = $this->title;

$peligros=ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>12,'ACTIVO'=>1,'ELEMENTO_PADRE'=>null]), 'ID_ELEMENTO', 'NOMBRE');

$riesgo=ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>13,'ACTIVO'=>1 ]), 'ID_ELEMENTO', 'NOMBRE');

$norma=ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>11,'ACTIVO'=>1, 'ELEMENTO_PADRE'=>NULL]), 'ID_ELEMENTO', 'CLAVE');

$itemsProbabilidad= [1=>'BAJA',2=>'MEDIA',3=>'ALTA'];
$itemsFenomeno= [1=>'natural',2=>'MEDIA',3=>'ALTA'];
$itemsConsecuencia= [1=>'Ligeramente Dañino',2=>'Dañino',3=>'Extremadamente Dañino'];
$itemsEvaluacion=[];

?>
	<div class="row">
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                      <i class="fa fa-users"></i>
                                      <?=  count(Trabajador::findBySql('select * from tbl_trabajador where id_empresa ='.$model->id_empresa)->all()); ?>
                                    </h3>
                                    <p>
                                       Todos mis trabajadores
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_trabajador">
                                  Ir  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                           <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue">
                                <div class="inner">
                                    <h3>
                                      <i class="glyphicon glyphicon-calendar"></i>
                                      <?=Count(Areas::findBySql('select * from tbl_areas where id_empresa='.$model->id_empresa)->all()); ?>
                                                    </h3>
                                    <p>
                                       Areas de la Empresa
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_areas">
                                 Ir  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <?= count(Diagnostico::findBySql('select * from tbl_diagnostico where id_empresa= ' .$model->id_empresa)->all()); ?>    
                                    </h3>
                                    <p>
                                       Diagnostico Integral
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_constancia1">
                                   Ir  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                         </div>
                         <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue">
                                <div class="inner">
                                    <h3>
                                      <i class="glyphicon glyphicon-copyright-mark"></i>
                                                    </h3>
                                    <p>
                                            Mis Cursos 
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_plan">
                                 Ir  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                         
	</div>
                        

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
            
            	<a href="update?id=<?php echo $model->id_empresa;?>" class="btn btn-primary btn-lg" ><i class="fa fa-star"></i>&nbsp;Actualizar Empresa</a>
            
            	
            	<?php echo Html::a('Acciones preventivas', ['acciones', 'id' => $model->id_empresa], ['class' => 'btn btn-primary btn-lg']) ?>
        			<?php echo Html::a('<i class="fa fa-file"></i> NOM-030', ['imprimir-nom030', 'id' => $model->id_empresa], ['class' => 'btn btn-primary btn-lg', 'target'=>'_blank']) ?>
        
        
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	
	   <h4 class="page-header" id="anchor_trabajador"> </h4>
	  <div class="col-md-12">
	   
               <div class="box box-success with-border">
            <div class="box-header with-border">
           
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Mis trabajadores</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             	    <?php 
             	    
             	    
             	    $gridCuotaColumns = [   ['class' => 'yii\grid\SerialColumn'],
             	     
             	        //'id',
             	     
             	        //'id_trabajador',
             	        'nombre',
             	        //'edad',
             	        'curp',
             	        'ocupacion',
             	        // 'sexo',
             	         'correo',
             	        // 'direccion',
             	        //'id_empresa',
            	                    // 'comentario',
             	                    // 'tipo_periodo',
             	                    
             	        ['class' => 'yii\grid\ActionColumn',
             	            'template' => '{delete}',
             	            'buttons' => [
             	                
                     	                'delete' => function ($url, $model, $key) {
                     	                //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
                     	        return Html::a('', ['delete-work', 'id_trabajador'=>$model->id_trabajador, 'id_empresa'=>$model->id_empresa], [
                     	        'class' => 'fa fa-trash',
                     	        'data' => [
                     	        'confirm' => "Esta seguro de borrar este trabajador?",
                     	        ],
                     	        ]);
                     	                }
             	                ]
             	                
             	                
             	         ],
             	                ['class' => 'yii\grid\ActionColumn',
             	                    'template' => '{update}',
             	                    'buttons' => [
             	                        
             	                        'update' => function ($url, $model, $key) {
             	                        //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
             	                return Html::a('<i class="fa fa-pencil"></i>', ['update-work', 'id'=>$model->id_trabajador]
             	                );
             	                        }
             	                        ]
             	                        
             	                        
             	                        ],
             	                        
             	                        ['class' => 'yii\grid\ActionColumn',
             	                            'template' => '{update}',
             	                            'buttons' => [
             	                                
             	                                'update' => function ($url, $model, $key) {
             	                                //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
             	                        return Html::a('<i class="fa fa-eye"></i>', ['view-work', 'id'=>$model->id_trabajador]
             	                        );
             	                                }
             	                                ]
             	                                
             	                                
             	                                ],
             	                      ];
             	    
             	    
                 echo GridView::widget([
             	        'dataProvider' => $dataProvider,
             	        'filterModel' => $searchModel,
             	        'columns' => $gridCuotaColumns,
                     'resizableColumns'=>true,
                     
             	        
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default' , 'data-toggle'=>'modal' , 'title'=>'Nuevo trabajador', 'class'=>'btn btn-success', ]) . ' '.
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        





<!--  aqui van el grid de las areas -->
 <div class="col-md-12">
 <h4 class="page-header" id="anchor_areas"> </h4>
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Mis Areas</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->	
            
            <div class="box-body">
             	    <?php 
             	    
             	    
             	    $gridColumns = [   ['class' => 'yii\grid\SerialColumn'],
             	     
             	  
             	        // 'direccion',
             	        'nombre_area',
             	        'observaciones',
             	      
             	 
             	        //'id_empresa',
             	        ['class' => 'yii\grid\ActionColumn',
             	            'template' => '{update} {delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
             	            'buttons' => [
             	                'update' => function ($url, $model, $id) { //Boton actualizar
             	                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Editar')]);
             	            },
             	            
             	            'view' => function ($url, $model, $id) {//Boton Ver
             	            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Ver')]);
             	            },
             	            
             	            'delete' => function ($url, $model, $id) {//Boton borrar
             	            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente desea borrar esta Area?
                        ¡Los datos no son recuperables!.
                        ','method' => 'post',]]);
             	            },
             	            ],
             	            'urlCreator' => function ($action, $model, $key, $index) {
             	            if ($action === 'update') {
             	                return Yii::$app->urlManager->createUrl(['/areas/update', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
             	                
             	            }
             	            
             	         
             	            
             	            if ($action === 'delete') {
             	                return Yii::$app->urlManager->createUrl(['/areas/delete', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
             	                
             	            }
             	            
             	            
             	            }
             	            ],
             	                    
             	                   ];
             	    
             	    
                 echo GridView::widget([
                     'dataProvider' => $dataAreaProvider,
                     'filterModel' => $searchAreaModel,
             	        'columns' => $gridColumns,
                     'resizableColumns'=>true,
                     
             	        
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default1' , 'data-toggle'=>'modal' , 'title'=>'Nueva Area', 'class'=>'btn btn-success', ]) . ' '.
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
  
	</div>
</div>


<!--  aqui van el resumen de riesgos  -->
 <div class="col-md-12">
 <h4 class="page-header" id="anchor_Diagnostico"> </h4>
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Resumen de riesgos </h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->	
            
            <div class="box-body">
             	    <?php 
             	    
             	    
             	    $gridResumenColumns = [   ['class' => 'yii\grid\SerialColumn'],
             	            	  
             	    
             	        'fenomeno',
             	        'descripcion',
             	      
    
             	                    
             	                   ];
             	    
             	    
                 echo GridView::widget([
                     'dataProvider' => $dataResumenProvider,
                     'filterModel' => $searchResumenModel,
             	        'columns' => $gridResumenColumns,
                     'resizableColumns'=>true,
                     
             	        
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default2' , 'data-toggle'=>'modal' , 'title'=>'Agregar', 'class'=>'btn btn-success', ]) . ' '.
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
  



<!--  aqui van el grid de las areas -->
 <div class="col-md-12">
 <h4 class="page-header" id="anchor_constancia1"> </h4>
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Diagnostico</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->	
            
            <div class="box-body">
             	    <?php 
             	    
             	    
             	    $gridColumns = [   ['class' => 'yii\grid\SerialColumn'],
             	     
             	  
             	        // 'direccion',
             	        [
             	            'attribute'=>'peligro',
             	            'content'=>function($data){
             	            
             	            $tmpModel = CatCatalogo::findOne(['ID_ELEMENTO'=>$data->peligro,'CATEGORIA'=>12, 'ACTIVO'=>1]);
             	            return isset($tmpModel)?$tmpModel->NOMBRE: $data->peligro;
             	            },
             	            'filter'=>ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>12, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
             	            ],
             	            [
             	                'attribute'=>'riesgo',
             	                'content'=>function($data){
             	                
             	                $riesgoModel = CatCatalogo::findOne(['ID_ELEMENTO'=>$data->riesgo,'CATEGORIA'=>13, 'ACTIVO'=>1]);
             	                return isset($riesgoModel)?$riesgoModel->NOMBRE: $data->riesgo;
             	                },
             	                'filter'=>ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>13, 'ACTIVO'=>1]), 'ID_ELEMENTO','NOMBRE'),
             	                ],
             	                
             	                [
             	                    'attribute'=>'norma',
             	                    'content'=>function($data){
             	                    
             	                    $normaModel = CatCatalogo::findOne(['ID_ELEMENTO'=>$data->norma,'CATEGORIA'=>11, 'ACTIVO'=>1]);
             	                    return isset($normaModel)?$normaModel->CLAVE: $data->norma;
             	                    },
             	                    'filter'=>ArrayHelper::map(CatCatalogo::findAll(['CATEGORIA'=>11, 'ACTIVO'=>1]), 'ID_ELEMENTO','CLAVE'),
             	                    ],
             	        'riesgo',
             	        'causa',
             	        'probabilidad',
             	      
             	 
             	      
             	 
             	       
            	                   
             	                    
             	                   ];
             	    
             	    
                 echo GridView::widget([
                     'dataProvider' => $dataDiaProvider,
                     'filterModel' => $searchDiaModel,
             	        'columns' => $gridColumns,
                     'resizableColumns'=>true,
                     
             	        
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default3' , 'data-toggle'=>'modal' , 'title'=>'Nueva Diagnostico', 'class'=>'btn btn-success', ]) . ' '.
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
  


 
        
        
     <!-- /.cursos todos -->
  <h4 class="page-header" id="anchor_cursos"> </h4>
	  <div class="col-md-12">
	   
               <div class="box box-success with-border">
            <div class="box-header with-border">
           
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Mis Cursos</h3>

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
             	     
             	        'id_curso',
             	        'id_empresa',
             	        'nombre',
             	        'fecha_inicio',
             	        'fecha_fin',
             	        // 'area_tematica',
             	        // 'duracion_hrs',
             	                    
             	     
             	              
             	                        
             	        ['class' => 'yii\grid\ActionColumn',
             	            'template' => '{view}',
             	            'buttons' => [
             	                
             	                'view' => function ($url, $model, $key) {
             	                //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
             	        return Html::a('<i class="fa fa-eye"></i>', ['curso/view', 'id'=>$model->id_curso]
             	        );
             	                }
             	                ]
             	                
             	                
             	                ],
             	                      ];
             	    
             	    
                 echo GridView::widget([
                     'dataProvider' => $dataCursoProvider,
                     'filterModel' => $searchCursoModel,
             	        'columns' => $gridCursoColumns,
                     'resizableColumns'=>true,
                     
             	        
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default-curso' , 'data-toggle'=>'modal' , 'title'=>'Nuevo diagnostico', 'class'=>'btn btn-success', ]) . ' '.
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>       	

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
            <?php $form = ActiveForm::begin(['action' =>['trabajador','id'=>$model->id_empresa]]); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar un nuevo trabajador</h4>
              </div>
              <div class="modal-body">
                



     
	<div class="col-md-12">
    <?php 
    
    $trabajadorModel  =  new Trabajador();
    echo $form->errorSummary($model); ?>
    </div> 

	 <?php echo $form->field($trabajadorModel, 'nombre', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Nombre del trabajador','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
     <?php echo $form->field($trabajadorModel, 'edad', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Edad','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      <?php echo $form->field($trabajadorModel, 'curp', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'CURP','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
        <?php echo $form->field($trabajadorModel, 'ocupacion', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Ocupacion','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      	
          <?php echo $form->field($trabajadorModel, 'correo', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Correo electronico','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
         <?php echo $form->field($trabajadorModel, 'direccion', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Direccion','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <?php echo Html::submitButton($trabajadorModel->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



<div class="modal fade1" id="modal-default1">
          <div class="modal-dialog">
            <div class="modal-content">
            <?php $form = ActiveForm::begin(['action' =>['area','id'=>$model->id_empresa]]); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar un Area de trabajo</h4>
              </div>
              <div class="modal-body">
                



     
	<div class="col-md-12">
    <?php 
    
    $areaModel  =  new Areas();
    echo $form->errorSummary($model); ?>
    </div> 
 <?php echo $form->field($areaModel, 'nombre_area', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="glyphicon glyphicon-cloud"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Nombre del area','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
	 <?php echo $form->field($areaModel, 'observaciones', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Observaciones del area','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <?php echo Html::submitButton($areaModel->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
              
              
              
              
              
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <!-- a qui van el resumen de riegos -->

<div class="modal fade1" id="modal-default2">
          <div class="modal-dialog">
            <div class="modal-content">
            <?php $form = ActiveForm::begin(['action' =>['resumen','id'=>$model->id_empresa]]); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Resumen de Riesgos </h4>
              </div>
              <div class="modal-body">
                



     
	<div class="col-md-12">
    <?php 
    
    $resumnModel  =  new ResumenRiesgo();
    echo $form->errorSummary($model); ?>
    </div> 
 <?php echo $form->field($resumnModel, 'fenomeno', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="glyphicon glyphicon-cloud"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Fenomeno','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
	 <?php echo $form->field($resumnModel, 'descripcion', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Descripcion','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <?php echo Html::submitButton($areaModel->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
              
              
              
              
              
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
        
<!-- a qui va el diagnositoc integral -->


<div class="modal fade1" id="modal-default3">
          <div class="modal-dialog">
            <div class="modal-content">
            <?php $form = ActiveForm::begin(['action' =>['diagnostico','id'=>$model->id_empresa]]); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar un Diagnostico</h4>
              </div>
              <div class="modal-body">
                



     
	<div class="col-md-12">
    <?php 
    
    $diaModel  =  new Diagnostico();
    echo $form->errorSummary($model); ?>
    </div> 
    
    
    <?php 

    echo $form->field($diaModel, 'peligro')->dropDownList($peligros,  [
   
        'prompt'=>'-- Seleccione  --',
        'id'=>'cat-id'
        
    ]);
   				?>
   				
   				 <?php 
                                
                                
   				 echo $form->field($diaModel, 'riesgo')->dropDownList($riesgo,  [
   				     
   				     'prompt'=>'-- Seleccione  --',
   				     'id'=>'cat-id'
   				     
   				 ]);?>
                           
                        <!--         <?php 
                                
                                
                                echo $form->field($diaModel, 'riesgo')->widget(DepDrop::classname(), [
                                   				    'options' => ['id' => 'subcat-id'],
                                                    'data'=>$riesgo,
                                   				    'pluginOptions' => [
                                   				        'multiple' => true,
                                   				        'prompt'=>'-- Seleccione  --',
                                   				        'depends' => [''],
                                   				        'placeholder' => 'Seleccione ...',
                                   				        'url' => Url::to(['empresa/getpeligros'])
                                   				    ]]);?>
                                      
                              -->     
      
      
	 <?php echo $form->field($diaModel, 'concentracion', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="
glyphicon glyphicon-fire"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Concentracion','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
        <?php 
echo $form->field($diaModel, 'probabilidad', ['template' => 

		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="
glyphicon glyphicon-fire"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($itemsProbabilidad,['prompt'=>'-- Probabilidad  --','id' => 'tx-grado'])->label(false); ?>
   				
  <?php 
echo $form->field($diaModel, 'concecuencias', ['template' => 

		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="
glyphicon glyphicon-fire"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($itemsConsecuencia,['prompt'=>'-- Consecuencias  --','id' => 'tx-grado'])->label(false); ?>
   				
  
  
        <?php echo $form->field($diaModel, 'evaluacion_riesgo', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Evaluacion de riesgo','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
     
      <?php echo $form->field($diaModel, 'causa', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Causa','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
     <?php echo $form->field($diaModel, 'norma', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($norma,['prompt'=>'-- Norma aplicable --','id' => 'tx-grado'])->label(false); ?>
   				
   				<?php  
   				echo $form->field($diaModel, 'fecha_evento')->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                       		]);?>
      
    
    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <?php echo Html::submitButton($diaModel->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             
              </div>
              
              
              
              
              
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<div class="modal fade1" id="modal-default-curso">
          <div class="modal-dialog">
            <div class="modal-content">
            <?php $form = ActiveForm::begin(['action' =>['curso','id'=>$model->id_empresa]]); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar un Curso</h4>
              </div>
              <div class="modal-body">
                



     
	<div class="col-md-12">
    <?php 
    
    $areaModel  =  new Curso();
    echo $form->errorSummary($model); ?>
    </div> 
 <?php echo $form->field($areaModel, 'nombre', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="glyphicon glyphicon-cloud"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Nombre del Curso','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
	 <?php echo $form->field($areaModel, 'area_tematica', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Area tematica','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
     <?php echo $form->field($areaModel, 'duracion_hrs', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Duracion en horas','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
       <?php  
                              echo $form->field($areaModel, 'fecha_inicio')->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                       		]);?>
                       		   <?php  
                              echo $form->field($areaModel, 'fecha_fin')->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                       		]);?>
      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <?php echo Html::submitButton($areaModel->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
              
              
              
              
              
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
