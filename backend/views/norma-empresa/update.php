<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NormaEmpresa */

$this->title = 'Update Norma Empresa: ' . ' ' . $model->id_norma_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Norma Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_norma_empresa, 'url' => ['view', 'id' => $model->id_norma_empresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="norma-empresa-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
