<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id_empresa], ['class' => 'btn btn-primary']) ?>
         <?php echo Html::a('NOM-030', ['imprimir-nom030', 'id' => $model->id_empresa], ['class' => 'btn btn-primary', 'target'=>'_blank']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id_empresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         <?php echo Html::a('mis Trabajadores', ['trabajador/trabajador-index','id_empresa'=>$model->id_empresa], ['class' => 'btn btn-success']) ?>
		 <?php echo Html::a('Agregar Areas', ['areas/create-empresa','id_empresa'=>$model->id_empresa], ['class' => 'btn btn-success']) ?>
		   
    </p>
    <div class="col-md-3">
            <dl>
              
               <dd><img class="img-thumbnail" style="width:350px; height:250px;" src="<?= isset ($model->path)? $model->base_url.'/' . $model->path : '/img/usuario.jpg'?>" alt="" /></dd>
                
              
              </dl>
              </div>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_empresa',
            'nombre_empresa',
            'direccion',
            'correo_electronico',
          
            'rfc',
            'registro_patronal',
            'apoderado_legal',
        ],
    ]) ?>

</div>
