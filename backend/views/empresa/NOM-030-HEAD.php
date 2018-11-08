<?php

?>

	

	
<div class="col-sm-12 " >

		<?php if ($model->path):	?>
		    
		    <img align="middle" style="width:175px; height:125px;" src="<?=  $model->base_url.'/' . $model->path ?>" alt="" />
      	
		<?php else: ?>
	<h1><?= $model->nombre_empresa ?></h1>
       	
	
		<?php endif ?>
     
     
</div>


