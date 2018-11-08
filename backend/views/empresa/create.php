<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Crear Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
