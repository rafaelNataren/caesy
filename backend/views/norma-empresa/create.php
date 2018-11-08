<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NormaEmpresa */

$this->title = 'Create Norma Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Norma Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="norma-empresa-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
