<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cenapret */

$this->title = 'Update Cenapret: ' . ' ' . $model->idl_cenapret;
$this->params['breadcrumbs'][] = ['label' => 'Cenaprets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idl_cenapret, 'url' => ['view', 'id' => $model->idl_cenapret]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cenapret-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
