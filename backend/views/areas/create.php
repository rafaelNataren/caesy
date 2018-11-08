<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Areas */

$this->title = 'Create Areas';
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="areas-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
