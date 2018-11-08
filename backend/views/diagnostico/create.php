<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Diagnostico */

$this->title = 'Create Diagnostico';
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
