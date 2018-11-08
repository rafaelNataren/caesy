<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cenapret */

$this->title = 'Create Cenapret';
$this->params['breadcrumbs'][] = ['label' => 'Cenaprets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cenapret-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
