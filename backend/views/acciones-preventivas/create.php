<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AccionesPreventivas */

$this->title = 'Create Acciones Preventivas';
$this->params['breadcrumbs'][] = ['label' => 'Acciones Preventivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acciones-preventivas-create">

     <?php echo  $this->render('evaluar_form', [
            'catCatalogo' => $catCatalogo,
            'id_empresa' => $id_empresa,
            'modelEmpresa'=>$modelEmpresa
        ]);?>

</div>
