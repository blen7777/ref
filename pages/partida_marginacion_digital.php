


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_p_nacimiento.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion(1,$id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pnacimiento = template_pnacimiento(1);
?>

<script>
    $(document).ready(function(){

    	$("#marginar_partida").click(function(){        
            $("#dato-marginacion").show();
            //var id = $("#id_partida").val();                
           //$(".includ").load("pages/partida_detalle.php?id="+id);
        });

        $("#guarda_marginacion").click(function(){  
        	alert("yes");
            var id_partida = $("#id_partida").val();
            var id_usuario = $("#id_usuario").val();
            var texto_marginacion = $("#texto_marginacion").val();
            
            var accion = "insert_marginacion";
            var tipoPartida = 1;

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
	            	alert("success");    
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
		<input type="hidden" value="<?php echo $data['id_pnacimiento']; ?>" id="id_partida">
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
			echo $t_pnacimiento['template'][0];
		?>
	</div>
	<div class="col-md-1"></div>
</div>
<br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" id="partida">
		<?php
	echo $data['texto_partida'];
?>

		<br><br>
		<div class="row">		
		<div class="col-md-12">
			<?php
				$count = count($marginacion);
				$num=0;
				while($num <$count)
				{
					echo $marginacion[$num];
					echo "<br>";
					echo "<br>";
					$num++;
				}
			?>
		</div>			
		</div>

	</div>

	<div class="col-md-1"></div>
	</div>

	<br>
	<hr>
	<div class="row">
		<div class="col-md-1" id=""></div>
		<div class="col-md-7" id="">
			<span><strong>Digite la Marginacion</strong></span>
		</div>
		<div class="col-md-4" id="">
			<a href="#" id="guarda_marginacion" class="btn btn-primary">Guarda Marginacion</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1" id=""></div>
		<div class="col-md-10" id="marginacion">			
			<textarea class="form-control" id="texto_marginacion" rows="10"></textarea>
		</div>	
		<div class="col-md-1" id=""></div>
	</div>
</div>
