<?php
?>
<html>
	<head>
    	
	</head>
	<body>
	
	<b></b>
<div style="width:30cm;height:29.7cm;margin:0;" >
<table    style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">


		<tr >
    		<th width="300" align="center"><img  style="width:30%; height:135px;" src="img/STPS.jpg" alt="" /></th>
    		
    		
    <th width="300" align="center"><img  style="width:30%; height:125px;" src="<?= isset ($model->empresa->path)? $model->empresa->base_url.'/' . $model->empresa->path : '/img/usuario.jpg'?>" alt="" /></th>
    
    
    
    <th width="300" align="center"><img  style="width:30%; height:100px;" src="img/caesi.jpg" /></th>
    		
    		
		</tr>
		
		
			
</table>
<br>
<table   style="width: 100%; font-size: 10px;  font-family:times new roman; font-style:bold;">


		<tr >
    		<td width="100%" align="center"><h4><strong>Constancia de Habilidades Laborales</strong></h4></td>
       		
    		
		</tr>
		
			<tr >
    		<td width="100%" align="center"><h3><strong> <?= $model->empresa->nombre_empresa; ?></strong></h3></td>
       		
    		
		</tr>
		<tr >
    		<td width="100%" align="center">RFC: <?= $model->empresa->rfc; ?></td>
       		
    		
		</tr>
		<tr >
    		<td width="100%" align="center">Registro Patronal: <?= $model->empresa->registro_patronal; ?></td>
       		
    		
		</tr>
		<tr >
    		<td width="100%" align="center">Registro Patronal: <?= $model->empresa->registro_patronal; ?></td>
       		
    		
		</tr>
		<tr >
    		<td width="100%" align="center">Se otorga la presente a:</td>
       		
    		
		</tr>
		<tr >
    		<td width="100%" align="center"><h2><?= $model->nombre; ?></h2></td>
       		
    		
		</tr>
		<tr >
    		<td width="100%" align="center">Clave Unica de Registro de Poblacion:<?= $model->curp; ?></td>
       		
    		
		</tr>
		</table>
</div>
</body>
</html>