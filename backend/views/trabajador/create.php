<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = 'Create Trabajador';
$this->params['breadcrumbs'][] = ['label' => 'Trabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
