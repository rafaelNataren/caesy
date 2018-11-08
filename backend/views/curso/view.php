<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->title = 'Curso: '.$model->id_curso;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-view">
<div class="row">
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                      <i class="fa fa-users"></i>
                                           </h3>
                                    <p>
                                       Trabajadores en el curso
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
                                                             </h3>
                                    <p>
                                       Constancias 
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
                    
                         
	</div>
    <p>
       
    </p>
     <div class="col-md-12">
               <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Información</h3>

              <div class="box-tools pull-right">
          <!--     <?php echo Html::a('<i class="fa fa-print"></i>', ['imprimir-info', 'id_empresa' => $model->id_empresa], ['class' => 'btn','target'=>'_blank']) ?>
              <?php echo Html::a('<i class="fa fa-pencil"></i>', ['update', 'id_empresa' => $model->id_empresa], ['class' => 'btn']) ?>
               -->	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          
              <div class="col-md-5">
				
              <dl>
                <dt>Nombre del curso</dt>
               <dd><?=$model->nombre;?></dd>
                
                <dt>Duracion del curso</dt>
                <dd><?=$model->duracion_hrs;?> hrs</dd>
               
               <dt>Area tematica</dt>
               <dd><?=$model->area_tematica;?></dd>
              </dl>
             </div> 
              <div class="col-md-3">
            
              <dl>
               <dt>Fecha de inicio del curso </dt>
               <dd><?= $model->fecha_inicio;?></dd>
                <dt>Fecha de termino del curso </dt>
                 <dd><?=$model->fecha_fin;?></dd>
              
               
              </dl>
             </div> 
              
       
            </div>
            <div class="box-footer">
            	
            
            	         <?php echo Html::a('Actualizar curso', ['update', 'id' => $model->id_curso], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Eliminar curso', ['delete', 'id' => $model->id_curso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>





</div>
