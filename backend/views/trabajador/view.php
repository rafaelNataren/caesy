<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = $model->id_trabajador;
$this->params['breadcrumbs'][] = ['label' => 'Trabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id_trabajador], ['class' => 'btn btn-primary']) ?>
         <?php echo Html::a('Constancia', ['imprimir-constancia', 'id_trabajador' => $model->id_trabajador], ['class' => 'btn btn-primary', 'target'=>'_blank']) ?>
       
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id_trabajador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_trabajador',
            'nombre',
            'edad',
            'curp',
            'ocupacion',
            'sexo',
            'correo',
            'direccion',
            'id_empresa',
        ],
    ]) ?>

</div>
