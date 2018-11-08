<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CatCatalogo */

$this->title = 'Update Cat Catalogo: ' . ' ' . $model->ID_ELEMENTO;
$this->params['breadcrumbs'][] = ['label' => 'Cat Catalogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ELEMENTO, 'url' => ['view', 'id' => $model->ID_ELEMENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-catalogo-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
