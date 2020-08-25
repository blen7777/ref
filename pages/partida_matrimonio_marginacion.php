


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_p_matrimonio.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion(4,$id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pdivorcio = template_pnacimiento(2);
?>

<script>
    $(document).ready(function(){

    	$("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_matrimonio_detalle.php?id="+id);
        });

        $("#guarda_marginacion").click(function(){  
        	
            var id_partida = $("#id_partida").val();
            var id_usuario = $("#id_usuario").val();
            var texto_marginacion = $("#texto_marginacion").val();
            
            var accion = "insert_marginacion";
            var tipoPartida = 2;

            var dataMarginacion = {
            	accion:accion,
            	id_tipo_partida:tipoPartida,
          		id_partida:id_partida,
          		id_usuario:id_usuario,          		
          		texto_marginacion:texto_marginacion
      		};
      		insertarMarginacion(dataMarginacion);
        });

        function insertarMarginacion(data)
	  	{	  		
	  		
	    	$.ajax({
	        	url: "class_db/saveData.php",
	        	type:"post",
	        	data: data,
	        
	        	success: function(){        		
	            	//alert("success"+<?php echo $id_partida; ?>);    
	            	$(".includ").load("pages/partida_matrimonio_detalle.php?id="+ <?php echo $id_partida; ?> );                
	            	//$(".includ").load("pages/partida_detalle.php?id="+id_partida);            	
	        	},	
	        	error:function(){
	            	alert("failure");
	        	}
	  		});
	    }
    });
</script>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
#logo1{
	width: 30%;
}
#titulo{
	text-align: center;
}
#titulo_center,#titulo2{
	text-align: center;

}
#partida{
	text-align: justify;
}
#texto_marginacion{
	border:1px solid grey;
}
#guarda_marginacion{
	text-align: right;

}
</style>

<div class="row">
	<div class="col-md-10" id=""></div>
	<div class="col-md-2" id="">
		<a href="#" id="marginar_partida" class="btn btn-primary">Regresar</a>
		<input type="hidden" value="<?php echo $data['id_pmatrimonio']; ?>" id="id_partida">
		<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['data'][0]; ?>">
	</div>
</div>
<br>
<div id="total">
<div class="row" id="cabecera">
	<div class="col-md-4" id="titulo">
		<span>
			<img src="<?php echo $logo['logo'][0]; ?>" class="logos_header" width="30%">			
		</span>
	</div>
	<div class="col-md-4" id="titulo2">
		<strong><?php echo $empresa['nombre_empresa']; ?></strong><br>
		<strong><?php echo $empresa['municipio']; ?></strong><br>
		<strong><?php echo $empresa['departamento']; ?></strong><br>
		Tel. <strong><?php echo $empresa['telefono']; ?> Fax. <?php echo $empresa['fax']; ?></strong><br>
		NIT. <strong><?php echo $empresa['nit']; ?></strong>
	</div>
	<div class="col-md-4 " id="titulo">
		<img src="<?php echo $logo['logo'][1]; ?>" class="logos_escudo" width='30%'>	
	</div>
</div>


<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<hr>
		<?php
			echo $t_pdivorcio['template'][0];
		?>
	</div>
	<div class="col-md-1"></div>
</div>
<br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" id="partida">
		<?php
			echo $t_pdivorcio['template'][1];echo " ";
			echo $data['pagina'];echo " ";
			echo $data['nfolio'], $data['npagina'];echo ", ";
			echo $t_pdivorcio['template'][2];echo " ";
			echo $data['numero_libro'];echo ", ";
			echo $t_pdivorcio['template'][3];echo " ";
			echo $t_pdivorcio['template'][4];echo " ";
			echo $data['numero_partida'];echo " - ";

			echo $t_pdivorcio['template'][5];echo " ";
			echo $data['nombre_esposo'];echo " ";
			echo $t_pdivorcio['template'][6];echo " ";
			echo $data['nombre_esposa'];echo "; ";

			echo $t_pdivorcio['template'][7];echo " ";
			echo $data['edad_esposo'];echo " ";
			echo $t_pdivorcio['template'][8];echo ", ";

			echo $data['oficio_esposo'];echo ", ";
			echo $data['origen_esposo'];echo ", ";
			echo $data['estado_esposo'];echo ", ";
			echo $t_pdivorcio['template'][9];echo ", ";

			echo $data['dui_esposo'];echo ", ";
			echo $t_pdivorcio['template'][10];echo ", ";

			echo $data['padre_casado'];echo " ";
			echo $t_pdivorcio['template'][6];echo " ";
			echo $data['madre_casado'];echo ", ";
			echo $data['nacionalidad_padres_esposo'];echo ", ";

			echo $t_pdivorcio['template'][11];echo " "; // Datos Esposa
			echo $data['edad_esposa'];echo " ";
			echo $t_pdivorcio['template'][8];echo ", ";
			echo $data['oficio_esposa'];echo ", ";
			echo $data['origen_esposa'];echo ", ";
			echo $data['estado_esposa'];echo ", ";
			echo $t_pdivorcio['template'][9];echo ", ";
			echo $data['dui_esposa'];echo ", ";
			echo $t_pdivorcio['template'][12];echo " ";

			echo $data['padre_casada'];echo " ";
			echo $t_pdivorcio['template'][6];echo " ";
			echo $data['madre_casada'];echo ", ";
			echo $data['nacionalidad_padres_esposa'];echo ", ";

			echo $t_pdivorcio['template'][13];echo " ";
			echo $data['fecha_matrimonio'];echo ", ";
			echo $data['lugar_matrimonio'];echo ", ";
			

			if($data['genero_representante_legal']=='m')
			{
				echo $t_pdivorcio['template'][15];echo " ";
			}
			elseif($data['genero_representante_legal']=='f'){
				echo $t_pdivorcio['template'][14];echo " ";
			}
			echo $data['nombre_representante_legal'];echo ", ";


			echo $t_pdivorcio['template'][16];echo " ";
			echo $data['nombre_representante_legal'];echo ": ";
			echo $data['primer_testigo'];echo " ";
			echo $t_pdivorcio['template'][6];echo " ";
			echo $data['segundo_testigo'];echo ", ";
			echo $data['descripcion_general'];echo " ";
			
		?>
		
		<br><br>
		<div class="row">		
		<div class="col-md-12">
			<?php
				$count = count($marginacion);
				while($row = mysql_fetch_array($marginacion))
				{
					if($_SESSION['data'][11]=='1')
					{
						?>
							<div class="fecha_marginacion">
								<?php
									echo "<strong>Fecha: </strong>". $row['fecha_marginacion'].' || <strong>Usuario: </strong>'.$row['nickname'].'<br>';
								?>
							</div>
						<?php						
					}

					echo $row['texto_marginacion'].'<br>';						
					echo "<br>";
				}
			?>
		</div>			
		</div>

		<div class="row">		
			<div class="col-md-8" id="">
				<span><strong>Digite la Marginacion</strong></span>
			</div>
			<div class="col-md-4" id="">
				<a href="#" id="guarda_marginacion" class="btn btn-primary">Guarda Marginacion</a>
			</div>
		</div>

		<div class="row">			
			<div class="col-md-12" id="marginacion">			
				<textarea class="form-control" id="texto_marginacion" rows="10"></textarea>
			</div>				
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">

				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" id="titulo_center">
			
		</div>	
	</div>


	<div class="col-md-1"></div>
	</div>




</div>
