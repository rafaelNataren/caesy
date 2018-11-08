<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->title = 'Create Curso';
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
