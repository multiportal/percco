
<?php
include '../../admin/conexion.php';
if(isset($_POST['enviar'])){
echo $bootstrap.$jQuery10.$bootstrapjs;
	if($_POST['correo']){
	$nombre='Registro';
	$email=$_POST['correo'];
	$msj='Registro.';

			$sec='registros';
			$cat_list='inbox';

			$para='memojl08@gmail.com';
			$de=$email;
			$titulo='SAMSUNG HEALTHCARE - Registros';
			$message = "<html><body style='font-family:Verdana, Geneva, sans-serif; font-size: 13px;'>".
						"<p>Mensaje de registro de usuario a tráves de la página web de {$page_name}.</p>".
						"<table style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'>";
    		$message .= "<tr><td align='right' style='background-color: #eee;'>Usuario:</td><td style='background-color: #eee;'>".$nombre."</td></tr>";
    		$message .= "<tr><td align='right' style='background-color: #fff;'>Correo:</td><td style='background-color: #fff;'>".$email."</td></tr>";
    		$message .= "<tr><td align='right' style='background-color: #eee;'>Mensaje:</td><td style='background-color: #eee;'>".$msj."</td></tr>";
    		$message .="</table></body></html>";
			$header = "From: SAMSUNG HEALTHCARE - Registros" . "<contacto@samsung-healthcare.mx>\r\n";
  			$header .= 'MIME-Version: 1.0' . "\r\n";
    		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		 

			$save=mysqli_query($mysqli,"INSERT INTO ".$DBprefix."registros (ip,nombre,email,asunto,msj,cat_list,seccion,visible) VALUES ('{$ip}','{$nombre}','{$email}','{$titulo}','{$msj}','{$cat_list}','{$sec}','1');") or print mysqli_error($mysqli); 
			validar_aviso($save,'Ud. se ha suscrito correctamente, gracias','Hubo un problema al enviar su email, por favor intentelo nuevamente',$aviso);
			mail($para,$titulo,$message,$header);
	}else{
			$aviso='
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Hubo un problema al <i>enviar</i> su email, por favor intentelo nuevamente.
			</div>
			';
	}
}
?>
<div><?php echo $aviso;?></div>
		   <form name="form1" method="post" class="agile-info-form" action="<?php echo $pag_self;?>">
				<input type="email" id="correo" name="correo" class="email" placeholder="Enter your email address" required>
				<input type="submit" id="enviar" name="enviar" value="get notified!">
				<div class="clear"> </div> 
			</form>	
