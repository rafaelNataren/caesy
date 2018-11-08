<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CatCatalogo */

$this->title = 'Create Cat Catalogo';
$this->params['breadcrumbs'][] = ['label' => 'Cat Catalogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-catalogo-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
