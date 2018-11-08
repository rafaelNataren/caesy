<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->title = 'Update Curso: ' . ' ' . $model->id_curso;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_curso, 'url' => ['view', 'id' => $model->id_curso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curso-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
