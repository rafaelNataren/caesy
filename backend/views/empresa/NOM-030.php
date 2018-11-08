<?php





use backend\models\AccionesPreventivas;
use backend\models\CatCatalogo;
?>

	
<div class="row">
	<div class="col-md-12">
		
    	<div>
            <table class="titulo"  border="" style="width: 100%; font-size: 45px;  font-family:arial; font-style:bold;">
            		<tr>
            	    <td style="border-bottom: 5px solid #0B0B3B"></td>	
            	</tr>
            	<tr>
            	
            		<td style="font-size: 40px;" width="50%" align="center"><b>NOM-030-STPS-2009 <br>SERVICIOS PREVENTIVOS DE <br> SEGURIDAD Y SALUD EN EL <br> TRABAJO</b></td>
            		
            	</tr>
            	
            		<tr>
            	    <td style="border-bottom: 5px solid #0B0B3B"></td>
            	</tr>
            </table>
		</div>
  <div style="page-break-after:always;"></div><!--  -->
		<div class="col-md-12">
        		<table  style="width: 100%; font-size: 15px;  font-family:arial; font-style:bold;">
                        <tr>
                        
                        <td colspan="4" style="font-size: 20px"><b>CONTENIDO</b></td>
                        </tr>
                          <tr>
                        	<td valign="top">1.</td>
                        
                            <td colspan="2" valign="top"><b>DIAGNÓSTICO DE SEGURIDAD Y SALUD EN EL TRABAJO</b></td>
                        
                            <td>Celda 2</td>
                        
                          </tr>
                            <tr>
                            <td></td>
                        	<td valign="top" width="5%">1.1</td>
                            <td valign="top">CONDICIONES FÍSICAS PELIGROSAS E INSEGURAS/ AGENTES FÍSICOS, QUÍMICOS Y BIOLÓGICOS</td>
                        
                            <td valign="top">Celda 4</td>
                        
                          </tr>
                            <tr>
                            <td ></td>
                        	<td valign="top" width="5%">1.2</td>
                            <td valign="top">PELIGROS CIRCUNDANTES AL ESTABLECIMIENTO</td>
                        
                            <td>Celda 6</td>
                        
                          </tr>
                            <tr>
                            <td></td>
                        	<td valign="top" width="5%">1.3</td>
                            <td valign="top">REQUERIMIENTOS NORMATIVOS EN MATERIA DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
                        
                            <td valign="top">Celda 8</td>
                        
                          </tr>
                        
                          <tr>
                          	<td valign="top">2.</td>
                        
                            <td valign="top" colspan="2"><b>	RELACIÓN DE ACCIONES PREVENTIVAS Y CORRECTIVAS DE SEGURIDAD Y SALUD EN EL TRABAJO</b></td>
                            
                            <td valign="top">Celda 10</td>
                        
                          </tr>
                          
                          <tr>
                          	<td valign="top">3.</td>
                         
                            <td valign="top" colspan="2">	<b>DESIGNACIÓN DE UN RESPONSABLE DE SEGURIDAD Y SALUD EN EL TRABAJO</b></td>
                        	
                            <td valign="top">Celda 12</td>
                        
                          </tr>
                              <tr>
                        	<td valign="top">4.</td>
                        
                            <td valign="top" colspan="2"><b>DIFUSIÓN DEL DIAGNÓSTICO DE SEGURIDAD Y SALUD EN EL TRABAJO</b></td>
                        
                            <td valign="top">Celda 14</td>
                        
                          </tr>
                        
                          <tr>
                          	<td valign="top">5.</td>
                          
                            <td valign="top" colspan="2"><b>	CONSTANCIAS DE HABILIDADES LABORALES</b></td>
                            
                            <td valign="top">Celda 16</td>
                        
                          </tr>
                          
                          <tr>
                          	<td valign="top">6.</td>
                          
                            <td valign="top" colspan="2">	<b>REPORTES DE SEGUIMIENTO DE LOS AVANCES EN LA INSTAURACIÓN DE LA RELACIÓN DE ACCIONES PREVENTIVAS Y CORRECTIVAS DE SEGURIDAD Y SALUD EN EL TRABAJO</b></td>
                        
                            <td valign="top">Celda 18</td>
                            
                        
                          </tr>
                            <tr>
                          	<td valign="top">7.</td>
                          	
                            <td valign="top" colspan="2">	<b>GUÍAS PARA EL CUMPLIMIENTO DE LA RELACIÓN DE ACCIONES PREVENTIVAS Y CORRECTIVAS DE SEGURIDAD Y SALUD EN EL TRABAJO</b></td>
                            
                            <td valign="top" >Celda 20</td>
                        
                          </tr>
                           <tr>
                          	<td valign="top">8.</td>
                          		
                            <td valign="top" colspan="2"><b>	MECANISMOS DE RESPUESTA INMEDIATA CUANDO SE DETECTA UN RIESGO GRAVE E INMINENTE </b> </td>
                            
                            <td valign="top">Celda 22</td>
                           </tr>
			</table>       		
        		
		</div>
	<div style="page-break-after:always;"></div>
    <!-- salto de pagina----------------------------------------------------------------------------------------------------- -->
	 <div>
	 
            <table  style="width: 100%; font-size: 20px;  font-family:arial; font-style:bold;">
            		<tr>
            	    <td style="border-bottom: 5px solid #0B0B3B"></td>	
            	</tr>
            	<tr>
            	
            		<td style="font-size: 40px;" width="50%" align="center"><b><br>1. DIAGNOSTICO DE SEGURIDAD Y <br>SALUD EN EL TRABAJO</b></td>
            	
            	</tr>
            	
            		<tr>
            	    <td style="border-bottom: 5px solid #0B0B3B"></td>
            	</tr>
            	<tr>	
            	<td style="font-size: 25px;" width="50%" align="center">NOM-030-STPS-2009 
            	<br><br><br><br><br><br>
            	
            	<br><br><br><br><br><br>
            	<strong> <?= $model->nombre_empresa; ?></strong> </td>
            	</tr>
            
            </table>
	 </div>
	<div style="page-break-after:always;"></div>
    <!-- salto de pagina----------------------------------------------------------------------------------------------------- -->
	<div>
			
           <table  border="" style="width: 100%; height:100% font-size: 4px;  font-family:times new roman; font-style:bold;">
            
            
            
            		<tr >
                		
                		<td align="center" valign="bottom"> <br><b>1.1.	CONDICIONES FÍSICAS PELIGROSAS E INSEGURAS/ AGENTES FÍSICOS, QUÍMICOS Y BIOLÓGICOS</b></td>
                		
                		
            		</tr>
            		<tr>
            		<td>
                		<p>El diagnostico de seguridad y salud en el trabajo se realizó de manera integral, 
                		en él se consideraron las diferentes áreas que conforman la empresa<b>
                		<?= $model->nombre_empresa; ?></b> ubicada en <b> <?= $model->direccion; ?></b>
                		
                		</p>
                		<br>
                		<p>A continuación se presenta la descripción de las áreas:</p>
                		</td>
                		</tr>
                		
               </table>
               <br>
               <table  id="customers">
               	    <tr >
                		<td align="center">  	No.	</td>
                		<td align="center">  	ÁREA	</td>
                		<td align="center">  	OBSERVACIONES	</td>
            		</tr>
                        <?php 
                        
                            $i=0;
                            $Areas = $model->areas;
                            
                            foreach ($Areas as $cate) :
                            $i++;
                        ?>
                        <tr>
                        	<td align="center"><?php echo $i; ?></td>
                        	<td align="center"><?= $cate->nombre_area; ?></td>
                        	<td align="center"><?= $cate->observaciones; ?></td>
                        	
                    	</tr>
                        <?php  endforeach;                     	   
                                                                    
                        	?>                
                             <?php                         	 
                            	 
                            	 $model->accionesPreventivas;     ?>                                   

        </table>
     		
	</div>

	<div style="page-break-after:always;"></div>
    <!-- salto de pagina----------------------------------------------------------------------------------------------------- -->
    
    <div>
    
    		<table>
            	<tr>	
            	<td style="font-size: 11px;" width="50%" align="justify">En la siguiente matriz se presenta el diagnóstico integral sobre las 
            	condiciones de seguridad y salud en el centro de trabajo; se han considerado las condiciones físicas peligrosas o inseguras que
            	 puedan representar un riesgo en las instalaciones, procesos, medios de transporte, materiales y energía, así como los agentes 
            	 físicos, químicos y biológicos capaces de modificar las condiciones del medio ambiente del centro de trabajo <br><br>Para la 
            	 evaluación del riesgo se utilizó el método RMPP que considera la siguiente categorización de nivel de riesgo, probabilidad de 
            	 ocurrencia y consecuencias:</td>
            	</tr>
             </table>
                    <br>
              
                            <table border=""   align="center" >
                                    	<tr>	
                                    	<td ><img style="width: 500" alt="" src="/img/imagen1.bmp" ></td>
                                    	</tr>
                             </table>
    <!-- salto de pagina -->
    <div style="page-break-after:always;"></div>

                    <br><br>
                                	<br>
                     		<table border=""  align="center"  >
                                    	<tr>
                             				<td  ><img alt="" src="/img/imagen2.png" ></td>
                                    	</tr>
                              </table>
                                    	<br><br>
                              <table border="" align="center" >
                                    	<tr>
                                    	<td ><img alt="" src="/img/imagen3.PNG" ></td>
                                    	</tr>
                       </table>
    
    
    </div>
    
         <div style="page-break-after:always;"></div>
    <!-- salto de pagina----------------------------------------------------------------------------------------------------- -->
    
	</div>
                   <table border="" style="width: 100%; font-size: 20px;  font-family:arial; font-style:arial;">
                        
                        	<tr>
                        	
                        		<td style="font-size: 14px;" width="50%" align="center"><b>DIAGNÓSTICO INTEGRAL SOBRE LAS CONDICIONES DE SEGURIDAD <br> Y SALUD EN EL CENTRO DE TRABAJO
                        		</b></td>
                        	
                        	</tr>
                        	
            		</table>
            		<br>
            		 <table  class="test">
               	    <tr >
                		<td align="center">  	Peligro </td>
                		<td align="center">  	Riesgo	</td>
                		<td align="center">  	Concentración	</td>
                		<td align="center">  	Probabilidad </td>
                		<td align="center">  	Consecuencias	</td>
                		<td align="center">  	Evaluación del riesgo 	</td>
                		<td align="center">  	Causa 	</td>
                		<td align="center">  	Norma aplicable	</td>
            		</tr>
                        <?php 
                        
                            $i=0;
                         
                            $diagnostico=$model->diagnosticos;
                            
                            foreach ($diagnostico as $cate) :
                            $i++;
                        ?>
                        <tr>
                        	
                        	<?php $catalogo = CatCatalogo::findOne($cate->peligro);?>
                        	<?php $catalogo1 = CatCatalogo::findOne($cate->riesgo);?>
                        	<?php $catalogoNorma = CatCatalogo::findOne($cate->norma);?>
                        	<td align="center"><?= isset($catalogo)?$catalogo->NOMBRE:''; ?></td>
                        	<td align="center"><?= isset($catalogo)?$catalogo1->NOMBRE:''; ?></td>
                        	
                        	<td align="center"><?= $cate->concentracion; ?></td>
                        	<td align="center"><?= $cate->probabilidad; ?></td>
                        	<td align="center"><?= $cate->concecuencias; ?></td>
                        	<td align="center"><?= $cate->evaluacion_riesgo; ?></td>
                        	
                        	<td align="center"><?= $cate->causa; ?></td>
                        	<td align="center"><?= isset($catalogo)?$catalogoNorma->CLAVE:''; ?></td>
                    	</tr>
                        <?php  endforeach;                     	   
                                                                    
                        	?>                
                             <?php                         	 
                            	 
                            	 $model->accionesPreventivas;     ?>                                   

        </table>
        <br>
        <table style="width: 80%;"  >
			<tr>
				<td  valign="top" style="width: 50%"><b>Nombre y firma del Responsable de Salud y Seguridad en el trabajo:</b>	</td>	<td  valign="top" style="width: 30%"><?= $model->resp_salud; ?></td>	
			</tr>
    		<tr>
    			<td  valign="top"><b>Fecha de elaboración:</b></td><td  valign="top"> Ver de donde tomamos la fecha de elaboracion	</td>	
    		</tr>        
        </table>
    
    
    <div style="page-break-after:always;"></div>
    <!-- salto de pagina----------------------------------------------------------------------------------------------------- -->
    <div>
    
    				<table style="width: 100%">
    					<tr>
    						<td align="justify"><b>1.2 PELIGROS CIRCUNDANTES AL ESTABLECIMIENTO</b></td>
    					
    					</tr>
    					
    					<tr>
    						<td align="justify"><?= $model->nombre_empresa; ?><?= $model->descripcion; ?> El establecimiento se encuentra ubicado en ,<?=$model->direccion ?></td>
							<br><br>    					
    					</tr>
    					<tr>
    						<td align="justify">Tipos de riesgo (agentes perturbadores)</td>
    						<br><br>
    					</tr>
    					<tr>
    						<td align="justify">La identificación de los riesgos es una tarea directamente relacionada
    						 con la acción de cada uno de los cinco grandes grupos perturbadores (geológicos, 
    						 hidrometeorológicos, químicos, sanitarios y socio- organizativos). Es por ello que 
    						 se deben de realizar planes contra la ocurrencia de cada uno de estos agentes.</td>
    						 <br><br>
    					</tr>
    					<tr>
    						<td align="justify">Entre los fenómenos destructivos que integran estos cinco grandes grupos 
    						y que afectan directamente al inmueble, se desprenden los siguientes:</td>
    						<br><br>
    					</tr>
    				</table>
    				<br>
    				<table  class="test" border="1"> 
                        <tr>
                          <td><strong>Fenómeno</strong></td>
                          <td><strong>Descripción</strong></td>
                          <td><strong>Evento perturbador que afecta a la población y el establecimiento</strong></td>
                        </tr>
                         
                        <tr>
                          <td>Geológicos</td>
                          <td>Son aquellos originados por la liberación de energía y movimientos de la corteza terrestre</td>
                          <td>Sismos, hundimientos</td>
                        </tr>
                         
                        <tr>
                          <td>Hidrometeorológicos</td>
                          <td>Son aquellos originados por los cambios climáticos en la atmósfera</td>
                          <td>Inundaciones, tormentas eléctricas</td>
                        </tr>
                         
                        <tr>
                          <td>Fisicoquímicos</td>
                          <td>Son aquellos generados por el inadecuado manejo, almacenamiento, transportación y operación de
                        materiales y sustancias químicas peligrosas
                        </td>
                          <td>Incendios, derrames y fugas</td>
                        </tr>
                        
                        <tr>
                          <td>Sanitarios</td>
                          <td>Son aquellos que son generados por la presencia de microbios infecciosos y contaminantes en el medio ambiente y que ponen en riesgo la salud de la población</td>
                          <td>Contaminación ambiental, epidemias </td>
                        </tr>
                        
                        <tr>
                          <td>Socio-organizativos</td>
                          <td>Son aquellos que son generados por el hombre y generan desestabilizad en el orden social</td>
                          <td>Sabotaje y terrorismo, asaltos, accidentes de trabajo </td>
                        </tr>
                    </table>
                    

    </div>
   
    <div>
    <br>
    <p align="left">A continuación, se mencionan los requisitos de las Normas de Seguridad, Organización y Salud aplicables al centro de trabajo:</p>
                    		<table  class="test"  style="width: 100%;  font-size: 15px;  font-family:times new roman; font-style:bold;">
                   	 <tr >
                    		<td align="center">  <b>No.</b></td>
                    		<td align="center">  	NORMA/REQUISITOS	</td>
                    		<td align="center">  	PERIOSIDAD			</td>
                	 </tr>
                            <?php           
                            
                          
                          
                           $i=0;
                            $norma = $model->accionesPreventivas;
                            foreach($catCatalogo as $norma):
                            
                            $accionesNorma = AccionesPreventivas::findAll(['elemento_padre'=>$norma->id_elemento,'id_empresa'=>$model->id_empresa]);
                            
                            
                            ?>
                                
                                <?php if (isset($accionesNorma)):?>
                        <tr>
                        <td colspan="3" align="center"><b><?= $norma->elemento->CLAVE." ".$norma->elemento->DESCRIPCION; ?></b></td>
                        </tr>            	
                                <?php             
                                
                                foreach ($accionesNorma as $cate):
                                
                                 ?>           
                        <tr>
                        	<td align="center"><b><?php  $i++; echo $i; ?></b></td>
                        	<td align="left"><?php 
                        	       
                        	if(isset($cate->elemento)){
                        	    
                        	   echo  $cate->elemento->NOMBRE;
                        	    
                        	}else{
                        	    
                        	    echo '--';
                        	}        	    
                        	       
                        	       ?>
                        	</td>
                        	<td align="center"><?= $cate->ejercicio; ?></td>
                     	</tr>
                            <?php  
                            	  endforeach;  
                                
                            endif;	  
                            endforeach;    	  
                            	
                            	?>   
                                             
                    </table>
    
    </div>
   <div style="page-break-after:always;"></div>
    <!-- salto de pagina----------------------------------------------------------------------------------------------------- -->
    
	</div>
</div>