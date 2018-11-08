<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Update Empresa: ' . ' ' . $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empresa, 'url' => ['view', 'id' => $model->id_empresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
